<?php if (!empty($loadBraziltsElementor)) : ?>
    <?php require_once __DIR__ . '/brazilts/brazilts-elementor-nav-menu.php'; ?>

    <a class="skip-link screen-reader-text" href="#content">Ir para o conteúdo</a>

    <header data-elementor-type="header" data-elementor-id="1611" class="brazilts-pb elementor elementor-1611 elementor-location-header" data-elementor-post-type="elementor_library">
        <div class="brazilts-blk elementor-element elementor-element-58628e88 e-con-full elementor-hidden-tablet elementor-hidden-mobile e-flex e-con e-parent" data-id="58628e88" data-element_type="container" data-e-type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
            <div class="brazilts-blk elementor-element elementor-element-26dde5b8 e-con-full e-flex e-con e-child" data-id="26dde5b8" data-element_type="container" data-e-type="container">
                <div class="brazilts-blk elementor-element elementor-element-418af847 elementor-icon-list--layout-inline elementor-align-center elementor-list-item-link-full_width brazilts-wdg elementor-widget elementor-widget-icon-list" data-id="418af847" data-element_type="widget" data-e-type="widget" data-widget_type="icon-list.default">
                    <div class="brazilts-wdg__inner elementor-widget-container">
                        <ul class="elementor-icon-list-items elementor-inline-items">
                        <li class="elementor-icon-list-item elementor-inline-item">
                        <a href="tel:<?= CONF_SITE_PHONE_LINK ?>">

                        <span class="elementor-icon-list-icon">
                        <svg aria-hidden="true" class="e-font-icon-svg e-fas-phone-alt" viewbox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M497.39 361.8l-112-48a24 24 0 0 0-28 6.9l-49.6 60.6A370.66 370.66 0 0 1 130.6 204.11l60.6-49.6a23.94 23.94 0 0 0 6.9-28l-48-112A24.16 24.16 0 0 0 122.6.61l-104 24A24 24 0 0 0 0 48c0 256.5 207.9 464 464 464a24 24 0 0 0 23.4-18.6l24-104a24.29 24.29 0 0 0-14.01-27.6z"></path></svg>                        </span>
                        <span class="elementor-icon-list-text"><?= CONF_SITE_PHONE ?></span>
                        </a>
                        </li>
                        <li class="elementor-icon-list-item elementor-inline-item">
                        <a href="mailto:<?= CONF_SITE_EMAIL ?>">

                        <span class="elementor-icon-list-icon">
                        <svg aria-hidden="true" class="e-font-icon-svg e-far-envelope" viewbox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z"></path></svg>                        </span>
                        <span class="elementor-icon-list-text"><?= CONF_SITE_EMAIL ?></span>
                        </a>
                        </li>
                        <li class="elementor-icon-list-item elementor-inline-item">
                        <a href="<?= CONF_SITE_WHATSAPP_LINK ?>">

                        <span class="elementor-icon-list-icon">
                        <svg aria-hidden="true" class="e-font-icon-svg e-fab-whatsapp" viewbox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"></path></svg>                        </span>
                        <span class="elementor-icon-list-text"><?= CONF_SITE_WHATSAPP ?></span>
                        </a>
                        </li>
                        </ul>
                    </div>
                </div>
                <div class="brazilts-blk elementor-element elementor-element-2a8ecb5e brazilts-wdg elementor-widget elementor-widget-button" data-id="2a8ecb5e" data-element_type="widget" data-e-type="widget" data-widget_type="button.default">
                    <div class="brazilts-wdg__inner elementor-widget-container">
                        <div class="elementor-button-wrapper">
                            <a class="brazilts-btn elementor-button elementor-button-link elementor-size-sm" href="<?= CONF_SOCIAL_INSTAGRAM_PAGE ?>" target="_blank">
                            <span class="elementor-button-content-wrapper">
                            <span class="elementor-button-icon">
                            <svg aria-hidden="true" class="e-font-icon-svg e-fab-instagram" viewbox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg>            </span>
                            </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="brazilts-blk elementor-element elementor-element-75853282 brazilts-wdg elementor-widget elementor-widget-button" data-id="75853282" data-element_type="widget" data-e-type="widget" data-widget_type="button.default">
                    <div class="brazilts-wdg__inner elementor-widget-container">
                        <div class="elementor-button-wrapper">
                            <a class="brazilts-btn elementor-button elementor-button-link elementor-size-sm" href="<?= CONF_SOCIAL_LINKEDIN_PAGE ?>" target="_blank">
                            <span class="elementor-button-content-wrapper">
                            <span class="elementor-button-icon">
                            <svg aria-hidden="true" class="e-font-icon-svg e-fab-linkedin-in" viewbox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"></path></svg>            </span>
                            </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="brazilts-blk elementor-element elementor-element-5eddf62e e-con-full e-flex e-con e-child" data-id="5eddf62e" data-element_type="container" data-e-type="container">
                <div class="brazilts-blk elementor-element elementor-element-22921f9a brazilts-wdg elementor-widget elementor-widget-image" data-id="22921f9a" data-element_type="widget" data-e-type="widget" data-widget_type="image.default">
                    <div class="brazilts-wdg__inner elementor-widget-container">
                        <a href="./">
                        <img fetchpriority="high" width="512" height="512" src="img/br.svg" class="attachment-large size-large brazilts-media" alt="">                                </a>
                    </div>
                </div>
                <div class="brazilts-blk elementor-element elementor-element-2faac20 brazilts-wdg elementor-widget elementor-widget-image" data-id="2faac20" data-element_type="widget" data-e-type="widget" data-widget_type="image.default">
                    <div class="brazilts-wdg__inner elementor-widget-container">
                        <a href="en/">
                        <img width="512" height="512" src="img/us.svg" class="attachment-large size-large brazilts-media" alt="">                                </a>
                    </div>
                </div>
                <div class="brazilts-blk elementor-element elementor-element-2a6b8fcf brazilts-wdg elementor-widget elementor-widget-image" data-id="2a6b8fcf" data-element_type="widget" data-e-type="widget" data-widget_type="image.default">
                    <div class="brazilts-wdg__inner elementor-widget-container">
                        <a href="es/">
                        <img width="512" height="512" src="img/sp.svg" class="attachment-large size-large brazilts-media" alt="">                                </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="brazilts-blk elementor-element elementor-element-8ea815 e-con-full e-flex e-con e-parent" data-id="8ea815" data-element_type="container" data-e-type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;sticky&quot;:&quot;top&quot;,&quot;sticky_offset_mobile&quot;:0,&quot;sticky_parent&quot;:&quot;yes&quot;,&quot;sticky_on&quot;:[&quot;desktop&quot;,&quot;tablet&quot;,&quot;mobile&quot;],&quot;sticky_offset&quot;:0,&quot;sticky_effects_offset&quot;:0,&quot;sticky_anchor_link_offset&quot;:0}">
            <div class="brazilts-blk elementor-element elementor-element-79c04c60 brazilts-wdg elementor-widget elementor-widget-image" data-id="79c04c60" data-element_type="widget" data-e-type="widget" data-widget_type="image.default">
                <div class="brazilts-wdg__inner elementor-widget-container">
                    <a href="./">
                    <img loading="lazy" width="300" height="163" src="img/logo-1-199e07.svg" class="attachment-medium size-medium brazilts-media" alt="">                                </a>
                </div>
            </div>
            <div class="brazilts-blk elementor-element elementor-element-55c238da elementor-nav-menu--stretch elementor-hidden-tablet elementor-hidden-mobile elementor-nav-menu--dropdown-tablet elementor-nav-menu__text-align-aside elementor-nav-menu--toggle elementor-nav-menu--burger brazilts-wdg elementor-widget elementor-widget-nav-menu" data-id="55c238da" data-element_type="widget" data-e-type="widget" data-settings="{&quot;full_width&quot;:&quot;stretch&quot;,&quot;layout&quot;:&quot;horizontal&quot;,&quot;submenu_icon&quot;:{&quot;value&quot;:&quot;&lt;svg aria-hidden=\&quot;true\&quot; class=\&quot;e-font-icon-svg e-fas-caret-down\&quot; viewBox=\&quot;0 0 320 512\&quot; xmlns=\&quot;http:\/\/www.w3.org\/2000\/svg\&quot;&gt;&lt;path d=\&quot;M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z\&quot;&gt;&lt;\/path&gt;&lt;\/svg&gt;&quot;,&quot;library&quot;:&quot;fa-solid&quot;},&quot;toggle&quot;:&quot;burger&quot;}" data-widget_type="nav-menu.default">
                <div class="brazilts-wdg__inner elementor-widget-container">
                    <nav aria-label="Menu" class="elementor-nav-menu--main elementor-nav-menu__container elementor-nav-menu--layout-horizontal e--pointer-underline e--animation-fade">
                    <?php brazilts_elementor_nav_menu_ul('menu-1-55c238da', false); ?>            </nav>
                    <div class="elementor-menu-toggle" role="button" tabindex="0" aria-label="Menu Toggle" aria-expanded="false">
                        <svg aria-hidden="true" role="presentation" class="elementor-menu-toggle__icon--open e-font-icon-svg e-fas-plus" viewbox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg><svg aria-hidden="true" role="presentation" class="elementor-menu-toggle__icon--close e-font-icon-svg e-eicon-close" viewbox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg"><path d="M742 167L500 408 258 167C246 154 233 150 217 150 196 150 179 158 167 167 154 179 150 196 150 212 150 229 154 242 171 254L408 500 167 742C138 771 138 800 167 829 196 858 225 858 254 829L496 587 738 829C750 842 767 846 783 846 800 846 817 842 829 829 842 817 846 804 846 783 846 767 842 750 829 737L588 500 833 258C863 229 863 200 833 171 804 137 775 137 742 167Z"></path></svg>        </div>
                    <nav class="elementor-nav-menu--dropdown elementor-nav-menu__container" aria-hidden="true">
                    <?php brazilts_elementor_nav_menu_ul('menu-2-55c238da', true); ?>            </nav>
                </div>
            </div>
            <div class="brazilts-blk elementor-element elementor-element-644c8890 elementor-hidden-desktop elementor-view-default brazilts-wdg elementor-widget elementor-widget-icon" data-id="644c8890" data-element_type="widget" data-e-type="widget" data-widget_type="icon.default">
                <div class="brazilts-wdg__inner elementor-widget-container">
                    <div class="elementor-icon-wrapper">
                        <a class="elementor-icon brazilts-open-menu-1648" href="#" role="button" aria-haspopup="dialog" aria-expanded="false" aria-controls="elementor-popup-modal-1648">
                        <svg aria-hidden="true" class="e-font-icon-svg e-fas-bars" viewbox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path></svg>            </a>
                    </div>
                </div>
            </div>
        </div>
    </header>



