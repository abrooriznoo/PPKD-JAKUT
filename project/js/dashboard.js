function openModal(modalType, options = {}) {
  const modalOverlay = document.getElementById('modalOverlay')
  const modalContainer = document.getElementById('modalContainer')
  const modalTitle = document.getElementById('modalTitle')
  const modalContent = document.getElementById('modalContent')
  const modalAction = document.getElementById('modalAction')

  // Get the template based on modalType
  const template = document.getElementById(`${modalType}Template`)

  if (!template) {
    console.error(`Modal template ${modalType} not found`)
    return
  }

  const templateName = template.getAttribute('name') || template.id

  if (!options.title) {
    // Convert templateName (e.g., "confirmModalTemplate") to a readable title
    const name = templateName.replace(/Template$/, '')
    // Split camelCase or PascalCase to words and capitalize
    const readable = name
      .replace(/([A-Z])/g, ' $1')
      .replace(/^./, (str) => str.toUpperCase())
      .trim()
    options.title = readable
  }

  // Clone the template content
  const content = template.cloneNode(true)

  // Set modal content
  modalContent.innerHTML = ''
  modalContent.appendChild(content)

  // Set modal title and action button text based on options or defaults
  modalTitle.textContent = options.title || 'Modal Title'
  // modalAction.textContent = options.actionText || "OK";
  modalAction.textContent = options.actionText || 'Confirm'

  // If this is a confirmation modal, set the message
  if (modalType === 'confirmModal' && options.message) {
    document.getElementById('confirmMessage').textContent = options.message
  }

  // Set action callback if provided
  if (options.onConfirm) {
    modalAction.onclick = function () {
      options.onConfirm()
      closeModal()
    }
  } else {
    modalAction.onclick = closeModal
  }

  // Show modal
  modalOverlay.style.display = 'flex'
  setTimeout(() => {
    modalOverlay.classList.add('modal-active')
    modalContainer.classList.add('modal-visible')
  }, 10)
}

function closeModal() {
  const modalOverlay = document.getElementById('modalOverlay')
  const modalContainer = document.getElementById('modalContainer')

  modalOverlay.classList.remove('modal-active')
  modalContainer.classList.remove('modal-visible')

  setTimeout(() => {
    modalOverlay.style.display = 'none'
  }, 300)
}

// Example usage for confirmation modal
function showConfirmation() {
  openModal('confirmModal', {
    title: 'Delete Order',
    message:
      'Are you sure you want to delete this order? This action cannot be undone.',
    actionText: 'Delete',
    onConfirm: function () {
      alert('Order deleted!')
      // Here you would typically make an API call to delete the order
    },
  })
}

// Close modal when clicking outside of it
document.getElementById('modalOverlay').addEventListener('click', function (e) {
  if (e.target === this) {
    closeModal()
  }
})

document.addEventListener('DOMContentLoaded', function () {
  const params = new URLSearchParams(window.location.search)
  if (params.get('register') === 'success') {
    Swal.fire({
      title: 'Berhasil!',
      text: 'Akun Anda berhasil didaftarkan.',
      icon: 'success',
      confirmButtonText: 'OK',
      timer: 3000,
      timerProgressBar: true,
    }).then(() => {
      params.delete('register')
      const newUrl =
        window.location.pathname +
        (params.toString() ? '?' + params.toString() : '') +
        window.location.hash
      window.history.replaceState({}, '', newUrl)
    })
  } else if (params.get('update') === 'success') {
    Swal.fire({
      title: 'Berhasil!',
      text: 'Data Anda berhasil diperbarui.',
      icon: 'success',
      confirmButtonText: 'OK',
      timer: 3000,
      timerProgressBar: true,
    }).then(() => {
      params.delete('update')
      const newUrl =
        window.location.pathname +
        (params.toString() ? '?' + params.toString() : '') +
        window.location.hash
      window.history.replaceState({}, '', newUrl)
    })
  } else if (params.get('del') === 'success') {
    Swal.fire({
      title: 'Berhasil!',
      text: 'Data Anda berhasil dihapus.',
      icon: 'success',
      confirmButtonText: 'OK',
      timer: 3000,
      timerProgressBar: true,
    }).then(() => {
      params.delete('del')
      const newUrl =
        window.location.pathname +
        (params.toString() ? '?' + params.toString() : '') +
        window.location.hash
      window.history.replaceState({}, '', newUrl)
    })
  }
})

document.addEventListener('DOMContentLoaded', function () {
  const params = new URLSearchParams(window.location.search)
  if (params.get('login') === 'success') {
    Swal.fire({
      title: 'Selamat Datang!',
      text: 'Anda berhasil masuk ke akun Anda.',
      icon: 'success',
      confirmButtonText: 'OK',
      timer: 3000,
      timerProgressBar: true,
    }).then(() => {
      params.delete('login')
      const newUrl =
        window.location.pathname +
        (params.toString() ? '?' + params.toString() : '') +
        window.location.hash
      window.history.replaceState({}, '', newUrl)
    })
  } else if (params.get('login') === 'error') {
    Swal.fire({
      title: 'Login Error!',
      text: 'Email atau password salah.',
      icon: 'error',
      confirmButtonText: 'OK',
      timer: 3000,
      timerProgressBar: true,
    }).then(() => {
      params.delete('login')
      const newUrl =
        window.location.pathname +
        (params.toString() ? '?' + params.toString() : '') +
        window.location.hash
      window.history.replaceState({}, '', newUrl)
    })
  }
})
