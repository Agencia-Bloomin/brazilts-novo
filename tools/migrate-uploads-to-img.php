<?php
declare(strict_types=1);

// Migra uploads para img/ e reescreve inc/**/*.php — php tools/migrate-uploads-to-img.php

$root = dirname(__DIR__);
$uploadsRoot = $root . '/assets/brazilts/wp-content/uploads';
$imgDir = $root . '/img';

$imageExt = '~\.(jpe?g|png|gif|webp|svg|ico)$~i';
$skipPathPrefixes = ['elementor/css/', 'elementor/google-fonts/'];

if (!is_dir($uploadsRoot)) {
    fwrite(STDERR, "Pasta uploads não encontrada: $uploadsRoot\n");
    exit(1);
}

if (!is_dir($imgDir)) {
    mkdir($imgDir, 0775, true);
}

/** @var array<string, string> rel (from uploads/) => img filename */
$relToImg = [];
/** @var array<string, string> sha256 => img filename */
$hashToImg = [];

function relFromUploads(string $uploadsRoot, string $file): string
{
    return str_replace('\\', '/', substr($file, strlen($uploadsRoot) + 1));
}

function shouldSkipRel(string $rel, array $skipPathPrefixes): bool
{
    foreach ($skipPathPrefixes as $p) {
        if (str_starts_with($rel, $p)) {
            return true;
        }
    }
    return false;
}

// --- Certificados ISO: nomes curtos ---
$isoCertSources = [
    'elementor/thumbs/9001-1-qy9eagufyqoj6jtnjfai4k3g0ilq2j1ctu0mhr4irs.webp' => 'cert-iso-9001.webp',
    'elementor/thumbs/17100_1-qy9eagufyqoj6jtnjfai4k3g0ilq2j1ctu0mhr4irs.webp' => 'cert-iso-17100-1.webp',
    'elementor/thumbs/17100_2-qy9eahsa5kpti5sadxp4p1uwlwh3a8535yo3z134lk.webp' => 'cert-iso-17100-2.webp',
    'elementor/thumbs/27001-1-qy9eahsadgw9wtbzlnahxv77ixifevri5npfijsqdk.webp' => 'cert-iso-27001.webp',
];

$isoSourceRels = array_keys($isoCertSources);

foreach ($isoCertSources as $rel => $destName) {
    $src = $uploadsRoot . '/' . str_replace('/', DIRECTORY_SEPARATOR, $rel);
    if (!is_file($src)) {
        fwrite(STDERR, "AVISO: certificado em falta: $rel\n");
        continue;
    }
    $dest = $imgDir . '/' . $destName;
    copy($src, $dest);
    $h = hash_file('sha256', $src);
    $hashToImg[$h] = $destName;
    $relToImg[$rel] = $destName;
}

$rii = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($uploadsRoot, FilesystemIterator::SKIP_DOTS)
);
$allFiles = [];
foreach ($rii as $fileInfo) {
    if (!$fileInfo->isFile()) {
        continue;
    }
    $path = $fileInfo->getPathname();
    if (!preg_match($imageExt, $path)) {
        continue;
    }
    $rel = relFromUploads($uploadsRoot, $path);
    if (shouldSkipRel($rel, $skipPathPrefixes)) {
        continue;
    }
    if (in_array($rel, $isoSourceRels, true)) {
        continue;
    }
    $allFiles[] = $rel;
}
sort($allFiles);

foreach ($allFiles as $rel) {
    $src = $uploadsRoot . '/' . str_replace('/', DIRECTORY_SEPARATOR, $rel);
    $h = hash_file('sha256', $src);

    if (isset($hashToImg[$h])) {
        $relToImg[$rel] = $hashToImg[$h];
        continue;
    }

    $base = basename($rel);
    $destName = $base;
    $destPath = $imgDir . '/' . $destName;

    if (is_file($destPath) && hash_file('sha256', $destPath) !== $h) {
        $pi = pathinfo($base);
        $stem = $pi['filename'];
        $ext = isset($pi['extension']) ? '.' . $pi['extension'] : '';
        $destName = $stem . '-' . substr(md5($rel), 0, 6) . $ext;
        $destPath = $imgDir . '/' . $destName;
    }

    if (!is_file($destPath)) {
        copy($src, $destPath);
    }
    $relToImg[$rel] = $destName;
    $hashToImg[$h] = $destName;
}

