<?php
declare(strict_types=1);

/**
 * Slug da página atual para marcar item ativo no menu (alinhado a $activePage nas entradas PHP).
 * contato.php (orçamento) → trata como "orcamento" para destacar "Orçamento Rápido".
 */
function brazilts_elementor_nav_slug(): string
{
    $p = isset($GLOBALS['activePage']) ? trim((string) $GLOBALS['activePage'], '/') : '';
    if ($p === 'contato') {
        return 'orcamento';
    }
    return $p;
}

/**
 * Gera <ul class="elementor-nav-menu">…</ul> do header/popup com current-menu-item / elementor-item-active.
 *
 * @param string $ulId id do <ul> (ex.: menu-1-55c238da)
 * @param bool   $drawer true = links com tabindex="-1" (menu mobile/drawer/popup)
 */
function brazilts_elementor_nav_menu_ul(string $ulId, bool $drawer): void
{
    $np = brazilts_elementor_nav_slug();
    $isHome = ($np === '' || $np === 'index');
    $tab = $drawer ? ' tabindex="-1"' : '';

    $servicosFilhos = [
        ['servicos/traducao-juramentada', 'servicos/traducao-juramentada/', 'Tradução Juramentada', '1529'],
        ['servicos/traducao-cientifica', 'servicos/traducao-cientifica/', 'Tradução técnica', '1527'],
        ['servicos/traducao-em-libras', 'servicos/traducao-em-libras/', 'Tradução em Libras', '1528'],
        ['servicos/traducao-simultanea-consecutiva', 'servicos/traducao-simultanea-consecutiva/', 'Interpretação Simultânea / Consecutiva', '1526'],
        ['servicos/transcricao-de-audio-e-video', 'servicos/transcricao-de-audio-e-video/', 'Transcrição de Áudio e Vídeo​', '1525'],
        ['servicos/legendagem-de-video', 'servicos/legendagem-de-video/', 'Legendagem de Vídeo', '1522'],
        ['servicos/locacao-de-equipamento', 'servicos/locacao-de-equipamento/', 'Locação de Equipamentos', '1524'],
        ['servicos/apostille-de-la-haye', 'servicos/apostille-de-la-haye/', 'Apostille de la Haye', '1523'],
    ];

    $onServicosIndex = ($np === 'servicos');
    $onServicosChild = str_starts_with($np, 'servicos/');

    echo '<ul id="' . htmlspecialchars($ulId, ENT_QUOTES, 'UTF-8') . '" class="elementor-nav-menu">';

    // Home
    $homeLi = 'menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-1518' . ($isHome ? ' current-menu-item page_item page-item-24 current_page_item' : '');
    $homeA = 'elementor-item' . ($isHome ? ' elementor-item-active' : '');
    $homeAria = $isHome ? ' aria-current="page"' : '';
    echo '<li class="' . $homeLi . '"><a href="./"' . $homeAria . ' class="' . $homeA . '"' . $tab . '>Home</a></li>';

    // Nossa História
    $nh = ($np === 'nossa-historia');
    echo '<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1521' . ($nh ? ' current-menu-item' : '') . '"><a href="nossa-historia/" class="elementor-item' . ($nh ? ' elementor-item-active' : '') . '"' . ($nh ? ' aria-current="page"' : '') . $tab . '>Nossa História</a></li>';

    // Quem somos
    $qs = ($np === 'quem-somos');
    echo '<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1533' . ($qs ? ' current-menu-item' : '') . '"><a href="quem-somos/" class="elementor-item' . ($qs ? ' elementor-item-active' : '') . '"' . ($qs ? ' aria-current="page"' : '') . $tab . '>Quem somos</a></li>';

    // Serviços (pai + sub)
    $parentLi = 'menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1520';
    if ($onServicosChild) {
        $parentLi .= ' current-menu-ancestor';
    }
    if ($onServicosIndex) {
        $parentLi .= ' current-menu-item';
    }
    $parentA = 'elementor-item' . ($onServicosIndex ? ' elementor-item-active' : '');
    $parentAria = $onServicosIndex ? ' aria-current="page"' : '';

    echo '<li class="' . $parentLi . '"><a href="servicos/" class="' . $parentA . '"' . $parentAria . $tab . '>Serviços</a>';
    echo '<ul class="sub-menu elementor-nav-menu--dropdown">';
    foreach ($servicosFilhos as [$slug, $href, $label, $wpId]) {
        $subOn = ($np === $slug);
        $subLi = 'menu-item menu-item-type-post_type menu-item-object-page menu-item-' . $wpId . ($subOn ? ' current-menu-item' : '');
        $subA = 'elementor-sub-item' . ($subOn ? ' elementor-item-active' : '');
        $subAria = $subOn ? ' aria-current="page"' : '';
        echo "\n\t" . '<li class="' . $subLi . '"><a href="' . htmlspecialchars($href, ENT_QUOTES, 'UTF-8') . '" class="' . $subA . '"' . $subAria . $tab . '>' . htmlspecialchars($label, ENT_QUOTES, 'UTF-8') . '</a></li>';
    }
    echo "\n</ul>\n</li>\n";

    // Blog (externo — sem estado atual)
    echo '<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1500"><a href="https://www.brazilts.com.br/blog/" class="elementor-item"' . $tab . '>Blog</a></li>';

    // Orçamento
    $orc = ($np === 'orcamento');
    echo '<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2495' . ($orc ? ' current-menu-item' : '') . '"><a href="orcamento/" class="elementor-item' . ($orc ? ' elementor-item-active' : '') . '"' . ($orc ? ' aria-current="page"' : '') . $tab . '>Orçamento Rápido</a></li>';

    // Contato
    $fc = ($np === 'fale-conosco');
    echo '<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2504' . ($fc ? ' current-menu-item' : '') . '"><a href="fale-conosco/" class="elementor-item' . ($fc ? ' elementor-item-active' : '') . '"' . ($fc ? ' aria-current="page"' : '') . $tab . '>Contato</a></li>';

    echo '</ul>';
}
