console.log('login.js carregado');


import { login } from "./auth";
import { clearErrors } from "./app";

document.addEventListener('DOMContentLoaded', () => {
    console.log('DOM carregado')
    const form = document.querySelector('#login-form')

    form.addEventListener('submit', async (e) => {
        e.preventDefault()
        clearErrors()
        console.log('Submit disparado');

        try {
            await login(form.email.value, form.password.value)
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
            }
        }
        
    })
})