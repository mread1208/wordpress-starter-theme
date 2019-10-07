var overlay = (function() {
    var overlayElement = document.createElement("div");
    overlayElement.classList.add("mr-overlay");
    // overlayElement.addEventListener("click", toggleOverlay);

    function toggleOverlay() {
        if (document.querySelector(".mr-overlay")) {
            document.querySelector(".mr-overlay").remove();
            // menu.toggleMenu(overlayElement);
        } else {
            document.body.appendChild(overlayElement);
        }
    }

    return {
        toggleOverlay: toggleOverlay
    };
})();

var menu = (function() {
    var toggleMobileMenuBtns = document.querySelectorAll(".js-toggle-mobile-menu");
    var mobileMenu = document.querySelector(".js-mobile-menu");

    var primaryMenu = document.querySelector(".primary-menu");
    var subMenus = primaryMenu.querySelectorAll(".menu-item-has-children > ul.sub-menu");
    var subMenuBtns = primaryMenu.querySelectorAll(".menu-item-has-children > a");

    var primaryMenuMobile = document.querySelector(".primary-menu-mobile");
    var mobileSubMenus = primaryMenuMobile.querySelectorAll(
        ".menu-item-has-children > ul.sub-menu"
    );
    var mobileSubMenuBtns = primaryMenuMobile.querySelectorAll(".menu-item-has-children > a");

    for (i = 0; i < toggleMobileMenuBtns.length; i++) {
        toggleMobileMenuBtns[i].addEventListener("click", toggleMobileMenu);
    }
    // Set subMenu attributes
    for (l = 0; l < subMenus.length; l++) {
        subMenus[l].setAttribute("aria-hidden", "true");
    }
    for (m = 0; m < mobileSubMenus.length; m++) {
        mobileSubMenus[m].setAttribute("aria-hidden", "true");
    }
    for (j = 0; j < subMenuBtns.length; j++) {
        subMenuBtns[j].addEventListener("click", toggleSubMenu);
    }
    for (k = 0; k < mobileSubMenuBtns.length; k++) {
        mobileSubMenuBtns[k].addEventListener("click", toggleSubMenu);
        // If sub page is active, open and show sub menu
        if (
            mobileSubMenuBtns[k].parentElement.classList.contains("current-menu-ancestor") ||
            mobileSubMenuBtns[k].parentElement.classList.contains("current-menu-parent") ||
            mobileSubMenuBtns[k].parentElement.classList.contains("current-menu-item")
        ) {
            var subMenu = mobileSubMenuBtns[k].parentElement.querySelector(".sub-menu");

            mobileSubMenuBtns[k].classList.add("open-toggle");
            subMenu.classList.add("open");
            if (subMenu.style.maxHeight) {
                subMenu.style.maxHeight = null;
            } else {
                subMenu.style.maxHeight = subMenu.scrollHeight + "px";
            }
        }
    }

    // Hide mobile menu and overlay on resize > 600
    window.addEventListener("resize", function(e) {
        if (document.body.clientWidth >= 600 && mobileMenu.classList.contains("active")) {
            toggleMobileMenu(e);
        }
    });

    function toggleMobileMenu(e) {
        e.preventDefault();
        var ariaHidden = mobileMenu.getAttribute("aria-hidden") === "true" || false;
        overlay.toggleOverlay();
        mobileMenu.classList.toggle("active");
        mobileMenu.setAttribute("aria-hidden", !ariaHidden);
    }
    function toggleSubMenu(e) {
        e.preventDefault();
        var subMenu = e.target.parentElement.querySelector(".sub-menu");
        var expanded = e.target.getAttribute("aria-expanded") === "true" || false;
        var ariaHidden = subMenu.getAttribute("aria-hidden") === "true" || false;
        e.target.classList.toggle("open-toggle");
        e.target.setAttribute("aria-expanded", !expanded);
        subMenu.classList.toggle("open");
        subMenu.setAttribute("aria-hidden", !ariaHidden);
        console.log(expanded);

        if (subMenu.style.maxHeight) {
            subMenu.style.maxHeight = null;
        } else {
            subMenu.style.maxHeight = subMenu.scrollHeight + "px";
        }
    }

    return {
        toggleMobileMenu: toggleMobileMenu
    };
})();

var modals = (function() {
    var modalTriggers = document.querySelectorAll(".js-modal-trigger");
    var modalCloseBtns = document.querySelectorAll(".js-modal-close");

    for (i = 0; i < modalTriggers.length; i++) {
        modalTriggers[i].addEventListener("click", toggleModal);
    }
    for (j = 0; j < modalCloseBtns.length; j++) {
        modalCloseBtns[j].addEventListener("click", toggleModal);
    }

    function toggleModal(e) {
        e.preventDefault();
        var modalTarget = document.querySelector("#" + e.target.getAttribute("data-modal-trigger"));
        modalTarget.classList.toggle("active");
        if (modalTarget.classList.contains("active")) {
            // Reinit swipers if they're inside modals.
            swipers.init();
        }
        overlay.toggleOverlay();
    }
})();