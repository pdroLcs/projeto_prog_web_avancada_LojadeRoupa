import axios from "axios";

export const api = axios.create({
    baseURL: 'http://pano-de-fundo-api.test/api/v1',
    headers: {
        'Content-Type': 'application/json'
    }
})

const token = localStorage.getItem('token')
if (token) {
    api.defaults.headers.common['Authorization'] = `Bearer ${token}`
}