document.addEventListener("DOMContentLoaded", function () {
    const formations = document.querySelectorAll('.formation');
    const experiences = document.querySelectorAll('.experience');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.2 }); // Apparition dès que 20% est visible

    formations.forEach(formation => observer.observe(formation));
    experiences.forEach(experience => observer.observe(experience));
});
