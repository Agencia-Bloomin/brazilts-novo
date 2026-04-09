<header>
    <div class="header-area header-transparent">
        <div class="top_menu">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2">
                        <div class="header-social">
                            <?php if (!empty(CONF_SOCIAL_FACEBOOK_PAGE)): ?>
                                <a href="<?php echo CONF_SOCIAL_FACEBOOK_PAGE; ?>" target="_blank" rel="noopener noreferrer">
                                    <i class="fab fa-facebook"></i>
                                </a>
                            <?php endif; ?>
                            <?php if (!empty(CONF_SOCIAL_INSTAGRAM_PAGE)): ?>
                                <a href="<?php echo CONF_SOCIAL_INSTAGRAM_PAGE; ?>" target="_blank" rel="noopener noreferrer">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            <?php endif; ?>
                            <?php if (!empty(CONF_SOCIAL_YOUTUBE_PAGE)): ?>
                                <a href="<?php echo CONF_SOCIAL_YOUTUBE_PAGE; ?>" target="_blank" rel="noopener noreferrer">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            <?php endif; ?>
                            <?php if (!empty(CONF_SOCIAL_LINKEDIN_PAGE)): ?>
                                <a href="<?php echo CONF_SOCIAL_LINKEDIN_PAGE; ?>" target="_blank" rel="noopener noreferrer">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-10 d-flex justify-content-end">
                        <div class="contact-menu">
                            <?php if (!empty(CONF_SITE_MAP_LINK)): ?>
                                <a class="dn_btn" href="<?php echo CONF_SITE_MAP_LINK; ?>" target="_blank" rel="noopener noreferrer">
                                    <i class="fa-solid fa-map-location-dot"></i>
                                    <?php echo CONF_SITE_STREET_1; ?>
                                </a>
                            <?php endif; ?>
                            <?php if (!empty(CONF_SITE_EMAIL)): ?>
                                <a class="dn_btn" href="mailto:<?php echo CONF_SITE_EMAIL; ?>">
                                    <i class="fa-solid fa-envelopes-bulk"></i>
                                    <?php echo CONF_SITE_EMAIL; ?>
                                </a>
                            <?php endif; ?>
                            <?php if (!empty(CONF_SITE_PHONE_LINK)): ?>
                                <a class="dn_btn" href="tel:<?php echo CONF_SITE_PHONE_LINK; ?>">
                                    <i class="fa-solid fa-phone"></i>
                                    <?php echo CONF_SITE_PHONE; ?>
                                </a>
                            <?php endif; ?>
                            <?php if (!empty(CONF_SITE_WHATSAPP_LINK)): ?>
                                <a class="dn_btn" href="<?php echo CONF_SITE_WHATSAPP_LINK; ?>" target="_blank" rel="noopener noreferrer">
                                    <i class="fa-brands fa-whatsapp"></i>
                                    <?php echo CONF_SITE_WHATSAPP; ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-main">
            <a href="./">
                <div class="logo">
                    <img src="img/logo/logo.png" alt="Logo" title="Logo" class="img-fluid">
                </div>
            </a>
            <div class="open-nav-menu">
                <span></span>
            </div>
            <div class="menu-overlay"></div>
            <nav class="nav-menu">
                <div class="close-nav-menu">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <ul class="menu">
                    <li class="menu-item has-children">
                        <a class="nav-link" href="./">Home</a>
                    </li>
                    <li class="menu-item">
                        <a class="nav-link" href="empresa">Empresa</a>
                    </li>
                    <li class="menu-item has-children">
                        <a class="nav-link" href="produtos" data-toggle="sub-menu">Produtos <i class="plus"></i></a>
                        <ul class="sub-menu">
                            <li class="menu-item"><a href="produto-interna">Produto 1</a></li>
                            <li class="menu-item"><a href="produto-interna2">Produto 2</a></li>
                            <li class="menu-item"><a href="produto-interna3">Produto 3</a></li>
                            <li class="menu-item"><a href="produto-interna4">Produto 4</a></li>
                            <li class="menu-item has-children has-children-2">
                                <a class="nav-link" href="javascript:void(0)" data-toggle="sub-menu"> Sub menu <i class="plus"></i></a>
                                <ul class="sub-menu sub-menu-2 active">
                                    <li class="menu-item"><a href="javascript:void(0)">Sub sub menu 1</a></li>
                                    <li class="menu-item"><a href="javascript:void(0)">Sub sub menu 2</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a class="nav-link" href="javascript:void(0)">Blog</a>
                    </li>
                    <li class="menu-item d-lg-none d-block">
                        <a class="nav-link" href="contato">Contato</a>
                    </li>
                </ul>
            </nav>

            <div class="contact-btn d-lg-block d-none">
                <a href="contato" class="btn-main">Contato</a>
            </div>
        </div>
    </div>
</header>