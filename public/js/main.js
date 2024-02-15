//**********************************************************************
// NAVIGATION
//**********************************************************************

const header = document.querySelector('header')

// Si la position de défilement actuelle est supérieure à 0, ça veut dire que la page a été défilée vers le bas.
window.onload = () => {
  // Donner l'état 'scrolled' au menu lorsque la page est défilée.
  if (window.scrollY > 0) {
    header.classList.add('scrolled')
  }
}

window.addEventListener('scroll', () => {
  // Si la position de défilement est égale à 0, la page n'a pas été défilée donc l'état 'scrolled' est supprimée.
  if (window.scrollY > 0) {
    header.classList.add('scrolled')
  } else {
    header.classList.remove('scrolled')
  }
})


//**********************************************************************
// CARROUSEL
//**********************************************************************

const carrousel = document.querySelector('.carrousel')
const images = [
  'public/img/commentaires/commentaire_client_1.png',
  'public/img/commentaires/commentaire_client_2.png',
  'public/img/commentaires/commentaire_client_3.png',
  'public/img/commentaires/commentaire_client_4.png',
  'public/img/commentaires/commentaire_client_5.png'
]

// Variables pour le carrousel
let currentImageIndex = 0
const interval = 2000

function changeImage() {
    // Ajouter la classe "transitioning" pour activer la transition
    carrousel.classList.add('transitioning')
  
    // Mettre à jour la source de l'image
    carrousel.querySelector('img').src = images[currentImageIndex]
  
    // Passer à l'image suivante
    currentImageIndex = (currentImageIndex + 1) % images.length
  
    // Supprimer la classe "transitioning" après le délais pour activer la transition
    setTimeout(() => {
      carrousel.classList.remove('transitioning')
    }, 10)
}

// Démarrer le carrousel
setInterval(changeImage, interval)
