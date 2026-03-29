"use strict";

// const { default: Swiper } = require("swiper");

document.addEventListener('DOMContentLoaded', () => {

    //  init Fancybox
    if (typeof Fancybox !== "undefined" && Fancybox !== null) {
        Fancybox.bind("[data-fancybox]", {
            dragToClose: false,
        });
    }

    // Sliders
    class MobileSwiper {
        constructor(sliderName, options, condition = 767.98) {
            this.$slider = $(sliderName);
            this.options = options;
            this.init = false;
            this.swiper = null;
            this.condition = condition;

            if (this.$slider.length) {
                this.handleResize();
                $(window).on("resize", () => this.handleResize());
            }
        }

        handleResize() {
            if (window.innerWidth <= this.condition) {
                if (!this.init) {
                    this.init = true;
                    this.swiper = new Swiper(this.$slider[0], this.options);
                }
            } else if (this.init) {
                this.swiper.destroy();
                this.swiper = null;
                this.init = false;
            }
        }
    }

    if ($(".testimonials__slider").length) {
        new Swiper('.testimonials__slider', {
            slidesPerView: "auto",
            spaceBetween: 16
        })
    }

    if ($(".solutions__slider").length) {
        new Swiper('.solutions__slider', {
            slidesPerView: 6,
            spaceBetween: 16
        })
    }

    if ($(".cases__slider").length) {
        new Swiper('.cases__slider', {
            slidesPerView: 1,
            initialSlide: 1,
            loop: true,
            slideToClickedSlide: true,
            watchSlidesVisibility: true,
            spaceBetween: 32
        })
    }

    if ($('.industries__tabs').length && $('.industries__slider').length) {

        const $tabsSlider = $('.industries__tabs');
        const $mainSlider = $('.industries__slider');

        if (!$tabsSlider.length || !$mainSlider.length) return;

        const industriesTabs = new Swiper('.industries__tabs', {
            slidesPerView: 'auto',
            spaceBetween: 8,
            watchSlidesProgress: true,
            freeMode: true,
        });

        new Swiper('.industries__slider', {
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            speed: 600,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true
            },
            thumbs: {
                swiper: industriesTabs,
            },
            allowTouchMove: false
        });

    }

    initStepsInteractions();


    initMobileMenu();
    initFooterAccordion();
    initApplyButton();


    const inputs = document.querySelectorAll("input[type='tel']");

    inputs?.forEach((input) => {
        window.intlTelInput(input, {
            separateDialCode: true,
            initialCountry: "auto",
            geoIpLookup: (callback) => {
                fetch("https://ipapi.co/json")
                    .then((res) => res.json())
                    .then((data) => callback(data.country_code))
                    .catch(() => callback("us"));
            }
        });
    });
});


function initStepsInteractions() {
    const $items = $('.steps__item');
    if (!$items.length) return;

    const isTouch = window.matchMedia('(pointer: coarse)').matches;

    if (isTouch) {
        $items.find('.steps__item-wrapper').on('click', function (e) {
            const $parent = $(this).closest('.steps__item');

            if (!$parent.hasClass('active')) {
                e.preventDefault();
                $items.removeClass('active');
                $parent.addClass('active');
            }
        });
    } else {
        $items.on('mouseenter', function () {
            $items.removeClass('active');
            $(this).addClass('active');
        });
    }
}

function initMobileMenu() {
    const menuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('nav-mobile-menu');

    if (!menuToggle || !mobileMenu) return;

    menuToggle.addEventListener('click', () => {
        const isOpen = menuToggle.classList.toggle('active');
        mobileMenu.classList.toggle('active');
        document.body.style.overflow = isOpen ? 'hidden' : '';
    });
}

function initFooterAccordion() {
    const footerCols = document.querySelectorAll('.footer-col-header');

    if (!footerCols.length) return;

    footerCols.forEach((header) => {
        header.addEventListener('click', () => {
            const col = header.parentElement;
            const isActive = col.classList.contains('active');

            footerCols.forEach((h) => {
                h.parentElement.classList.remove('active');
            });

            if (!isActive) {
                col.classList.add('active');
            }
        });
    });
}

function initApplyButton() {
    const applyBtn = document.getElementById('apply-btn');

    if (!applyBtn) return;

    applyBtn.addEventListener('click', () => {
        applyBtn.classList.add('btn__primary');
        applyBtn.classList.remove('btn__secondary');
        applyBtn.textContent = 'Applied Successfully!';
    });
}
