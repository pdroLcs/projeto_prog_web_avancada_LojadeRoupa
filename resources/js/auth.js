import { api } from "./api";

export async function register(data) {
    const response = await api.post('/register', data);

    const { token, user } = response.data.data

    localStorage.setItem('token', token)
    localStorage.setItem('user', JSON.stringify(user))

    api.defaults.headers.common['Authorization'] = `Bearer ${token}`

    return user
}

export async function login(email, password) {
    const response = await api.post('/login', {email, password});

    const { token, user } = response.data.data

    localStorage.setItem('token', token)
    localStorage.setItem('user', JSON.stringify(user))

    api.defaults.headers.common['Authorization'] = `Bearer ${token}`

    return user
}

export async function logout() {
    await api.post('/logout')
    
    localStorage.removeItem('token');
    localStorage.removeItem('user');

    delete api.defaults.headers.common['Authorization'];
}