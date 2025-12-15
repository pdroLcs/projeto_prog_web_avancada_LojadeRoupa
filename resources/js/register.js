console.log('register.js carregado')

import { register } from "./auth";

document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('#register-form')
    if (!form) return

    form.addEventListener('submit', async (e) => {
        e.preventDefault()
        console.log('submit register disparado')

        const data = {
            name: form.elements['name'].value,
            email: form.elements['email'].value,
            telefone: form.elements['telefone']?.value || null,
            password: form.elements['password'].value,
        }

        try {
            await register(data)
            window.location.href = '/'
        } catch (error) {
            if (error.response?.status === 422) {
                console.log(error.response.data.errors)
            }
            console.error(error);
            alert('Erro ao realizar o cadastro')
        }
    })
})