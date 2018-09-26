var menu = (function() {
    var toggleMenuBtn = document.querySelector(".js-toggle-menu");

    toggleMenuBtn.addEventListener("click", function(e) {
        e.preventDefault();
        var header = this.closest(".header--header-wrapper");
        var toggleMenu = header.querySelector(".header--header-wrapper--menu");
        var isCollapsed = toggleMenu.getAttribute("data-collapsed") || "false";

        if (isCollapsed === "true") {
            expandSection(toggleMenu);
        } else {
            collapseSection(toggleMenu);
        }
    });

    function collapseSection(element) {
        var sectionHeight = element.scrollHeight;

        // temporarily disable all css transitions
        var elementTransition = element.style.transition;
        element.style.transition = "";

        // on the next frame (as soon as the previous style change has taken effect),
        // explicitly set the element's height to its current pixel height, so we
        // aren't transitioning out of 'auto'
        requestAnimationFrame(function() {
            element.style.height = sectionHeight + "px";
            element.style.transition = elementTransition;

            // on the next frame (as soon as the previous style change has taken effect),
            // have the element transition to height: 0
            requestAnimationFrame(function() {
                element.style.height = 0 + "px";
            });
        });

        element.setAttribute("data-collapsed", "true");
    }

    function expandSection(element) {
        var sectionHeight = element.scrollHeight;
        element.style.height = sectionHeight + "px";

        // when the next css transition finishes (which should be the one we just triggered)
        element.addEventListener("transitionend", function(e) {
            // remove this event listener so it only gets triggered once
            element.removeEventListener("transitionend", arguments.callee);
            element.style.height = null;
        });

        element.setAttribute("data-collapsed", "false");
    }
})();
