<?php include 'inc/inc.seo.php' ?>
</head>

<body>
    <!-- header-start -->
    <?php include 'inc/inc.header.php' ?>
    <!-- header-end -->

    <!--? Hero Start -->
    <?php include 'inc/inc.breadcrumb.php'; ?>

    <!-- Hero End -->

    <!-- ================ contact section start ================= -->
    <section class="contact-section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 mb-4">
                    <h2>Entre em Contato</h2>
                </div>
                <div class="col-lg-7">
                    <?php include 'inc/inc.form.php' ?>
                </div>
                <div class="col-lg-4 col-md-8 col-sm-10 mb-5">
                    <div class="info-container">
                        <?php if (!empty(CONF_SITE_STREET_1)) : ?>
                            <div class="contact-info">
                                <span class="icon"><i class="fa-solid fa-house"></i></span>
                                <div class="media-body">
                                    <h3><a href="<?php echo CONF_SITE_MAP_LINK; ?>" target="_blank" rel="noopener noreferrer">
                                            <?php echo CONF_SITE_STREET_1; ?></a>
                                    </h3>
                                    <p><?php echo CONF_SITE_STREET_2; ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty(CONF_SITE_PHONE)) : ?>
                            <div class="contact-info">
                                <span class="icon"><i class="fa-solid fa-mobile-screen-button"></i></span>
                                <div class="media-body">
                                    <h3><a class="dn_btn" href="tel:<?php echo CONF_SITE_PHONE_LINK; ?>">
                                            <?php echo CONF_SITE_PHONE; ?>
                                        </a> | <a class="dn_btn" href="<?php echo CONF_SITE_WHATSAPP_LINK; ?>" target="_blank" rel="noopener noreferrer">
                                            <?php echo CONF_SITE_WHATSAPP; ?>
                                        </a></h3>
                                    <p><?php echo CONF_SITE_TIME; ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty(CONF_SITE_EMAIL)) : ?>
                            <div class="contact-info">
                                <span class="icon"><i class="fa-solid fa-envelope-circle-check"></i></span>
                                <div class="media-body">
                                    <h3><a href="mailto:<?php echo CONF_SITE_EMAIL; ?>"><?php echo CONF_SITE_EMAIL; ?></a>
                                    </h3>
                                    <p>Envie-nos um e-mail a qualquer momento!</p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php if (!empty(CONF_SITE_MAP_IFRAME)) : ?>
            <div class="container-fluid p-0 mt-4">
                <div class="row g-0">
                    <div class="col-lg-12">
                        <iframe src="<?php echo CONF_SITE_MAP_IFRAME; ?>" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </section>
    <!-- ================ contact section end ================= -->

    <!-- footer start -->
    <?php include 'inc/inc.footer.php' ?>
    <!--/ footer end  -->

    <!-- JS here -->
    <?php include 'inc/inc.js.php' ?>
</body>

</html>