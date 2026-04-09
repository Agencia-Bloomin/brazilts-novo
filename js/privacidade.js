async function runLgpdCheck() {
    const loadLgpdCheck = await domContentLoaded.getPromise();
    if (loadLgpdCheck) {
        if (!localStorage.lgpd && !sessionStorage.lgpd) {
            const btnLGPD = document.querySelector('.accept');
            const boxLGPD = document.querySelector('.lgpd');
            // console.log(btnLGPD);
            boxLGPD.style.display = 'block';

            btnLGPD.addEventListener('click', function () {
                localStorage.setItem("lgpd", 'ok');
                sessionStorage.setItem("lgpd", 'ok');
                boxLGPD.style.display = 'none';
            })
        }
    }
}runLgpdCheck()