<?php
$title = !empty($title) ? $title : '';
include 'inc/inc.seo.php' ?>
</head>

<body>
    <!-- header-start -->
    <?php include 'inc/inc.header.php' ?>
    <!-- header-end -->

    <!--? Hero Start -->
    <?php include 'inc/inc.breadcrumb.php' ?>
    <!-- Hero End -->

    <!-- ================ section start ================= -->
    <section class="int-page-1 int-typography section-padding overflow-unset">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8 mb-4 padding-lg-right">
                    <h2 class="mb-4">Confira os detalhes de nosso produto</h2>
                    <div class="ajust-float mb-4">
                        <div class="swiper prodintSwiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img class="img-fluid " src="img/gallery/about.jpg" alt="<?= $h1 ?>"
                                        title="<?= $h1 ?>">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-fluid " src="img/gallery/about.jpg" alt="<?= $h1 ?>"
                                        title="<?= $h1 ?>">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-fluid " src="img/gallery/about.jpg" alt="<?= $h1 ?>"
                                        title="<?= $h1 ?>">
                                </div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur quod laborum sapiente aliquid
                        provident porro atque! Repellendus aliquam ab quis.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus perspiciatis quasi
                        necessitatibus voluptatibus esse!</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum corporis nam ea maiores inventore
                        dignissimos illum nesciunt sequi maxime animi ullam accusantium, cum dicta ratione itaque
                        molestias
                        dolore distinctio provident!</p>

                    <a href='<?php echo CONF_SITE_WHATSAPP_LINK; ?>&text=Ol%C3%A1%2C%20vim%20pelo%20site.%20Gostaria%20de%20ter%20mais%20informa%C3%A7%C3%B5es%20sobre%20"<?= $h1Encoded ?>"'
                        target="_blank" rel="noopener noreferrer" class="btn-main">Fale conosco</a>

                    <div class="boxExpand" id="boxExpand">
                        <div id="contentExpand" class="collapsed" style="width: 100%;">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, repellendus. Ipsam nisi tempore
                                quisquam fugiat?</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur quod laborum sapiente aliquid
                                provident porro atque! Repellendus aliquam ab quis.</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus perspiciatis quasi
                                necessitatibus voluptatibus esse!</p>

                            <ul>
                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis adipisci quod rerum recusandae numquam in quas provident ad sunt nam!</li>
                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis adipisci quod rerum recusandae numquam in quas provident ad sunt nam!</li>
                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis adipisci quod rerum recusandae numquam in quas provident ad sunt nam!</li>
                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis adipisci quod rerum recusandae numquam in quas provident ad sunt nam!</li>
                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis adipisci quod rerum recusandae numquam in quas provident ad sunt nam!</li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum corporis nam ea maiores inventore dignissimos illum nesciunt sequi maxime animi ullam accusantium, cum dicta ratione itaque molestias dolore distinctio provident!</p>
                        </div>

                        <button class="btn-expand" id="expandbtn">
                            <i class="fa-solid fa-chevron-down"></i>
                            <span>Leia Mais</span>
                        </button>
                    </div>

                </div>
                <div class="col-lg-4 col-md-8">
                    <?php include 'inc/inc.sidebar.php' ?>
                </div>
            </div>
        </div>
    </section>

    <?php include 'inc/inc.cta.php' ?>

    <!-- ================ section end ================= -->

    <!-- footer start -->
    <?php include 'inc/inc.footer.php' ?>
    <!-- footer end  -->

    <!-- JS here -->
    <?php include 'inc/inc.js.php' ?>
</body>

</html>