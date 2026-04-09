<?php
chdir(__DIR__);
$loadBraziltsElementor = true;
$braziltsIncludeThemeParts = true;
$braziltsPostCssIds = [7, 2498];
$braziltsElementorPostId = 2498;
$braziltsElementorPostTitle = 'Fale conosco - Brazil Translations | Tradução e Interpretação de Qualidade';
$title = 'Fale conosco - Brazil Translations | Tradução e Interpretação de Qualidade';
$description = 'Entre em contato com a Brazil Translations: telefone, e-mail, unidades e formulário para orçamento de tradução e interpretação.';
$activePage = 'fale-conosco';
$braziltsLoadGoogleRecaptcha = true;
$isHome = false;
include 'inc/inc.seo.php';
?>
</head>

<body class="brazilts-page brazilts-elem-layout elementor-default elementor-kit-7">
    <?php include 'inc/inc.header.php'; ?>

    <main id="content" class="brazilts-main" role="main">
        <?php include 'inc/brazilts/partials/partial-fale-conosco.php'; ?>
    </main>

    <?php include 'inc/inc.footer.php'; ?>

    <?php include 'inc/inc.js.php'; ?>
</body>

</html>
