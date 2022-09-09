const form = document.getElementById("form"),
    emailInput = document.getElementById("emailInput"),
    messageInput = document.getElementById("messageInput"),
    errorText = document.getElementById("errorText"),
    submitBtn = document.getElementById("submitBtn");

const validateFields = () => {
    let regex = /\S+@\S+\.\S+/,
        emailTest = regex.test(emailInput.value);

    if (emailInput.value === "" || messageInput.value === "") {
        errorText.style.cssText = "visibility: visible;" + "color: #e03333;" + "transition: .7s;";
        errorText.textContent = "Preencha todos os campos!";
        emailInput.style.cssText = "background-color: #f49c9c;" + "transition: .7s;";
        messageInput.style.cssText = "background-color: #f49c9c;" + "transition: .7s;";

        if (emailInput.value !== "") {
            emailInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
        }

        if (messageInput.value !== "") {
            messageInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
        }
    } else if (emailTest === false) {
        errorText.style.cssText = "visibility: visible;" + "color: #e03333;" + "transition: .7s;";
        errorText.textContent = "Endereço de e-mail inválido!";
        emailInput.style.cssText = "background-color: #f49c9c;" + "transition: .7s;";
    }

    if (emailInput.value !== "" && messageInput.value !== "" && emailTest === true) {
        alert('Mensagem enviada com sucesso!');
        form.submit();
    }
}

const removeError = () => {
    if (emailInput.value !== "" && messageInput.value !== "") {
        errorText.style.cssText = "visibility: hidden;";
    }

    if (emailInput.value !== "") {
        emailInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
    }

    if (messageInput.value !== "") {
        messageInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
    }
}

form.addEventListener("submit", function (e) { e.preventDefault(); return false });
emailInput.addEventListener("input", removeError);
messageInput.addEventListener("input", removeError);
submitBtn.addEventListener("click", validateFields);