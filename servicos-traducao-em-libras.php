<?php
chdir(__DIR__);
$loadBraziltsElementor = true;
$braziltsIncludeThemeParts = true;
$braziltsPostCssIds = [7, 521];
$braziltsElementorPostId = 521;
$braziltsElementorPostTitle = 'Tradução em Libras - Brazil Translations | Tradução e Interpretação de Qualidade';
$title = 'Tradução em Libras - Brazil Translations | Tradução e Interpretação de Qualidade';
$description = 'Tradução e comunicação em Libras com profissionais qualificados. Brazil Translations — inclusão e qualidade.';
$activePage = 'servicos/traducao-em-libras';
$isHome = false;
include 'inc/inc.seo.php';
?>
</head>

<body class="brazilts-page brazilts-elem-layout elementor-default elementor-kit-7">
    <?php include 'inc/inc.header.php'; ?>

    <main id="content" class="brazilts-main" role="main">
        <?php include 'inc/brazilts/partials/partial-traducao-em-libras.php'; ?>
    </main>

    <?php include 'inc/inc.footer.php'; ?>

    <?php include 'inc/inc.js.php'; ?>
</body>

</html>
