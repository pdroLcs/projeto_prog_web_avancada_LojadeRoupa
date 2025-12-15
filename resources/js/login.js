console.log('login.js carregado');


import { login } from "./auth";

document.addEventListener('DOMContentLoaded', () => {
    console.log('DOM carregado')
    const form = document.querySelector('#login-form')

    form.addEventListener('submit', async (e) => {
        e.preventDefault()
        console.log('Submit disparado');

        try {
            await login(form.email.value, form.password.value)
            window.location.href = '/'    
        } catch {
            alert('Email ou senha incorretos')
        }
        
    })
})