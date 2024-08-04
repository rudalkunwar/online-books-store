import './bootstrap';
import Alpine from 'alpinejs';
import Toastify from 'toastify-js';
import 'toastify-js/src/toastify.css';
window.Toastify = Toastify; // Make Toastify available globally
window.Alpine = Alpine;
Alpine.start ();



const mobileMenu = document.getElementById('mobile-menu');
const toggleButton = document.getElementById('toggle-button');
const closeButton = document.getElementById('close-button');

toggleButton.addEventListener('click', () => {
    mobileMenu.classList.remove('hidden');
});

closeButton.addEventListener('click', () => {
    mobileMenu.classList.add('hidden');
});




