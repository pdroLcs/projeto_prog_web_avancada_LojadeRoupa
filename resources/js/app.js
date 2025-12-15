import './bootstrap';
import '../css/style.css';
import './login'
import { initLogout } from './logout';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    initLogout()
    const token = localStorage.getItem('token');
    const user = localStorage.getItem('user');

    const userMenu = document.getElementById('user-menu');
    const guestMenu = document.getElementById('guest-menu');
    const guestRegister = document.getElementById('guest-register');
    const userNameBtn = document.getElementById('user-name-btn');

    if (token && user) {
        const userData = JSON.parse(user);

        userMenu?.classList.remove('d-none');
        guestMenu?.classList.add('d-none');
        guestRegister?.classList.add('d-none');

        if (userNameBtn) {
            userNameBtn.innerText = userData.nome;
        }
    } else {
        userMenu?.classList.add('d-none');
        guestMenu?.classList.remove('d-none');
        guestRegister?.classList.remove('d-none');
    }
})