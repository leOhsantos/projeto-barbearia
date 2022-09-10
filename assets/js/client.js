const form = document.getElementById("form"),
    nameInput = document.getElementById("nameInput"),
    emailInput = document.getElementById("emailInput"),
    phoneInput = document.getElementById("phoneInput"),
    errorText = document.getElementById("errorText"),
    submitBtn = document.getElementById("submitBtn"),
    resetBtn = document.getElementById("resetBtn"),
    deleteClientModal = document.getElementById("deleteClientModal"),
    editClientModal = document.getElementById("editClientModal");

const validateFields = () => {
    let emailRegex = /\S+@\S+\.\S+/,
        emailTest = emailRegex.test(emailInput.value),
        phoneRegex = /^\(\d{2}\)\s\d{5}\-\d{4}/,
        phoneTest = phoneRegex.test(phoneInput.value);

    if (nameInput.value === "" || emailInput.value === "" || phoneInput.value === "") {
        errorText.style.cssText = "visibility: visible;" + "color: #e03333;" + "transition: .7s;";
        errorText.textContent = "Preencha todos os campos!";
        nameInput.style.cssText = "background-color: #f49c9c;" + "transition: .7s;";
        emailInput.style.cssText = "background-color: #f49c9c;" + "transition: .7s;";
        phoneInput.style.cssText = "background-color: #f49c9c;" + "transition: .7s;";

        if (nameInput.value !== "") {
            nameInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
        }

        if (emailInput.value !== "") {
            emailInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
        }

        if (phoneInput.value !== "") {
            phoneInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
        }
    } else if (emailTest === false || phoneTest === false) {
        errorText.style.cssText = "visibility: visible;" + "color: #e03333;" + "transition: .7s;";
        errorText.textContent = "Preencha corretamente o(s) campo(s) acima!";
        emailInput.style.cssText = "background-color: #f49c9c;" + "transition: .7s;";
        phoneInput.style.cssText = "background-color: #f49c9c;" + "transition: .7s;";

        if (emailTest === true) {
            emailInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
        }

        if (phoneTest === true) {
            phoneInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
        }
    }

    if (nameInput.value !== "" && emailTest === true && phoneTest === true) {
        form.submit();
    }
}

const removeError = () => {
    let emailRegex = /\S+@\S+\.\S+/,
        emailTest = emailRegex.test(emailInput.value);

    if (nameInput.value !== "" && emailInput.value !== "" && phoneInput.value !== "") {
        errorText.style.cssText = "visibility: hidden;";
    }

    if (nameInput.value !== "") {
        nameInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
    }

    if (emailTest === true) {
        emailInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
    }

    if (phoneInput.value !== "") {
        phoneInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
    }
}

const resetFields = () => {
    nameInput.value = "";
    nameInput.style.cssText = "background-color: #fff;" + "transition: .7s;";

    emailInput.value = "";
    emailInput.style.cssText = "background-color: #fff;" + "transition: .7s;";

    phoneInput.value = "";
    phoneInput.style.cssText = "background-color: #fff;" + "transition: .7s;";

    errorText.style.cssText = "visibility: hidden;";
}

if (deleteClientModal) {
    deleteClientModal.addEventListener("show.bs.modal", event => {
        const button = event.relatedTarget,
            recipient = button.getAttribute("data-bs-id"),
            deleteBtn = deleteClientModal.querySelector(".delete-btn");

        deleteBtn.href = "crud-client.php?clientId=" + recipient;
    })
}

if (editClientModal) {
    editClientModal.addEventListener("show.bs.modal", event => {
        const button = event.relatedTarget,
            recipientId = button.getAttribute("data-bs-id"),
            recipientName = button.getAttribute("data-bs-name"),
            recipientEmail = button.getAttribute("data-bs-email"),
            recipientPhone = button.getAttribute("data-bs-phone"),
            idInput = editClientModal.querySelector(".id-input"),
            nameInput = editClientModal.querySelector(".name-input"),
            emailInput = editClientModal.querySelector(".email-input"),
            phoneInput = editClientModal.querySelector(".phone-input");

        idInput.value = recipientId;
        nameInput.value = recipientName;
        emailInput.value = recipientEmail;
        phoneInput.value = recipientPhone;
        nameInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
        emailInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
        phoneInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
    })

    editClientModal.addEventListener("input", () => {
        const nameInput = editClientModal.querySelector(".name-input"),
            emailInput = editClientModal.querySelector(".email-input"),
            phoneInput = editClientModal.querySelector(".phone-input"),
            submitBtn = editClientModal.querySelector(".submitBtn"),
            emailRegex = /\S+@\S+\.\S+/,
            emailTest = emailRegex.test(emailInput.value),
            phoneRegex = /^\(\d{2}\)\s\d{5}\-\d{4}/,
            phoneTest = phoneRegex.test(phoneInput.value);

        if (nameInput.value === "") {
            submitBtn.setAttribute("type", "button");
            nameInput.style.cssText = "background-color: #f49c9c;" + "transition: .7s;";
        } else {
            nameInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
        }

        if (emailTest === false) {
            submitBtn.setAttribute("type", "button");
            emailInput.style.cssText = "background-color: #f49c9c;" + "transition: .7s;";
        } else {
            emailInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
        }

        if (phoneTest === false) {
            submitBtn.setAttribute("type", "button");
            phoneInput.style.cssText = "background-color: #f49c9c;" + "transition: .7s;";
        } else {
            phoneInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
        }

        if (nameInput.value !== "" && emailTest === true && phoneTest === true) {
            submitBtn.setAttribute("type", "submit");
        }
    })
}

document.addEventListener("keypress", () => {
    if (window.event.keyCode === 13) {
        submitBtn.click();
    }
});

phoneInput.addEventListener("keypress", () => {
    let phoneInputLength = phoneInput.value.length;

    if (phoneInputLength === 0) {
        phoneInput.value += "(";
    } else if (phoneInputLength === 3) {
        phoneInput.value += ") ";
    } else if (phoneInputLength === 10) {
        phoneInput.value += "-";
    }
});

form.addEventListener("submit", function (e) { e.preventDefault(); return false });
nameInput.addEventListener("input", removeError);
emailInput.addEventListener("input", removeError);
phoneInput.addEventListener("input", removeError);
submitBtn.addEventListener("click", validateFields);
resetBtn.addEventListener("click", resetFields);