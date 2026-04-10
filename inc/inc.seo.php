<?php
declare(strict_types=1);

header('Content-Type: text/html; charset=utf-8', true);

require_once __DIR__ . DIRECTORY_SEPARATOR . 'inc.config.php';

/**
 * Head comum do site.
 *
 * Páginas BrazilTS/Elementor (entrada na raiz, ex.: index.php, servicos.php) costumam definir antes do include:
 * - $loadBraziltsElementor = true
 * - $braziltsIncludeThemeParts = true   → carrega CSS header (1611), footer (1646), popup (1648), etc.
 * - $braziltsPostCssIds = [7, 24]       → kit Elementor (7) + post da página (ex. 24 home, 26 serviços)
 * - $braziltsElementorPostId, $braziltsElementorPostTitle → JSON do frontend Elementor (inc.js.php)
 * - $title, $description, $activePage (slug canónico: '', 'nossa-historia', 'servicos/traducao-juramentada', …)
 * - $isHome (bool) — evita sufixo genérico no <title> em páginas legadas
 *
 * URLs amigáveis (.htaccess): /orcamento/ → contato.php; /servicos/* → servicos-*.php; /{slug}/ → {slug}.php
 */

if (!isset($activePage)) {
    $path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
    $path = is_string($path) ? trim($path, '/') : '';
    if ($path === '' || strcasecmp($path, 'index.php') === 0) {
        $activePage = '';
    } elseif (preg_match('/\.php$/i', $path)) {
        $activePage = basename($path, '.php');
    } else {
        $activePage = $path;
    }
}

/** /orcamento/ usa contato.php; slug canónico para menu, breadcrumb e schema. */
if (!empty($loadBraziltsElementor)) {
    $reqPath = trim((string) (parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: ''), '/');
    if ($reqPath === 'orcamento' || str_starts_with($reqPath, 'orcamento/')) {
        $activePage = 'orcamento';
    }
}

$pageId = 'home';

