<?php

function makeRequest($url, $verdil)
{
    // Define o tempo de vida do cache em segundos
    $cacheTime = 86400;

    // Gera a chave de cache a partir da URL da API e seus parâmetros
    $cacheKey = md5($url);

    // Define o diretório de cache
    $cacheDir = 'cache/';

    // Verifica se o diretório de cache existe e cria a pasta se ela não existir
    if (!file_exists($cacheDir)) {
        mkdir($cacheDir, 0777, true);
    }

    // Verifica se o cache já existe e não está expirado
    if (file_exists($cacheDir . $cacheKey) && (time() - filemtime($cacheDir . $cacheKey) < $cacheTime)) {
        // Retorna o conteúdo do cache
        $response = file_get_contents($cacheDir . $cacheKey);
    } else {
        // Faz a consulta à API e armazena o resultado no cache
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_HTTPHEADER => [
                'Verdil: ' . $verdil
            ],
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url
        ]);

        $response = curl_exec($curl);

        curl_close($curl);

        file_put_contents($cacheDir . $cacheKey, $response);
    }

    return json_decode($response);
}

$urlPages = 'https://www.bloominprojetos.com.br/seo/api/cliente/paginas';
$verdil = ''; //token default da bloomin

$pageUrl = 'https://www.bloominprojetos.com.br/seo/api/cliente/pagina/' . $_GET['url'];
$page = makeRequest($pageUrl, $verdil);

$pages = makeRequest($urlPages, $verdil);

$title = $page->name;
$description = $page->description;
$h1 = $title;
?>
<?php include 'inc/inc.seo.php'; ?>
<link rel="stylesheet" href="css/pg-seo.css">
</head>


<body class="seo not-overflow-x">
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
    <!-- header-start -->
    <?php include 'inc/inc.header.php' ?>
    <!-- header-end -->

    <!--? Hero Start -->
    <?php include 'inc/inc.breadcrumb.php' ?>
    <!-- Hero End -->

    <!--================End Home Banner Area =================-->

    <section class="int-page section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-12 mb-4 padding-lg-right">

                    <div class="row align-items-center">
                        <div class="col-lg-12">

                            <div class="product-details1">
                                <div class="mb-4">
                                    <div class="swiper prodintSwiper">
                                        <div class="swiper-wrapper">

                                            <div class="swiper-slide">
                                                <a href="<?= $page->cover; ?>" data-fancybox="gallery">
                                                    <img class="img-fluid " src="<?= $page->cover; ?>" alt="<?= $page->name ?>" title="<?= $page->name ?>" onerror="this.onerror=null;this.src='img/no-image.png';">
                                                </a>
                                            </div>
                                            <?php if (!empty($page->galleryItem)) : ?>
                                                <?php foreach ($page->galleryItem  as $gallery) : ?>
                                                    <div class="swiper-slide">
                                                        <a href="<?= $gallery; ?>" data-fancybox="gallery">
                                                            <img class="img-fluid " src="<?= $gallery; ?>" alt="<?= $page->name ?>" title="<?= $page->name ?>">
                                                        </a>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="boxExpand mt-0 p-0" id="boxExpand">
                        <div id="contentExpand" class="collapsed">
                            <!-- conteúdos aqui -->
                            <?php if (!empty($page->content)) : ?>
                                <?= htmlspecialchars_decode($page->content); ?>
                            <?php endif; ?>
                        </div>

                        <button class="btn-expand" id="expandbtn">
                            <i class="fa-solid fa-chevron-down"></i>
                            <span>Leia Mais</span>
                        </button>
                    </div>

                </div>


                <div class="col-xl-4 col-lg-12 col-md-11">

                    <aside class='menuLateral sticky-div'>
                        <span class='title'>Informações</span>

                        <ul>
                            <?php foreach ($pages as $menuItem) : ?>
                                <li style="list-style: none !important;">
                                    <a href="informacoes/<?= $menuItem->url; ?>"><?= $menuItem->name; ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </aside>


                </div>
            </div>
    </section>




    <!-- Footer -->
    <?php include 'inc/inc.footer.php'; ?>
    <!-- JavaScript -->
    <?php include 'inc/inc.js.php'; ?>
    <!--cdn slick script-->
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> -->
</body>

</html>
