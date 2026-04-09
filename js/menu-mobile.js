async function runMobileMenu() {
    const mobileMenuDomLoaded = await domContentLoaded.getPromise();
    if (mobileMenuDomLoaded) {

        const header = document.querySelector('.header-area');
        if (header) {
            const openNavMenu = document.querySelector(".open-nav-menu"),
                closeNavMenu = document.querySelector(".close-nav-menu"),
                navMenu = document.querySelector(".nav-menu"),
                menuOverlay = document.querySelector(".menu-overlay"),
                mediaSize = 991;

            openNavMenu.addEventListener("click", toggleNav);
            closeNavMenu.addEventListener("click", toggleNav);
            // close the navMenu by clicking outside
            menuOverlay.addEventListener("click", toggleNav);

            function toggleNav() {
                navMenu.classList.toggle("open");
                menuOverlay.classList.toggle("active");
                document.body.classList.toggle("hidden-scrolling");
            }

            navMenu.addEventListener("click", (event) => {
                const target = event.target;
                // Verifica se o item tem o atributo 'data-toggle' (para detectar cliques nos itens do menu)
                if (target.hasAttribute("data-toggle") && window.innerWidth <= mediaSize) {
                    event.preventDefault();
                    const menuItemHasChildren = target.parentElement;
                    // Se o item já está expandido, não fecha
                    if (menuItemHasChildren.classList.contains("active")) {
                        collapseSubMenu(menuItemHasChildren);
                    } else {
                        // Se o item é um submenu, só expande ele sem afetar o submenu pai
                        if (menuItemHasChildren.classList.contains("has-children")) {
                            menuItemHasChildren.classList.add("active");
                            const subMenu = menuItemHasChildren.querySelector(".sub-menu");
                            // Recalcula o max-height dinamicamente com base no conteúdo
                            subMenu.style.maxHeight = subMenu.scrollHeight + "px";
                        } else {
                            // Se for um menu normal, fecha o submenu do item pai antes de abrir o novo
                            collapseSubMenu();
                            menuItemHasChildren.classList.add("active");
                            const subMenu = menuItemHasChildren.querySelector(".sub-menu");
                            subMenu.style.maxHeight = subMenu.scrollHeight + "px";
                        }
                    }
                }
            });

            function collapseSubMenu(menuItemHasChildren = null) {
                if (!menuItemHasChildren) {
                    navMenu.querySelectorAll(".has-children.active").forEach(item => {
                        const subMenu = item.querySelector(".sub-menu");
                        if (subMenu) subMenu.removeAttribute("style");
                        item.classList.remove("active");
                    });
                } else {
                    const subMenu = menuItemHasChildren.querySelector(".sub-menu");
                    if (subMenu) subMenu.removeAttribute("style");
                    menuItemHasChildren.classList.remove("active");
                }
            }

            function resizeFix() {
                // if navMenu is open ,close it
                if (navMenu.classList.contains("open")) {
                    toggleNav();
                }
                // if menuItemHasChildren is expanded , collapse it
                if (navMenu.querySelector(".has-children.active")) {
                    collapseSubMenu();
                }
            }

            window.addEventListener("resize", function () {
                if (this.innerWidth > mediaSize) {
                    resizeFix();
                }
            });

            window.addEventListener('scroll', () => {
                header.classList.toggle('sticky', window.scrollY > 0);
            });
        }
    }
} runMobileMenu()
