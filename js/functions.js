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
        toggleMobileMenuBtns[i].addEventListener("click", toggleMobileMenu);
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
        overlay.toggleOverlay();
        mobileMenu.classList.toggle("active");
    }
    function toggleSubMenu(e) {
        e.preventDefault();
        var subMenu = e.target.parentElement.querySelector(".sub-menu");
        e.target.classList.toggle("open-toggle");
        subMenu.classList.toggle("open");

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