if (!isset($title)) {
    switch ($activePage) {
        case '':
        case 'index':
            $title = 'Brazil Translations | Tradução e Interpretação de Qualidade';
            $h1 = 'Brazil Translations';
            $description = 'A BrazilTS oferece tradução e interpretação de qualidade, com agilidade e suporte em mais de 100 idiomas. Conheça mais sobre nossos serviços!';
            break;

        case 'nossa-historia':
            $title = 'Nossa História - Brazil Translations | Tradução e Interpretação de Qualidade';
            $h1 = 'Nossa História';
            $description = 'Conheça a trajetória da Brazil Translations e nossa atuação em tradução e interpretação.';
            break;

        case 'quem-somos':
            $title = 'Quem somos - Brazil Translations | Tradução e Interpretação de Qualidade';
            $h1 = 'Quem somos';
            $description = 'Saiba quem é a Brazil Translations e como apoiamos empresas em comunicação multilíngue.';
            break;

        case 'servicos':
            $title = 'Serviços - Brazil Translations | Tradução e Interpretação de Qualidade';
            $h1 = 'Serviços';
            $description = 'Tradução juramentada, técnica, interpretação, legendagem, transcrição e mais — Brazil Translations.';
            break;

        case 'servicos/traducao-juramentada':
            $title = 'Tradução Juramentada - Brazil Translations | Tradução e Interpretação de Qualidade';
            $h1 = 'Tradução Juramentada';
            $description = 'Tradução juramentada com validade legal. Brazil Translations — agilidade e rigor técnico.';
            break;

        case 'servicos/traducao-cientifica':
            $title = 'Tradução Técnica e Científica - Brazil Translations | Tradução e Interpretação de Qualidade';
            $h1 = 'Tradução técnica e científica';
            $description = 'Tradução técnica e científica para manuais, estudos e documentação especializada.';
            break;

        case 'servicos/traducao-em-libras':
            $title = 'Tradução em Libras - Brazil Translations | Tradução e Interpretação de Qualidade';
            $h1 = 'Tradução em Libras';
            $description = 'Serviços de tradução e acessibilidade em Libras com qualidade Brazil Translations.';
            break;

        case 'servicos/traducao-simultanea-consecutiva':
            $title = 'Interpretação Simultânea e Consecutiva - Brazil Translations | Tradução e Interpretação de Qualidade';
            $h1 = 'Interpretação simultânea / consecutiva';
            $description = 'Interpretação para eventos, reuniões e conferências — equipe e equipamentos Brazil Translations.';
            break;

        case 'servicos/transcricao-de-audio-e-video':
            $title = 'Transcrição de Áudio e Vídeo - Brazil Translations | Tradução e Interpretação de Qualidade';
            $h1 = 'Transcrição de áudio e vídeo';
            $description = 'Transcrição profissional de áudios e vídeos com confidencialidade e prazo acordado.';
            break;

        case 'servicos/legendagem-de-video':
            $title = 'Legendagem de Vídeo - Brazil Translations | Tradução e Interpretação de Qualidade';
            $h1 = 'Legendagem de vídeo';
            $description = 'Legendagem e subtitulação de vídeos para treinamentos, marketing e acessibilidade.';
            break;

        case 'servicos/locacao-de-equipamento':
            $title = 'Locação de Equipamentos - Brazil Translations | Tradução e Interpretação de Qualidade';
            $h1 = 'Locação de equipamentos';
            $description = 'Locação de equipamentos para interpretação simultânea em eventos corporativos.';
            break;

        case 'servicos/apostille-de-la-haye':
            $title = 'Apostille de la Haye - Brazil Translations | Tradução e Interpretação de Qualidade';
            $h1 = 'Apostille de la Haye';
            $description = 'Apoio em documentação e apostilamento para uso de documentos no exterior.';
            break;

        case 'fale-conosco':
            $title = 'Fale conosco - Brazil Translations | Tradução e Interpretação de Qualidade';
            $h1 = 'Fale conosco';
            $description = 'Entre em contato com a Brazil Translations — telefone, e-mail e canais de atendimento.';
            break;

        case 'contato':
        case 'orcamento':
            $title = 'Orçamento / Contato - Brazil Translations | Tradução e Interpretação de Qualidade';
            $h1 = 'Orçamento rápido';
            $description = 'Solicite orçamento de tradução ou interpretação. A Brazil Translations responde com agilidade.';
            break;

        case 'politica-de-privacidade':
            $title = 'Política de Privacidade - Brazil Translations | Tradução e Interpretação de Qualidade';
            $h1 = 'Política de Privacidade';
            $description = 'Política de Privacidade e Segurança de Dados da Brazil Translations: tratamento de informações pessoais, alterações, armazenamento, prazos, terceiros, direitos do usuário e comunicações.';
            break;

        case 'termos-de-uso':
            $title = 'Termos de Uso - Brazil Translations | Tradução e Interpretação de Qualidade';
            $h1 = 'Termos de Uso';
            $description = 'Termos de Uso do site Brazil Translations: condições de acesso, responsabilidades, propriedade intelectual, dados pessoais, cookies e legislação aplicável.';
            break;

        case 'mapa-do-site':
            $title = 'Mapa do Site';
            $h1 = 'Mapa do Site';
            $description = 'Mapa do site com links para as principais páginas.';
            break;

        case 'obrigado':
            $title = 'Agradecimento';
            $h1 = 'Agradecimento';
            $description = 'Obrigado por ter preenchido nosso formulário. Entraremos em contato assim que possível.';
            break;
    }
}

if (empty($keywords)) {
    $keywords = '';
}

if (!isset($description)) {
    $description = '';
}

$proto = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$canonical = $proto . '://' . ($_SERVER['HTTP_HOST'] ?? 'localhost') . ($_SERVER['REQUEST_URI'] ?? '/');

$braziltsSiteTitle = 'Brazil Translations | Tradução e Interpretação de Qualidade';
$braziltsDescriptionDefault = 'A BrazilTS oferece tradução e interpretação de qualidade, com agilidade e suporte em mais de 100 idiomas.';

$titleHome = !empty($loadBraziltsElementor) ? $braziltsSiteTitle : 'Home';
$descriptionHome = !empty($loadBraziltsElementor) ? $braziltsDescriptionDefault : 'Saiba como ampliar seus negocios com a gente!';

