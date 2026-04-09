<?php
/**
 * Rodapé: páginas BrazilTS/Elementor usam só o stack WordPress/Elementor (como o site de referência).
 * Demais páginas usam o bundle JS do template vanilla.
 */
if (!empty($loadBraziltsElementor)) {
    include_once __DIR__ . '/inc.config.php';
    $braziltsElementorPostId = isset($braziltsElementorPostId) ? (int) $braziltsElementorPostId : 24;
    $braziltsElementorPostTitle = isset($braziltsElementorPostTitle) ? (string) $braziltsElementorPostTitle : '';

    $braziltsRootUrl = rtrim(CONF_TAG_BASE, '/');
    $braziltsBu = $braziltsRootUrl . '/' . BRAZILTS_WPU;
    $braziltsBi = $braziltsRootUrl . '/' . BRAZILTS_WPI;
    $braziltsVer = '1';

    $braziltsEfPath = __DIR__ . '/brazilts/json/elementor-frontend.json';
    $braziltsEpPath = __DIR__ . '/brazilts/json/elementor-pro-frontend.json';
    $braziltsEf = json_decode((string) file_get_contents($braziltsEfPath), true);
    $braziltsEp = json_decode((string) file_get_contents($braziltsEpPath), true);

    if (is_array($braziltsEf) && is_array($braziltsEp)) {
        $braziltsEf['urls']['assets'] = $braziltsBu . '/plugins/elementor/assets/';
        $braziltsEf['urls']['ajaxurl'] = $braziltsRootUrl . '/wp-json/';
        $braziltsEf['urls']['uploadUrl'] = $braziltsBu . '/uploads';
        $braziltsEf['post'] = [
            'id' => $braziltsElementorPostId,
            'title' => rawurlencode($braziltsElementorPostTitle),
            'excerpt' => '',
            'featuredImage' => false,
        ];

        $braziltsEp['ajaxurl'] = $braziltsEf['urls']['ajaxurl'];
        $braziltsEp['urls']['assets'] = $braziltsBu . '/plugins/pro-elements/assets/';
        $braziltsEp['urls']['rest'] = $braziltsRootUrl . '/wp-json/';

        $braziltsEfJson = json_encode($braziltsEf, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        $braziltsEpJson = json_encode($braziltsEp, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        ?>
<script>
const lazyloadRunObserver = () => {
  const lazyloadBackgrounds = document.querySelectorAll('.e-con.e-parent:not(.e-lazyloaded)');
  const lazyloadBackgroundObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const lazyloadBackground = entry.target;
        if (lazyloadBackground) {
          lazyloadBackground.classList.add('e-lazyloaded');
        }
        lazyloadBackgroundObserver.unobserve(entry.target);
      }
    });
  }, { rootMargin: '200px 0px 200px 0px' });
  lazyloadBackgrounds.forEach((lazyloadBackground) => {
    lazyloadBackgroundObserver.observe(lazyloadBackground);
  });
};
['DOMContentLoaded', 'elementor/lazyload/observe'].forEach((event) => {
  document.addEventListener(event, lazyloadRunObserver);
});
</script>
<script src="<?= htmlspecialchars($braziltsBu) ?>/themes/hello-elementor/assets/js/hello-frontend.min.js?ver=<?= $braziltsVer ?>"></script>
<script src="<?= htmlspecialchars($braziltsBu) ?>/plugins/elementor/assets/js/webpack.runtime.min.js?ver=<?= $braziltsVer ?>"></script>
<script src="<?= htmlspecialchars($braziltsBu) ?>/plugins/elementor/assets/js/frontend-modules.min.js?ver=<?= $braziltsVer ?>"></script>
<script src="<?= htmlspecialchars($braziltsBi) ?>/js/jquery/ui/core.min.js?ver=<?= $braziltsVer ?>"></script>
<script id="elementor-frontend-js-before">
var elementorFrontendConfig = <?= $braziltsEfJson ?>;
</script>
<script src="<?= htmlspecialchars($braziltsBu) ?>/plugins/elementor/assets/js/frontend.min.js?ver=<?= $braziltsVer ?>"></script>
<script src="<?= htmlspecialchars($braziltsBu) ?>/plugins/pro-elements/assets/lib/smartmenus/jquery.smartmenus.min.js?ver=<?= $braziltsVer ?>"></script>
<script src="<?= htmlspecialchars($braziltsBu) ?>/plugins/pro-elements/assets/lib/sticky/jquery.sticky.min.js?ver=<?= $braziltsVer ?>"></script>
<script src="<?= htmlspecialchars($braziltsBu) ?>/plugins/elementor/assets/lib/jquery-numerator/jquery-numerator.min.js?ver=<?= $braziltsVer ?>"></script>
<script src="<?= htmlspecialchars($braziltsBu) ?>/plugins/pro-elements/assets/js/webpack-pro.runtime.min.js?ver=<?= $braziltsVer ?>"></script>
<script src="<?= htmlspecialchars($braziltsBi) ?>/js/dist/hooks.min.js?ver=<?= $braziltsVer ?>"></script>
<script src="<?= htmlspecialchars($braziltsBi) ?>/js/dist/i18n.min.js?ver=<?= $braziltsVer ?>"></script>
<script id="wp-i18n-js-after">
wp.i18n.setLocaleData({ 'text direction\u0004ltr': ['ltr'] });
</script>
<script id="elementor-pro-frontend-js-before">
var ElementorProFrontendConfig = <?= $braziltsEpJson ?>;
</script>
<script src="<?= htmlspecialchars($braziltsBu) ?>/plugins/pro-elements/assets/js/frontend.min.js?ver=<?= $braziltsVer ?>"></script>
<script src="<?= htmlspecialchars($braziltsBu) ?>/plugins/pro-elements/assets/js/elements-handlers.min.js?ver=<?= $braziltsVer ?>"></script>
<?php if (!empty($braziltsLoadGoogleRecaptcha)) : ?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php endif; ?>
<script src="js/brazilts-elementor-widgets.js?ver=8"></script>
        <?php
    }
    return;
}
?>
<script src="js/domLoaded.js"></script>

<!--JS-->
<script src="js/script.js"></script>

<!--Menu Mobile-->
<script src="js/menu-mobile.js"></script>

<!-- Counter -->
<script src="js/counterup.js"></script>

<!-- Animações -->
<script src="js/animation.js"></script>

<!-- Active Page -->
<script src="js/activepage.js"></script>

<!-- Politica de Privacidade -->
<script src="js/privacidade.js"></script>

<!-- Carousels -->
<script src="js/carousels-edit.js"></script>

<!-- Recaptcha -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Rellax js -->
<script src="https://cdn.jsdelivr.net/gh/dixonandmoe/rellax@master/rellax.min.js"></script>

<!-- Animations scrollreveal js -->
<script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
