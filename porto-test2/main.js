// Basic setup
const container = document.getElementById('container')
const canvas = document.getElementById('canvas')

const scene = new THREE.Scene()
const camera = new THREE.PerspectiveCamera(
  45,
  window.innerWidth / window.innerHeight,
  0.1,
  1000
)
camera.position.z = 5

const renderer = new THREE.WebGLRenderer({ canvas, antialias: true })
renderer.setSize(window.innerWidth - 320, window.innerHeight)
renderer.setClearColor(0x222222)

window.addEventListener('resize', () => {
  renderer.setSize(window.innerWidth - 320, window.innerHeight)
  camera.aspect = (window.innerWidth - 320) / window.innerHeight
  camera.updateProjectionMatrix()
})

// Data projects
const projects = [
  {
    name: 'Project A - Website',
    img: 'images/project1.jpg',
    desc: 'Deskripsi lengkap proyek Website A yang saya buat.',
    audio: 'audio/project1.mp3',
  },
  {
    name: 'Project B - Game',
    img: 'images/project2.jpg',
    desc: 'Game keren yang saya buat dengan Three.js.',
    audio: 'audio/project2.mp3',
  },
  {
    name: 'Project C - App',
    img: 'images/project3.jpg',
    desc: 'Aplikasi mobile yang responsif dan cepat.',
    audio: 'audio/project3.mp3',
  },
  {
    name: 'Project D - Design',
    img: 'images/project4.jpg',
    desc: 'Desain UI/UX modern dan minimalis.',
    audio: 'audio/project4.mp3',
  },
  {
    name: 'Project E - API',
    img: 'images/project5.jpg',
    desc: 'Backend API dengan performa tinggi.',
    audio: 'audio/project5.mp3',
  },
  {
    name: 'Project F - AI',
    img: 'images/project6.jpeg',
    desc: 'Proyek kecerdasan buatan untuk prediksi data.',
    audio: 'audio/project6.mp3',
  },
]

// Create materials & textures
const materials = projects.map((proj) => {
  const texture = new THREE.TextureLoader().load(proj.img)
  return new THREE.MeshBasicMaterial({ map: texture })
})

// Cube geometry & mesh
const geometry = new THREE.BoxGeometry(2, 2, 2)
const cube = new THREE.Mesh(geometry, materials)
scene.add(cube)

// Raycaster & mouse vector
const raycaster = new THREE.Raycaster()
const mouse = new THREE.Vector2()

// Modal elements
const modal = document.getElementById('modal')
const modalTitle = document.getElementById('modalTitle')
const modalImg = document.getElementById('modalImg')
const modalDesc = document.getElementById('modalDesc')
const closeBtn = document.getElementById('closeBtn')

// Sidebar info elements
const infoTitle = document.getElementById('info-title')
const infoImg = document.getElementById('info-img')
const infoDesc = document.getElementById('info-desc')

// Audio
let currentAudio = null

function playAudio(src) {
  if (currentAudio) {
    currentAudio.pause()
    currentAudio.currentTime = 0
  }
  currentAudio = new Audio(src)
  currentAudio.loop = true
  currentAudio.volume = 0.3
  currentAudio.play()
}

function stopAudio() {
  if (currentAudio) {
    currentAudio.pause()
    currentAudio = null
  }
}

function updateSidebar(project) {
  infoTitle.textContent = project.name
  infoImg.src = project.img
  infoDesc.textContent = project.desc
  playAudio(project.audio)
}

function clearSidebar() {
  infoTitle.textContent = 'Hover atau klik sisi kubus'
  infoImg.src = ''
  infoDesc.textContent = ''
  stopAudio()
}

function openModal(project) {
  modalTitle.textContent = project.name
  modalImg.src = project.img
  modalDesc.textContent = project.desc
  modal.style.display = 'flex'
}

function closeModal() {
  modal.style.animation = 'fadeOut 0.3s forwards'
  setTimeout(() => {
    modal.style.display = 'none'
    modal.style.animation = ''
  }, 300)
}

closeBtn.onclick = closeModal

window.onclick = (e) => {
  if (e.target === modal) closeModal()
}

// Drag rotation with inertia
let isDragging = false
let previousMousePosition = { x: 0, y: 0 }
let velocity = { x: 0, y: 0 }
const inertiaDamping = 0.95

const highlightMaterial = new THREE.MeshBasicMaterial({ color: 0xffff00 })
let originalMaterials = [...materials]
let hoveredFaceIndex = null

function onMouseDown(event) {
  isDragging = true
  previousMousePosition.x = event.clientX
  previousMousePosition.y = event.clientY
  velocity = { x: 0, y: 0 }
}

