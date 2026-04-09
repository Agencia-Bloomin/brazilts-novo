<?php
chdir(__DIR__);
$loadBraziltsElementor = true;
$braziltsIncludeThemeParts = true;
$braziltsPostCssIds = [7, 537];
$braziltsElementorPostId = 537;
$braziltsElementorPostTitle = 'Tradução Técnica e Científica - Brazil Translations | Tradução e Interpretação de Qualidade';
$title = 'Tradução Técnica e Científica - Brazil Translations | Tradução e Interpretação de Qualidade';
$description = 'Tradução técnica e científica com precisão terminológica. Brazil Translations — qualidade e agilidade em mais de 100 idiomas.';
$activePage = 'servicos/traducao-cientifica';
$isHome = false;
include 'inc/inc.seo.php';
?>
</head>

<body class="brazilts-page brazilts-elem-layout elementor-default elementor-kit-7">
    <?php include 'inc/inc.header.php'; ?>

    <main id="content" class="brazilts-main" role="main">
        <?php include 'inc/brazilts/partials/partial-traducao-cientifica.php'; ?>
    </main>

    <?php include 'inc/inc.footer.php'; ?>

    <?php include 'inc/inc.js.php'; ?>
</body>

</html>
