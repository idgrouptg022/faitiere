const flashContent = document.querySelector('.flash-content');
const listItems = flashContent.querySelectorAll('.flash-content-item');

// Calculer la largeur totale
let totalWidth = 0;
listItems.forEach(item => {
    totalWidth += item.offsetWidth + 20; //20px de marge pour chaque item
});


//Définition d'une vitesse de défilement (en pixels par seconde);
if (window.innerWidth >= 1024) {
    speed = 50; // for large screens
} else if (window.innerWidth >= 768) {
    speed = 50; // for medium screens
} else {
    speed = 80; // for small screens
}


//calcul de la durée totale en secondes
const duration = totalWidth / speed;

let containerWidth = totalWidth - 100


const keyframes = `
        @keyframes marquee {
            0% {
                transform: translateX(70%);
            }
            100% {
                transform: translateX(-${containerWidth}px);
            }
        }`;

const styleSheet = document.styleSheets[0];
styleSheet.insertRule(keyframes, styleSheet.cssRules.length);


flashContent.style.animationDuration = `${duration}s`;
flashContent.style.WebkitAnimationDuration = `${duration}s`; // Pour Safari et Chrome plus anciens


// Counter number
const communesNumber = document.getElementById("communes-number")
const communesFinalNumber = 117

const regionsNumber = document.getElementById("regions-number")
const regionsFinalNumber = 5

const cantonsNumber = document.getElementById("cantons-number")
const cantonsFinalNumber = 394

const prefecturesNumber = document.getElementById("prefectures-number")
const prefecturesFinalNumber = 39

const updateCompteur = (elementToBeCount, finalNumber) => {
    const rect = elementToBeCount.getBoundingClientRect();

    if (rect.top <= window.innerHeight) {
        let currentValue = parseInt(elementToBeCount.textContent)


        if (currentValue < finalNumber) {
            currentValue++
            elementToBeCount.textContent = currentValue
            setTimeout(() => updateCompteur(elementToBeCount, finalNumber), 2)
        }
    }
}

updateCompteur(communesNumber, communesFinalNumber)
updateCompteur(regionsNumber, regionsFinalNumber)
updateCompteur(cantonsNumber, cantonsFinalNumber)
updateCompteur(prefecturesNumber, prefecturesFinalNumber)

window.addEventListener('scroll', () => {
    updateCompteur(prefecturesNumber, prefecturesFinalNumber)
    updateCompteur(cantonsNumber, cantonsFinalNumber)
    updateCompteur(regionsNumber, regionsFinalNumber)
    updateCompteur(communesNumber, communesFinalNumber)

})
