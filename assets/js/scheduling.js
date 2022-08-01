const form = document.getElementById("form"),
    clientInput = document.getElementById("clientInput"),
    dateInput = document.getElementById("dateInput"),
    hourInput = document.getElementById("hourInput"),
    serviceInput = document.getElementById("serviceInput"),
    errorText = document.getElementById("errorText"),
    submitBtn = document.getElementById("submitBtn"),
    resetBtn = document.getElementById("resetBtn"),
    deleteSchedulingModal = document.getElementById("deleteSchedulingModal"),
    editSchedulingModal = document.getElementById("editSchedulingModal");

const validateFields = () => {
    if (clientInput.value == 0 || dateInput.value === "" || hourInput.value === "" || serviceInput.value == 0) {
        errorText.style.cssText = "visibility: visible;" + "color: #e03333;" + "transition: .7s;" + "text-shadow: 1px 1px 1px #000;";
        errorText.textContent = "Preencha todos os campos!";
        clientInput.style.cssText = "background-color: #f49c9c;" + "transition: .7s;";
        dateInput.style.cssText = "background-color: #f49c9c;" + "transition: .7s;";
        hourInput.style.cssText = "background-color: #f49c9c;" + "transition: .7s;";
        serviceInput.style.cssText = "background-color: #f49c9c;" + "transition: .7s;";

        if (clientInput.value > 0) {
            clientInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
        }

        if (dateInput.value !== "") {
            dateInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
        }

        if (hourInput.value !== "") {
            hourInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
        }

        if (serviceInput.value > 0) {
            serviceInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
        }
    }

    if (clientInput.value > 0 && dateInput.value !== "" && hourInput.value !== "" && serviceInput.value > 0) {
        form.submit();
    }
}

const removeError = () => {
    if (clientInput.value > 0 && dateInput.value !== "" && hourInput.value !== "" && serviceInput.value > 0) {
        errorText.style.cssText = "visibility: hidden;";
    }

    if (clientInput.value > 0) {
        clientInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
    }

    if (dateInput.value !== "") {
        dateInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
    }

    if (hourInput.value !== "") {
        hourInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
    }

    if (serviceInput.value > 0) {
        serviceInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
    }
}

const resetFields = () => {
    clientInput.value = 0;
    clientInput.style.cssText = "background-color: #fff;" + "transition: .7s;";

    dateInput.value = "";
    dateInput.style.cssText = "background-color: #fff;" + "transition: .7s;";

    hourInput.value = "";
    hourInput.style.cssText = "background-color: #fff;" + "transition: .7s;";

    serviceInput.value = 0;
    serviceInput.style.cssText = "background-color: #cecccc;" + "transition: .7s;";
    
    errorText.style.cssText = "visibility: hidden;";
}

if (deleteSchedulingModal) {
    deleteSchedulingModal.addEventListener("show.bs.modal", event => {
        const button = event.relatedTarget,
            recipient = button.getAttribute("data-bs-id"),
            deleteBtn = deleteSchedulingModal.querySelector(".delete-btn");

        deleteBtn.href = "crud-scheduling.php?scheduleId=" + recipient;
    });
}

if (editSchedulingModal) {
    editSchedulingModal.addEventListener("show.bs.modal", event => {
        const button = event.relatedTarget,
            recipientId = button.getAttribute("data-bs-id"),
            recipientClient = button.getAttribute("data-bs-client"),
            recipientService = button.getAttribute("data-bs-service"),
            idInput = editSchedulingModal.querySelector(".id-input"),
            clientInput = editSchedulingModal.querySelector(".client-input"),
            dateInput = editSchedulingModal.querySelector(".date-input"),
            hourInput = editSchedulingModal.querySelector(".hour-input"),
            serviceInput = editSchedulingModal.querySelector(".service-input");
            
        idInput.value = recipientId;
        clientInput.value = recipientClient;
        serviceInput.value = recipientService;
        dateInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
        hourInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
    });

    editSchedulingModal.addEventListener("input", () => {
        const clientInput = editSchedulingModal.querySelector(".client-input"),
            dateInput = editSchedulingModal.querySelector(".date-input"),
            hourInput = editSchedulingModal.querySelector(".hour-input"),
            serviceInput = editSchedulingModal.querySelector(".service-input"),
            submitBtn = editSchedulingModal.querySelector(".submitBtn");

            if (clientInput.value == 0) {
                submitBtn.setAttribute("type", "button");
            }

            if (dateInput.value === "") {
                submitBtn.setAttribute("type", "button");
            }

            if (hourInput.value === "") {
                submitBtn.setAttribute("type", "button");
            }

            if (serviceInput.value == 0) {
                submitBtn.setAttribute("type", "button");
            }

        if (clientInput.value > 0 && dateInput.value !== "" && hourInput.value !== "" && serviceInput.value > 0) {
            submitBtn.setAttribute("type", "submit");
        }
    });
}

document.addEventListener("keypress", () => {
    if (window.event.keyCode === 13) {
        submitBtn.click();
    }
});

form.addEventListener("submit", function (e) { e.preventDefault(); return false });
clientInput.addEventListener("input", removeError);
dateInput.addEventListener("input", removeError);
hourInput.addEventListener("input", removeError);
serviceInput.addEventListener("input", removeError);
submitBtn.addEventListener("click", validateFields);
resetBtn.addEventListener("click", resetFields);