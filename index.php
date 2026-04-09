<?php
chdir(__DIR__);
$loadBraziltsElementor = true;
$braziltsIncludeThemeParts = true;
$braziltsPostCssIds = [7, 24];
$braziltsElementorPostId = 24;
$braziltsElementorPostTitle = 'Brazil Translations | Tradução e Interpretação de Qualidade';
$title = 'Brazil Translations | Tradução e Interpretação de Qualidade';
$description = 'A BrazilTS oferece tradução e interpretação de qualidade, com agilidade e suporte em mais de 100 idiomas. Conheça mais sobre nossos serviços!';
$activePage = '';
$isHome = false;
include 'inc/inc.seo.php';
?>
</head>

<body class="brazilts-page brazilts-elem-layout elementor-default elementor-kit-7">
    <?php include 'inc/inc.header.php'; ?>

    <main id="content" class="brazilts-main" role="main">
        <?php include 'inc/brazilts/partials/partial-home.php'; ?>
    </main>

    <?php include 'inc/inc.footer.php'; ?>

    <?php include 'inc/inc.js.php'; ?>
</body>

</html>
