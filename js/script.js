//============================================Go to the top==============================================
async function runGoTop() {
    var goTopDomLoaded = await domContentLoaded.getPromise();
    if (goTopDomLoaded) {
        const goTopBtn = document.querySelector('.go-top-btn');

        if (goTopBtn) {

            function checkHeight() {
                if (window.scrollY > 200) {
                    goTopBtn.style.display = "block";
                } else {
                    goTopBtn.style.display = "none";
                }
            }

            window.addEventListener('scroll', checkHeight);

            goTopBtn.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: "smooth"
                })
            })
        }
    }
} runGoTop()

//======================================WhatsApp BTN Form==========================================
async function runMeuZap() {
    const zapDomLoaded = await domContentLoaded.getPromise();
    if (zapDomLoaded) {
        const meuZapBtn = document.getElementById('meuZap');
        if (meuZapBtn) {
            const telefone = meuZapBtn.dataset.zap;

            function meuZap() {
                const form = document.querySelector('form');
                const name = form.querySelector('input[name=name]');
                const email = form.querySelector('input[name=email]');
                const message = form.querySelector('textarea[name=message]');

                if (name.value != '', email.value != '', message.value != '') {
                    console.log(name, email, message, 'aqui');
                    console.log(message.value);
                    const href = `${telefone}&text=Olá, estou entrando em contato através do site. Me chamo ${name.value}, meu E-mail é ${email.value}, *${message.value}*`;
                    return window.open(href, '_blank')
                }
                return window.alert('Preencha os campos do formulário')
            }
            meuZapBtn.addEventListener("click", meuZap)
        }
    }
} runMeuZap()

//======================================ACCORDION==========================================
async function runAccordion() {
    const accordionDomLoaded = await domContentLoaded.getPromise();
    if (accordionDomLoaded) {

        const accordionExist = document.querySelector('.accordion')

        if (accordionExist) {
            const items = document.querySelectorAll(".accordion button");

            function toggleAccordion() {
                const itemToggle = this.getAttribute('aria-expanded');

                for (i = 0; i < items.length; i++) {
                    items[i].setAttribute('aria-expanded', 'false');
                }

                if (itemToggle == 'false') {
                    this.setAttribute('aria-expanded', 'true');
                }
            }
            items.forEach(item => item.addEventListener('click', toggleAccordion));
        }
    }
} runAccordion()

// ========================================= Leia Mais BTN ==========================
async function runLeiaMais() {
    var buttons = document.querySelectorAll(".toggleButton");

    buttons?.forEach(function (button) {
        button.addEventListener("click", function () {
            var targetId = this.getAttribute('data-target');
            var moreText = document.getElementById(targetId);

            if (moreText.style.display === "none" || moreText.style.display === "") {
                moreText.style.display = "block";
                this.innerHTML = "Leia menos";
            } else {
                moreText.style.display = "none";
                this.innerHTML = "Leia mais";
            }
        });
    });
} runLeiaMais()

//====================================== Expand Button Text ==========================================
async function expandButton() {
    document.addEventListener("DOMContentLoaded", function () {
        const expandButtons = document.querySelectorAll(".btn-expand");

        expandButtons.forEach(button => {
            button.addEventListener("click", function () {
                const boxExpand = button.previousElementSibling;
                const textBtn = button.querySelector("span");
                const icon = button.querySelector("i");

                if (boxExpand.classList.contains("expanded")) {
                    textBtn.textContent = "Leia Mais";
                    icon.style.transform = "rotate(0deg)";
                    boxExpand.classList.remove("expanded");
                    boxExpand.style.maxHeight = "200px"; // Altura inicial alterar também no CSS
                } else {
                    textBtn.textContent = "Leia Menos";
                    icon.style.transform = "rotate(180deg)";
                    boxExpand.style.maxHeight = boxExpand.scrollHeight + "px"; // Altura dinâmica
                    boxExpand.classList.add("expanded");
                }
            });
        });
    });
}
expandButton();

// ===================================== JS services Tabs ========================
async function runTabs() {
    const tabList = document.getElementById('myTab');
    const tabContent = document.querySelector('.tab-content');

    tabList?.addEventListener('click', handleTabClick);

    function handleTabClick(event) {
        // Check if clicked element is a tab
        if (!event.target.classList.contains('nav-link')) return;

        // Get the clicked tab element
        const clickedTab = event.target;

        // Remove active class from all tabs and content panels
        const tabs = tabList.querySelectorAll('.nav-link');
        const contentPanels = tabContent.querySelectorAll('.tab-pane');
        tabs.forEach(tab => tab.classList.remove('active'));
        contentPanels.forEach(panel => panel.classList.remove('active'));

        // Add active class to the clicked tab and its corresponding content panel
        clickedTab.classList.add('active');
        const clickedTabId = clickedTab.id.replace('tabs', 'tab');
        document.getElementById(clickedTabId).classList.add('active');
    }
} runTabs()

// ===================================== JS parallax ========================
async function runParallax() {

    var rellaxLoaded = await domContentLoaded.getPromise();

    if (rellaxLoaded) {

        var rellax = new Rellax('.parallax', {
            speed: 1.5,
            center: true,
            wrapper: '',
            round: true,
            vertical: true,
            horizontal: false
         });

    }
} runParallax()
