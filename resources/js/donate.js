window.addEventListener("load", () => {
    let form = document.getElementById("pay-form")

    console.log(form);

    form.addEventListener("submit", (e) => {
        e.preventDefault()

        let formData = new FormData(form)

        console.log(formData.get("amount"));

        return false
    })
})