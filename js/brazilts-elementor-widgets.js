/**
 * Fallback para widgets Elementor quando os chunks webpack (ex.: counter.*.js)
 * não existem no servidor — o frontend.min.js tenta carregá-los e falha em silêncio.
 * Cobre: contadores, headline rotativa, menu (burger + overlay + submenus mobile, hover desktop),
 * acordeão Elementor e animações de entrada.
 */
(function () {
  'use strict';

  function parseDataSettings(el) {
    const raw = el.getAttribute('data-settings');
    if (!raw) return {};
    try {
      return JSON.parse(raw);
    } catch {
      return {};
    }
  }

  function formatCounterValue(value, targetNum, delimiter) {
    if (targetNum % 1 !== 0) {
      const dec = String(targetNum).split('.')[1];
      const places = dec ? dec.length : 1;
      return value.toFixed(places).replace('.', delimiter === ',' ? ',' : '.');
    }
    const rounded = Math.round(value);
    if (delimiter === ',') {
      return rounded.toLocaleString('en-US');
    }
    return String(rounded);
  }

  function initCounters() {
    document.querySelectorAll('.elementor-counter-number[data-to-value]').forEach((el) => {
      if (el.dataset.braziltsCounterInit) return;
      const to = parseFloat(el.getAttribute('data-to-value'));
      const from = parseFloat(String(el.getAttribute('data-from-value') || '0'));
      const duration = parseInt(el.getAttribute('data-duration') || '2000', 10);
      const delimiter = el.getAttribute('data-delimiter') || '';

      if (Number.isNaN(to)) return;

      const run = () => {
        if (el.dataset.braziltsCounterInit) return;
        el.dataset.braziltsCounterInit = '1';
        const start = performance.now();
        const step = (now) => {
          const p = Math.min(1, (now - start) / duration);
          const eased = 1 - Math.pow(1 - p, 3);
          const current = from + (to - from) * eased;
          el.textContent = formatCounterValue(current, to, delimiter);
          if (p < 1) {
            requestAnimationFrame(step);
          } else {
            el.textContent = formatCounterValue(to, to, delimiter);
          }
        };
        requestAnimationFrame(step);
      };

      const io = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              run();
              io.disconnect();
            }
          });
        },
        { rootMargin: '0px 0px -10% 0px', threshold: 0 }
      );
      io.observe(el);
    });
  }

  function initAnimatedHeadlines() {
    /** Mesmo ritmo do Elementor Pro: flip 1.2s (widget-animated-headline.min.css) + rotate_iteration_delay 1300ms. */
    const FLIP_MS = 1200;

    document.querySelectorAll('.brazilts-rotating-headline.elementor-widget-animated-headline').forEach((widget) => {
      if (widget.dataset.braziltsHeadlineInit) return;
      const settings = parseDataSettings(widget);
      const delay = Math.max(
        FLIP_MS + 50,
        parseInt(String(settings.rotate_iteration_delay ?? 1300), 10) || 1300
      );
      const wrapper = widget.querySelector('.elementor-headline-dynamic-wrapper');
      if (!wrapper) return;
      const items = wrapper.querySelectorAll('.elementor-headline-dynamic-text');
      if (items.length < 2) return;

      widget.dataset.braziltsHeadlineInit = '1';
      let index = 0;
      items.forEach((node, i) => {
        if (node.classList.contains('elementor-headline-text-active')) index = i;
      });

      items.forEach((node, i) => {
        if (i !== index) {
          node.classList.remove('elementor-headline-text-active');
          node.classList.remove('elementor-headline-text-inactive');
        }
      });

      const stopAfterLast = widget.getAttribute('data-brazilts-headline-stop-after-last') === '1';

      const step = () => {
        if (widget.dataset.braziltsHeadlineStopped === '1') {
          return;
        }

        const current = items[index];

        let nextIndex;
        if (stopAfterLast) {
          if (index >= items.length - 1) {
            return;
          }
          nextIndex = index + 1;
        } else {
          nextIndex = (index + 1) % items.length;
        }

        const next = items[nextIndex];

        current.classList.remove('elementor-headline-text-active');
        current.classList.add('elementor-headline-text-inactive');
        next.classList.remove('elementor-headline-text-inactive');
        next.classList.add('elementor-headline-text-active');

        index = nextIndex;

        window.setTimeout(() => {
          current.classList.remove('elementor-headline-text-inactive');
        }, FLIP_MS);

        if (stopAfterLast && index === items.length - 1) {
          widget.dataset.braziltsHeadlineStopped = '1';
          window.clearInterval(intervalId);
        }
      };

      const intervalId = window.setInterval(step, delay);
    });
  }

  function initPopup1648() {
    const modal = document.getElementById('elementor-popup-modal-1648');
    const popup = modal?.querySelector('[data-elementor-type="popup"][data-elementor-id="1648"]');
    if (!modal || !popup) return;

    const nav = popup.querySelector('nav.elementor-nav-menu--dropdown.elementor-nav-menu__container');
    const closeBtn = modal.querySelector('.dialog-close-button');
    const triggers = () => document.querySelectorAll('.brazilts-open-menu-1648');

    const setTriggersExpanded = (open) => {
      triggers().forEach((t) => t.setAttribute('aria-expanded', open ? 'true' : 'false'));
    };

    const isOpen = () => modal.classList.contains('brazilts-popup--open');

    const closePopup = () => {
      modal.classList.remove('brazilts-popup--open');
      modal.style.display = 'none';
      modal.setAttribute('aria-hidden', 'true');
      document.body.classList.remove('brazilts-popup-active');
      document.body.style.overflow = '';
      if (nav) nav.setAttribute('aria-hidden', 'true');
      setTriggersExpanded(false);
      popup.querySelectorAll('.brazilts-submenu-open').forEach((li) => li.classList.remove('brazilts-submenu-open'));
    };

    const openPopup = () => {
      modal.style.display = 'flex';
      modal.classList.add('brazilts-popup--open');
      modal.setAttribute('aria-hidden', 'false');
      document.body.classList.add('brazilts-popup-active');
      document.body.style.overflow = 'hidden';
      if (nav) nav.setAttribute('aria-hidden', 'false');
      setTriggersExpanded(true);
    };

    triggers().forEach((el) => {
      el.addEventListener(
        'click',
        (e) => {
          e.preventDefault();
          e.stopPropagation();
          openPopup();
        },
        true
      );
    });

    if (closeBtn) {
      closeBtn.addEventListener('click', (e) => {
        e.preventDefault();
        closePopup();
      });
    }

    modal.addEventListener('click', (e) => {
      if (e.target === modal) closePopup();
    });

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && isOpen()) closePopup();
    });

    if (nav) {
      nav.addEventListener('click', (e) => {
        const link = e.target.closest(
          '.menu-item-has-children > a.elementor-item, .menu-item-has-children > a.elementor-sub-item'
        );
        if (!link || !nav.contains(link)) return;
        const li = link.closest('.menu-item-has-children');
        if (!li) return;
        const sub = li.querySelector(':scope > .sub-menu');
        if (!sub) return;
        if (!li.classList.contains('brazilts-submenu-open')) {
          e.preventDefault();
          li.classList.add('brazilts-submenu-open');
        }
      });
    }

    popup.addEventListener(
      'click',
      (e) => {
        const a = e.target.closest('a');
        if (!a || !popup.contains(a)) return;
        const href = a.getAttribute('href') || '';
        if (href.indexOf('elementor-action') !== -1) return;
        if (a.closest('nav.elementor-nav-menu--dropdown')) {
          const li = a.closest('.menu-item-has-children');
          if (
            li &&
            a.parentElement === li &&
            li.querySelector(':scope > .sub-menu') &&
            !li.classList.contains('brazilts-submenu-open')
          ) {
            return;
          }
        }
        if (href === '' || href === '#') return;
        closePopup();
      },
      true
    );
  }

  function initNavMenus() {
    const mq = window.matchMedia('(max-width: 1024px)');

    document.querySelectorAll('.elementor-widget-nav-menu').forEach((widget) => {
      const toggle = widget.querySelector('.elementor-menu-toggle');
      /** Drawer do burger: só o <nav> com --dropdown (não o --main horizontal). */
      const dropdown = widget.querySelector('nav.elementor-nav-menu__container.elementor-nav-menu--dropdown');
      if (!toggle || !dropdown) return;

      const close = () => {
        toggle.setAttribute('aria-expanded', 'false');
        dropdown.setAttribute('aria-hidden', 'true');
        widget.classList.remove('brazilts-nav-widget-open');
      };

      const open = () => {
        toggle.setAttribute('aria-expanded', 'true');
        dropdown.setAttribute('aria-hidden', 'false');
        widget.classList.add('brazilts-nav-widget-open');
      };

      const isOpen = () => toggle.getAttribute('aria-expanded') === 'true';

      toggle.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        if (isOpen()) close();
        else open();
      });

      toggle.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          toggle.click();
        }
      });

      dropdown.addEventListener('click', (e) => {
        if (!mq.matches) return;
        const link = e.target.closest(
          '.menu-item-has-children > a.elementor-item, .menu-item-has-children > a.elementor-sub-item'
        );
        if (!link || !dropdown.contains(link)) return;
        const li = link.closest('.menu-item-has-children');
        if (!li) return;
        const sub = li.querySelector(':scope > .sub-menu');
        if (!sub) return;
        if (!li.classList.contains('brazilts-submenu-open')) {
          e.preventDefault();
          li.classList.add('brazilts-submenu-open');
        }
      });

      document.addEventListener('click', (e) => {
        if (isOpen() && !widget.contains(e.target)) close();
      });

      document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && isOpen()) close();
      });
    });
  }

  function initAccordions() {
    document.querySelectorAll('.brazilts-acc.elementor-accordion').forEach((root) => {
      if (root.dataset.braziltsAccordionInit) return;
      root.dataset.braziltsAccordionInit = '1';

      const setOpen = (title, open) => {
        const tab = title.getAttribute('data-tab');
        if (!tab) return;
        const content = root.querySelector(`.elementor-tab-content[data-tab="${tab}"]`);
        title.classList.toggle('elementor-active', open);
        title.setAttribute('aria-expanded', open ? 'true' : 'false');
        if (content) content.classList.toggle('elementor-active', open);
      };

      root.querySelectorAll('.brazilts-acc__trigger.elementor-tab-title').forEach((title) => {
        if (!title.hasAttribute('tabindex')) title.setAttribute('tabindex', '0');
      });

      root.addEventListener('click', (e) => {
        const title = e.target.closest('.brazilts-acc__trigger.elementor-tab-title');
        if (!title || !root.contains(title)) return;
        e.preventDefault();
        const wasOpen = title.classList.contains('elementor-active');
        root.querySelectorAll('.brazilts-acc__trigger.elementor-tab-title').forEach((t) => setOpen(t, false));
        if (!wasOpen) setOpen(title, true);
      });

      root.addEventListener('keydown', (e) => {
        if (e.key !== 'Enter' && e.key !== ' ') return;
        const title = e.target.closest('.brazilts-acc__trigger.elementor-tab-title');
        if (!title || !root.contains(title)) return;
        e.preventDefault();
        title.click();
      });
    });
  }

  function initEntranceAnimations() {
    const selector = '.elementor-invisible[data-settings]';
    document.querySelectorAll(selector).forEach((el) => {
      if (el.dataset.braziltsEntranceInit) return;
      const settings = parseDataSettings(el);
      const anim = settings.animation || settings._animation;
      if (!anim) return;

      el.dataset.braziltsEntranceInit = '1';
      const delay = parseInt(settings._animation_delay || settings.animation_delay || 0, 10) || 0;

      const io = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            const run = () => {
              el.classList.remove('elementor-invisible');
              el.classList.add('animated', anim);
            };
            if (delay > 0) setTimeout(run, delay);
            else run();
            io.disconnect();
          });
        },
        { threshold: 0.15, rootMargin: '0px 0px -5% 0px' }
      );
      io.observe(el);
    });
  }

  function injectMenuCss() {
    if (document.getElementById('brazilts-elementor-fallback-css')) return;
    const style = document.createElement('style');
    style.id = 'brazilts-elementor-fallback-css';
    style.textContent = `
/* Modal 1648: mesma árvore que o Elementor Pro (#elementor-popup-modal-1648 + post-1648.css). */
#elementor-popup-modal-1648 {
  position: fixed !important;
  inset: 0 !important;
  z-index: 100000 !important;
}
#elementor-popup-modal-1648:not(.brazilts-popup--open) {
  display: none !important;
  pointer-events: none !important;
}
#elementor-popup-modal-1648.brazilts-popup--open {
  display: flex !important;
  pointer-events: auto !important;
}
#elementor-popup-modal-1648.brazilts-popup--open [data-elementor-type="popup"].elementor-1648 {
  display: block !important;
  width: 100% !important;
}
#elementor-popup-modal-1648.brazilts-popup--open .elementor-1648 nav.elementor-nav-menu--dropdown .menu-item-has-children:not(.brazilts-submenu-open) > .sub-menu {
  display: none !important;
}
#elementor-popup-modal-1648.brazilts-popup--open .elementor-1648 nav.elementor-nav-menu--dropdown .menu-item-has-children.brazilts-submenu-open > .sub-menu {
  display: block !important;
}
body.brazilts-popup-active {
  overflow: hidden !important;
}
/* Item ativo no submenu (mesma leitura visual do traço do link principal) */
nav.elementor-nav-menu--dropdown .elementor-sub-item.elementor-item-active {
  text-decoration: underline;
  text-underline-offset: 0.25em;
  text-decoration-thickness: 2px;
}
@media (min-width: 1025px) {
  .elementor-nav-menu--main .menu-item-has-children {
    position: relative;
  }
  .elementor-nav-menu--main .menu-item-has-children > .sub-menu.elementor-nav-menu--dropdown {
    position: absolute;
    left: 0;
    top: 100%;
    width: 100%;
    min-width: 370px;
    z-index: 100000;
    margin: 0;
    list-style: none;
    background: #fff;
    box-shadow: 0 8px 24px rgba(0,0,0,.12);
  }
  .elementor-nav-menu--main .menu-item-has-children:not(:hover):not(:focus-within) > .sub-menu.elementor-nav-menu--dropdown {
    display: none !important;
  }
  .elementor-nav-menu--main .menu-item-has-children:hover > .sub-menu.elementor-nav-menu--dropdown,
  .elementor-nav-menu--main .menu-item-has-children:focus-within > .sub-menu.elementor-nav-menu--dropdown {
    display: block !important;
  }
}
@media (max-width: 1024px) {
  .elementor-widget-nav-menu.elementor-nav-menu--toggle nav.elementor-nav-menu--main {
    display: none !important;
  }
  .elementor-widget-nav-menu.elementor-nav-menu--toggle .elementor-menu-toggle {
    display: inline-flex !important;
  }
  .elementor-widget-nav-menu.elementor-nav-menu--toggle:not(.brazilts-nav-widget-open) nav.elementor-nav-menu__container.elementor-nav-menu--dropdown {
    display: none !important;
  }
  .elementor-widget-nav-menu.brazilts-nav-widget-open .elementor-menu-toggle {
    position: relative !important;
    z-index: 1000001 !important;
  }
  .elementor-widget-nav-menu.brazilts-nav-widget-open nav.elementor-nav-menu__container.elementor-nav-menu--dropdown {
    display: block !important;
    position: fixed !important;
    inset: 0 !important;
    max-height: 100vh !important;
    overflow-y: auto !important;
    z-index: 1000000 !important;
    background: #f3ffff !important;
    padding: 4.5rem 1.25rem 1.5rem !important;
    box-sizing: border-box !important;
  }
  .elementor-widget-nav-menu.elementor-nav-menu--toggle nav.elementor-nav-menu__container.elementor-nav-menu--dropdown .menu-item-has-children:not(.brazilts-submenu-open) > .sub-menu {
    display: none !important;
  }
  .elementor-widget-nav-menu.elementor-nav-menu--toggle nav.elementor-nav-menu__container.elementor-nav-menu--dropdown .menu-item-has-children.brazilts-submenu-open > .sub-menu {
    display: block !important;
  }
}
@media (max-width: 1024px) {
  .elementor-widget-nav-menu:not(.brazilts-nav-widget-open) .elementor-menu-toggle__icon--close {
    display: none !important;
  }
  .elementor-widget-nav-menu.brazilts-nav-widget-open .elementor-menu-toggle__icon--open {
    display: none !important;
  }
}
.brazilts-acc.elementor-accordion .brazilts-acc__panel.elementor-tab-content.elementor-active,
.elementor-accordion .elementor-tab-content.elementor-active {
  display: block !important;
}
.animated {
  animation-duration: 1.25s;
  animation-fill-mode: both;
}
`;
    document.head.appendChild(style);
  }

  function boot() {
    injectMenuCss();
    initCounters();
    initAnimatedHeadlines();
    initPopup1648();
    initNavMenus();
    initAccordions();
    initEntranceAnimations();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }
})();
