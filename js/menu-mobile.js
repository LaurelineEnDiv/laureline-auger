document.addEventListener('DOMContentLoaded', () => {
    const burgerMenu = document.querySelector('.burger-menu');
    const closeMenu = document.querySelector('.close-menu');
    const mobileMenu = document.querySelector('#mobile-menu-container');
    const menuLinks = document.querySelectorAll('.mobile-nav .mobile-menu a'); // Liens du menu
    const menuItemsWithSubMenu = document.querySelectorAll('.mobile-menu li:has(.sub-menu)'); // Items de menu avec sous-menu

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

    // Afficher/masquer le sous-menu lors du clic sur un élément de menu mobile
    menuItemsWithSubMenu.forEach(item => {
        item.addEventListener('click', (e) => {
            // Empêcher la propagation du clic pour éviter la fermeture immédiate du menu
            e.stopPropagation();

            const subMenu = item.querySelector('.sub-menu');
            if (subMenu) {
                subMenu.classList.toggle('active'); // Toggle la classe 'active' pour afficher/masquer le sous-menu
            }
        });
    });
});
