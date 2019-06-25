var menu = (function() {
    var toggleMobileMenuBtns = document.querySelectorAll(".js-toggle-mobile-menu");
    var mobileMenu = document.querySelector(".js-mobile-menu");

    var subMenuBtns = document.querySelectorAll(".menu-item-has-children > a");

    for (i = 0; i < toggleMobileMenuBtns.length; i++) {
        toggleMobileMenuBtns[i].addEventListener("click", toggleMenu);
    }
    for (j = 0; j < subMenuBtns.length; j++) {
        subMenuBtns[j].addEventListener("click", toggleSubMenu);
        // If sub page is active, open and show sub menu
        if (
            subMenuBtns[j].parentElement.classList.contains("current-menu-ancestor") ||
            subMenuBtns[j].parentElement.classList.contains("current-menu-parent") ||
            subMenuBtns[j].parentElement.classList.contains("current-menu-item")
        ) {
            subMenuBtns[j].classList.add("open-toggle");
            subMenuBtns[j].parentElement.querySelector(".sub-menu").classList.add("open");
        }
    }

    function toggleMenu(e) {
        e.preventDefault();
        mobileMenu.classList.toggle("active");
    }
    function toggleSubMenu(e) {
        e.preventDefault();
        e.target.classList.toggle("open-toggle");
        e.target.parentElement.querySelector(".sub-menu").classList.toggle("open");
    }
})();
