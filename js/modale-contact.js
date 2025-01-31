document.addEventListener("DOMContentLoaded", function() {
    const contactLinks = document.querySelectorAll('.open-modale'); 
    const modal = document.getElementById("contact-modal");
    const overlay = document.getElementById("modal-overlay");
    
    // Ouvrir la modale au clic sur le lien Contact avec classe open-modale
    contactLinks.forEach(contact => {
        contact.addEventListener("click", (event) => {
            event.preventDefault();

            // Ajout de la classe "active"
            modal.classList.add("active");
            overlay.classList.add("active");
            document.body.style.overflow = 'hidden'; // Empêche le défilement en arrière-plan
        });
    });

    // Fermer la modale en cliquant sur l'overlay (zone en dehors de la modale)
    overlay.addEventListener("click", () => {
        modal.classList.remove("active");
        overlay.classList.remove("active");

        setTimeout(() => {
            document.body.style.overflow = ''; // Réactive le défilement
        }, 500); // Durée synchronisée avec la transition CSS
    });  
});

