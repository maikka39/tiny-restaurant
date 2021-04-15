window.addEventListener('DOMContentLoaded', () => {
    const hamburger = document.getElementById('hamburgerbtn');
    const mobileMenu = document.getElementById('mobileMenu');

    if(hamburger == null || mobileMenu == null) {
        return;
    }

    hamburger.addEventListener('click', () => {
        mobileMenu.classList.toggle('active');
    });
});