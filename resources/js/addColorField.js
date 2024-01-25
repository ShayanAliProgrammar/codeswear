const allAddButtons = document.querySelectorAll(".addButton");

allAddButtons.forEach((button) => {
    button.addEventListener("click", (e) => {
        e.preventDefault();

        const container = button.previousSibling;
        const inputType = container.querySelector("[name]").name;
        const input = container.querySelector(`[name='${inputType}']`);

        if (input) {
            const inputClone = input.cloneNode(true);

            // Clear the value of the cloned input
            if (inputType === "color") {
                inputClone.value = "#000000"; // Default color value
            } else {
                inputClone.value = "";
            }

            // Append the cloned input to the parent container
            container.appendChild(inputClone);
        }
    });
});
