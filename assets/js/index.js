const target = document.querySelectorAll("[data-anime]"),
    form = document.getElementById("form"),
    emailInput = document.getElementById("emailInput"),
    messageInput = document.getElementById("messageInput"),
    emailErrorText = document.getElementsByClassName("error-text")[0],
    messageErrorText = document.getElementsByClassName("error-text")[1],
    submitBtn = document.getElementById("submitBtn");

const activateScroll = () => {
    const windowTop = window.pageYOffset + (window.innerHeight * 0.96);

    target.forEach(e => {
        if (windowTop > e.offsetTop) {
            e.classList.add("animate");
        } else {
            e.classList.remove("animate");
        }
    })
}

const validateFields = () => {
    let emailRegex = /\S+@\S+\.\S+/,
        emailTest = emailRegex.test(emailInput.value);

    if (emailTest === false || messageInput.value === "") {
        emailInput.style.cssText = "background-color: #f49c9c;" + "transition: .7s;";
        emailErrorText.style.cssText = "visibility: visible;" + "color: #e03333;" + "transition: .7s;";
        messageInput.style.cssText = "background-color: #f49c9c;" + "transition: .7s;";
        messageErrorText.style.cssText = "visibility: visible;" + "color: #e03333;" + "transition: .7s;";

        if (emailTest === true) {
            emailInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
            emailErrorText.style.cssText = "visibility: hidden;" + "color: rgb(218, 218, 218);" + "transition: .7s;";
        }

        if (messageInput.value !== "") {
            messageInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
            messageErrorText.style.cssText = "visibility: hidden;" + "color: rgb(218, 218, 218);" + "transition: .7s;";
        }
    }

    if (emailInput.value !== "" && emailTest === true) {
        alert("Mensagem enviada com sucesso!");
        form.submit();
    }
}

const removeError = () => {
    let emailRegex = /\S+@\S+\.\S+/,
        emailTest = emailRegex.test(emailInput.value);

    if (emailTest === true) {
        emailInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
        emailErrorText.style.cssText = "visibility: hidden;" + "color: rgb(218, 218, 218);" + "transition: .7s;";
    }

    if (messageInput.value !== "") {
        messageInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
        messageErrorText.style.cssText = "visibility: hidden;" + "color: rgb(218, 218, 218);" + "transition: .7s;";
    }
}

document.addEventListener("keypress", () => {
    if (window.event.keyCode === 13) {
        submitBtn.click()
    };
})

window.addEventListener("scroll", _.debounce(activateScroll, 80));
form.addEventListener("submit", function (e) { e.preventDefault(); return false });
emailInput.addEventListener("input", removeError);
messageInput.addEventListener("input", removeError);
submitBtn.addEventListener("click", validateFields);