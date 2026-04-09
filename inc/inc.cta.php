<section class="cta-area">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-xl-8 col-lg-8 col-md-8 mb-3">
                <div class="cta-caption">
                    <h2>Fale Conosco</h2>
                    <p>Estamos sempre prontos para melhor atendê-los.</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                <div class="row justify-content-center">
                    <?php if (!empty(CONF_SITE_EMAIL)): ?>
                        <div class="col-md-6 col-sm-3 col-4 d-flex justify-content-center">
                            <a href="mailto:<?php echo CONF_SITE_EMAIL; ?>" class="btn-main"><i
                                    class="fas fa-envelope"></i></a>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty(CONF_SITE_WHATSAPP_LINK)): ?>
                        <div class="col-md-6 col-sm-3 col-4 d-flex justify-content-center">
                            <a href="<?php echo CONF_SITE_WHATSAPP_LINK; ?>" target="_blank" rel="noopener noreferrer"
                                class="btn-main btn-radius"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>