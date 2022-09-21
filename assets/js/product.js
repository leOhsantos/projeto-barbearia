const form = document.getElementById("form"),
    nameInput = document.getElementById("nameInput"),
    descInput = document.getElementById("descInput"),
    imgInput = document.getElementById("imgInput"),
    textLabel = document.getElementById("textLabel"),
    imgLabel = document.getElementById("imgLabel"),
    img = document.getElementById("img"),
    nameErrorText = document.getElementsByClassName("error-text")[0],
    descErrorText = document.getElementsByClassName("error-text")[1],
    imgErrorText = document.getElementsByClassName("error-text")[2],
    submitBtn = document.getElementById("submitBtn"),
    resetBtn = document.getElementById("resetBtn"),
    deleteProductModal = document.getElementById("deleteProductModal"),
    editProductModal = document.getElementById("editProductModal");

function validateInputs() {
    if (nameInput.value === "" || descInput.value === "" || imgInput.value === "") {
        nameInput.style.cssText = "background-color: #f49c9c;" + "transition: .7s;";
        nameErrorText.style.cssText = "visibility: visible;" + "color: #e03333;" + "transition: .7s;";
        descInput.style.cssText = "background-color: #f49c9c;" + "transition: .7s;";
        descErrorText.style.cssText = "visibility: visible;" + "color: #e03333;" + "transition: .7s;";
        imgLabel.style.cssText = "background-color: #f49c9c;" + "transition: .7s;";
        imgErrorText.style.cssText = "visibility: visible;" + "color: #e03333;" + "transition: .7s;";

        if (nameInput.value !== "") {
            nameInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
            nameErrorText.style.cssText = "visibility: hidden;" + "color: rgb(218, 218, 218);" + "transition: .7s;";
        }

        if (descInput.value !== "") {
            descInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
            descErrorText.style.cssText = "visibility: hidden;" + "color: rgb(218, 218, 218);" + "transition: .7s;";
        }

        if (imgInput.value !== "") {
            imgLabel.style.cssText = "background-color: #fff;" + "transition: .7s;";
            imgErrorText.style.cssText = "visibility: hidden;" + "color: rgb(218, 218, 218);" + "transition: .7s;";
        }
    }

    if (nameInput.value !== "" && descInput.value !== "" && imgInput.value !== "") {
        alert("Produto registrado com sucesso!");
        form.submit();
    }
}

function removeInputsError() {
    if (nameInput.value !== "") {
        nameInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
        nameErrorText.style.cssText = "visibility: hidden;" + "color: rgb(218, 218, 218);" + "transition: .7s;";
    }

    if (descInput.value !== "") {
        descInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
        descErrorText.style.cssText = "visibility: hidden;" + "color: rgb(218, 218, 218);" + "transition: .7s;";
    }

    if (imgInput.value !== "") {
        imgLabel.style.cssText = "background-color: #fff;" + "transition: .7s;";
        imgErrorText.style.cssText = "visibility: hidden;" + "color: rgb(218, 218, 218);" + "transition: .7s;";
    }
}

function resetInputs() {
    nameInput.value = "";
    nameInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
    nameErrorText.style.cssText = "visibility: hidden;" + "color: rgb(218, 218, 218);" + "transition: .7s;";

    descInput.value = "";
    descInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
    descErrorText.style.cssText = "visibility: hidden;" + "color: rgb(218, 218, 218);" + "transition: .7s;";

    imgInput.value = "";
    imgLabel.style.cssText = "background-color: none;" + "transition: .7s;";
    imgErrorText.style.cssText = "visibility: hidden;" + "color: rgb(218, 218, 218);" + "transition: .7s;";
    textLabel.textContent = "Clique aqui para enviar a imagem";
    img.setAttribute("src", "");
}

if (deleteProductModal) {
    deleteProductModal.addEventListener("show.bs.modal", event => {
        const button = event.relatedTarget,
            recipient = button.getAttribute("data-bs-id"),
            deleteBtn = deleteProductModal.querySelector(".delete-btn");

        deleteBtn.addEventListener("click", () => {
            alert("Produto excluído com sucesso!");
            deleteBtn.href = "crud-product.php?productId=" + recipient;
        });
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
        const formModal = editProductModal.querySelector("#formModal"),
            nameInput = editProductModal.querySelector(".name-input"),
            descInput = editProductModal.querySelector(".desc-input"),
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

        if (nameInput.value !== "" && descInput.value !== "") {
            submitBtn.addEventListener("click", () => {
                alert("Produto editado com sucesso!");
                formModal.submit();
            });
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
nameInput.addEventListener("input", removeInputsError);
descInput.addEventListener("input", removeInputsError);
imgInput.addEventListener("input", removeInputsError);
submitBtn.addEventListener("click", validateInputs);
resetBtn.addEventListener("click", resetInputs);