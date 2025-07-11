// Mobile menu toggle
document
  .getElementById('mobile-menu-button')
  .addEventListener('click', function () {
    const menu = document.getElementById('mobile-menu')
    menu.classList.toggle('hidden')
  })

// Smooth scrolling for navigation links
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault()

    const targetId = this.getAttribute('href')
    const targetElement = document.querySelector(targetId)

    if (targetElement) {
      window.scrollTo({
        top: targetElement.offsetTop - 80,
        behavior: 'smooth',
      })

      // Close mobile menu if open
      const mobileMenu = document.getElementById('mobile-menu')
      if (!mobileMenu.classList.contains('hidden')) {
        mobileMenu.classList.add('hidden')
      }
    }
  })
})

// Hero section 3D background
function initHeroBackground() {
  const canvas = document.getElementById('hero-canvas')
  const renderer = new THREE.WebGLRenderer({
    canvas,
    antialias: true,
    alpha: true,
  })
  renderer.setPixelRatio(window.devicePixelRatio)
  renderer.setSize(window.innerWidth, window.innerHeight)

  const scene = new THREE.Scene()
  const camera = new THREE.PerspectiveCamera(
    75,
    window.innerWidth / window.innerHeight,
    0.1,
    1000
  )
  camera.position.z = 5

  // Create particles
  const particlesGeometry = new THREE.BufferGeometry()
  const particleCount = 1000

  const posArray = new Float32Array(particleCount * 3)
  for (let i = 0; i < particleCount * 3; i++) {
    posArray[i] = (Math.random() - 0.5) * 10
  }

  particlesGeometry.setAttribute(
    'position',
    new THREE.BufferAttribute(posArray, 3)
  )

  const particlesMaterial = new THREE.PointsMaterial({
    size: 0.02,
    color: 0x8b5cf6,
    transparent: true,
    opacity: 0.8,
    blending: THREE.AdditiveBlending,
  })

  const particlesMesh = new THREE.Points(particlesGeometry, particlesMaterial)
  scene.add(particlesMesh)

  // Animation
  function animate() {
    requestAnimationFrame(animate)

    particlesMesh.rotation.x += 0.0005
    particlesMesh.rotation.y += 0.0005

    renderer.render(scene, camera)
  }

  animate()

  // Handle window resize
  window.addEventListener('resize', function () {
    camera.aspect = window.innerWidth / window.innerHeight
    camera.updateProjectionMatrix()
    renderer.setSize(window.innerWidth, window.innerHeight)
  })
}

// About section 3D element
function initAbout3D() {
  const container = document.getElementById('about-3d')
  const scene = new THREE.Scene()
  const camera = new THREE.PerspectiveCamera(
    75,
    container.clientWidth / container.clientHeight,
    0.1,
    1000
  )
  const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true })

  renderer.setSize(container.clientWidth, container.clientHeight)
  container.appendChild(renderer.domElement)

  camera.position.z = 3

  // Create a torus knot
  const geometry = new THREE.TorusKnotGeometry(0.5, 0.2, 100, 16)
  const material = new THREE.MeshStandardMaterial({
    color: 0x8b5cf6,
    metalness: 0.7,
    roughness: 0.2,
  })
  const torusKnot = new THREE.Mesh(geometry, material)
  scene.add(torusKnot)

  // Add lights
  const ambientLight = new THREE.AmbientLight(0x404040)
  scene.add(ambientLight)

  const directionalLight = new THREE.DirectionalLight(0xffffff, 0.8)
  directionalLight.position.set(1, 1, 1)
  scene.add(directionalLight)

  // Animation
  function animate() {
    requestAnimationFrame(animate)

    torusKnot.rotation.x += 0.01
    torusKnot.rotation.y += 0.01

    renderer.render(scene, camera)
  }

  animate()

  // Handle window resize
  window.addEventListener('resize', function () {
    camera.aspect = container.clientWidth / container.clientHeight
    camera.updateProjectionMatrix()
    renderer.setSize(container.clientWidth, container.clientHeight)
  })
}

// Skills section 3D visualization
function initSkills3D() {
  const container = document.getElementById('skills-3d')
  const scene = new THREE.Scene()
  const camera = new THREE.PerspectiveCamera(
    75,
    container.clientWidth / container.clientHeight,
    0.1,
    1000
  )
  const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true })

  renderer.setSize(container.clientWidth, container.clientHeight)
  container.appendChild(renderer.domElement)

  camera.position.z = 5

  // Create skill spheres
  const colors = [0x3b82f6, 0x8b5cf6, 0xec4899, 0x10b981, 0xf59e0b]
  const spheres = []

  for (let i = 0; i < 5; i++) {
    const geometry = new THREE.SphereGeometry(0.5, 32, 32)
    const material = new THREE.MeshStandardMaterial({
      color: colors[i],
      metalness: 0.5,
      roughness: 0.1,
      transparent: true,
      opacity: 0.9,
    })

    const sphere = new THREE.Mesh(geometry, material)
    sphere.position.x = (i - 2) * 1.5
    scene.add(sphere)
    spheres.push(sphere)
  }

  // Add lights
  const ambientLight = new THREE.AmbientLight(0x404040)
  scene.add(ambientLight)

  const directionalLight = new THREE.DirectionalLight(0xffffff, 0.8)
  directionalLight.position.set(1, 1, 1)
  scene.add(directionalLight)

  // Add orbit controls
  const controls = new THREE.OrbitControls(camera, renderer.domElement)
  controls.enableZoom = false
  controls.enablePan = false
  controls.autoRotate = true
  controls.autoRotateSpeed = 0.5

  // Animation
  function animate() {
    requestAnimationFrame(animate)

    controls.update()

    // Pulsing effect for spheres
    spheres.forEach((sphere, index) => {
      sphere.scale.x = 1 + Math.sin(Date.now() * 0.001 + index) * 0.1
      sphere.scale.y = 1 + Math.sin(Date.now() * 0.001 + index) * 0.1
      sphere.scale.z = 1 + Math.sin(Date.now() * 0.001 + index) * 0.1
    })

    renderer.render(scene, camera)
  }

  animate()

  // Handle window resize
  window.addEventListener('resize', function () {
    camera.aspect = container.clientWidth / container.clientHeight
    camera.updateProjectionMatrix()
    renderer.setSize(container.clientWidth, container.clientHeight)
  })
}

// Contact form 3D effect
function initContactForm3D() {
  const container = document.getElementById('contact-form-3d')
  const form = container.querySelector('form')

  form.addEventListener('mousemove', (e) => {
    const x = e.clientX / window.innerWidth
    const y = e.clientY / window.innerHeight

    form.style.transform = `perspective(1000px) rotateX(${
      (y - 0.5) * 5
    }deg) rotateY(${(x - 0.5) * -5}deg)`
    form.style.boxShadow = `${(x - 0.5) * 20}px ${
      (y - 0.5) * 20
    }px 30px rgba(0, 0, 0, 0.3)`
  })

  form.addEventListener('mouseleave', () => {
    form.style.transform = 'perspective(1000px) rotateX(0) rotateY(0)'
    form.style.boxShadow = '0 10px 25px rgba(0, 0, 0, 0.2)'
  })
}

// Initialize all 3D elements when the page loads
document.addEventListener('DOMContentLoaded', function () {
  initHeroBackground()
  initAbout3D()
  initSkills3D()
  initContactForm3D()
})
