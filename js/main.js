
//Menu responsivo
function menuShow(){
    let menuMobile = document.querySelector('.mobile-menu');
    if (menuMobile.classList.contains('open')){
        menuMobile.classList.remove('open');
        document.querySelector('.mobile-menu-icon img').src = "img/open.svg";
    } else{
        menuMobile.classList.add('open');
        document.querySelector('.mobile-menu-icon img').src = "img/close.svg";
    }
}

// Carrossel SWIPER
var swiper = new Swiper(".mySwiper", {
slidesPerView: 1,
spaceBetween: 30,
loop: true,
grabCursor: true,

pagination: {
    el: ".swiper-pagination",
    clickable: true,
},

navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
},

breakpoints: {
    // when window width is >= 640px
    640: {
    slidesPerView: 1,
    spaceBetween: 18
    },
    // when window width is >= 768px
    768: {
    slidesPerView: 2,
    spaceBetween: 18
    },
    // when window width is >= 1188px
    1188: {
    slidesPerView: 3,
    spaceBetween: 24
    }
}
});
