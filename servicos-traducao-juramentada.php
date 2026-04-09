<?php
chdir(__DIR__);
$loadBraziltsElementor = true;
$braziltsIncludeThemeParts = true;
$braziltsPostCssIds = [7, 491];
$braziltsElementorPostId = 491;
$braziltsElementorPostTitle = 'Tradução Juramentada - Brazil Translations | Tradução e Interpretação de Qualidade';
$title = 'Tradução Juramentada - Brazil Translations | Tradução e Interpretação de Qualidade';
$description = 'Tradução juramentada (pública) com validade legal. Brazil Translations — documentos oficiais com rapidez e segurança.';
$activePage = 'servicos/traducao-juramentada';
$isHome = false;
include 'inc/inc.seo.php';
?>
</head>

<body class="brazilts-page brazilts-elem-layout elementor-default elementor-kit-7">
    <?php include 'inc/inc.header.php'; ?>

    <main id="content" class="brazilts-main" role="main">
        <?php include 'inc/brazilts/partials/partial-traducao-juramentada.php'; ?>
    </main>

    <?php include 'inc/inc.footer.php'; ?>

    <?php include 'inc/inc.js.php'; ?>
</body>

</html>