$seoSiteName = !empty($loadBraziltsElementor) ? $braziltsSiteTitle : (defined('CONF_SITE_NAME') ? CONF_SITE_NAME : '');
$seoAuthor = !empty($loadBraziltsElementor) ? 'Brazil Translations' : 'Ubika Brasil';
$seoAuthorMeta = !empty($loadBraziltsElementor) ? '+55 (11) 3295-2888 | <?= CONF_SITE_EMAIL ?>' : '11 3673-7056 | 11 3864-6282';
$htmlLang = !empty($loadBraziltsElementor) ? 'pt-BR' : 'pt-br';

$seoTitleSuffix = '';
if (empty($loadBraziltsElementor) && !isset($isHome)) {
    $seoTitleSuffix = ' | Template Vanilla';
}

$ogType = (!empty($loadBraziltsElementor) && ($activePage === '' || $activePage === 'index')) ? 'website' : 'article';
?>

<!DOCTYPE html>
<html lang="<?= htmlspecialchars($htmlLang, ENT_QUOTES, 'UTF-8') ?>">

<head>
  <?php
  if (isset($h1)) {
    $h1Encoded = urlencode($h1);
  }
  ?>
  <base href="<?= CONF_TAG_BASE ?>">

  <title><?= htmlspecialchars((string) (!empty($title) ? $title : $titleHome), ENT_QUOTES, 'UTF-8') ?><?= htmlspecialchars($seoTitleSuffix, ENT_QUOTES, 'UTF-8') ?></title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="<?= htmlspecialchars((string) (!empty($description) ? $description : $descriptionHome), ENT_QUOTES, 'UTF-8') ?>">
  <meta name="keywords" content="<?= htmlspecialchars((string) $keywords, ENT_QUOTES, 'UTF-8') ?>">
  <link rel="canonical" href="<?= htmlspecialchars($canonical, ENT_QUOTES, 'UTF-8') ?>">

  <meta property="og:locale" content="pt_BR">
  <meta property="og:region" content="Brasil">
  <meta property="og:title" content="<?= htmlspecialchars((string) (!empty($title) ? $title : $titleHome), ENT_QUOTES, 'UTF-8') ?>">
  <meta property="og:type" content="<?= htmlspecialchars($ogType, ENT_QUOTES, 'UTF-8') ?>">
  <meta property="og:description" content="<?= htmlspecialchars((string) (!empty($description) ? $description : $descriptionHome), ENT_QUOTES, 'UTF-8') ?>">
  <meta property="og:site_name" content="<?= htmlspecialchars($seoSiteName, ENT_QUOTES, 'UTF-8') ?>">
  <meta property="og:url" content="<?= htmlspecialchars($canonical, ENT_QUOTES, 'UTF-8') ?>">
  <meta property="og:keywords" content="<?= htmlspecialchars((string) $keywords, ENT_QUOTES, 'UTF-8') ?>">

  <meta name="author" content="<?= htmlspecialchars($seoAuthor, ENT_QUOTES, 'UTF-8') ?>">
  <meta name="fone" content="<?= htmlspecialchars($seoAuthorMeta, ENT_QUOTES, 'UTF-8') ?>">
  <meta name="city" content="São Paulo">

  <meta name="country" content="Brasil">
  <meta name="geo.region" content="SP-BR">
  <meta name="copyright" content="<?= htmlspecialchars(!empty($loadBraziltsElementor) ? 'Brazil Translations' : 'Copyright ', ENT_QUOTES, 'UTF-8') ?>">
  <meta name="geo.position" content="-23.539351;-46.681925">
  <meta name="geo.placename" content="São Paulo-SP">
  <meta name="ICBM" content="-23.539351;-46.681925">
  <meta name="robots" content="index,follow">
  <meta name="rating" content="General">
  <meta name="revisit-after" content="7 days">

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer">

  <link rel="icon" href="img/logo/icon.ico" type="image/x-icon">

  <?php include __DIR__ . DIRECTORY_SEPARATOR . 'inc.css.php'; ?>
  <?php if (!empty($loadBraziltsElementor)) :
    if (empty($braziltsPostCssIds) || !is_array($braziltsPostCssIds)) {
        $braziltsPostCssIds = [7, 24];
    }
    $braziltsBu = rtrim(CONF_TAG_BASE, '/') . '/' . BRAZILTS_WPU;
    $braziltsVer = '2';
    ?>
