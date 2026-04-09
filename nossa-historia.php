<?php
chdir(__DIR__);
$loadBraziltsElementor = true;
$braziltsIncludeThemeParts = true;
$braziltsPostCssIds = [7, 25];
$braziltsElementorPostId = 25;
$braziltsElementorPostTitle = 'Nossa História - Brazil Translations | Tradução e Interpretação de Qualidade';
$title = 'Nossa História - Brazil Translations | Tradução e Interpretação de Qualidade';
$description = 'Conheça a trajetória da Brazil Translations e nossa atuação em tradução e interpretação profissional.';
$activePage = 'nossa-historia';
$isHome = false;
include 'inc/inc.seo.php';
?>
</head>

<body class="brazilts-page brazilts-elem-layout elementor-default elementor-kit-7">
    <?php include 'inc/inc.header.php'; ?>

    <main id="content" class="brazilts-main" role="main">
        <?php include 'inc/brazilts/partials/partial-nossa-historia.php'; ?>
    </main>

    <?php include 'inc/inc.footer.php'; ?>

    <?php include 'inc/inc.js.php'; ?>
</body>

</html>
