<?php if (!empty($loadBraziltsElementor)) : ?>
    <?php include __DIR__ . '/brazilts/partials/partial-elementor-footer.php'; ?>
    <?php include __DIR__ . '/brazilts/partials/partial-elementor-popup.php'; ?>
<?php else : ?>
<footer class="mob-center">
    <!--? Footer Start-->
    <div class="footer-area footer-bg">
        <div class="container">
            <div class="footer-top footer-padding">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                        <div class="single-footer-caption">
                            <!-- logo -->
                            <div class="footer-logo">
                                <a href="./"><img src="img/logo/logo.png" alt="Logo" title="Logo"></a>
                            </div>
                            <div class="footer-tittle">
                                <div class="footer-pera">
                                    <p class="info1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique
                                        fuga
                                        beatae eos odio cupiditate! Aliquam dicta aliquid.
                                    </p>
                                </div>
                            </div>
                            <div class="social_links">
                                <ul>
                                    <li>
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
                                        <?php if (!empty(CONF_SOCIAL_YOUTUBE_PAGE)) : ?>
                                            <a href="<?php echo CONF_SOCIAL_YOUTUBE_PAGE; ?>" target="_blank" rel="noopener noreferrer">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        <?php endif; ?>
                                        <?php if (!empty(CONF_SOCIAL_LINKEDIN_PAGE)) : ?>
                                            <a href="<?php echo CONF_SOCIAL_LINKEDIN_PAGE; ?>" target="_blank" rel="noopener noreferrer">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                        <?php endif; ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12">
                        <div class="single-footer-caption">
                            <div class="footer-tittle mb-4">
                                <span>Links Rápidos</span>
                            </div>
                            <div class="footer-cap">
                                <ul>
                                    <li><a href="./">Home</a></li>
                                    <li><a href="nossa-historia/">Nossa História</a></li>
                                    <li><a href="quem-somos/">Quem Somos</a></li>
                                    <li><a href="servicos/">Serviços</a></li>
                                    <li><a href="https://www.brazilts.com.br/blog/" target="_blank" rel="noopener noreferrer">Blog</a></li>
                                    <li><a href="fale-conosco/">Contato</a></li>
                                    <li><a href="mapa-do-site">Mapa do Site</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-5 col-md-12 col-sm-12">
                        <div class="single-footer-caption">
                            <div class="footer-tittle mb-4">
                                <span>Contato</span>
                            </div>
                            <div class="footer-cap">

                                <?php if (!empty(CONF_SITE_MAP_LINK)) : ?>
                                    <a class="dn_btn" href="<?php echo CONF_SITE_MAP_LINK; ?>" target="_blank" rel="noopener noreferrer">
                                        <i class="fas fa-map-location-dot"></i>
                                        <?php echo CONF_SITE_STREET; ?>
                                    </a>
                                <?php endif; ?>
                                <?php if (!empty(CONF_SITE_EMAIL)) : ?>
                                    <a class="dn_btn" href="mailto:<?php echo CONF_SITE_EMAIL; ?>">
                                        <i class="fas fa-envelope"></i>
                                        <?php echo CONF_SITE_EMAIL; ?>
                                    </a>
                                <?php endif; ?>
                                <?php if (!empty(CONF_SITE_PHONE_LINK)) : ?>
                                    <a class="dn_btn" href="tel:<?php echo CONF_SITE_PHONE_LINK; ?>">
                                        <i class="fa-solid fa-phone"></i>
                                        <?php echo CONF_SITE_PHONE; ?>
                                    </a>
                                <?php endif; ?>
                                <?php if (!empty(CONF_SITE_WHATSAPP_LINK)) : ?>
                                    <a class="dn_btn" href="<?php echo CONF_SITE_WHATSAPP_LINK; ?>" target="_blank" rel="noopener noreferrer">
                                        <i class="fab fa-whatsapp"></i>
                                        <?php echo CONF_SITE_WHATSAPP; ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-lg-10 col-md-12">
                        <div class="footer-copy-right">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                <?php echo CONF_SITE_NAME; ?> &copy;
                                <?php echo date("Y"); ?> - Todos os Direitos Reservados
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-12 f-left">
                        <a href="https://www.bloomin.com.br/" target="_blank" rel="noopener noreferrer"><img src="img/logo/logo-bloomin.webp" alt="logo Bloomin" title="logo Bloomin"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Scroll Up -->
    <a class="go-top-btn">
        <i class="fas fa-chevron-up"></i>
    </a>
    <?php if (!empty(CONF_SITE_WHATSAPP_LINK)) : ?>
        <?php include "whats-flutuante.php" ?>
    <?php endif; ?>
    <?php include "lgpd.php" ?>
    <!-- Footer End-->
</footer>
<?php endif; ?>