function onMouseMove(event) {
  mouse.x = (event.clientX / (window.innerWidth - 320)) * 2 - 1
  mouse.y = -(event.clientY / window.innerHeight) * 2 + 1

  raycaster.setFromCamera(mouse, camera)
  const intersects = raycaster.intersectObject(cube)

  if (intersects.length > 0) {
    const faceIndex = Math.floor(intersects[0].faceIndex / 2)
    if (hoveredFaceIndex !== faceIndex) {
      if (hoveredFaceIndex !== null) {
        cube.material[hoveredFaceIndex] = originalMaterials[hoveredFaceIndex]
      }
      cube.material[faceIndex] = highlightMaterial
      hoveredFaceIndex = faceIndex
      updateSidebar(projects[faceIndex])
    }
  } else {
    if (hoveredFaceIndex !== null) {
      cube.material[hoveredFaceIndex] = originalMaterials[hoveredFaceIndex]
      hoveredFaceIndex = null
      clearSidebar()
    }
  }

  if (isDragging) {
    const deltaMove = {
      x: event.clientX - previousMousePosition.x,
      y: event.clientY - previousMousePosition.y,
    }

    cube.rotation.y += deltaMove.x * 0.01
    cube.rotation.x += deltaMove.y * 0.01

    velocity.x = deltaMove.x * 0.01
    velocity.y = deltaMove.y * 0.01

    previousMousePosition.x = event.clientX
    previousMousePosition.y = event.clientY
  }
}

function onMouseUp() {
  isDragging = false
}

window.addEventListener('mousedown', onMouseDown)
window.addEventListener('mousemove', onMouseMove)
window.addEventListener('mouseup', onMouseUp)

// Click modal popup with debounce drag detection
let dragThreshold = 5
let dragDistance = 0

window.addEventListener('click', (event) => {
  if (dragDistance < dragThreshold) {
    mouse.x = (event.clientX / (window.innerWidth - 320)) * 2 - 1
    mouse.y = -(event.clientY / window.innerHeight) * 2 + 1

    raycaster.setFromCamera(mouse, camera)
    const intersects = raycaster.intersectObject(cube)

    if (intersects.length > 0) {
      const faceIndex = Math.floor(intersects[0].faceIndex / 2)
      openModal(projects[faceIndex])
    }
  }
  dragDistance = 0
})

window.addEventListener('mousemove', (e) => {
  if (isDragging) {
    dragDistance += Math.abs(e.movementX) + Math.abs(e.movementY)
  }
})

// Keyboard navigation
window.addEventListener('keydown', (e) => {
  const step = 0.1
  switch (e.key) {
    case 'ArrowLeft':
      cube.rotation.y -= step
      break
    case 'ArrowRight':
      cube.rotation.y += step
      break
    case 'ArrowUp':
      cube.rotation.x -= step
      break
    case 'ArrowDown':
      cube.rotation.x += step
      break
  }
})

// Zoom camera
window.addEventListener('wheel', (e) => {
  camera.position.z += e.deltaY * 0.01
  camera.position.z = THREE.MathUtils.clamp(camera.position.z, 2, 10)
})

// Animation loop with inertia
function animate() {
  requestAnimationFrame(animate)

  if (!isDragging) {
    cube.rotation.x += velocity.y
    cube.rotation.y += velocity.x

    velocity.x *= inertiaDamping
    velocity.y *= inertiaDamping
  }

  renderer.render(scene, camera)
}
animate()

// Mode dark/light toggle
const modeToggle = document.getElementById('modeToggle')
modeToggle.onclick = () => {
  document.body.classList.toggle('dark-mode')
  if (document.body.classList.contains('dark-mode')) {
    modeToggle.textContent = 'Mode Terang'
  } else {
    modeToggle.textContent = 'Mode Gelap'
  }
}

// Panel control with dat.GUI
const gui = new dat.GUI()
const controls = {
  rotationX: 0,
  rotationY: 0,
  autoRotate: true,
  backgroundColor: '#222222',
  playAudio: () => {
    if (hoveredFaceIndex !== null) {
      playAudio(projects[hoveredFaceIndex].audio)
    }
  },
  stopAudio: () => {
    stopAudio()
  },
}

gui.add(controls, 'rotationX', 0, Math.PI * 2).onChange((v) => {
  cube.rotation.x = v
  velocity.x = 0
})
gui.add(controls, 'rotationY', 0, Math.PI * 2).onChange((v) => {
  cube.rotation.y = v
  velocity.y = 0
})
gui.add(controls, 'autoRotate').onChange((v) => {
  if (!v) {
    velocity.x = 0
    velocity.y = 0
  }
})
gui.addColor(controls, 'backgroundColor').onChange((color) => {
  renderer.setClearColor(color)
})
gui.add(controls, 'playAudio')
gui.add(controls, 'stopAudio')