<?php else : ?>
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
                    <li class="menu-item">
                        <a class="nav-link" href="./">Home</a>
                    </li>
                    <li class="menu-item">
                        <a class="nav-link" href="nossa-historia/">Nossa História</a>
                    </li>
                    <li class="menu-item">
                        <a class="nav-link" href="quem-somos/">Quem Somos</a>
                    </li>
                    <li class="menu-item has-children">
                        <a class="nav-link" href="servicos/" data-toggle="sub-menu">Serviços <i class="plus"></i></a>
                        <ul class="sub-menu">
                            <li class="menu-item"><a href="servicos/traducao-juramentada/">Tradução Juramentada</a></li>
                            <li class="menu-item"><a href="servicos/traducao-cientifica/">Tradução Técnica e Científica</a></li>
                            <li class="menu-item"><a href="servicos/traducao-em-libras/">Tradução em Libras</a></li>
                            <li class="menu-item"><a href="servicos/traducao-simultanea-consecutiva/">Interpretação simultânea / consecutiva</a></li>
                            <li class="menu-item"><a href="servicos/legendagem-de-video/">Legendagem / transcrição de vídeos</a></li>
                            <li class="menu-item"><a href="servicos/transcricao-de-audio-e-video/">Transcrição de áudio e vídeo</a></li>
                            <li class="menu-item"><a href="servicos/locacao-de-equipamento/">Locação de Equipamentos</a></li>
                            <li class="menu-item"><a href="servicos/apostille-de-la-haye/">Apostille de la Haye</a></li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a class="nav-link" href="https://www.brazilts.com.br/blog/" target="_blank" rel="noopener noreferrer">Blog</a>
                    </li>
                    <li class="menu-item d-lg-none d-block">
                        <a class="nav-link" href="fale-conosco/">Contato</a>
                    </li>
                </ul>
            </nav>

            <div class="contact-btn d-lg-block d-none">
                <a href="fale-conosco/" class="btn-main">Contato</a>
            </div>
        </div>
    </div>
</header>
<?php endif; ?>