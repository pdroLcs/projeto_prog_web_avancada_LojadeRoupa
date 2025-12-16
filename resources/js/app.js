import './bootstrap';
import '../css/style.css';
import './login'
import './register'
import './navbar'
import { initLogout } from './logout';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    initLogout()
    
})

export function clearErrors() {
    document.querySelectorAll('[id^="error-"]').forEach(el => {
        el.innerHTML = ''
    })
}