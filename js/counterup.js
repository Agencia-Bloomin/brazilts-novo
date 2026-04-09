async function runCounters() {
  const countersDomLoaded = await domContentLoaded.getPromise();
  if (countersDomLoaded) {

    //=========================================================== Counters ===================================================
    const allCounters = document.querySelectorAll('[data-goal]');

    if (allCounters) {
      function isElementInViewport(el) {
        var rect = el.getBoundingClientRect();
        return (
          rect.top >= 0 &&
          rect.bottom <= (window.innerHeight || document.documentElement.clientHeight)
        );
      }

      function startCounterIfVisible(counterElement, targetElement, goal) {
        if (targetElement && isElementInViewport(targetElement) && !targetElement.classList.contains('counter-started')) {
          targetElement.classList.add('counter-started');
          // Iniciar o contador
          var count = 0;
          var counter = setInterval(function () {
            document.getElementById(counterElement).innerText = count;
            count++;
            if (count > goal) {
              clearInterval(counter);
            }
          }, 100); //ajustar velocidade
        }
      }

      function handleScroll() {
        // #########################
        // código estruturado pra aceitar contadores ilimitados. Importante manter a estrutura e o nome dos ids, alterando somente a numeração desses ids.
        // #########################
        for (const counter of allCounters) {
          const getGoal = counter.getAttribute('data-goal'),
            getTargetElement = counter,
            getCounterElement = counter.querySelector("[id^='counter']").getAttribute('id');
          startCounterIfVisible(getCounterElement, getTargetElement, parseInt(getGoal) || 0);
        }
      }

      window.addEventListener('scroll', handleScroll);
      window.addEventListener('load', handleScroll); // Para verificar a visibilidade ao carregar a página
    }
    
  }
} runCounters()