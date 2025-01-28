// Liste des mots dynamiques
const words = ["Écolos", "Optimisés SEO", "Sur-mesure", "Vitrine", "E-commerce"];
let currentIndex = 0;

const dynamicWord = document.querySelector(".dynamic-word");

// Fonction pour changer les mots dynamiques
function changeWord() {
    // Supprime la classe active pour démarrer la transition de disparition
    dynamicWord.classList.remove("active");

    // Attends la fin de la transition (0.5s ici) avant de changer le mot
    setTimeout(() => {
        dynamicWord.textContent = words[currentIndex]; // Change le texte
        dynamicWord.classList.add("active"); // Réactive pour la transition d'apparition
        currentIndex = (currentIndex + 1) % words.length; // Passe au mot suivant
    }, 500); // Le délai doit correspondre à la durée du `transition` CSS
}

// Change le mot toutes les 2 secondes
setInterval(changeWord, 2000);

// Initialise avec le premier mot
changeWord();
