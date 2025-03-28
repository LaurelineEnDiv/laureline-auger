document.addEventListener("DOMContentLoaded", function () {
    let heroWrapper = document.querySelector(".hero-wrapper");
    let heroTitle = document.querySelector(".hero-content h1");
    let heroSubtitle = document.querySelector(".hero-content .subtitle");

    if (heroWrapper) {
        heroWrapper.classList.add("active");
    }
    if (heroTitle) {
        heroTitle.classList.add("active"); 
    }
    if (heroSubtitle) {
        heroSubtitle.classList.add("active"); 
    }
});

// Optimisation de l'événement scroll
let isScrolling = false;
document.addEventListener("scroll", function () {
    if (!isScrolling) {
        requestAnimationFrame(function () {
            document.querySelectorAll(".reveal").forEach((section) => {
                if (section.getBoundingClientRect().top < window.innerHeight * 0.8) {
                    section.classList.add("active");
                }
            });
            isScrolling = false;
        });
        isScrolling = true;
    }
});
