const swup = new Swup({
    plugins: [new SwupSlideTheme()]
});

/**
 * Slides out the menu when you press menu on mobile/small screens
 * And ensures it works after Swup transition
 */
const navSlide = () => {
    const menu = document.querySelector(".menu");
    const nav = document.querySelector(".nav__links");
    const navLinks = document.querySelectorAll(".nav__links li");

    menu.addEventListener("click", () => {
        //toggle
        nav.classList.toggle("nav--active");

        //animate
        navLinks.forEach((link, index) => {
            if (link.style.animation) {
                link.style.animation = "";
            } else {
                link.style.animation = `navLinkFade 400ms ease-out forwards ${index /
                    10 +
                    0.3}s`;
            }
        });

        for (var i = 0; i < navLinks.length; i++) {
            navLinks[i].addEventListener("click", evt => {
                if (nav.classList.contains("nav--active")) {
                    nav.classList.toggle("nav--active");
                }
                navLinks.forEach((link, index) => {
                    if (link.style.animation) {
                        link.style.animation = "";
                    }
                });
            });
        }
    });
};

/**
 * Checks if user scrolled and if so, changes the nav to w/o padding and sticky
 */
const stickyNav = () => {
    window.addEventListener("scroll", function() {
        if (window.scrollY == 0) {
            var nav = document.getElementsByClassName("nav");
            for (var i = 0; i < nav.length; i++) {
                nav[i].classList.remove("scrolling");
            }
        } else {
            var nav = document.getElementsByClassName("nav");
            for (var i = 0; i < nav.length; i++) {
                nav[i].classList.add("scrolling");
            }
        }
    });
};

/**
 * Add active and not-active classes to nav links
 */

const hoverNavEffects = () => {
    var links = document.querySelectorAll(".nav__links li a");

    for (var i = 0; i < links.length; i++) {
        links[i].classList.remove("current");
    }

    for (var i = 0; i < links.length; i++) {
        links[i].addEventListener("click", evt => {
            var target = evt.target || evt.srcElement;
            target.classList.remove("not-active", "current");
            target.classList.add("active", "current");

            for (var j = 0; j < links.length; j++) {
                if (
                    !links[j].classList.contains("current") &&
                    links[j].classList.contains("active")
                ) {
                    links[j].classList.remove("active");
                    links[j].classList.add("not-active");
                }
            }
        });
    }
};

const init = () => {
    stickyNav();
    navSlide();
    hoverNavEffects();
};

const replaceContent = () => {
    hoverNavEffects();
    navSlide();
};

init();

swup.on("contentReplaced", function() {
    init();
});