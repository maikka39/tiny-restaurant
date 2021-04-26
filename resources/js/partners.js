require("./slideshow")

window.togglePartnerPopup = (el) => {
    if (el.style.display === "block") {
        el.style.display = "none"
        document.body.classList.remove("no-scroll")
    } else {
        el.style.display = "block"
        document.body.classList.add("no-scroll")
    }
}
