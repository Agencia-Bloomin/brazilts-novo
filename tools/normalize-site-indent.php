<?php
/**
 * Normaliza indentação do site: LF, tabs→espaços, trim à direita,
 * reindentação relativa em <main> e nos blocos Elementor de header/footer.
 */
declare(strict_types=1);

$root = dirname(__DIR__);

$excludeBasenames = [
    'PHPMailer.php', 'SMTP.php', 'POP3.php', 'OAuth.php', 'OAuthTokenProvider.php',
    'DSNConfigurator.php', 'Exception.php',
];

function collectPhpFiles(string $dir, array $excludeBasenames): array
{
    $out = [];
    $it = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS)
    );
    /** @var SplFileInfo $f */
    foreach ($it as $f) {
        if (!$f->isFile() || strtolower($f->getExtension()) !== 'php') {
            continue;
        }
        $path = $f->getPathname();
        if (str_contains($path, DIRECTORY_SEPARATOR . 'brazilts-clone' . DIRECTORY_SEPARATOR)) {
            continue;
        }
        if (str_contains($path, DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'brazilts' . DIRECTORY_SEPARATOR)) {
            continue;
        }
        if (in_array($f->getBasename(), $excludeBasenames, true)) {
            continue;
        }
        $out[] = $path;
    }
    return $out;
}

function expandTabs(string $s): string
{
    return str_replace("\t", '    ', $s);
}

function trimTrailingLines(string $s): string
{
    $s = str_replace("\r\n", "\n", $s);
    $lines = explode("\n", $s);
    foreach ($lines as $i => $line) {
        $lines[$i] = rtrim($line, " \t");
    }
    return implode("\n", $lines);
}

/**
 * Reindentação por profundidade de div/section (export Elementor costuma misturar tabs).
 */
function reindentElementorHtml(string $block, int $baseSpaces, int $step = 4): string
{
    $block = str_replace("\r\n", "\n", $block);
    $block = expandTabs($block);
    $lines = explode("\n", $block);
    $depth = 0;
    $out = [];

    foreach ($lines as $line) {
        $t = trim($line);
        if ($t === '') {
            $out[] = '';
            continue;
        }

        while (preg_match('/^<\/(div|section|header|footer)\b[^>]*>\s*/i', $t, $m)) {
            $depth = max(0, $depth - 1);
            $out[] = str_repeat(' ', $baseSpaces + $depth * $step) . trim($m[0]);
            $t = trim(substr($t, strlen($m[0])));
        }

        if ($t === '') {
            continue;
        }

        $out[] = str_repeat(' ', $baseSpaces + $depth * $step) . $t;

        $openTags = [];
        if (preg_match_all('/<(div|section|header|footer)\b[^>]*>/i', $t, $tm)) {
            foreach ($tm[0] as $fullTag) {
                if (preg_match('/\/\s*>$/', $fullTag)) {
                    continue;
                }
                $openTags[] = $fullTag;
            }
        }
        $closeCount = preg_match_all('/<\/(div|section|header|footer)\b[^>]*>/i', $t);
        $depth += count($openTags) - $closeCount;
        $depth = max(0, $depth);
    }

    return implode("\n", $out);
}

function processPhpContent(string $content): string
{
    $content = str_replace("\r\n", "\n", $content);
    $content = expandTabs($content);
    $content = trimTrailingLines($content);

    // inc.header.php — bloco Elementor após require do menu (sem \s* após o fechamento PHP do require)
    if (preg_match(
        '/^(\<\?php if \(!empty\(\$loadBraziltsElementor\)\) : \?\>\s*\<\?php require_once[^\?]+\?\>)(.*?)(\<\?php else : \?\>\s*)(.*)$/s',
        $content,
        $m
    )) {
        $html = reindentElementorHtml($m[2], 4);
        $afterElse = expandTabs($m[4]);
        $afterElse = trimTrailingLines($afterElse);
        $content = rtrim($m[1]) . "\n" . $html . "\n" . $m[3] . $afterElse;
        $content = trimTrailingLines($content);
        return $content;
    }

    // inc.footer.php — bloco Elementor (footer + popup)
    if (preg_match(
        '/^(\<\?php if \(!empty\(\$loadBraziltsElementor\)\) : \?\>)(.*?)(\<\?php else : \?\>\s*)(.*)$/s',
        $content,
        $m
    )) {
        $html = reindentElementorHtml($m[2], 4);
        $afterElse = expandTabs($m[4]);
        $afterElse = trimTrailingLines($afterElse);
        $content = rtrim($m[1]) . "\n" . $html . "\n" . $m[3] . $afterElse;
        $content = trimTrailingLines($content);
        return $content;
    }

    // Páginas com <main id="content" class="brazilts-main"
    $content = preg_replace_callback(
        '/(    <main id="content" class="brazilts-main" role="main">\n)(.*?)(\n    <\/main>)/s',
        static function (array $m): string {
            return $m[1] . reindentElementorHtml($m[2], 8) . $m[3];
        },
        $content
    );

    return trimTrailingLines($content);
}

function processJsContent(string $content): string
{
    $content = str_replace("\r\n", "\n", $content);
    $content = expandTabs($content);
    return trimTrailingLines($content);
}

function processScssContent(string $content): string
{
    $content = str_replace("\r\n", "\n", $content);
    $content = str_replace("\t", '  ', $content);
    return trimTrailingLines($content);
}

// --- PHP ---
$phpFiles = collectPhpFiles($root, $excludeBasenames);
$n = 0;
foreach ($phpFiles as $path) {
    $raw = file_get_contents($path);
    if ($raw === false) {
        fwrite(STDERR, "Ler falhou: $path\n");
        exit(1);
    }
    $new = processPhpContent($raw);
    if ($new !== $raw) {
        file_put_contents($path, $new);
        echo basename($path) . "\n";
        $n++;
    }
}

// --- JS (raiz/js) ---
$jsDir = $root . DIRECTORY_SEPARATOR . 'js';
if (is_dir($jsDir)) {
    foreach (glob($jsDir . DIRECTORY_SEPARATOR . '*.js') ?: [] as $path) {
        $raw = file_get_contents($path);
        if ($raw === false) {
            continue;
        }
        $new = processJsContent($raw);
        if ($new !== $raw) {
            file_put_contents($path, $new);
            echo 'js/' . basename($path) . "\n";
            $n++;
        }
    }
}

// --- SCSS ---
$scssDir = $root . DIRECTORY_SEPARATOR . 'scss';
if (is_dir($scssDir)) {
    $it = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($scssDir, FilesystemIterator::SKIP_DOTS)
    );
    foreach ($it as $f) {
        /** @var SplFileInfo $f */
        if (!$f->isFile() || $f->getExtension() !== 'scss') {
            continue;
        }
        $path = $f->getPathname();
        $raw = file_get_contents($path);
        if ($raw === false) {
            continue;
        }
        $new = processScssContent($raw);
        if ($new !== $raw) {
            file_put_contents($path, $new);
            echo str_replace($root . DIRECTORY_SEPARATOR, '', $path) . "\n";
            $n++;
        }
    }
}

echo "Arquivos alterados: $n\n";
