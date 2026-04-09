async function runScrollsScripts() {
    const domLoadedScrolls = await domContentLoaded.getPromise();
    if (domLoadedScrolls) {

        // Configuração global para ScrollReveal
        ScrollReveal({
            reset: true, // reinicia as animações ao scroll - true / false
            distance: "50px", // Distância padrão para os movimentos
            duration: 1200, // Duração padrão para as animações
            easing: "ease-in-out", // Efeito de transição padrão
            opacity: 0, // Começa com opacidade zero para suavidade
            scale: 1, // Sem redimensionamento padrão
            interval: 100, // Intervalo entre elementos para animações em sequência
        });

        // Tipos de animações
        ScrollReveal().reveal(".fade-in", {
            duration: 1500,
            delay: 100,
            opacity: 0,
            easing: "ease-in",
        });

        ScrollReveal().reveal(".slide-left", {
            origin: "left",
            distance: "200px",
            duration: 1200,
            delay: 150,
        });

        ScrollReveal().reveal(".slide-right", {
            origin: "right",
            distance: "200px",
            duration: 1200,
            delay: 150,
        });

        ScrollReveal().reveal(".slide-up", {
            origin: "bottom",
            distance: "150px",
            duration: 1300,
            easing: "cubic-bezier(0.5, 0.2, 0.3, 1)",
            opacity: 0.3,
            scale: 0.9,
        });

        ScrollReveal().reveal(".slide-down", {
            origin: "top",
            distance: "150px",
            duration: 1300,
            easing: "ease-in-out",
        });

        ScrollReveal().reveal(".zoom-in", {
            scale: 0.8,
            duration: 1000,
            easing: "ease-in-out",
        });

        ScrollReveal().reveal(".zoom-out", {
            scale: 1.2,
            duration: 1500,
            easing: "ease-in-out",
        });

        ScrollReveal().reveal(".rotate", {
            rotate: {
                x: 0,
                y: 0,
                z: 45, // Rotação em torno do eixo Z
            },
            duration: 1500,
            easing: "cubic-bezier(0.4, 0, 0.2, 1)",
        });

        ScrollReveal().reveal(".flip-horizontal", {
            rotate: {
                x: 0,
                y: 180, // Rotação horizontal
                z: 0,
            },
            duration: 1500,
            easing: "ease-in-out",
        });

        ScrollReveal().reveal(".flip-vertical", {
            rotate: {
                x: 180, // Rotação vertical
                y: 0,
                z: 0,
            },
            duration: 1500,
            easing: "ease-in-out",
        });

        // Configurações do ScrollReveal
        ScrollReveal().reveal('.anime-text1 div div', { // Agora anima apenas os <div> internos
            origin: "top",
            distance: "40px",
            opacity: 0,
            duration: 400,
            delay: 100,
            interval: 40,
            easing: 'cubic-bezier(0.4, 0, 1, 1)',
            viewFactor: 0.5,
            reset: true,
        });


        ScrollReveal().reveal('.home-blog-single', {
            delay: 200, // Atraso antes da animação começar (ms)
            distance: '20px', // Distância do movimento
            origin: 'bottom', // Direção da animação (pode ser 'left', 'right', 'top', 'bottom')
            interval: 200, // Intervalo entre as animações dos elementos (ms)
            easing: 'ease-out', // Tipo de easing (pode ser 'ease', 'ease-in-out', etc.)
            duration: 800, // Duração da animação (ms)
            reset: true // Se a animação deve repetir quando o elemento sair/entrar na tela
        });


    }
}
runScrollsScripts()