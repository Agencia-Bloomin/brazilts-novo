<?php
chdir(__DIR__);
$loadBraziltsElementor = true;
$braziltsIncludeThemeParts = true;
$braziltsPostCssIds = [7, 579];
$braziltsElementorPostId = 579;
$braziltsElementorPostTitle = 'Tradução Simultânea / Consecutiva - Brazil Translations | Tradução e Interpretação de Qualidade';
$title = 'Tradução Simultânea / Consecutiva - Brazil Translations | Tradução e Interpretação de Qualidade';
$description = 'Interpretação simultânea e consecutiva para eventos, reuniões e conferências. Brazil Translations — experiência e equipamentos profissionais.';
$activePage = 'servicos/traducao-simultanea-consecutiva';
$isHome = false;
include 'inc/inc.seo.php';
?>
</head>

<body class="brazilts-page brazilts-elem-layout elementor-default elementor-kit-7">
    <?php include 'inc/inc.header.php'; ?>

    <main id="content" class="brazilts-main" role="main">
        <?php include 'inc/brazilts/partials/partial-traducao-simultanea-consecutiva.php'; ?>
    </main>

    <?php include 'inc/inc.footer.php'; ?>

    <?php include 'inc/inc.js.php'; ?>
</body>

</html>
