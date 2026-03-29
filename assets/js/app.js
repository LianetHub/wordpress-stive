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



    initMobileMenu();
    initFooterAccordion();
    initApplyButton();
    initOptionsCards();

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

function initOptionsCards() {
    const cards = document.querySelectorAll('.options-card');

    if (!cards.length) return;

    const hasHover = window.matchMedia('(hover: hover)').matches;

    function updateCardState(card, isActive) {
        const numberSvg = card.querySelector('.options-card__number text');
        if (numberSvg) {
            if (isActive) {
                numberSvg.setAttribute('fill', 'url(#fill-grad-active)');
                numberSvg.setAttribute('stroke', 'url(#stroke-grad-active)');
            } else {
                numberSvg.setAttribute('fill', 'none');
                numberSvg.setAttribute('stroke', 'url(#stroke-grad-inactive)');
            }
        }
    }

    cards.forEach((card) => {
        updateCardState(card, card.classList.contains('active'));
    });

    if (hasHover) {
        cards.forEach((card) => {
            card.addEventListener('mouseenter', () => {
                cards.forEach((c) => {
                    c.classList.remove('active');
                    updateCardState(c, false);
                });
                card.classList.add('active');
                updateCardState(card, true);
            });
        });
    } else {
        cards.forEach((card) => {
            card.addEventListener('click', (e) => {
                if (!card.classList.contains('active')) {
                    e.preventDefault();
                    cards.forEach((c) => {
                        c.classList.remove('active');
                        updateCardState(c, false);
                    });
                    card.classList.add('active');
                    updateCardState(card, true);
                }
            });
        });
    }
}