// --- Aliases: thumbs antigos no HTML ---
$legacyIso = [
    'elementor/thumbs/9001-1-qy9do724m40fntahidj3k72gzyst8r5v2254olkt0o.webp' => 'cert-iso-9001.webp',
    'elementor/thumbs/17100_1-qy9do8xszs30b17r7eccp6le6qjjo5dbqbg3n5i0o8.webp' => 'cert-iso-17100-1.webp',
    'elementor/thumbs/17100_2-qy9do8xszs30b17r7eccp6le6qjjo5dbqbg3n5i0o8.webp' => 'cert-iso-17100-2.webp',
    'elementor/thumbs/27001-1-qy9do7zzevfnk4nueb12x6c3x3jw5dvv1cca83ijc8.webp' => 'cert-iso-27001.webp',
];
foreach ($legacyIso as $legacyRel => $imgName) {
    if (is_file($imgDir . '/' . $imgName)) {
        $relToImg[$legacyRel] = $imgName;
    }
}

// --- img/servicos/*.webp → raiz img ---
$servicosDir = $imgDir . '/servicos';
if (is_dir($servicosDir)) {
    foreach (glob($servicosDir . '/*') ?: [] as $old) {
        if (!is_file($old)) {
            continue;
        }
        $bn = basename($old);
        $target = $imgDir . '/' . $bn;
        if (!is_file($target)) {
            copy($old, $target);
        }
    }
}

function downloadToImg(string $imgDir, string $rel, string $saveAs, array &$relToImg): void
{
    if (is_file($imgDir . '/' . $saveAs)) {
        $relToImg[$rel] = $saveAs;
        return;
    }
    $path = $rel;
    $parts = explode('/', $path);
    $encParts = array_map('rawurlencode', $parts);
    $url = 'https://www.brazilts.com.br/wp-content/uploads/' . implode('/', $encParts);

    $ctx = stream_context_create([
        'http' => [
            'timeout' => 30,
            'header' => "User-Agent: BrazilTS-migrate/1.0\r\n",
        ],
        'ssl' => [
            'verify_peer' => true,
        ],
    ]);
    $data = @file_get_contents($url, false, $ctx);
    if ($data !== false && strlen($data) > 100) {
        file_put_contents($imgDir . '/' . $saveAs, $data);
        $relToImg[$rel] = $saveAs;
        echo "Descarregado: $rel -> img/$saveAs\n";
    } else {
        fwrite(STDERR, "Falha download: $url\n");
    }
}

