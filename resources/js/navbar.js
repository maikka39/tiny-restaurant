const hamburger = document.getElementById('hamburgerbtn');

const mobileMenu = document.getElementById('mobileMenu');

hamburger.addEventListener('click', function(){
    mobileMenu.classList.toggle('active');
});