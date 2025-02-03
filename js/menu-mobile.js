document.addEventListener('DOMContentLoaded', () => {
    const burgerMenu = document.querySelector('.burger-menu');
    const closeMenu = document.querySelector('.close-menu');
    const mobileMenu = document.querySelector('#mobile-menu-container');
    const menuLinks = document.querySelectorAll('.mobile-nav .mobile-menu a'); // Sélecteur des liens de menu

    // Ouvrir le menu
    burgerMenu.addEventListener('click', () => {
        mobileMenu.classList.add('active');
    });

    // Fermer le menu
    closeMenu.addEventListener('click', () => {
        mobileMenu.classList.remove('active');
    });

    // Fermer le menu lors du clic sur un lien contenant une ancre
    menuLinks.forEach(link => {
        link.addEventListener('click', (event) => {
            // Vérifie si l'URL du lien contient une ancre
            if (link.hash) {
                mobileMenu.classList.remove('active'); // Ferme le menu
            }
        });
    });
});
