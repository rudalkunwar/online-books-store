import './bootstrap';
import Alpine from 'alpinejs';
import Toastify from 'toastify-js';
import 'toastify-js/src/toastify.css';
window.Toastify = Toastify; // Make Toastify available globally

window.Alpine = Alpine;
Alpine.start ();
