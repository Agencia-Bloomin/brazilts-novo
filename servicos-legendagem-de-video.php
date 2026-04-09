<?php
chdir(__DIR__);
$loadBraziltsElementor = true;
$braziltsIncludeThemeParts = true;
$braziltsPostCssIds = [7, 163];
$braziltsElementorPostId = 163;
$braziltsElementorPostTitle = 'Legendagem de Vídeo - Brazil Translations | Tradução e Interpretação de Qualidade';
$title = 'Legendagem de Vídeo - Brazil Translations | Tradução e Interpretação de Qualidade';
$description = 'Legendagem e acessibilidade em vídeos corporativos e institucionais. Brazil Translations — qualidade técnica e linguística.';
$activePage = 'servicos/legendagem-de-video';
$isHome = false;
include 'inc/inc.seo.php';
?>
</head>

<body class="brazilts-page brazilts-elem-layout elementor-default elementor-kit-7">
    <?php include 'inc/inc.header.php'; ?>

    <main id="content" class="brazilts-main" role="main">
        <?php include 'inc/brazilts/partials/partial-legendagem-de-video.php'; ?>
    </main>

    <?php include 'inc/inc.footer.php'; ?>

    <?php include 'inc/inc.js.php'; ?>
</body>

</html>
