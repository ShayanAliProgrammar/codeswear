slug = document.querySelector("[name=slug]");
nameFeild = document.querySelector("[name=name]");

if (typeof nameFeild.addEventListener === "function") {
    nameFeild.addEventListener("input", (e) => {
        slug.value = String(e.target.value).replaceAll(" ", "-").toLowerCase();
    });
}
