const ERROR_RESET_DELAY = 3000;

export const heroWebsiteCheck = () => {
    const forms = document.querySelectorAll('.hero__form[data-ai-check-modal]');

    if (!forms.length) {
        return;
    }

    forms.forEach((form) => {
        const submitBtn = form.querySelector('.hero__form-submit');
        const urlInput = form.querySelector('[name="website_url"]');
        const modalSelector = form.dataset.aiCheckModal;
        let errorTimeout = null;

        if (!submitBtn || !urlInput || !modalSelector) {
            return;
        }

        const clearErrorTimeout = () => {
            if (errorTimeout) {
                clearTimeout(errorTimeout);
                errorTimeout = null;
            }
        };

        const resetError = () => {
            clearErrorTimeout();
            form.classList.remove('error');
            submitBtn.textContent = submitBtn.dataset.defaultText || submitBtn.textContent;
        };

        const setError = () => {
            clearErrorTimeout();
            form.classList.remove('error');
            void form.offsetWidth;
            form.classList.add('error');
            submitBtn.textContent = submitBtn.dataset.invalidUrlText || submitBtn.textContent;

            errorTimeout = setTimeout(resetError, ERROR_RESET_DELAY);
        };

        urlInput.addEventListener('input', resetError);

        form.addEventListener('submit', (event) => {
            event.preventDefault();

            const normalizedUrl = normalizeWebsiteUrl(urlInput.value);

            if (!normalizedUrl) {
                setError();
                urlInput.focus();
                return;
            }

            resetError();

            const modal = document.querySelector(modalSelector);
            const websiteField = modal?.querySelector('[name="form-website-url"]');

            if (websiteField) {
                websiteField.value = normalizedUrl;
            }

            if (typeof Fancybox === 'undefined' || Fancybox === null) {
                return;
            }

            Fancybox.show([{ src: modalSelector, type: 'inline' }], {
                dragToClose: false,
            });
        });
    });
};

function normalizeWebsiteUrl(value) {
    const trimmed = value.trim();

    if (!trimmed) {
        return '';
    }

    try {
        const url = new URL(trimmed.includes('://') ? trimmed : `https://${trimmed}`);

        if (!isValidHostname(url.hostname)) {
            return '';
        }

        return url.href;
    } catch {
        return '';
    }
}

function isValidHostname(hostname) {
    const hostPattern = /^(?:[a-z0-9](?:[a-z0-9-]{0,61}[a-z0-9])?\.)+[a-z]{2,}$/i;

    return hostPattern.test(hostname);
}