<style>img:is([sizes="auto" i], [sizes^="auto," i]) { contain-intrinsic-size: 3000px 1500px }</style>
<link rel="stylesheet" href="<?= htmlspecialchars($braziltsBu) ?>/themes/hello-elementor/style.min.css?ver=<?= htmlspecialchars($braziltsVer) ?>" media="all">
<link rel="stylesheet" href="<?= htmlspecialchars($braziltsBu) ?>/themes/hello-elementor/theme.min.css?ver=<?= htmlspecialchars($braziltsVer) ?>" media="all">
<link rel="stylesheet" href="<?= htmlspecialchars($braziltsBu) ?>/themes/hello-elementor/header-footer.min.css?ver=<?= htmlspecialchars($braziltsVer) ?>" media="all">
<link rel="stylesheet" href="<?= htmlspecialchars($braziltsBu) ?>/plugins/elementor/assets/css/frontend.min.css?ver=<?= htmlspecialchars($braziltsVer) ?>" media="all">
<link rel="stylesheet" href="<?= htmlspecialchars($braziltsBu) ?>/plugins/elementor/assets/css/widget-icon-list.min.css?ver=<?= htmlspecialchars($braziltsVer) ?>" media="all">
<link rel="stylesheet" href="<?= htmlspecialchars($braziltsBu) ?>/plugins/elementor/assets/css/widget-image.min.css?ver=<?= htmlspecialchars($braziltsVer) ?>" media="all">
<link rel="stylesheet" href="<?= htmlspecialchars($braziltsBu) ?>/plugins/pro-elements/assets/css/widget-nav-menu.min.css?ver=<?= htmlspecialchars($braziltsVer) ?>" media="all">
<link rel="stylesheet" href="<?= htmlspecialchars($braziltsBu) ?>/plugins/pro-elements/assets/css/modules/sticky.min.css?ver=<?= htmlspecialchars($braziltsVer) ?>" media="all">
<link rel="stylesheet" href="<?= htmlspecialchars($braziltsBu) ?>/plugins/elementor/assets/css/widget-heading.min.css?ver=<?= htmlspecialchars($braziltsVer) ?>" media="all">
<link rel="stylesheet" href="<?= htmlspecialchars($braziltsBu) ?>/plugins/elementor/assets/css/widget-text-editor.min.css?ver=<?= htmlspecialchars($braziltsVer) ?>" media="all">
<link rel="stylesheet" href="<?= htmlspecialchars($braziltsBu) ?>/plugins/pro-elements/assets/css/widget-animated-headline.min.css?ver=<?= htmlspecialchars($braziltsVer) ?>" media="all">
<link rel="stylesheet" href="<?= htmlspecialchars($braziltsBu) ?>/plugins/elementor/assets/css/widget-counter.min.css?ver=<?= htmlspecialchars($braziltsVer) ?>" media="all">
<link rel="stylesheet" href="<?= htmlspecialchars($braziltsBu) ?>/plugins/elementor/assets/lib/animations/styles/slideInUp.min.css?ver=<?= htmlspecialchars($braziltsVer) ?>" media="all">
<link rel="stylesheet" href="<?= htmlspecialchars($braziltsBu) ?>/plugins/elementor/assets/lib/animations/styles/e-animation-grow.min.css?ver=<?= htmlspecialchars($braziltsVer) ?>" media="all">
<link rel="stylesheet" href="<?= htmlspecialchars($braziltsBu) ?>/plugins/elementor/assets/css/widget-accordion.min.css?ver=<?= htmlspecialchars($braziltsVer) ?>" media="all">
<link rel="stylesheet" href="<?= htmlspecialchars($braziltsBu) ?>/plugins/elementor/assets/css/widget-icon-box.min.css?ver=<?= htmlspecialchars($braziltsVer) ?>" media="all">
<link rel="stylesheet" href="<?= htmlspecialchars($braziltsBu) ?>/plugins/pro-elements/assets/css/widget-form.min.css?ver=<?= htmlspecialchars($braziltsVer) ?>" media="all">
<link rel="stylesheet" href="<?= htmlspecialchars($braziltsBu) ?>/uploads/elementor/google-fonts/css/sora.css?ver=<?= htmlspecialchars($braziltsVer) ?>" media="all">
<link rel="stylesheet" href="<?= htmlspecialchars($braziltsBu) ?>/uploads/elementor/google-fonts/css/montserrat.css?ver=<?= htmlspecialchars($braziltsVer) ?>" media="all">
<link rel="stylesheet" href="<?= htmlspecialchars($braziltsBu) ?>/uploads/elementor/google-fonts/css/poppins.css?ver=<?= htmlspecialchars($braziltsVer) ?>" media="all">
<?php foreach ($braziltsPostCssIds as $postCssId) :
    $pid = (int) $postCssId; ?>
