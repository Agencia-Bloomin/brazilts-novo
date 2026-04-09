<?php
chdir(__DIR__);
$loadBraziltsElementor = true;
$braziltsIncludeThemeParts = true;
$braziltsPostCssIds = [7, 610];
$braziltsElementorPostId = 610;
$braziltsElementorPostTitle = 'Locação de Equipamento - Brazil Translations | Tradução e Interpretação de Qualidade';
$title = 'Locação de Equipamento - Brazil Translations | Tradução e Interpretação de Qualidade';
$description = 'Locação de equipamentos para interpretação simultânea e eventos híbridos. Brazil Translations — suporte técnico completo.';
$activePage = 'servicos/locacao-de-equipamento';
$isHome = false;
include 'inc/inc.seo.php';
?>
</head>

<body class="brazilts-page brazilts-elem-layout elementor-default elementor-kit-7">
    <?php include 'inc/inc.header.php'; ?>

    <main id="content" class="brazilts-main" role="main">
        <?php include 'inc/brazilts/partials/partial-locacao-de-equipamento.php'; ?>
    </main>

    <?php include 'inc/inc.footer.php'; ?>

    <?php include 'inc/inc.js.php'; ?>
</body>

</html>
