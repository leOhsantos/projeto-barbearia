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
    deleteServiceModal = document.getElementById("deleteServiceModal"),
    editServiceModal = document.getElementById("editServiceModal");

const validateFields = () => {
    if (nameInput.value === "" || descInput.value === "" || imgInput.value === "") {
        errorText.style.cssText = "visibility: visible;" + "color: #e03333;" + "transition: .7s;";
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

if (deleteServiceModal) {
    deleteServiceModal.addEventListener("show.bs.modal", event => {
        const button = event.relatedTarget,
            recipient = button.getAttribute("data-bs-id"),
            deleteBtn = deleteServiceModal.querySelector(".delete-btn");

        deleteBtn.href = "crud-service.php?serviceId=" + recipient;
    });
}

if (editServiceModal) {
    editServiceModal.addEventListener("show.bs.modal", event => {
        const button = event.relatedTarget,
            recipientId = button.getAttribute("data-bs-id"),
            recipientName = button.getAttribute("data-bs-name"),
            recipientDesc = button.getAttribute("data-bs-desc"),
            idInput = editServiceModal.querySelector(".id-input"),
            nameInput = editServiceModal.querySelector(".name-input"),
            descInput = editServiceModal.querySelector(".desc-input"),
            imgInput = editServiceModal.querySelector(".service-img-input"),
            textLabel = editServiceModal.querySelector(".text-label"),
            img = editServiceModal.querySelector(".img"),
            submitBtn = editServiceModal.querySelector(".submit-btn");

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

            fileReader.readAsDataURL(file);
            fileReader.onloadend = () => {
                img.setAttribute("src", fileReader.result);
                img.style.display = "block";
                textLabel.textContent = "";
            }
        });
    });

    editServiceModal.addEventListener("input", () => {
        const nameInput = editServiceModal.querySelector(".name-input"),
            descInput = editServiceModal.querySelector(".desc-input"),
            submitBtn = editServiceModal.querySelector(".submit-btn");

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