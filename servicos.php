<?php
chdir(__DIR__);
$loadBraziltsElementor = true;
$braziltsIncludeThemeParts = true;
$braziltsPostCssIds = [7, 26];
$braziltsElementorPostId = 26;
$braziltsElementorPostTitle = 'Serviços - Brazil Translations | Tradução e Interpretação de Qualidade';
$title = 'Serviços - Brazil Translations | Tradução e Interpretação de Qualidade';
$description = 'Explore nossos serviços de tradução e interpretação, cobrindo mais de 100 idiomas com precisão e agilidade. Clique agora mesmo e saiba mais !';
$activePage = 'servicos';
$isHome = false;
include 'inc/inc.seo.php';
?>
</head>

<body class="brazilts-page brazilts-elem-layout elementor-default elementor-kit-7">
    <?php include 'inc/inc.header.php'; ?>

    <main id="content" class="brazilts-main" role="main">
        <?php include 'inc/brazilts/partials/partial-servicos.php'; ?>
    </main>

    <?php include 'inc/inc.footer.php'; ?>

    <?php include 'inc/inc.js.php'; ?>
</body>

</html>
