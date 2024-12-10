const menuBar = document.querySelector('#menuCheckbox');

menuBar.addEventListener('click', () => {
    const menuNav = document.querySelector('nav');

    menuNav.classList.toggle('show');
});

const closeMailModal = (element) => {
    const mailContainer = element.closest(".mail-container");
    mailContainer.style.display = "none";
}
