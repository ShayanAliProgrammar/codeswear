document.querySelectorAll("[data-hs-remove-element]").forEach((el) => {
    el.addEventListener("click", () => {
        const toast = document.getElementById(
            String(el.getAttribute("data-hs-remove-element")).replace("#", "")
        );
        if (typeof toast !== "undefined" && typeof toast !== "null") {
            toast?.remove();
        }
    });
});
