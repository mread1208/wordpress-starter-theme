var menu = (function() {
    var toggleMobileMenuBtns = document.querySelectorAll(".js-toggle-mobile-menu");
    var mobileMenu = document.querySelector(".js-mobile-menu");

    for (i = 0; i < toggleMobileMenuBtns.length; i++) { 
        toggleMobileMenuBtns[i].addEventListener("click", toggleMenu);
    }

    function toggleMenu(e) {
        e.preventDefault();
        mobileMenu.classList.toggle("active");
    }
})();
