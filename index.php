<?php include 'inc/inc.seo.php' ?>

</head>

<body>
    <?php include 'inc/inc.header.php' ?>

    <?php
    //   == banner 1 ====
    define("IMG_BANNER1", "img/banners/banner1.webp");
    define("IMG_BANNER1_MOB", "img/banners/bannermob1.webp");
    //   == banner 2 ====
    define("IMG_BANNER2", "img/banners/banner2.webp");
    define("IMG_BANNER2_MOB", "img/banners/bannermob2.webp");
    //   == banner 3 ====
    define("IMG_BANNER3", "img/banners/banner3.webp");
    define("IMG_BANNER3_MOB", "img/banners/bannermob3.webp");
    ?>

    <div class="padding-banner banner-area">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-lg-12">
                    <div class="media-icons">
                        <?php if (!empty(CONF_SOCIAL_FACEBOOK_PAGE)) : ?>
                            <a href="<?php echo CONF_SOCIAL_FACEBOOK_PAGE; ?>" target="_blank" rel="noopener noreferrer">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        <?php endif; ?>
                        <?php if (!empty(CONF_SOCIAL_INSTAGRAM_PAGE)) : ?>
                            <a href="<?php echo CONF_SOCIAL_INSTAGRAM_PAGE; ?>" target="_blank" rel="noopener noreferrer">
                                <i class="fab fa-instagram"></i>
                            </a>
                        <?php endif; ?>
                        <?php if (!empty(CONF_SOCIAL_LINKEDIN_PAGE)) : ?>
                            <a href="<?php echo CONF_SOCIAL_LINKEDIN_PAGE; ?>" target="_blank" rel="noopener noreferrer">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        <?php endif; ?>
                        <?php if (!empty(CONF_SOCIAL_YOUTUBE_PAGE)) : ?>
                            <a href="<?php echo CONF_SOCIAL_YOUTUBE_PAGE; ?>" target="_blank" rel="noopener noreferrer">
                                <i class="fab fa-youtube"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="swiper bannerSwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <picture>
                                    <source media="(max-width: 991px)" srcset="<?php echo IMG_BANNER1_MOB; ?>">

                                    <source media="(min-width: 992px)" srcset="<?php echo IMG_BANNER1; ?>">
                                    <img class="img-slide img-fluid" src="<?php echo IMG_BANNER1; ?>" alt="Banner 1"
                                        title="Banner 1">
                                </picture>
                                <div class="content">
                                    <span>Banner Um <br> <b>Subtítulo</b></span>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum
                                        vero aperiam
                                        eum
                                        veritatis, dolor
                                        quibusdam
                                        ad facilis accusantium sed, perspiciatis delectus tenetur!
                                        Nulla, sit odio!
                                    </p>
                                    <a href="#">Saiba Mais</a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <picture>
                                    <source media="(max-width: 991px)" srcset="<?php echo IMG_BANNER2_MOB; ?>">

                                    <source media="(min-width: 992px)" srcset="<?php echo IMG_BANNER2; ?>">
                                    <img loading="lazy" class="img-slide img-fluid" src="<?php echo IMG_BANNER2; ?>"
                                        alt="Banner 2" title="Banner 2">
                                </picture>
                                <div class="content">
                                    <span>Banner Dois <br> <b>Subtítulo</b></span>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum
                                        vero aperiam
                                        eum
                                        veritatis, dolor
                                        quibusdam
                                        ad facilis accusantium sed, perspiciatis delectus tenetur!
                                        Nulla, sit odio!
                                    </p>
                                    <a href="#">Saiba Mais</a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <picture>
                                    <source media="(max-width: 991px)" srcset="<?php echo IMG_BANNER3_MOB; ?>">

                                    <source media="(min-width: 992px)" srcset="<?php echo IMG_BANNER3; ?>">
                                    <img loading="lazy" class="img-slide img-fluid" src="<?php echo IMG_BANNER3; ?>"
                                        alt="Banner 3" title="Banner 3">
                                </picture>
                                <div class="content">
                                    <span>Banner Três <br> <b>Subtítulo</b></span>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum
                                        vero aperiam
                                        eum
                                        veritatis, dolor
                                        quibusdam
                                        ad facilis accusantium sed, perspiciatis delectus tenetur!
                                        Nulla, sit odio!
                                    </p>
                                    <a href="#">Saiba Mais</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="about-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-6 col-lg-6 mb-5">
                    <div class="image-about fade-in">
                        <div class="inner-about">
                            <figure class="image-1 parallax" data-rellax-speed="-1">
                                <img class="tilt-img" src="img/gallery/about.jpg" alt="Sobre Nós" title="Sobre Nós">
                            </figure>
                            <figure class="image-2 parallax" data-rellax-speed="1.5">
                                <img class="tilt-img" src="img/gallery/about.jpg" alt="Sobre Nós" title="Sobre Nós">
                            </figure>

                            <div class="experience">
                                <div class="left-number">
                                    <span>+</span>
                                    <div class="counter counter-section" id="counterSection1" data-goal="40">
                                        <span id="counter1">0</span>
                                    </div>
                                </div>
                                <div class="right-text">
                                    <span>Anos No Mercado</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6">
                    <div class="about-content slide-down">

                        <div class="section-title mb-3">
                            <span>Conheça nossa empresa</span>
                            <h2>Sobre Nós</h2>
                            <div class="divider"></div>
                        </div>

                        <div class="text-content">
                            <div class="desc mb-4">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat a ea debitis fugit dolores, placeat omnis eaque illum optio quisquam quasi? Cumque dolorem deleniti blanditiis recusandae, dignissimos numquam excepturi adipisci!</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat a ea debitis fugit dolores, placeat omnis eaque illum optio quisquam quasi? Cumque dolorem deleniti blanditiis recusandae, dignissimos numquam excepturi adipisci!</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat a ea debitis fugit dolores, placeat omnis eaque illum optio quisquam quasi? Cumque dolorem deleniti blanditiis recusandae, dignissimos numquam excepturi adipisci!</p>
                            </div>

                            <a href="#" class="btn-main">Saiba Mais</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="product-area">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-5 padding-content slide-left">
                    <div class="section-title">
                        <span>Em Destaque</span>
                        <h2>Produtos</h2>
                        <div class="divider mb-4"></div>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat ipsa officia beatae soluta
                        nam accusamus corrupti, ipsum facere et iusto aliquam obcaecati! Dolorem esse nobis
                        consequuntur minima, error in blanditiis.</p>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Mollitia totam nihil veritatis
                        vitae consequatur placeat laudantium aperiam cum omnis enim.</p>

                    <a href="produtos" class="btn-main mb-4 mt-3">Veja todos</a>
                </div>
                <div class="col-lg-7">
                    <div class="swiper productSwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <a href="#">
                                    <div class="card-product h-100">
                                        <div class="d-flex justify-content-center">
                                            <img loading="lazy" class="img-fluid " src="img/gallery/about.jpg"
                                                alt="Produto 1" title="Produto 1">
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <h3>Produto 1</h3>
                                        </div>
                                        <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Adipisci, provident, incidunt consectetur nesciunt.</p>
                                        <p><span>Saiba Mais</span></p>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="#">
                                    <div class="card-product h-100">
                                        <div class="d-flex justify-content-center">
                                            <img loading="lazy" class="img-fluid " src="img/gallery/about.jpg"
                                                alt="Produto 2" title="Produto 2">
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <h3>Produto 2</h3>
                                        </div>
                                        <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Adipisci, provident, incidunt consectetur nesciunt.</p>
                                        <p><span>Saiba Mais</span></p>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="#">
                                    <div class="card-product h-100">
                                        <div class="d-flex justify-content-center">
                                            <img loading="lazy" class="img-fluid " src="img/gallery/about.jpg"
                                                alt="Produto 3" title="Produto 3">
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <h3>Produto 3</h3>
                                        </div>
                                        <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Adipisci, provident, incidunt consectetur nesciunt.</p>
                                        <p><span>Saiba Mais</span></p>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="#">
                                    <div class="card-product h-100">
                                        <div class="d-flex justify-content-center">
                                            <img loading="lazy" class="img-fluid " src="img/gallery/about.jpg"
                                                alt="Produto 4" title="Produto 4">
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <h3>Produto 4</h3>
                                        </div>
                                        <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Adipisci, provident, incidunt consectetur nesciunt.</p>
                                        <p><span>Saiba Mais</span></p>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="#">
                                    <div class="card-product h-100">
                                        <div class="d-flex justify-content-center">
                                            <img loading="lazy" class="img-fluid " src="img/gallery/about.jpg"
                                                alt="Produto 5" title="Produto 5">
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <h3>Produto 5</h3>
                                        </div>
                                        <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Adipisci, provident, incidunt consectetur nesciunt.</p>
                                        <p><span>Saiba Mais</span></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="brands-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="swiper brandSwiper">
                        <div class="swiper-wrapper">
                            <?php $items = glob("img/brand/*.{jpg,png,gif,webp,svg}", GLOB_BRACE); ?>

                            <?php foreach ($items as $col4): ?>

                                <div class="swiper-slide">
                                    <img src="<?= $col4; ?>" alt="Clientes" title="Clientes" class="img-fluid">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="blog-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">

                    <div class="section-title text-center">
                        <span>Confira algumas de nossas</span>
                        <h2>Notícias</h2>
                    </div>
                    <div class="divider m-auto mb-4"></div>
                </div>
                <div class="col-lg-4 col-md-8 mb-4">
                    <div class="home-blog-single slide-bottom">
                        <a href="#">
                            <div class="blog-img-cap">
                                <div class="blog-img">
                                    <img loading="lazy" src="img/blog/blog1.jpg" alt="Notícias" title="Notícias">
                                </div>
                                <ul>
                                    <li>20 de Março, 2020</li>
                                </ul>
                                <div class="blog-cap">
                                    <h3>Notícia 1</h3>
                                    <p><span class="more-btn btn-arrow">Saiba Mais</span></p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8 mb-4">
                    <a href="#">
                        <div class="home-blog-single slide-bottom">
                            <div class="blog-img-cap">
                                <div class="blog-img">
                                    <img loading="lazy" src="img/blog/blog2.jpg" alt="Notícias" title="Notícias">
                                </div>
                                <ul>
                                    <li>19 de Março, 2020</li>
                                </ul>
                                <div class="blog-cap">
                                    <h3>Notícia 2</h3>
                                    <p><span class="more-btn btn-arrow">Saiba Mais</span></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-8 mb-4">
                    <a href="#">
                        <div class="home-blog-single slide-bottom">
                            <div class="blog-img-cap">
                                <div class="blog-img">
                                    <img loading="lazy" src="img/blog/blog3.jpg" alt="Notícias" title="Notícias">
                                </div>
                                <ul>
                                    <li>10 de Fevereiro, 2020</li>
                                </ul>
                                <div class="blog-cap">
                                    <h3>Notícia 3</h3>
                                    <p><span class="more-btn btn-arrow">Saiba Mais</span></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="home-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title">
                        <span>Fale Conosco</span>
                        <h2>Entre em Contato</h2>
                        <div class="divider"></div>
                    </div>
                    <div class="contact-card">
                        <div class="row justify-content-center">
                            <div class="col-12 mb-4 mt-4">
                                <div class="fa-contact">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                <div class="content">
                                    <p><a
                                            href="mailto:<?php echo CONF_SITE_EMAIL; ?>"><?php echo CONF_SITE_EMAIL; ?></a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <div class="fa-contact">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <div class="content">
                                    <p><a
                                            href="tel:<?php echo CONF_SITE_PHONE_LINK; ?>"><?php echo CONF_SITE_PHONE; ?></a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <div class="fa-contact">
                                    <i class="fab fa-whatsapp"></i>
                                </div>
                                <div class="content">
                                    <p><a
                                            href="<?php echo CONF_SITE_WHATSAPP_LINK; ?>" target="_blank" rel="noopener noreferrer"><?php echo CONF_SITE_WHATSAPP; ?></a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <div class="fa-contact">
                                    <i class="fas fa-map-location-dot"></i>
                                </div>
                                <div class="content">
                                    <p> <a class="dn_btn" href="<?php echo CONF_SITE_MAP_LINK; ?>"
                                            target="_blank" rel="noopener noreferrer"><?php echo CONF_SITE_STREET; ?></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">

                    <div class="section-title">
                        <span>Tire suas Dúvidas</span>
                        <h2>Solicite seu Orçamento</h2>
                        <div class="divider"></div>
                    </div>
                    <div class="mt-4">
                        <?php include 'inc/inc.form.php' ?>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php include 'inc/inc.footer.php' ?>
    <?php include 'inc/inc.js.php' ?>
</body>

</html>