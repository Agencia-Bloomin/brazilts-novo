//https://swiperjs.com/demos --> utilizar a opção "Core"

async function runSwiperConfigs() {
  const swiperDomLoaded = await domContentLoaded.getPromise();
  if (swiperDomLoaded) {
  
    //====================================== Banner Carousel ==============================================
    var swiper = new Swiper(".bannerSwiper", {
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 5500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });

    //====================================== Brand Carousel ==============================================
    var swiper = new Swiper(".brandSwiper", {
      slidesPerView: 2,
      spaceBetween: 10,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      loop: true,
      breakpoints: {
        768: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        992: {
          slidesPerView: 4,
          spaceBetween: 40,
        },
        1200: {
          slidesPerView: 5,
          spaceBetween: 50,
        },
      },
    });
    //============================================ Product Carousel ===========================================
    var swiper = new Swiper(".productSwiper", {
      slidesPerView: 1,
      spaceBetween: 10,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      loop: true,
      breakpoints: {
        768: {
          slidesPerView: 2,
        },
        992: {
          slidesPerView: 1,
        },
        1200: {
          slidesPerView: 2,
        },
      },
    });

     //============================================ Product Carousel Intern ===========================================
     var swiper = new Swiper(".prodintSwiper", {
      pagination: {
        el: ".swiper-pagination",
        type: "fraction",
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });


  }
} runSwiperConfigs()