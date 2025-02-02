document.addEventListener("DOMContentLoaded", function () {
    const elements = document.querySelectorAll('.formation, .experience, .presentation-container, .mission, .valeurs');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add('visible');
                }, index * 200); // Décalage de 200ms entre chaque élément
            }
        });
    }, { threshold: 0.1, rootMargin: "0px 0px -50px 0px" });

    elements.forEach(el => observer.observe(el));
});

