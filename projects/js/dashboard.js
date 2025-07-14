// Simple script to demonstrate interactivity
document.addEventListener('DOMContentLoaded', function () {
  // Toggle sidebar items active state
  const sidebarItems = document.querySelectorAll('.sidebar-item')
  sidebarItems.forEach((item) => {
    item.addEventListener('click', function () {
      sidebarItems.forEach((i) => i.classList.remove('active'))
      this.classList.add('active')
    })
  })

  // Simulate progress bars animation
  setTimeout(() => {
    document.querySelectorAll('.progress-fill').forEach((bar) => {
      const currentWidth = bar.style.width
      bar.style.width = '0%'
      setTimeout(() => {
        bar.style.width = currentWidth
      }, 100)
    })
  }, 500)

  // Add hover effect to buttons
  const buttons = document.querySelectorAll('.neumorphic-btn')
  buttons.forEach((btn) => {
    btn.addEventListener('mousedown', function () {
      this.style.boxShadow =
        'inset 2px 2px 5px rgba(0, 0, 0, 0.2), inset -2px -2px 5px rgba(255, 255, 255, 0.05)'
    })

    btn.addEventListener('mouseup', function () {
      this.style.boxShadow =
        '5px 5px 10px rgba(0, 0, 0, 0.2), -5px -5px 10px rgba(255, 255, 255, 0.05)'
    })

    btn.addEventListener('mouseleave', function () {
      this.style.boxShadow =
        '5px 5px 10px rgba(0, 0, 0, 0.2), -5px -5px 10px rgba(255, 255, 255, 0.05)'
    })
  })
})

// USERS MODALS
function previewPhoto(event) {
  const input = event.target
  const preview = document.getElementById('photoPreview')
  if (input.files && input.files[0]) {
    const reader = new FileReader()
    reader.onload = function (e) {
      preview.src = e.target.result
    }
    reader.readAsDataURL(input.files[0])
  } else {
    preview.src = 'assets/newphoto/default.png'
  }
}

// Show modal when Add Users button is clicked
document.querySelectorAll('button').forEach((btn) => {
  if (btn.textContent.trim() === 'Add Users') {
    btn.addEventListener('click', function () {
      toggleAddUserModal(true)
    })
  }
})

function toggleAddUserModal(show) {
  const modal = document.getElementById('addUserModal')
  if (show) {
    modal.classList.remove('hidden')
  } else {
    modal.classList.add('hidden')
  }
}

function togglePasswordVisibility() {
  const passwordInput = document.getElementById('passwordInput')
  const type = passwordInput.type === 'password' ? 'text' : 'password'
  passwordInput.type = type
}

function closeEditModal(userId) {
  document.getElementById('modalEdit' + userId).classList.add('hidden')
  // Remove id parameter from URL if present (handles both ?id= and &id=)
  const url = new URL(window.location)
  if (url.searchParams.has('id')) {
    url.searchParams.delete('id')
    window.history.replaceState({}, document.title, url.pathname + url.search)
  }
}

// Ganti semua tombol close modal edit agar pakai fungsi ini
document.querySelectorAll('[id^="modalEdit"]').forEach((modal) => {
  const userId = modal.id.replace('modalEdit', '')
  // Tombol close di pojok kanan atas
  const closeBtn = modal.querySelector('button.absolute')
  if (closeBtn) {
    closeBtn.onclick = () => closeEditModal(userId)
  }
  // Tombol cancel di bawah form
  const cancelBtn = modal.querySelector('button[type="button"].bg-gray-500')
  if (cancelBtn) {
    cancelBtn.onclick = () => closeEditModal(userId)
  }
})

// SWEETALERT
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
