const menuBar = document.querySelector('#menuCheckbox');

menuBar.addEventListener('click', () => {
    const menuNav = document.querySelector('nav');

    menuNav.classList.toggle('show');
});
