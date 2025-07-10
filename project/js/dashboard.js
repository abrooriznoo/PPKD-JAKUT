function openModal(modalType, options = {}) {
  const modalOverlay = document.getElementById("modalOverlay");
  const modalContainer = document.getElementById("modalContainer");
  const modalTitle = document.getElementById("modalTitle");
  const modalContent = document.getElementById("modalContent");
  const modalAction = document.getElementById("modalAction");

  // Get the template based on modalType
  const template = document.getElementById(`${modalType}Template`);

  if (!template) {
    console.error(`Modal template ${modalType} not found`);
    return;
  }

  // Clone the template content
  const content = template.cloneNode(true);

  // Set modal content
  modalContent.innerHTML = "";
  modalContent.appendChild(content);

  // Set modal title and action button text based on options or defaults
  modalTitle.textContent = options.title || "Modal Title";
  modalAction.textContent = options.actionText || "OK";
  modalAction.textContent = options.actionText || "Confirm";

  // If this is a confirmation modal, set the message
  if (modalType === "confirmModal" && options.message) {
    document.getElementById("confirmMessage").textContent = options.message;
  }

  // Set action callback if provided
  if (options.onConfirm) {
    modalAction.onclick = function () {
      options.onConfirm();
      closeModal();
    };
  } else {
    modalAction.onclick = closeModal;
  }

  // Show modal
  modalOverlay.style.display = "flex";
  setTimeout(() => {
    modalOverlay.classList.add("modal-active");
    modalContainer.classList.add("modal-visible");
  }, 10);
}

function closeModal() {
  const modalOverlay = document.getElementById("modalOverlay");
  const modalContainer = document.getElementById("modalContainer");

  modalOverlay.classList.remove("modal-active");
  modalContainer.classList.remove("modal-visible");

  setTimeout(() => {
    modalOverlay.style.display = "none";
  }, 300);
}

// Example usage for confirmation modal
function showConfirmation() {
  openModal("confirmModal", {
    title: "Delete Order",
    message:
      "Are you sure you want to delete this order? This action cannot be undone.",
    actionText: "Delete",
    onConfirm: function () {
      alert("Order deleted!");
      // Here you would typically make an API call to delete the order
    },
  });
}

// Close modal when clicking outside of it
document.getElementById("modalOverlay").addEventListener("click", function (e) {
  if (e.target === this) {
    closeModal();
  }
});
