(function (window, document) {
    'use strict';

    var suppressClass = 'tgc-hotfix-suppress-auto-popups';
    var ctaSelector = 'a, button, input[type="button"], input[type="submit"]';
    var userRequestedPopup = false;

    function hasJquery() {
        return !!(window.jQuery && window.jQuery.fn);
    }

    function installSafeJqueryFallbacks() {
        if (!hasJquery()) {
            return;
        }

        var $ = window.jQuery;

        if (typeof $.fn.slick !== 'function') {
            $.fn.slick = function () {
                return this;
            };
        }

        if (typeof $.fn.magnificPopup !== 'function') {
            $.fn.magnificPopup = function () {
                return this;
            };
        }
    }

    function textLooksLikeConversionCta(element) {
        var text = [
            element.innerText || '',
            element.value || '',
            element.getAttribute('aria-label') || '',
            element.getAttribute('class') || '',
            element.getAttribute('href') || ''
        ].join(' ').toLowerCase();

        return /book|demo|apply|enroll|enquire|enquiry|inquiry|fee|contact|call|whatsapp|brochure|download|query/.test(text);
    }

    function allowUserTriggeredPopups(event) {
        var element = event.target && event.target.closest ? event.target.closest(ctaSelector) : null;

        if (element && textLooksLikeConversionCta(element)) {
            userRequestedPopup = true;
            document.body.classList.remove(suppressClass);
        }
    }

    function closeAutoPopups() {
        if (userRequestedPopup || !document.body) {
            return;
        }

        document.body.classList.add(suppressClass);
        document.body.classList.remove('modal-open');
        document.body.style.paddingRight = '';

        [
            '#hid',
            '.popup-box.new-class',
            '.modal.fade.in.pop_view',
            '.modal.pop_view.in',
            '.transparent-layer',
            '.modal-backdrop'
        ].forEach(function (selector) {
            document.querySelectorAll(selector).forEach(function (node) {
                if (node.classList) {
                    node.classList.remove('in', 'show');
                }
                node.setAttribute('aria-hidden', 'true');
            });
        });
    }

    function hardenVisibleLeadForms() {
        var phoneSelector = [
            'input[type="tel"]',
            'input[name*="phone" i]',
            'input[placeholder*="phone" i]',
            'input[placeholder*="mobile" i]'
        ].join(',');

        document.querySelectorAll(phoneSelector).forEach(function (input) {
            input.setAttribute('inputmode', 'tel');
            input.setAttribute('autocomplete', 'tel');

            if (input.offsetParent !== null) {
                input.setAttribute('required', 'required');
            }
        });

        document.querySelectorAll('input[name*="email" i], input[placeholder*="email" i], input[placeholder*="e-mail" i]').forEach(function (input) {
            if (!input.getAttribute('type') || input.getAttribute('type') === 'text') {
                input.setAttribute('type', 'email');
            }
            input.setAttribute('autocomplete', 'email');
        });

        document.querySelectorAll('input[name*="name" i], input[placeholder*="name" i]').forEach(function (input) {
            input.setAttribute('autocomplete', 'name');
        });
    }

    function tagFormsForDebugging() {
        document.querySelectorAll('form').forEach(function (form, index) {
            form.setAttribute('data-tgc-form-index', String(index));
            form.addEventListener('submit', function () {
                if (window.dataLayer) {
                    window.dataLayer.push({
                        event: 'tgc_form_submit_attempt',
                        form_index: index,
                        form_action: form.getAttribute('action') || ''
                    });
                }
            }, true);
        });
    }

    installSafeJqueryFallbacks();
    document.addEventListener('click', allowUserTriggeredPopups, true);

    if (document.body) {
        closeAutoPopups();
    }

    document.addEventListener('DOMContentLoaded', function () {
        closeAutoPopups();
        hardenVisibleLeadForms();
        tagFormsForDebugging();

        window.setTimeout(closeAutoPopups, 1200);
        window.setTimeout(hardenVisibleLeadForms, 1500);
    });
})(window, document);
