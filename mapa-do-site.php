<?php include 'inc/inc.seo.php' ?>
<?php
function makeRequest($url, $verdil)
{

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




    return json_decode($response);
}

$url = 'https://www.bloominprojetos.com.br/seo/api/cliente/paginas';
$verdil = '';

$pages = makeRequest($url, $verdil);


?>
</head>

<body>
    <!-- header-start -->
    <?php include 'inc/inc.header.php' ?>
    <!-- header-end -->

    <!-- breadcrumb start -->
    <?php include 'inc/inc.breadcrumb.php' ?>
    <!-- breadcrumb end -->

    <div class="section-padding map-site">
        <div class="container pt-5 pb-5">
            <div class="row">
                <div class="col-12 col-md-6">

                    <?php
                    $nameUrl = glob("*.php");
                    $page = '';

                    foreach ($nameUrl as $v) {

                        $linkName = str_replace(
                            ['.php'],
                            [''],
                            $v
                        ); // renomeia o valor dentro do atributo href="ex:valor"
                        $listName = str_replace(
                            ['.php', '-', 'politica'],
                            ['', ' ', 'política'],
                            $v
                        ); // renomeia o valor dentro da tag <a>ex:valor</a> 

                        //remover link mapa-do-site
                        if ($v != "mapa-do-site.php" && $v != "index.php" && $v != "obrigado.php" && $v != "whats-flutuante.php" && $v != "lgpd.php" && $v != "contato_envia.php" &&  $v != "pg-seo.php"  &&  $v != "pg-seo.php" && $v != "produto-interna.php" && $v != "produto-interna2.php" && $v != "produto-interna3.php" && $v != "produto-interna4.php") {
                            if ($v == "produto-interna.php" || $v == "produto-interna2.php" || $v == "produto-interna3.php" || $v == "produto-interna4.php") {
                                $page .= '<li> <i class="fas fa-link"></i> <a href="produtos/' . $linkName . '">' . $listName . '</a></li>';
                            } else {
                                $page .= '<li> <i class="fas fa-link"></i> <a href="' . $linkName . '">' . $listName . '</a></li>';
                            }
                        }
                    }
                    ?>

                    <ul>
                        <li><i class="fas fa-link"></i> <a href="./"> Bem-vindo à <?php echo CONF_SITE_NAME; ?></a></li>
                        <?= $page ?>
                        <!-- todas as urls da pasta raiz -->
                    </ul>
                </div>

                <div class="col-12 col-md-6">
                    <ul>
                        <?php foreach($pages as $page):?>
                            <li><i class="fas fa-link"></i> <a href="informacoes/<?=$page->url?>"><?=$page->name;?></a> </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- footer start -->
    <?php include 'inc/inc.footer.php' ?>
    <!--/ footer end  -->

    <!-- JS here -->
    <?php include 'inc/inc.js.php' ?>
</body>

</html>
