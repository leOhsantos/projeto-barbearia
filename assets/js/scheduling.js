const form = document.getElementById("form"),
    clientInput = document.getElementById("clientInput"),
    dateInput = document.getElementById("dateInput"),
    hourInput = document.getElementById("hourInput"),
    serviceInput = document.getElementById("serviceInput"),
    clientErrorText = document.getElementsByClassName("error-text")[0],
    dateErrorText = document.getElementsByClassName("error-text")[1],
    hourErrorText = document.getElementsByClassName("error-text")[2],
    serviceErrorText = document.getElementsByClassName("error-text")[3],
    submitBtn = document.getElementById("submitBtn"),
    resetBtn = document.getElementById("resetBtn"),
    deleteSchedulingModal = document.getElementById("deleteSchedulingModal"),
    editSchedulingModal = document.getElementById("editSchedulingModal");

function validateInputs() {
    if (clientInput.value == 0 || dateInput.value === "" || hourInput.value === "" || serviceInput.value == 0) {
        clientInput.style.cssText = "background-color: #f49c9c;" + "transition: .7s;";
        clientErrorText.style.cssText = "visibility: visible;" + "color: #e03333;" + "transition: .7s;";
        dateInput.style.cssText = "background-color: #f49c9c;" + "transition: .7s;";
        dateErrorText.style.cssText = "visibility: visible;" + "color: #e03333;" + "transition: .7s;";
        hourInput.style.cssText = "background-color: #f49c9c;" + "transition: .7s;";
        hourErrorText.style.cssText = "visibility: visible;" + "color: #e03333;" + "transition: .7s;";
        serviceInput.style.cssText = "background-color: #f49c9c;" + "transition: .7s;";
        serviceErrorText.style.cssText = "visibility: visible;" + "color: #e03333;" + "transition: .7s;";

        if (clientInput.value > 0) {
            clientInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
            clientErrorText.style.cssText = "visibility: hidden;" + "color: rgb(218, 218, 218);" + "transition: .7s;";
        }

        if (dateInput.value !== "") {
            dateInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
            dateErrorText.style.cssText = "visibility: hidden;" + "color: rgb(218, 218, 218);" + "transition: .7s;";
        }

        if (hourInput.value !== "") {
            hourInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
            hourErrorText.style.cssText = "visibility: hidden;" + "color: rgb(218, 218, 218);" + "transition: .7s;";
        }

        if (serviceInput.value > 0) {
            serviceInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
            serviceErrorText.style.cssText = "visibility: hidden;" + "color: rgb(218, 218, 218);" + "transition: .7s;";
        }
    }

    if (clientInput.value > 0 && dateInput.value !== "" && hourInput.value !== "" && serviceInput.value > 0) {
        alert("Agendamento registrado com sucesso!");
        form.submit();
    }
}

function removeInputsError() {
    if (clientInput.value > 0) {
        clientInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
        clientErrorText.style.cssText = "visibility: hidden;" + "color: rgb(218, 218, 218);" + "transition: .7s;";
    }

    if (dateInput.value !== "") {
        dateInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
        dateErrorText.style.cssText = "visibility: hidden;" + "color: rgb(218, 218, 218);" + "transition: .7s;";
    }

    if (hourInput.value !== "") {
        hourInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
        hourErrorText.style.cssText = "visibility: hidden;" + "color: rgb(218, 218, 218);" + "transition: .7s;";
    }

    if (serviceInput.value > 0) {
        serviceInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
        serviceErrorText.style.cssText = "visibility: hidden;" + "color: rgb(218, 218, 218);" + "transition: .7s;";
    }
}

function resetInputs() {
    clientInput.value = 0;
    clientInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
    clientErrorText.style.cssText = "visibility: hidden;" + "color: rgb(218, 218, 218);" + "transition: .7s;";

    dateInput.value = "";
    dateInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
    dateErrorText.style.cssText = "visibility: hidden;" + "color: rgb(218, 218, 218);" + "transition: .7s;";

    hourInput.value = "";
    hourInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
    hourErrorText.style.cssText = "visibility: hidden;" + "color: rgb(218, 218, 218);" + "transition: .7s;";

    serviceInput.value = 0;
    serviceInput.style.cssText = "background-color: #fff;" + "transition: .7s;";
    serviceErrorText.style.cssText = "visibility: hidden;" + "color: rgb(218, 218, 218);" + "transition: .7s;";
}

if (deleteSchedulingModal) {
    deleteSchedulingModal.addEventListener("show.bs.modal", event => {
        const button = event.relatedTarget,
            recipient = button.getAttribute("data-bs-id"),
            deleteBtn = deleteSchedulingModal.querySelector(".delete-btn");

        deleteBtn.addEventListener("click", () => {
            alert("Agendamento excluído com sucesso!");
            deleteBtn.href = "crud-scheduling.php?scheduleId=" + recipient;
        });
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
        const formModal = editSchedulingModal.querySelector("#formModal"),
            clientInput = editSchedulingModal.querySelector(".client-input"),
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
            submitBtn.addEventListener("click", () => {
                alert("Agendamento editado com sucesso!");
                formModal.submit();
            });
        }
    });
}

document.addEventListener("keypress", () => {
    if (window.event.keyCode === 13) {
        submitBtn.click();
    }
});

form.addEventListener("submit", function (e) { e.preventDefault(); return false });
clientInput.addEventListener("input", removeInputsError);
dateInput.addEventListener("input", removeInputsError);
hourInput.addEventListener("input", removeInputsError);
serviceInput.addEventListener("input", removeInputsError);
submitBtn.addEventListener("click", validateInputs);
resetBtn.addEventListener("click", resetInputs);