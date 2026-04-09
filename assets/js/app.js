"use strict";

document.addEventListener('DOMContentLoaded', () => {

    //  init Fancybox
    if (typeof Fancybox !== "undefined" && Fancybox !== null) {
        Fancybox.bind("[data-fancybox]", {
            dragToClose: false,
        });
    }

    // Detect user device
    const isMobile = {
        Android: () => /Android/i.test(navigator.userAgent),
        BlackBerry: () => /BlackBerry/i.test(navigator.userAgent),
        iOS: () => /iPhone|iPad|iPod/i.test(navigator.userAgent),
        Opera: () => /Opera Mini/i.test(navigator.userAgent),
        Windows: () => /IEMobile/i.test(navigator.userAgent),
        any: () => (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows())
    };

    function getNavigator() {
        const isTouchDevice = isMobile.any() || window.innerWidth < 992;

        if (isTouchDevice) {
            $('body').removeClass('_pc').addClass('_touch');
        } else {
            $('body').removeClass('_touch').addClass('_pc');
        }
    }

    getNavigator();
    $(window).on('resize', getNavigator);



    // event handlers
    $(document).on('click', (e) => {
        const $target = $(e.target);

        // Calendly Widget
        if ($target.closest('[data-calendly]').length) {
            e.preventDefault();

            const calendarUrl = $target.closest('[data-calendly]').attr('href');

            if (typeof Calendly !== 'undefined' && calendarUrl) {
                Calendly.initPopupWidget({
                    url: calendarUrl
                });
            } else if (calendarUrl) {
                window.open(calendarUrl, '_blank');
            }
        }

        // menu
        if ($target.closest('.header__menu-toggler').length) {
            $(".header").toggleClass("open-menu");
            $('body').toggleClass('lock-menu')
        }

        if ($target.closest('.footer__menu-caption').length) {
            if ($(window).width() < 575.98) {
                $target.closest('.footer__menu-caption').toggleClass("active").next().slideToggle();
            }

        }


    });


    // Sliders
    class MobileSwiper {
        constructor(sliderName, options, condition = 991.98) {
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

    if ($(".why").length) {
        new MobileSwiper('.why__slider', {
            slidesPerView: "auto",
            spaceBetween: 16
        })
    }
    if ($(".media__block-articles").length) {
        new MobileSwiper('.media__block-articles', {
            slidesPerView: 1,
            spaceBetween: 8
        }, 767.98)
    }

    if ($(".testimonials__slider").length) {
        new Swiper('.testimonials__slider', {
            slidesPerView: "auto",
            spaceBetween: 8,
            breakpoints: {
                767.98: {
                    spaceBetween: 16,
                }
            }
        })
    }

    if ($(".solutions__slider").length) {
        new Swiper('.solutions__slider', {
            slidesPerView: "auto",
            spaceBetween: 16,
            breakpoints: {
                1399.98: {
                    slidesPerView: 6,
                }
            }
        })
    }

    if ($(".cases__slider").length) {
        new Swiper('.cases__slider', {
            slidesPerView: 1,
            initialSlide: 1,
            spaceBetween: 4,
            loop: true,
            slideToClickedSlide: true,
            watchSlidesVisibility: true,
            preventClicks: true,
            preventClicksPropagation: true,
            breakpoints: {
                575.98: {
                    spaceBetween: 16,
                },
                767.98: {
                    spaceBetween: 32,
                }
            }
        })
    }

    if ($(".media__block-slider").length) {
        new Swiper('.media__block-slider', {
            slidesPerView: 1,
            spaceBetween: 8,
            loop: true,
            breakpoints: {
                575.98: {
                    spaceBetween: 12,
                    slidesPerView: 2,
                },
                767.98: {
                    spaceBetween: 16,
                    slidesPerView: 3,
                }
            }
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
            slideToClickedSlide: true,
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


    // Steps Animation
    if ($('.steps__item').length) {
        const $stepsList = $('.steps__list');
        const $items = $('.steps__item');

        $stepsList.on('click', '.steps__item-wrapper', function (e) {
            if ($('body').hasClass('_touch')) {
                const $parent = $(this).closest('.steps__item');

                if (!$parent.hasClass('active')) {
                    e.preventDefault();
                    $items.removeClass('active');
                    $parent.addClass('active');
                }
            }
        });

        $stepsList.on('mouseenter', '.steps__item', function () {
            if ($('body').hasClass('_pc')) {
                $items.removeClass('active');
                $(this).addClass('active');
            }
        });
    }


    // International Input Mask
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

    document.addEventListener('wpcf7mailsent', function (event) {
        const form = event.target;
        const submitLabel = form.querySelector('.form__submit');

        if (submitLabel) {
            submitLabel.outerHTML = '<button type="button" data-fancybox-close class="form__success-btn btn btn-primary">Applied Successfully!</button>';
        }
    });
});

