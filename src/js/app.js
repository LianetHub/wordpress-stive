"use strict";

document.addEventListener('DOMContentLoaded', () => {

    //  init Fancybox
    if (typeof Fancybox !== "undefined" && Fancybox !== null) {
        Fancybox.bind("[data-fancybox]", {
            dragToClose: false,
        });
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


    initMobileMenu();
    initFooterAccordion();
    initApplyButton();
    initOptionsCards();
    initIndustriesCarousel();

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

function initIndustriesCarousel() {
    const tabs = document.querySelectorAll('.industry-tab');
    const img = document.getElementById('industries-hero-img');
    const text = document.getElementById('industries-hero-text');

    if (!tabs.length || !img || !text) return;

    let currentIndex = 0;
    let intervalId = null;

    function switchTo(index) {
        const tab = tabs[index];
        const newSrc = tab.dataset.img;
        const newText = tab.dataset.text;
        const newPosition = tab.dataset.position;

        img.classList.add('fade-out');

        setTimeout(() => {
            img.src = newSrc;
            text.textContent = newText;
            img.style.objectPosition = newPosition;

            tabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');

            img.onload = () => {
                img.classList.remove('fade-out');
            };

            if (img.complete) {
                img.classList.remove('fade-out');
            }
        }, 400);

        currentIndex = index;
    }

    function nextSlide() {
        const nextIndex = (currentIndex + 1) % tabs.length;
        switchTo(nextIndex);
    }

    function startAutoplay() {
        if (intervalId) clearInterval(intervalId);
        intervalId = setInterval(nextSlide, 5000);
    }

    tabs.forEach((tab, index) => {
        tab.addEventListener('click', (e) => {
            e.preventDefault();
            switchTo(index);
            startAutoplay();
        });
    });

    const activeTab = document.querySelector('.industry-tab.active');
    if (activeTab && activeTab.dataset.position) {
        img.style.objectPosition = activeTab.dataset.position;
    }

    startAutoplay();

    const container = document.querySelector('.industries-section');
    if (container) {
        container.addEventListener('mouseenter', () => clearInterval(intervalId));
        container.addEventListener('mouseleave', startAutoplay);
    }
}



const initApp = () => {

    if (typeof $ === "undefined" || typeof Swiper === "undefined" || typeof Fancybox === "undefined") {
        return false;
    }

    //  init Fancybox
    if (typeof Fancybox !== "undefined" && Fancybox !== null) {
        Fancybox.bind("[data-fancybox]", {
            dragToClose: false,
            on: {
                "Carousel.ready": (fancyboxRef) => {
                    const slide = fancyboxRef.getSlide();
                    if (slide && (slide.triggerEl.classList.contains('case-card') || slide.triggerEl.classList.contains('clients__item')) && slide.triggerEl.dataset.type === "ajax") {
                        slide.el.classList.add("is-case-popup-slide");
                    }
                },
            },
        });
    }

    // detect user OS
    const isMobile = {
        Android: () => /Android/i.test(navigator.userAgent),
        BlackBerry: () => /BlackBerry/i.test(navigator.userAgent),
        iOS: () => /iPhone|iPad|iPod/i.test(navigator.userAgent),
        Opera: () => /Opera Mini/i.test(navigator.userAgent),
        Windows: () => /IEMobile/i.test(navigator.userAgent),
        any: function () {
            return this.Android() || this.BlackBerry() || this.iOS() || this.Opera() || this.Windows();
        },
    };

    function getNavigator() {
        if (isMobile.any() || $(window).width() < 992) {
            $('body').removeClass('_pc').addClass('_touch');
        } else {
            $('body').removeClass('_touch').addClass('_pc');
        }
    }

    getNavigator();

    $(window).on('resize', () => {
        clearTimeout(window.resizeTimer);
        window.resizeTimer = setTimeout(() => {
            getNavigator();
        }, 100);
    });

    // event handlers
    $(document).on('click', (e) => {
        const $target = $(e.target);


        // Open/close the mobile menu
        if ($target.closest('.icon-menu').length) {
            $('.icon-menu').toggleClass("active");
            $('.menu').toggleClass("menu--open");
            $('body').toggleClass('menu-lock');
        }


    });


    // sliders
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

    // Phone Input Mask Russia

    const $phoneInputs = $('input[type="tel"]');

    const getInputNumbersValue = (input) => {
        return input.value.replace(/\D/g, '');
    };

    const onPhoneInput = function (e) {
        let input = e.target,
            inputNumbersValue = getInputNumbersValue(input),
            selectionStart = input.selectionStart,
            formattedInputValue = "";

        if (!inputNumbersValue) {
            return input.value = "";
        }

        if (input.value.length != selectionStart) {
            if (e.originalEvent.data && /\D/g.test(e.originalEvent.data)) {
                input.value = inputNumbersValue;
            }
            return;
        }

        if (["7", "8", "9"].indexOf(inputNumbersValue[0]) > -1) {
            if (inputNumbersValue[0] == "9") inputNumbersValue = "7" + inputNumbersValue;
            let firstSymbols = (inputNumbersValue[0] == "8") ? "8" : "+7";
            formattedInputValue = firstSymbols + " ";

            if (inputNumbersValue.length > 1) {
                formattedInputValue += '(' + inputNumbersValue.substring(1, 4);
            }
            if (inputNumbersValue.length >= 5) {
                formattedInputValue += ') ' + inputNumbersValue.substring(4, 7);
            }
            if (inputNumbersValue.length >= 8) {
                formattedInputValue += '-' + inputNumbersValue.substring(7, 9);
            }
            if (inputNumbersValue.length >= 10) {
                formattedInputValue += '-' + inputNumbersValue.substring(9, 11);
            }
        } else {
            formattedInputValue = '+' + inputNumbersValue.substring(0, 16);
        }
        input.value = formattedInputValue;
    };

    const onPhoneKeyDown = function (e) {
        let inputValue = e.target.value.replace(/\D/g, '');
        if (e.keyCode == 8 && inputValue.length == 1) {
            e.target.value = "";
        }
    };

    const onPhonePaste = function (e) {
        let input = e.target,
            inputNumbersValue = getInputNumbersValue(input);
        let pasted = e.originalEvent.clipboardData || window.clipboardData;
        if (pasted) {
            let pastedText = pasted.getData('Text');
            if (/\D/g.test(pastedText)) {
                input.value = inputNumbersValue;
            }
        }
    };

    $phoneInputs
        .on('keydown', onPhoneKeyDown)
        .on('input', onPhoneInput)
        .on('paste', onPhonePaste);


    // custom select
    class CustomSelect {
        static openDropdown = null;
        static eventsBound = false;

        constructor(dropdownElement) {
            this.$dropdown = $(dropdownElement);
            this.$input = this.$dropdown.find('input[type="hidden"]');
            this.$button = this.$dropdown.find('.dropdown__button');
            this.$buttonText = this.$dropdown.find('.dropdown__button-text');
            this.$listItems = this.$dropdown.find('.dropdown__list-item');

            this.initialValue = this.$input.val();
            this.initialText = this.$buttonText.text();

            this.init();
        }

        init() {
            this.setupEvents();
            this.bindGlobalEvents();
            this.syncStateWithInput();
        }

        bindGlobalEvents() {
            if (CustomSelect.eventsBound) return;

            $(document).on('click.customSelectGlobal', (event) => {
                if (CustomSelect.openDropdown && !$(event.target).closest('.dropdown').length) {
                    CustomSelect.openDropdown.closeDropdown();
                }
            });

            $(document).on('keydown.customSelectGlobal', (event) => {
                if (event.key === 'Escape' && CustomSelect.openDropdown) {
                    CustomSelect.openDropdown.closeDropdown();
                }
            });

            CustomSelect.eventsBound = true;
        }

        setupEvents() {
            this.$button.on('click', (event) => {
                event.preventDefault();
                event.stopPropagation();
                const isOpen = this.$dropdown.hasClass('visible');
                this.toggleDropdown(!isOpen);
            });

            this.$dropdown.on('click', '.dropdown__list-item', (event) => {
                event.preventDefault();
                event.stopPropagation();
                const item = $(event.currentTarget);

                if (!item.hasClass('disabled')) {
                    this.selectOption(item);
                }
            });

            this.$input.closest('form').on('reset', () => {
                setTimeout(() => this.restoreInitialState(), 0);
            });
        }

        toggleDropdown(isOpen) {
            if (isOpen && CustomSelect.openDropdown && CustomSelect.openDropdown !== this) {
                CustomSelect.openDropdown.closeDropdown();
            }

            const body = this.$dropdown.find('.dropdown__body');
            const list = this.$dropdown.find('.dropdown__list');
            const hasScroll = list.length && list[0].scrollHeight > list[0].clientHeight;

            this.$dropdown.toggleClass('visible', isOpen);
            this.$button.attr('aria-expanded', isOpen);
            body.attr('aria-hidden', !isOpen);

            if (isOpen) {
                CustomSelect.openDropdown = this;
                this.$dropdown.removeClass('dropdown-top');

                const dropdownRect = body[0].getBoundingClientRect();
                const viewportHeight = window.innerHeight;

                if (dropdownRect.bottom > viewportHeight) {
                    this.$dropdown.addClass('dropdown-top');
                }
                list.toggleClass('has-scroll', hasScroll);
            } else {
                if (CustomSelect.openDropdown === this) {
                    CustomSelect.openDropdown = null;
                }
            }
        }

        closeDropdown() {
            this.toggleDropdown(false);
        }

        selectOption(item) {
            const value = item.data('value');
            const text = item.text();

            this.$listItems.removeClass('selected').attr('aria-checked', 'false');
            item.addClass('selected').attr('aria-checked', 'true');

            this.$button.addClass('selected');
            this.$buttonText.text(text);

            this.$input.val(value).trigger('change');

            this.closeDropdown();
        }

        restoreInitialState() {
            this.$input.val(this.initialValue);
            this.$buttonText.text(this.initialText);

            this.$listItems.removeClass('selected').attr('aria-checked', 'false');
            const initialItem = this.$listItems.filter((_, el) => $(el).data('value') == this.initialValue);

            if (initialItem.length) {
                initialItem.addClass('selected').attr('aria-checked', 'true');
                this.$button.addClass('selected');
            } else {
                this.$button.removeClass('selected');
            }
        }

        syncStateWithInput() {
            const currentValue = this.$input.val();
            const currentItem = this.$listItems.filter((_, el) => $(el).data('value') == currentValue);

            if (currentItem.length) {
                this.$listItems.removeClass('selected').attr('aria-checked', 'false');
                currentItem.addClass('selected').attr('aria-checked', 'true');
                this.$buttonText.text(currentItem.text());
                this.$button.addClass('selected');
            }
        }
    }

    $('.dropdown').each((index, element) => {
        new CustomSelect(element);
    });

}

const runAppInit = () => {
    if (initApp()) return;

    const checkLibs = setInterval(() => {
        if (initApp()) {
            clearInterval(checkLibs);
        }
    }, 100);

    setTimeout(() => clearInterval(checkLibs), 10000);
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', runAppInit);
} else {
    runAppInit();
}