document.getElementById("category").addEventListener("change", function () {
    var selectedOption = this.options[this.selectedIndex];

    Array.from(this.options).forEach(function (option) {
        option.removeAttribute("data-selected");
        option.removeAttribute("selected");
    });

    selectedOption.setAttribute("data-selected", "");
    selectedOption.setAttribute("selected", "");
});
