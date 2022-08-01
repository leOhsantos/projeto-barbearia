const form = document.getElementById("form"),
    nameInput = document.getElementById("nameInput"),
    descInput = document.getElementById("descInput"),
    imgInput = document.getElementById("imgInput"),
    textLabel = document.getElementById("textLabel"),
    imgLabel = document.getElementById("imgLabel"),
    img = document.getElementById("img"),
    errorText = document.getElementById("errorText"),
    submitBtn = document.getElementById("submitBtn"),
    resetBtn = document.getElementById("resetBtn"),
    deleteProductModal = document.getElementById("deleteProductModal"),
    editProductModal = document.getElementById("editProductModal");

const validateFields = () => {
    if (nameInput.value === "" || descInput.value === "" || imgInput.value === "") {
        errorText.style.cssText = "visibility: visible;" + "color: #e03333;" + "transition: .7s;" + "text-shadow: 1px 1px 1px #000;";
        errorText.textContent = "Preencha todos os campos!";
        nameInput.style.cssText = "background-color: #f49c9c;" + "transition: .7s;";
        descInput.style.cssText = "background-color: #f49c9c;" + "transition: .7s;";
        imgLabel.style.cssText = "background-color: #f49c9c;" + "transition: .7s;";

        if (nameInput.value !== "") {
            nameInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
        }

        if (descInput.value !== "") {
            descInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
        }
    }

    if (nameInput.value !== "" && descInput.value !== "" && imgInput.value !== "") {
        form.submit();
    }
}

const removeError = () => {
    if (nameInput.value !== "" && descInput.value !== "" && imgInput.value !== "") {
        errorText.style.cssText = "visibility: hidden;";
    }

    if (nameInput.value !== "") {
        nameInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
    }

    if (descInput.value !== "") {
        descInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
    }

    if (imgInput.value !== "") {
        imgLabel.style.cssText = "background-color: #fff;" + "transition: .7s;";
    }
}

const resetFields = () => {
    nameInput.value = "";
    nameInput.style.cssText = "background-color: #fff;" + "transition: .7s;";

    descInput.value = "";
    descInput.style.cssText = "background-color: #fff;" + "transition: .7s;";

    imgInput.value = "";
    imgLabel.style.cssText = "background-color: none;" + "transition: .7s;";
    textLabel.textContent = "Clique aqui para enviar a imagem";
    img.setAttribute("src", "");

    errorText.style.cssText = "visibility: hidden;";
}

if (deleteProductModal) {
    deleteProductModal.addEventListener("show.bs.modal", event => {
        const button = event.relatedTarget,
            recipient = button.getAttribute("data-bs-id"),
            deleteBtn = deleteProductModal.querySelector(".delete-btn");

        deleteBtn.href = "crud-product.php?productId=" + recipient;
    });
}

if (editProductModal) {
    editProductModal.addEventListener("show.bs.modal", event => {
        const button = event.relatedTarget,
            recipientId = button.getAttribute("data-bs-id"),
            recipientName = button.getAttribute("data-bs-name"),
            recipientDesc = button.getAttribute("data-bs-desc"),
            idInput = editProductModal.querySelector(".id-input"),
            nameInput = editProductModal.querySelector(".name-input"),
            descInput = editProductModal.querySelector(".desc-input"),
            imgInput = editProductModal.querySelector(".product-img-input"),
            textLabel = editProductModal.querySelector(".text-label"),
            img = editProductModal.querySelector(".img"),
            submitBtn = editProductModal.querySelector(".submit-btn");

        idInput.value = recipientId;
        nameInput.value = recipientName;
        descInput.value = recipientDesc;
        nameInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
        descInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
        textLabel.textContent = "Clique aqui para enviar a imagem";
        img.setAttribute("src", "");
        submitBtn.setAttribute("type", "button");

        imgInput.addEventListener("change", e => {
            const file = e.target.files[0],
                fileReader = new FileReader();

            fileReader.readAsDataURL(file)
            fileReader.onloadend = () => {
                img.setAttribute("src", fileReader.result);
                img.style.display = "block";
                textLabel.textContent = "";
            }
        });
    });


    editProductModal.addEventListener("input", () => {
        const nameInput = editProductModal.querySelector(".name-input"),
            descInput = editProductModal.querySelector(".desc-input"),
            imgInput = editProductModal.querySelector(".product-img-input"),
            submitBtn = editProductModal.querySelector(".submit-btn");

        if (nameInput.value === "") {
            submitBtn.setAttribute("type", "button");
            nameInput.style.cssText = "background-color: #f49c9c;" + "transition: .7s;";
        } else {
            nameInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
        }

        if (descInput.value === "") {
            submitBtn.setAttribute("type", "button");
            descInput.style.cssText = "background-color: #f49c9c;" + "transition: .7s;";
        } else {
            descInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
        }

        if (imgInput.value === "") {
            submitBtn.setAttribute("type", "button");
        }

        if (nameInput.value !== "" && descInput.value !== "" && imgInput.value !== "") {
            submitBtn.setAttribute("type", "submit");
        }
    });
}

imgInput.addEventListener("change", e => {
    const file = e.target.files[0],
        fileReader = new FileReader();

    fileReader.readAsDataURL(file);
    fileReader.onloadend = () => {
        img.setAttribute("src", fileReader.result);
        img.style.display = "block";
        textLabel.textContent = "";
    }
});

document.addEventListener("keypress", () => {
    if (window.event.keyCode === 13) {
        submitBtn.click();
    }
});

form.addEventListener("submit", function (e) { e.preventDefault(); return false });
nameInput.addEventListener("input", removeError);
descInput.addEventListener("input", removeError);
imgInput.addEventListener("input", removeError);
submitBtn.addEventListener("click", validateFields);
resetBtn.addEventListener("click", resetFields);