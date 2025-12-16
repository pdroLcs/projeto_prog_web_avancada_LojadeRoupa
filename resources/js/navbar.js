document.addEventListener('DOMContentLoaded', () => {
    const token = localStorage.getItem('token');
    const user = localStorage.getItem('user');

    const userMenu = document.getElementById('user-menu');
    const guestMenu = document.getElementById('guest-menu');
    const guestRegister = document.getElementById('guest-register');
    const userNameBtn = document.getElementById('user-name-btn');

    const adminLinks = document.querySelectorAll('.admin-link')
    adminLinks.forEach(el => el.classList.add('d-none'))

    if (token && user) {
        const userData = JSON.parse(user);

        userMenu?.classList.remove('d-none');
        guestMenu?.classList.add('d-none');
        guestRegister?.classList.add('d-none');

        if (userNameBtn) {
            userNameBtn.innerText = userData.nome;
        }

        if (userData.role === 'admin') {
            adminLinks.forEach(el => el.classList.remove('d-none'))
        }
    } else {
        userMenu?.classList.add('d-none');
        guestMenu?.classList.remove('d-none');
        guestRegister?.classList.remove('d-none');
        adminLinks.forEach(el => el.classList.add('d-none'))
    }
})