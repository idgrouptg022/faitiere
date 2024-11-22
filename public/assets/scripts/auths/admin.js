// const expand_btn = document.querySelector(".expand-btn");

// let activeIndex;

// expand_btn.addEventListener("click", () => {
//     document.body.classList.toggle("collapsed");
// });

// const current = window.location.href;

// const allLinks = document.querySelectorAll(".sidebar-links a");

// allLinks.forEach((elem) => {
//     elem.addEventListener('click', function() {
//         const hrefLinkClick = elem.href;

//         allLinks.forEach((link) => {
//             if (link.href == hrefLinkClick){
//                 link.classList.add("active");
//             } else {
//                 link.classList.remove('active');
//             }
//         });
//     })
// });

const closeModal = (element) => {
    const modalContainer = element.closest(".modal__container");
    modalContainer.style.display = "none";
}

const closeAlert = (element) => {
    const alertContainer = element.parentNode;

    alertContainer.style.display = "none";
}

