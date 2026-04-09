<?php
chdir(__DIR__);
$loadBraziltsElementor = true;
$braziltsIncludeThemeParts = true;
$braziltsPostCssIds = [7, 2361];
$braziltsElementorPostId = 2361;
$braziltsElementorPostTitle = 'Contato / Orçamento - Brazil Translations | Tradução e Interpretação de Qualidade';
$title = 'Contato / Orçamento - Brazil Translations | Tradução e Interpretação de Qualidade';
$description = 'Solicite orçamento de tradução ou interpretação. Preencha o formulário — a Brazil Translations responde com agilidade.';
$activePage = 'contato';
$isHome = false;
include 'inc/inc.seo.php';
?>
</head>

<body class="brazilts-page brazilts-elem-layout elementor-default elementor-kit-7">
    <?php include 'inc/inc.header.php'; ?>

    <main id="content" class="brazilts-main" role="main">
        <?php include 'inc/brazilts/partials/partial-contato.php'; ?>
    </main>

    <?php include 'inc/inc.footer.php'; ?>

    <?php include 'inc/inc.js.php'; ?>
</body>

</html>
