import { logout } from "./auth";

export function initLogout() {
    const logoutBtn = document.getElementById('logout-btn')

    if (!logoutBtn) return

    logoutBtn.addEventListener('click', async () => {
        try {
            await logout()
            window.location.href = '/login'
        } catch (error) {
            console.error(error)
            alert('Erro ao fazer logout')
        }
    })
}