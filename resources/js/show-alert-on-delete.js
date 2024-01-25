const allDeleteButtons = document.querySelectorAll(
    "button[data-delete-button]"
);

allDeleteButtons.forEach((el) => {
    el.addEventListener("click", (e) => {
        if (!confirm("Are you sure you want to delete that record?")) return;

        const formToSubmit = document.querySelector(
            el.getAttribute("data-target-form")
        );

        formToSubmit.submit();
    });
});
