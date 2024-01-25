fileInputs = document.querySelectorAll('input[type="file"]');

fileInputs.forEach((el) => {
    const inputId = el.getAttribute("id");

    const labelForInput = document.querySelector(
        'label[for="' + inputId + '"]'
    );

    el.addEventListener("input", (e) => {
        labelForInput.innerHTML = "";
        function addImageToLabel(imageHref, file) {
            const image = document.createElement("img");
            image.src = imageHref;
            image.alt = file.name;
            image.style.maxWidth = "200px";
            image.loading = "lazy";
            image.decoding = "async";
            image.setAttribute("fetchpriority", "low");

            if (labelForInput.querySelector(`img[src="${imageHref}"]`)) return;

            labelForInput.appendChild(image);
        }
        for (let i = 0; i < e.target.files.length; i++) {
            const file = e.target.files[i];

            const reader = new FileReader();

            reader.readAsDataURL(file);

            reader.onloadend = ({ currentTarget }) => {
                const imageHref = currentTarget.result;

                addImageToLabel(imageHref, file);
            };
        }
    });
});
