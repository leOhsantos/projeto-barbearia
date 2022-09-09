const form = document.getElementById("form"),
    userInput = document.getElementById("userInput"),
    passwordInput = document.getElementById("passwordInput"),
    eyeButton = document.getElementsByTagName("span")[0],
    errorText = document.getElementById("errorText"),
    submitBtn = document.getElementById("submitBtn"),
    backButton = document.getElementById("backButton"),
    previousUrl = document.referrer,
    linkValidateUserLogin = document.getElementById("linkValidateUserLogin").href;

const validateFields = () => {
    let userValue = userInput.value,
        passwordValue = passwordInput.value;

    if (userValue === "" || passwordValue === "") {
        errorText.style.cssText = "visibility: visible;" + "color: #e03333;" + "transition: .7s;";
        errorText.textContent = "Preencha todos os campos!";
        userInput.style.cssText = "background-color: #f49c9c;" + "transition: .7s;";
        passwordInput.style.cssText = "background-color: #f49c9c;" + "transition: .7s;";

        if (userValue !== "") {
            userInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
        }

        if (passwordValue !== "") {
            passwordInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
        }
    }

    if (userValue !== "" && passwordValue !== "") {
        form.submit();
    }
}

const removeError = () => {
    let userValue = userInput.value,
        passwordValue = passwordInput.value;

    if (userValue !== "" && passwordValue !== "") {
        errorText.style.cssText = "visibility: hidden;";
    }

    if (userValue !== "") {
        userInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
    }

    if (passwordValue !== "") {
        passwordInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
    }
}

const eyeClick = () => {
    if (passwordInput.type === "password") {
        passwordInput.setAttribute("type", "text");
        eyeButton.textContent = "visibility_off";
    } else {
        passwordInput.setAttribute("type", "password");
        eyeButton.textContent = "visibility";
    }
}

if (previousUrl === linkValidateUserLogin) {
    errorText.style.cssText = "visibility: visible;" + "color: #e03333;";
    errorText.textContent = "Nome de usuário ou senha incorretos!";
}

document.addEventListener("keypress", () => {
    if (window.event.keyCode === 13) {
        submitBtn.click();
    }
});

backButton.addEventListener("click", () => { window.history.back() });
submitBtn.addEventListener("click", validateFields);
userInput.addEventListener("input", removeError);
passwordInput.addEventListener("input", removeError);
eyeButton.addEventListener("click", eyeClick);