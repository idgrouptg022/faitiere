
const largeMediaQuery = window.matchMedia('(min-width: 992px)');

if (largeMediaQuery.matches) {
    window.addEventListener('scroll', () => {
        const navbar = document.querySelector('nav');
        // const header = document.querySelector('header');
        const rect = navbar.getBoundingClientRect();
        const body = document.querySelector('body');
        const rectBody = body.getBoundingClientRect();
        // const rectHeader = header.getBoundingClientRect();

        const maxScroll = window.innerHeight;
        const scrollTop = window.scrollY;

        const scrollRatio = Math.min(scrollTop / maxScroll, 1);

        if (rect.top <= 0) {
            // Le navbar est fixé en haut de la fenêtre
            navbar.style.position = 'fixed';
            navbar.style.top = '0';
            navbar.style.left = '0%';
            navbar.style.right = '0%';
            navbar.style.zIndex = '3000';
            navbar.style.borderRadius = '0px';
        } else {
            // Transition progressive pour réduire les marges left et right
            const newMargin = 10 - 10 * scrollRatio;
            navbar.style.left = `${newMargin}%`;
            navbar.style.right = `${newMargin}%`;
        }

        // console.log(rectBody.top);


        if (rectBody.top >= 0) {
            // Réinitialisation des styles lorsque le header est visible
            const newMargin2 = 10 + 10 * scrollRatio;
            navbar.style.left = `${newMargin2}%`;
            navbar.style.right = `${newMargin2}%`;
            navbar.style.position = 'absolute';
            navbar.style.top = '3%';
            navbar.style.borderRadius = '50px';
        }
    });
}

