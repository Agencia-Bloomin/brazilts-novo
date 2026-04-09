<?php
chdir(__DIR__);
$loadBraziltsElementor = true;
$braziltsIncludeThemeParts = true;
$braziltsPostCssIds = [7, 782];
$braziltsElementorPostId = 782;
$braziltsElementorPostTitle = 'Quem somos - Brazil Translations | Tradução e Interpretação de Qualidade';
$title = 'Quem somos - Brazil Translations | Tradução e Interpretação de Qualidade';
$description = 'Saiba mais sobre a BrazilTS, uma referência em serviços de tradução, garantindo precisão e excelência em cada projeto. Clique e saiba mais !';
$activePage = 'quem-somos';
$isHome = false;
include 'inc/inc.seo.php';
?>
</head>

<body class="brazilts-page brazilts-elem-layout elementor-default elementor-kit-7">
    <?php include 'inc/inc.header.php'; ?>

    <main id="content" class="brazilts-main" role="main">
        <?php include 'inc/brazilts/partials/partial-quem-somos.php'; ?>
    </main>

    <?php include 'inc/inc.footer.php'; ?>

    <?php include 'inc/inc.js.php'; ?>
</body>

</html>
