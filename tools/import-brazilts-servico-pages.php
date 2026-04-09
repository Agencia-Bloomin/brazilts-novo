<?php
/**
 * Importa o bloco Elementor principal de páginas de serviço do site BrazilTS
 * e gera partial + descarrega post-{id}.css.
 */
$root = dirname(__DIR__);
$bu = 'https://www.brazilts.com.br';
$assetsCss = $root . '/assets/brazilts/wp-content/uploads/elementor/css';

$pages = [
    ['id' => 579, 'slug' => 'traducao-simultanea-consecutiva', 'file' => 'traducao-simultanea-consecutiva'],
    ['id' => 584, 'slug' => 'transcricao-de-audio-e-video', 'file' => 'transcricao-de-audio-e-video'],
    ['id' => 163, 'slug' => 'legendagem-de-video', 'file' => 'legendagem-de-video'],
    ['id' => 610, 'slug' => 'locacao-de-equipamento', 'file' => 'locacao-de-equipamento'],
    ['id' => 623, 'slug' => 'apostille-de-la-haye', 'file' => 'apostille-de-la-haye'],
];

function fetchUrl(string $url): string
{
    $tmp = tempnam(sys_get_temp_dir(), 'brts');
    if ($tmp === false) {
        throw new RuntimeException('tempnam falhou');
    }
    $cmd = 'curl.exe -sS -m 90 -L -A "Mozilla/5.0" ' . escapeshellarg($url) . ' -o ' . escapeshellarg($tmp);
    exec($cmd, $out, $code);
    $body = file_get_contents($tmp);
    @unlink($tmp);
    if ($code !== 0 || $body === false || strlen($body) < 500) {
        throw new RuntimeException("Falha ao baixar (exit $code): $url");
    }
    return $body;
}

function applyBraziltsClasses(string $c, int $postId): string
{
    $c = preg_replace(
        '/class="elementor (elementor-' . $postId . ')/',
        'class="brazilts-pb elementor $1',
        $c,
        1
    );
    $c = str_replace('class="elementor-element ', 'class="brazilts-blk elementor-element ', $c);
    $c = str_replace('elementor-widget-container', 'brazilts-wdg__inner elementor-widget-container', $c);
    $c = preg_replace('/class="([^"]*)\belementor-widget\s+elementor-widget-/', 'class="$1brazilts-wdg elementor-widget elementor-widget-', $c);
    $c = str_replace('class="elementor-heading-title', 'class="brazilts-title elementor-heading-title', $c);
    $c = preg_replace('/<a class="elementor-button elementor-button-link/', '<a class="brazilts-btn elementor-button elementor-button-link', $c);
    $c = preg_replace('/<button class="elementor-button /', '<button class="brazilts-btn elementor-button ', $c);
    $c = str_replace('https://www.brazilts.com.br/', '', $c);
    $c = str_replace('https://www.brazilts.com.br', '', $c);
    return $c;
}

foreach ($pages as $p) {
    $id = (int) $p['id'];
    $slug = $p['slug'];
    $file = $p['file'];
    $pageUrl = "$bu/servicos/$slug/";
    $cssUrl = "$bu/wp-content/uploads/elementor/css/post-$id.css";

    echo "Página $slug (id $id)...\n";

    $html = fetchUrl($pageUrl);
    $needle = '<div data-elementor-type="wp-page" data-elementor-id="' . $id . '"';
    $start = strpos($html, $needle);
    if ($start === false) {
        throw new RuntimeException("Marcador wp-page não encontrado em $pageUrl");
    }
    $footerPos = strpos($html, '<footer data-elementor-type="footer"', $start);
    if ($footerPos === false) {
        throw new RuntimeException("Footer Elementor não encontrado após o conteúdo");
    }
    $chunk = substr($html, $start, $footerPos - $start);
    $chunk = applyBraziltsClasses($chunk, $id);

    $partialPath = $root . '/inc/brazilts/partials/partial-' . $file . '.php';
    file_put_contents($partialPath, $chunk);
    echo "  -> $partialPath\n";

    $css = fetchUrl($cssUrl);
    if (!is_dir($assetsCss)) {
        mkdir($assetsCss, 0777, true);
    }
    file_put_contents($assetsCss . '/post-' . $id . '.css', $css);
    echo "  -> post-$id.css\n";
}

echo "Concluído.\n";
