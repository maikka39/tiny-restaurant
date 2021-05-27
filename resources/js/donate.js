window.addEventListener("load", () => {
    const input = document.getElementById("custom-amount-input");
    const radio = document.getElementById("custom-amount-radio");

    input.addEventListener("click", () => {
        radio.checked = true;
    });

    const form = document.getElementById("donate-form");

    form.addEventListener("submit", (e) => {
        e.preventDefault();

        const formData = new FormData(form);

        const formAmount = formData.get("amount");
        const formCustomAmount = formData.get("custom-amount");

        let amount = formAmount;

        if (formAmount === "custom") amount = formCustomAmount;

        if (amount === null || amount === "" || isNaN(amount)) {
            const errorElem = document.getElementById("donate-form-error");

            errorElem.innerText = "Kies een bedrag.";
            errorElem.classList.remove("hidden");

            return false;
        }

        console.log(amount);

        const formReq = document.createElement("form");
        formReq.method = "post";
        formReq.action = "/makepayment"
        formReq.classList.add("hidden");

        const formReqAmountField = document.createElement('input');
        formReqAmountField.name = "amount";
        formReqAmountField.value = amount;

        const formReqCsrfTokenField = document.createElement('input');
        formReqCsrfTokenField.name = "_token";
        formReqCsrfTokenField.value = formData.get("_token");

        formReq.appendChild(formReqAmountField);
        formReq.appendChild(formReqCsrfTokenField);
        document.body.appendChild(formReq);
        formReq.submit();

        return false;
    });
});
