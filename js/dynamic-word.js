// Les mots qui doivent apparaître dynamiquement
const words = ["écolos", "optimisés SEO", "sur-mesure", "vitrine", "e-commerce"];
let currentIndex = 0;

const dynamicWord = document.querySelector(".dynamic-word");

// Fonction pour changer le mot dynamique
function changeWord() {
    dynamicWord.textContent = words[currentIndex]; // Met à jour le texte
    currentIndex = (currentIndex + 1) % words.length; // Passe au mot suivant, boucle à zéro à la fin
}

// Change le mot toutes les 1,5 secondes
setInterval(changeWord, 1500);

// Initialise avec le premier mot
changeWord();
