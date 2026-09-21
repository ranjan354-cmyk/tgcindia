(function () {
    "use strict";

    var body = document.body;
    var header = document.querySelector("[data-site-header]");
    var menu = document.querySelector("[data-mobile-navigation]");
    var openButton = document.querySelector("[data-menu-open]");
    var closeButton = document.querySelector("[data-menu-close]");
    var lastFocusedElement = null;

    function getFocusableElements(container) {
        return Array.prototype.slice.call(container.querySelectorAll(
            'a[href], button:not([disabled]), input:not([disabled]), select:not([disabled]), textarea:not([disabled]), [tabindex]:not([tabindex="-1"])'
        )).filter(function (element) {
            return !element.hasAttribute("hidden");
        });
    }

    function openMenu() {
        if (!menu || !openButton) {
            return;
        }

        lastFocusedElement = document.activeElement;
        if (typeof menu.showModal === "function") {
            menu.showModal();
        } else {
            menu.setAttribute("open", "");
        }
        openButton.setAttribute("aria-expanded", "true");
        body.classList.add("tgc-menu-open");

        var focusable = getFocusableElements(menu);
        if (focusable.length) {
            focusable[0].focus();
        }
    }

    function closeMenu() {
        if (!menu || !openButton) {
            return;
        }

        if (typeof menu.close === "function" && menu.open) {
            menu.close();
        } else {
            menu.removeAttribute("open");
        }
        openButton.setAttribute("aria-expanded", "false");
        body.classList.remove("tgc-menu-open");

        if (lastFocusedElement && typeof lastFocusedElement.focus === "function") {
            lastFocusedElement.focus();
        }
    }

    if (openButton && menu) {
        openButton.addEventListener("click", openMenu);
        if (closeButton) {
            closeButton.addEventListener("click", closeMenu);
        }

        menu.addEventListener("cancel", function (event) {
            event.preventDefault();
            closeMenu();
        });

        menu.addEventListener("click", function (event) {
            if (event.target === menu || event.target.closest("a")) {
                closeMenu();
            }
        });

        menu.addEventListener("keydown", function (event) {
            if (event.key !== "Tab") {
                return;
            }

            var focusable = getFocusableElements(menu);
            if (!focusable.length) {
                event.preventDefault();
                return;
            }

            var first = focusable[0];
            var last = focusable[focusable.length - 1];
            if (event.shiftKey && document.activeElement === first) {
                event.preventDefault();
                last.focus();
            } else if (!event.shiftKey && document.activeElement === last) {
                event.preventDefault();
                first.focus();
            }
        });
    }

    function setHeaderState() {
        if (header) {
            header.classList.toggle("is-scrolled", window.scrollY > 12);
        }
    }

    setHeaderState();
    window.addEventListener("scroll", setHeaderState, { passive: true });

    var recaptchaPromise = null;

    function loadRecaptcha(siteKey) {
        if (window.grecaptcha) {
            return Promise.resolve(window.grecaptcha);
        }

        if (recaptchaPromise) {
            return recaptchaPromise;
        }

        recaptchaPromise = new Promise(function (resolve, reject) {
            var script = document.createElement("script");
            script.src = "https://www.google.com/recaptcha/api.js?render=" + encodeURIComponent(siteKey);
            script.async = true;
            script.defer = true;
            script.onload = function () {
                if (window.grecaptcha) {
                    resolve(window.grecaptcha);
                } else {
                    reject(new Error("reCAPTCHA did not initialise."));
                }
            };
            script.onerror = function () {
                reject(new Error("reCAPTCHA could not be loaded."));
            };
            document.head.appendChild(script);
        });

        return recaptchaPromise;
    }

    Array.prototype.forEach.call(document.querySelectorAll("[data-recaptcha-form]"), function (form) {
        var siteKey = form.getAttribute("data-recaptcha-site-key");
        var status = form.querySelector("[data-form-status]");
        var submitButton = form.querySelector("[data-submit-button]");
        var tokenField = form.querySelector("[data-recaptcha-token]");

        function warmRecaptcha() {
            if (siteKey) {
                loadRecaptcha(siteKey).catch(function () {
                    return null;
                });
            }
        }

        form.addEventListener("focusin", warmRecaptcha, { once: true });
        form.addEventListener("pointerenter", warmRecaptcha, { once: true });

        form.addEventListener("submit", function (event) {
            event.preventDefault();

            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            if (!siteKey || form.getAttribute("data-submitting") === "true") {
                if (!siteKey && status) {
                    status.textContent = "Form verification is not configured for this environment.";
                }
                return;
            }

            form.setAttribute("data-submitting", "true");
            if (submitButton) {
                submitButton.disabled = true;
                submitButton.textContent = "Verifying…";
            }
            if (status) {
                status.textContent = "";
            }

            loadRecaptcha(siteKey)
                .then(function (grecaptcha) {
                    return new Promise(function (resolve) {
                        grecaptcha.ready(resolve);
                    }).then(function () {
                        return grecaptcha.execute(siteKey, { action: "homepage_enquiry" });
                    });
                })
                .then(function (token) {
                    tokenField.value = token;
                    form.submit();
                })
                .catch(function () {
                    form.removeAttribute("data-submitting");
                    if (submitButton) {
                        submitButton.disabled = false;
                        submitButton.textContent = "Request counselling";
                    }
                    if (status) {
                        status.textContent = "Verification could not be completed. Please try again or call 1800 102 0418.";
                    }
                });
        });
    });
}());
