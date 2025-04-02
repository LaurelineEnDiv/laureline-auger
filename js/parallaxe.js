document.addEventListener("scroll", function () {
    const sphere = document.querySelector(".hero-graphic");
    const scrollY = window.scrollY;
    const speed = 0.3; // Ajuste la vitesse du parallaxe

    sphere.style.transform = `translateY(${scrollY * speed}px) translateZ(0)`;
});

