/*
* 轮播
* */

$(function () {

    console.log("jia ")

    const swiper_dom = $("#swiper");

    if (swiper_dom.length > 0) {

        let swiper = new Swiper("#swiper", {
            slidesPerView: 2,
            spaceBetween: 12,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                480: {  //当屏幕宽度大于等于320
                    slidesPerView: 3
                },
                768: {  //当屏幕宽度大于等于768
                    slidesPerView: 4
                },
                1024: {  //当屏幕宽度大于等于1280
                    slidesPerView: 4,
                },
                1580: {  //当屏幕宽度大于等于1280
                    slidesPerView: 5
                }
            }
        });
    }
});