// Assets referenciados no site mas ausentes do mirror local — obtidos do site público
$remotePull = [
    'elementor/thumbs/logo-2-rbid3vo2g9txenu83emk0pm2qa4x5aijqyxnuu8ig8.webp' => 'visa-pronto-logo.webp',
    '2024/12/Rede_Shop-logo-F140520EC5-seeklogo.com_.png' => 'Rede_Shop-logo-F140520EC5-seeklogo.com_.png',
    '2024/09/traducao-juramentada-capa.jpg' => 'traducao-juramentada-capa.jpg',
    '2024/09/traducao-em-libras-img.webp' => 'traducao-em-libras-img.webp',
    '2024/10/Mercedes-Benz-logo-8F1B2E9A56-seeklogo.com_.png' => 'Mercedes-Benz-logo-8F1B2E9A56-seeklogo.com_.png',
    '2024/10/AURORA_ALIMENTOS-logo-DA749C40E5-seeklogo.com_.png' => 'AURORA_ALIMENTOS-logo-DA749C40E5-seeklogo.com_.png',
    '2024/10/Bunge-Logo-tumb.png' => 'Bunge-Logo-tumb.png',
    '2024/10/cliente-queiroz-galvao.png' => 'cliente-queiroz-galvao.png',
    '2024/09/traducao-cientifica-img.webp' => 'traducao-cientifica-img.webp',
    '2024/09/transcricao-tecnica.webp' => 'transcricao-tecnica.webp',
    '2024/12/b58048fc-fea7-4d22-9a7d-08705b01d9d8-768x1024.webp' => 'b58048fc-fea7-4d22-9a7d-08705b01d9d8-768x1024.webp',
    '2024/09/apostille-de-la-haye-img.webp' => 'apostille-de-la-haye-img.webp',
    '2024/09/traducao-simultanea-img.webp' => 'traducao-simultanea-img.webp',
    '2024/09/traducao-cientifica-capa.webp' => 'traducao-cientifica-capa.webp',
    '2024/09/locacao-de-equipamento-img.webp' => 'locacao-de-equipamento-img.webp',
    '2024/09/legendagem-de-video-detalhe.webp' => 'legendagem-de-video-detalhe.webp',
    '2024/09/apostilamento.webp' => 'apostilamento.webp',
    '2024/12/Adalberto-1-727x1024.webp' => 'Adalberto-1-727x1024.webp',
    '2024/12/Sergio-scaled-2-694x1024.jpg' => 'Sergio-scaled-2-694x1024.jpg',
    '2024/12/Ricardo-scaled-1-712x1024.webp' => 'Ricardo-scaled-1-712x1024.webp',
    '2024/12/Daniel-1-706x1024.jpeg' => 'Daniel-1-706x1024.jpeg',
    '2024/12/Israel-1-711x1024.jpeg' => 'Israel-1-711x1024.jpeg',
    '2024/12/Rafael-1-698x1024.jpeg' => 'Rafael-1-698x1024.jpeg',
    '2024/12/Evanise-1-798x1024.jpeg' => 'Evanise-1-798x1024.jpeg',
    '2024/12/Isabel-scaled-2-724x1024.jpg' => 'Isabel-scaled-2-724x1024.jpg',
    '2024/12/Edimar-scaled-2-694x1024.jpg' => 'Edimar-scaled-2-694x1024.jpg',
];
foreach ($remotePull as $rel => $saveAs) {
    downloadToImg($imgDir, $rel, $saveAs, $relToImg);
}

file_put_contents(
    $root . '/tools/upload-to-img-map.json',
    json_encode($relToImg, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "\n"
);

$prefixes = [
    'assets/brazilts/wp-content/uploads/',
    'wp-content/uploads/',
    'https://www.brazilts.com.br/wp-content/uploads/',
    'http://www.brazilts.com.br/wp-content/uploads/',
    'https://brazilts.accioestudio.com.br/wp-content/uploads/',
    'http://brazilts.accioestudio.com.br/wp-content/uploads/',
];

$rels = array_keys($relToImg);
usort($rels, static fn ($a, $b) => strlen($b) <=> strlen($a));

$incFiles = [];
$incIt = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($root . '/inc', FilesystemIterator::SKIP_DOTS)
);
foreach ($incIt as $f) {
    if ($f->isFile() && strcasecmp($f->getExtension(), 'php') === 0) {
        $incFiles[] = $f->getPathname();
    }
}

foreach ($incFiles as $phpFile) {
    $content = file_get_contents($phpFile);
    if ($content === false) {
        continue;
    }
    if (strpos($content, 'wp-content/uploads') === false && strpos($content, 'brazilts.accioestudio') === false) {
        continue;
    }
    $orig = $content;
    foreach ($rels as $rel) {
        $imgName = $relToImg[$rel];
        $target = 'img/' . $imgName;
        foreach ($prefixes as $pre) {
            $content = str_replace($pre . $rel, $target, $content);
        }
        $encRel = str_replace('—', '%E2%80%94', $rel);
        if ($encRel !== $rel) {
            foreach ($prefixes as $pre) {
                $content = str_replace($pre . $encRel, $target, $content);
            }
        }
    }
    $content = preg_replace('/\s+srcset="[^"]*"/', '', $content);
    $content = preg_replace('/\s+sizes="[^"]*"/', '', $content);

    if ($content !== $orig) {
        file_put_contents($phpFile, $content);
        echo "Atualizado: " . str_replace($root . DIRECTORY_SEPARATOR, '', $phpFile) . "\n";
    }
}

echo "Mapa: tools/upload-to-img-map.json\n";
echo "Imagens em: img/\n";
