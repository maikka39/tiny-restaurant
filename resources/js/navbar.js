document.addEventListener('DOMContentLoaded', () => {
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

    if ($navbarBurgers.length > 0) {
        $navbarBurgers.forEach( el => {
            el.addEventListener('click', () => {
                const target = el.dataset.target;
                const $target = document.getElementById(target);
                el.classList.toggle('is-active');
                $target.classList.toggle('is-active');
            });
        });
    }

    const $navDropdowns = Array.prototype.slice.call(document.querySelectorAll('.navbar-item.has-dropdown'), 0);

    if($navDropdowns.length > 0) {
        $navDropdowns.forEach( el => {
            el.addEventListener('click', () => {
                el.children[1].classList.toggle('show-dropdown');
            });
        });
    }
});