const form = document.getElementById("form"),
    userInput = document.getElementById("userInput"),
    passwordInput = document.getElementById("passwordInput"),
    eyeButton = document.getElementsByTagName("span")[0],
    userErrorText = document.getElementsByClassName("error-text")[0],
    passwordErrorText = document.getElementsByClassName("error-text")[1],
    loginErrorText = document.getElementsByClassName("error-text")[2],
    submitBtn = document.getElementById("submitBtn"),
    backButton = document.getElementById("backButton"),
    previousUrl = document.referrer,
    linkValidateUserLogin = document.getElementById("linkValidateUserLogin").href;

function validateInputs() {
    const userValue = userInput.value,
        passwordValue = passwordInput.value;

    if (userValue === "" || passwordValue === "") {
        userInput.style.cssText = "background-color: #f49c9c;" + "transition: .7s;";
        userErrorText.style.cssText = "visibility: visible;" + "color: #e03333;" + "transition: .7s;";
        passwordInput.style.cssText = "background-color: #f49c9c;" + "transition: .7s;";
        passwordErrorText.style.cssText = "visibility: visible;" + "color: #e03333;" + "transition: .7s;";

        if (userValue !== "") {
            userInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
            userErrorText.style.cssText = "visibility: hidden;" + "color: rgb(218, 218, 218);" + "transition: .7s;";
        }

        if (passwordValue !== "") {
            passwordInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
            passwordErrorText.style.cssText = "visibility: hidden;" + "color: rgb(218, 218, 218);" + "transition: .7s;";
        }
    }

    if (userValue !== "" && passwordValue !== "") {
        form.submit();
    }
}

function removeInputsError() {
    const userValue = userInput.value,
        passwordValue = passwordInput.value;

    if (userValue !== "") {
        userInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
        userErrorText.style.cssText = "visibility: hidden;" + "color: rgb(218, 218, 218);" + "transition: .7s;";
    }

    if (passwordValue !== "") {
        passwordInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
        passwordErrorText.style.cssText = "visibility: hidden;" + "color: rgb(218, 218, 218);" + "transition: .7s;";
    }
}

function eyeClick() {
    if (passwordInput.type === "password") {
        passwordInput.setAttribute("type", "text");
        eyeButton.textContent = "visibility_off";
    } else {
        passwordInput.setAttribute("type", "password");
        eyeButton.textContent = "visibility";
    }
}

if (previousUrl === linkValidateUserLogin) {
    loginErrorText.style.cssText = "visibility: visible;" + "color: #e03333;" + "transition: .7s;";
}

document.addEventListener("keypress", () => {
    if (window.event.keyCode === 13) {
        submitBtn.click();
    }
});

backButton.addEventListener("click", () => { window.history.back() });
submitBtn.addEventListener("click", validateInputs);
userInput.addEventListener("input", removeInputsError);
passwordInput.addEventListener("input", removeInputsError);
eyeButton.addEventListener("click", eyeClick);