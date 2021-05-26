window.addEventListener("load", () => {
    let input = document.getElementById("custom-amount-input");
    let radio = document.getElementById("custom-amount-radio");

    input.addEventListener("click", () => {
        radio.checked = true;
    });
});
