<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Λ . Я | Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.132.2/build/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.132.2/examples/js/controls/OrbitControls.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.132.2/examples/js/loaders/GLTFLoader.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">

</head>

<body class="bg-gray-900 text-gray-100 font-sans overflow-x-hidden">
    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-gray-900 bg-opacity-90 backdrop-filter backdrop-blur-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <span class="text-2xl font-bold gradient-text">Λ . Я | Portfolio</span>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="#home" class="nav-link px-3 py-2 rounded-md text-sm font-medium">Home</a>
                        <a href="#about" class="nav-link px-3 py-2 rounded-md text-sm font-medium">About</a>
                        <a href="#skills" class="nav-link px-3 py-2 rounded-md text-sm font-medium">Skills</a>
                        <a href="#projects" class="nav-link px-3 py-2 rounded-md text-sm font-medium">Projects</a>
                        <a href="#contact" class="nav-link px-3 py-2 rounded-md text-sm font-medium">Contact</a>
                    </div>
                </div>
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-300 hover:text-white focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-gray-800">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="#home" class="block px-3 py-2 rounded-md text-base font-medium">Home</a>
                <a href="#about" class="block px-3 py-2 rounded-md text-base font-medium">About</a>
                <a href="#skills" class="block px-3 py-2 rounded-md text-base font-medium">Skills</a>
                <a href="#projects" class="block px-3 py-2 rounded-md text-base font-medium">Projects</a>
                <a href="#contact" class="block px-3 py-2 rounded-md text-base font-medium">Contact</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section with 3D Background -->
    <section id="home" class="relative h-screen flex items-center justify-center overflow-hidden">
        <canvas id="hero-canvas"></canvas>
        <div class="text-center px-4 z-10">
            <h1 class="text-5xl md:text-7xl font-bold mb-6">
                <span class="gradient-text">Hi, I'm</span>
                <span class="text-white">Abroor Rizky</span>
            </h1>
            <h2 class="text-2xl md:text-3xl font-semibold mb-8 text-gray-300">Creative Fullstack Developer & Designer
            </h2>
            <div class="flex justify-center space-x-4">
                <a href="#projects"
                    class="px-8 py-3 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full font-medium hover:opacity-90 transition duration-300">
                    View My Work
                </a>
                <a href="#contact"
                    class="px-8 py-3 border-2 border-purple-500 rounded-full font-medium hover:bg-purple-900 hover:bg-opacity-30 transition duration-300">
                    Contact Me
                </a>
            </div>
        </div>
        <div class="absolute bottom-10 left-0 right-0 flex justify-center">
            <a href="#about" class="animate-bounce">
                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </a>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-4">About <span class="gradient-text">Me</span></h2>
            <div class="w-20 h-1 bg-gradient-to-r from-blue-500 to-purple-600 mx-auto"></div>
        </div>

        <div class="flex flex-col lg:flex-row items-center gap-12">
            <div class="lg:w-1/2 relative">
                <div
                    class="w-64 h-64 md:w-80 md:h-80 rounded-full overflow-hidden border-4 border-purple-500 mx-auto lg:mx-0">
                    <img src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=880&q=80"
                        alt="Profile" class="w-full h-full object-cover">
                </div>
                <div id="about-3d" class="absolute -bottom-10 -right-10 w-32 h-32 z-10"></div>
            </div>

            <div class="lg:w-1/2 mt-10 lg:mt-0">
                <h3 class="text-2xl font-semibold mb-4">Who am I?</h3>
                <p class="text-gray-300 mb-6 leading-relaxed">
                    I'm a passionate full-stack developer with expertise in creating interactive and visually stunning
                    web applications.
                    With over 5 years of experience, I specialize in JavaScript frameworks and modern web technologies.
                </p>

                <div class="grid grid-cols-2 gap-4 mb-8">
                    <div class="flex items-center">
                        <span class="text-purple-500 mr-2"><i class="fas fa-user-tie"></i></span>
                        <span><strong>Name:</strong> Alex Johnson</span>
                    </div>
                    <div class="flex items-center">
                        <span class="text-purple-500 mr-2"><i class="fas fa-envelope"></i></span>
                        <span><strong>Email:</strong> alex@example.com</span>
                    </div>
                    <div class="flex items-center">
                        <span class="text-purple-500 mr-2"><i class="fas fa-map-marker-alt"></i></span>
                        <span><strong>Location:</strong> San Francisco, CA</span>
                    </div>
                    <div class="flex items-center">
                        <span class="text-purple-500 mr-2"><i class="fas fa-graduation-cap"></i></span>
                        <span><strong>Education:</strong> Computer Science</span>
                    </div>
                </div>

                <div class="flex space-x-4">
                    <a href="#"
                        class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-purple-600 transition duration-300">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-blue-600 transition duration-300">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-blue-400 transition duration-300">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-pink-600 transition duration-300">
                        <i class="fab fa-dribbble"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section with 3D Visualization -->
    <section id="skills" class="py-20 bg-gray-800 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">My <span class="gradient-text">Skills</span></h2>
                <div class="w-20 h-1 bg-gradient-to-r from-blue-500 to-purple-600 mx-auto"></div>
            </div>

            <div class="flex flex-col lg:flex-row gap-12 items-center">
                <div class="lg:w-1/2">
                    <div id="skills-3d" class="w-full h-96"></div>
                </div>

                <div class="lg:w-1/2">
                    <h3 class="text-2xl font-semibold mb-6">Technologies I Work With</h3>

                    <div class="mb-8">
                        <div class="flex justify-between mb-2">
                            <span class="font-medium">JavaScript/TypeScript</span>
                            <span>95%</span>
                        </div>
                        <div class="w-full bg-gray-700 rounded-full h-2.5">
                            <div class="bg-gradient-to-r from-blue-500 to-purple-600 h-2.5 rounded-full"
                                style="width: 95%"></div>
                        </div>
                    </div>

                    <div class="mb-8">
                        <div class="flex justify-between mb-2">
                            <span class="font-medium">React/Next.js</span>
                            <span>90%</span>
                        </div>
                        <div class="w-full bg-gray-700 rounded-full h-2.5">
                            <div class="bg-gradient-to-r from-blue-500 to-purple-600 h-2.5 rounded-full"
                                style="width: 90%"></div>
                        </div>
                    </div>

                    <div class="mb-8">
                        <div class="flex justify-between mb-2">
                            <span class="font-medium">Node.js/Express</span>
                            <span>85%</span>
                        </div>
                        <div class="w-full bg-gray-700 rounded-full h-2.5">
                            <div class="bg-gradient-to-r from-blue-500 to-purple-600 h-2.5 rounded-full"
                                style="width: 85%"></div>
                        </div>
                    </div>

                    <div class="mb-8">
                        <div class="flex justify-between mb-2">
                            <span class="font-medium">Three.js/WebGL</span>
                            <span>80%</span>
                        </div>
                        <div class="w-full bg-gray-700 rounded-full h-2.5">
                            <div class="bg-gradient-to-r from-blue-500 to-purple-600 h-2.5 rounded-full"
                                style="width: 80%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-16">
                <h3 class="text-2xl font-semibold mb-6 text-center">Other Skills</h3>
                <div class="flex flex-wrap justify-center gap-3">
                    <span class="skill-pill px-4 py-2 bg-gray-700 rounded-full">HTML5</span>
                    <span class="skill-pill px-4 py-2 bg-gray-700 rounded-full">CSS3/Tailwind</span>
                    <span class="skill-pill px-4 py-2 bg-gray-700 rounded-full">MongoDB</span>
                    <span class="skill-pill px-4 py-2 bg-gray-700 rounded-full">PostgreSQL</span>
                    <span class="skill-pill px-4 py-2 bg-gray-700 rounded-full">GraphQL</span>
                    <span class="skill-pill px-4 py-2 bg-gray-700 rounded-full">Docker</span>
                    <span class="skill-pill px-4 py-2 bg-gray-700 rounded-full">AWS</span>
                    <span class="skill-pill px-4 py-2 bg-gray-700 rounded-full">UI/UX Design</span>
                    <span class="skill-pill px-4 py-2 bg-gray-700 rounded-full">Figma</span>
                    <span class="skill-pill px-4 py-2 bg-gray-700 rounded-full">Git</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Section with 3D Card Flips -->
    <section id="projects" class="py-20 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-4">My <span class="gradient-text">Projects</span></h2>
            <div class="w-20 h-1 bg-gradient-to-r from-blue-500 to-purple-600 mx-auto"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Project 1 -->
            <div class="project-card h-80">
                <div class="project-card-inner relative w-full h-full rounded-xl overflow-hidden shadow-lg">
                    <div class="project-card-front absolute w-full h-full bg-gray-800 p-6 flex flex-col">
                        <div class="flex-1 bg-gray-700 rounded-lg mb-4 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                                alt="Project 1" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-semibold">3D Data Visualization</h3>
                        <p class="text-gray-400 text-sm">Interactive data dashboard</p>
                    </div>
                    <div
                        class="project-card-back absolute w-full h-full bg-gradient-to-br from-blue-900 to-purple-900 p-6 flex flex-col justify-center items-center text-center">
                        <h3 class="text-xl font-semibold mb-2">3D Data Visualization</h3>
                        <p class="text-gray-300 mb-4">Built with Three.js and D3.js for immersive data exploration</p>
                        <div class="flex flex-wrap justify-center gap-2 mb-4">
                            <span class="text-xs px-2 py-1 bg-blue-800 rounded">Three.js</span>
                            <span class="text-xs px-2 py-1 bg-blue-800 rounded">D3.js</span>
                            <span class="text-xs px-2 py-1 bg-blue-800 rounded">React</span>
                        </div>
                        <a href="#"
                            class="px-4 py-2 bg-white text-gray-900 rounded-full text-sm font-medium hover:bg-gray-200 transition">View
                            Project</a>
                    </div>
                </div>
            </div>

            <!-- Project 2 -->
            <div class="project-card h-80">
                <div class="project-card-inner relative w-full h-full rounded-xl overflow-hidden shadow-lg">
                    <div class="project-card-front absolute w-full h-full bg-gray-800 p-6 flex flex-col">
                        <div class="flex-1 bg-gray-700 rounded-lg mb-4 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1555774698-0f77e70ac5f2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                                alt="Project 2" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-semibold">VR Portfolio</h3>
                        <p class="text-gray-400 text-sm">Immersive experience</p>
                    </div>
                    <div
                        class="project-card-back absolute w-full h-full bg-gradient-to-br from-blue-900 to-purple-900 p-6 flex flex-col justify-center items-center text-center">
                        <h3 class="text-xl font-semibold mb-2">VR Portfolio</h3>
                        <p class="text-gray-300 mb-4">Web-based VR experience showcasing creative work</p>
                        <div class="flex flex-wrap justify-center gap-2 mb-4">
                            <span class="text-xs px-2 py-1 bg-blue-800 rounded">A-Frame</span>
                            <span class="text-xs px-2 py-1 bg-blue-800 rounded">WebXR</span>
                            <span class="text-xs px-2 py-1 bg-blue-800 rounded">GLSL</span>
                        </div>
                        <a href="#"
                            class="px-4 py-2 bg-white text-gray-900 rounded-full text-sm font-medium hover:bg-gray-200 transition">View
                            Project</a>
                    </div>
                </div>
            </div>

            <!-- Project 3 -->
            <div class="project-card h-80">
                <div class="project-card-inner relative w-full h-full rounded-xl overflow-hidden shadow-lg">
                    <div class="project-card-front absolute w-full h-full bg-gray-800 p-6 flex flex-col">
                        <div class="flex-1 bg-gray-700 rounded-lg mb-4 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1626785774573-4b799315345d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80"
                                alt="Project 3" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-semibold">Interactive WebGL Art</h3>
                        <p class="text-gray-400 text-sm">Generative artwork</p>
                    </div>
                    <div
                        class="project-card-back absolute w-full h-full bg-gradient-to-br from-blue-900 to-purple-900 p-6 flex flex-col justify-center items-center text-center">
                        <h3 class="text-xl font-semibold mb-2">Interactive WebGL Art</h3>
                        <p class="text-gray-300 mb-4">Procedurally generated artwork with user interaction</p>
                        <div class="flex flex-wrap justify-center gap-2 mb-4">
                            <span class="text-xs px-2 py-1 bg-blue-800 rounded">WebGL</span>
                            <span class="text-xs px-2 py-1 bg-blue-800 rounded">GLSL</span>
                            <span class="text-xs px-2 py-1 bg-blue-800 rounded">p5.js</span>
                        </div>
                        <a href="#"
                            class="px-4 py-2 bg-white text-gray-900 rounded-full text-sm font-medium hover:bg-gray-200 transition">View
                            Project</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-12">
            <a href="#"
                class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full text-white bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 transition duration-300">
                View All Projects
                <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>
    </section>

    <!-- Contact Section with 3D Form Elements -->
    <section id="contact" class="py-20 bg-gray-800 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">Get In <span class="gradient-text">Touch</span></h2>
                <div class="w-20 h-1 bg-gradient-to-r from-blue-500 to-purple-600 mx-auto"></div>
            </div>

            <div class="flex flex-col lg:flex-row gap-12">
                <div class="lg:w-1/2">
                    <h3 class="text-2xl font-semibold mb-6">Contact Information</h3>
                    <p class="text-gray-300 mb-8">
                        Feel free to reach out to me for any questions or opportunities. I'm always open to discussing
                        new projects, creative ideas or opportunities to be part of your vision.
                    </p>

                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div
                                class="flex-shrink-0 w-10 h-10 rounded-full bg-purple-900 flex items-center justify-center text-purple-400">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-medium">Location</h4>
                                <p class="text-gray-400">San Francisco, California</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div
                                class="flex-shrink-0 w-10 h-10 rounded-full bg-purple-900 flex items-center justify-center text-purple-400">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-medium">Email</h4>
                                <p class="text-gray-400">alex@example.com</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div
                                class="flex-shrink-0 w-10 h-10 rounded-full bg-purple-900 flex items-center justify-center text-purple-400">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-medium">Phone</h4>
                                <p class="text-gray-400">+1 (555) 123-4567</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <h4 class="text-lg font-medium mb-4">Follow Me</h4>
                        <div class="flex space-x-4">
                            <a href="#"
                                class="w-10 h-10 rounded-full bg-gray-700 flex items-center justify-center hover:bg-blue-600 transition duration-300">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#"
                                class="w-10 h-10 rounded-full bg-gray-700 flex items-center justify-center hover:bg-gray-500 transition duration-300">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="#"
                                class="w-10 h-10 rounded-full bg-gray-700 flex items-center justify-center hover:bg-blue-400 transition duration-300">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#"
                                class="w-10 h-10 rounded-full bg-gray-700 flex items-center justify-center hover:bg-pink-600 transition duration-300">
                                <i class="fab fa-dribbble"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="lg:w-1/2">
                    <div id="contact-form-3d" class="relative">
                        <form class="space-y-6 bg-gray-900 p-8 rounded-xl shadow-xl">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-300 mb-1">Your Name</label>
                                <input type="text" id="name"
                                    class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent text-white placeholder-gray-500 transition duration-300">
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Your
                                    Email</label>
                                <input type="email" id="email"
                                    class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent text-white placeholder-gray-500 transition duration-300">
                            </div>

                            <div>
                                <label for="subject"
                                    class="block text-sm font-medium text-gray-300 mb-1">Subject</label>
                                <input type="text" id="subject"
                                    class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent text-white placeholder-gray-500 transition duration-300">
                            </div>

                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-300 mb-1">Your
                                    Message</label>
                                <textarea id="message" rows="5"
                                    class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent text-white placeholder-gray-500 transition duration-300"></textarea>
                            </div>

                            <button type="submit"
                                class="w-full px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg font-medium hover:from-blue-600 hover:to-purple-700 transition duration-300">
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-6 md:mb-0">
                    <span class="text-2xl font-bold gradient-text">Portfolio</span>
                    <p class="text-gray-400 mt-2">© 2023 All Rights Reserved</p>
                </div>

                <div class="flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                        <i class="fab fa-github fa-lg"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-blue-400 transition duration-300">
                        <i class="fab fa-linkedin-in fa-lg"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-blue-500 transition duration-300">
                        <i class="fab fa-twitter fa-lg"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-pink-500 transition duration-300">
                        <i class="fab fa-dribbble fa-lg"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script src="main.js"></script>
</body>

</html>