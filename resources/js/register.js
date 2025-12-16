console.log('register.js carregado')

import { register } from "./auth";
import { clearErrors } from "./app";

document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('#register-form')
    if (!form) return

    form.addEventListener('submit', async (e) => {
        e.preventDefault()
        clearErrors()
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
            if (error.response?.status === 422 || error.response?.status === 401) {
                const errors = error.response.data.errors

                Object.keys(errors).forEach(field => {
                    const errorContainer = document.getElementById(`error-${field}`)
                    if (errorContainer) {
                        errors[field].forEach(message => {
                            errorContainer.innerHTML += `<li>${message}</li>`
                        })
                    }
                })
            } else {
                console.error(error);
                alert('Erro ao realizar o cadastro')
            }
        }
    })
})