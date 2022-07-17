const deleteMessageModal = document.getElementById("deleteMessageModal")

if (deleteMessageModal) {
    deleteMessageModal.addEventListener("show.bs.modal", event => {
        const button = event.relatedTarget,
            recipient = button.getAttribute("data-bs-id"),
            deleteBtn = deleteMessageModal.querySelector(".delete-btn")

        deleteBtn.href = "crud-message.php?messageId=" + recipient
    })
}