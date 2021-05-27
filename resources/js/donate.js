window.addEventListener("load", () => {
    let input = document.getElementById("custom-amount-input");
    let radio = document.getElementById("custom-amount-radio");

    input.addEventListener("click", () => {
        radio.checked = true;
    });

    let form = document.getElementById("donate-form");

    form.addEventListener("submit", (e) => {
        e.preventDefault();

        let formData = new FormData(form);

        let formAmount = formData.get("amount");
        let formCustomAmount = formData.get("custom-amount");

        let amount = formAmount;

        if (formAmount === "custom") amount = formCustomAmount;

        if (amount === null || amount === "" || isNaN(amount)) {
            let errorElem = document.getElementById("donate-form-error");

            errorElem.innerText = "Kies een bedrag.";
            errorElem.classList.remove("hidden");

            return false;
        }

        console.log(amount);

        return false;
    });
});
