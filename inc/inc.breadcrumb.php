<div class="slider-area">
    <div class="slider-height hero-overly d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="hero-cap text-center ajust-padding">
                        <h1><?= $h1 ?></h1>
                        <div class="divider m-auto mb-1"></div>
                        <p class="color-w">
                            <a class="ajust-link" href="./" title="Ir ao início">Home</a> |
                            <?php if ($pageId === "single-product"): ?>
                                <a class="ajust-link" href="produtos" title="Ir aos produtos">Produtos</a> |
                            <?php elseif ($pageId === "single-service"): ?>
                                <a class="ajust-link" href="servicos" title="Ir aos serviços">Serviços</a> |
                            <?php endif; ?>
                            <a class="ajust-link"><?= $h1 ?></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>