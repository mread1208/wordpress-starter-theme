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
    var subMenuBtns = primaryMenu.querySelectorAll(".menu-item-has-children > a");

    var primaryMenuMobile = document.querySelector(".primary-menu-mobile");
    var mobileSubMenuBtns = primaryMenuMobile.querySelectorAll(".menu-item-has-children > a");

    for (i = 0; i < toggleMobileMenuBtns.length; i++) {
        toggleMobileMenuBtns[i].addEventListener("click", toggleMenu);
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
            mobileSubMenuBtns[k].classList.add("open-toggle");
            mobileSubMenuBtns[k].parentElement.querySelector(".sub-menu").classList.add("open");
        }
    }

    function toggleMenu(e) {
        e.preventDefault();
        overlay.toggleOverlay();
        mobileMenu.classList.toggle("active");
    }
    function toggleSubMenu(e) {
        e.preventDefault();
        e.target.classList.toggle("open-toggle");
        e.target.parentElement.querySelector(".sub-menu").classList.toggle("open");
    }

    return {
        toggleMenu: toggleMenu
    };
})();