<link rel="stylesheet" href="<?= htmlspecialchars($braziltsBu) ?>/uploads/elementor/css/post-<?= $pid ?>.css?ver=<?= htmlspecialchars($braziltsVer) ?>" media="all">
<?php endforeach; ?>
<?php if (!empty($braziltsIncludeThemeParts)) : ?>
<link rel="stylesheet" href="<?= htmlspecialchars($braziltsBu) ?>/uploads/elementor/css/post-1611.css?ver=<?= htmlspecialchars($braziltsVer) ?>" media="all">
<link rel="stylesheet" href="<?= htmlspecialchars($braziltsBu) ?>/uploads/elementor/css/post-1646.css?ver=<?= htmlspecialchars($braziltsVer) ?>" media="all">
<link rel="stylesheet" href="<?= htmlspecialchars($braziltsBu) ?>/uploads/elementor/css/post-1648.css?ver=<?= htmlspecialchars($braziltsVer) ?>" media="all">
<link rel="stylesheet" href="<?= htmlspecialchars($braziltsBu) ?>/plugins/elementor/assets/css/widget-social-icons.min.css?ver=<?= htmlspecialchars($braziltsVer) ?>" media="all">
<link rel="stylesheet" href="<?= htmlspecialchars($braziltsBu) ?>/plugins/elementor/assets/css/conditionals/apple-webkit.min.css?ver=<?= htmlspecialchars($braziltsVer) ?>" media="all">
<link rel="stylesheet" href="<?= htmlspecialchars($braziltsBu) ?>/plugins/elementor/assets/lib/animations/styles/fadeInLeft.min.css?ver=<?= htmlspecialchars($braziltsVer) ?>" media="all">
<link rel="stylesheet" href="<?= htmlspecialchars($braziltsBu) ?>/plugins/pro-elements/assets/css/conditionals/popup.min.css?ver=<?= htmlspecialchars($braziltsVer) ?>" media="all">
<?php endif; ?>
<style>
  .e-con.e-parent:nth-of-type(n+4):not(.e-lazyloaded):not(.e-no-lazyload),
  .e-con.e-parent:nth-of-type(n+4):not(.e-lazyloaded):not(.e-no-lazyload) * { background-image: none !important; }
  @media screen and (max-height: 1024px) {
    .e-con.e-parent:nth-of-type(n+3):not(.e-lazyloaded):not(.e-no-lazyload),
    .e-con.e-parent:nth-of-type(n+3):not(.e-lazyloaded):not(.e-no-lazyload) * { background-image: none !important; }
  }
  @media screen and (max-height: 640px) {
    .e-con.e-parent:nth-of-type(n+2):not(.e-lazyloaded):not(.e-no-lazyload),
    .e-con.e-parent:nth-of-type(n+2):not(.e-lazyloaded):not(.e-no-lazyload) * { background-image: none !important; }
  }
</style>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-migrate-3.4.1.min.js" crossorigin="anonymous"></script>
  <?php endif; ?>
  <?php include __DIR__ . DIRECTORY_SEPARATOR . 'schema.php'; ?>
