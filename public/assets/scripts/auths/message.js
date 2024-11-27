const messageContent = document.querySelector("#message-content");

const openMessage = async (element) => {
    const url = await element.dataset.url;

    await axios.get(url).then(response => {

        const activetabLinks = document.querySelectorAll('.tab-link.active');

        activetabLinks.forEach(tabLink => tabLink.classList.remove("active"))

        messageContent.innerHTML = response.data.message

        element.classList.toggle("active")

        element.querySelector('.state').classList.remove("not_viewed");

        element.querySelector('.state').textContent = "lu";

    }).catch(error => console.log(error))
}
