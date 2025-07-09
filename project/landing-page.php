<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Λ . Я | Landing Pages</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/landing-page.css">

</head>

<body>
    <!-- Navigation -->
    <nav class="bg-black bg-opacity-90 fixed w-full z-50 shadow-lg">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-var(--accent) rounded-full flex items-center justify-center mr-3">
                        <i class="fas fa-bolt text-yellow-500 text-xl"></i>
                    </div>
                    <span class="text-white font-bold text-xl uppercase tracking-wider">Λ . Я</span>
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="#" class="text-gray-300 hover:text-white transition duration-300">Home</a>
                    <a href="#" class="text-gray-300 hover:text-white transition duration-300">Solutions</a>
                    <a href="#" class="text-gray-300 hover:text-white transition duration-300">Projects</a>
                    <a href="#" class="text-gray-300 hover:text-white transition duration-300">About</a>
                    <a href="#" class="text-gray-300 hover:text-white transition duration-300">Contact</a>
                </div>
                <div class="md:hidden">
                    <button class="text-gray-300 focus:outline-none">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="industrial-bg min-h-screen flex items-center justify-center text-white pt-20">
        <div class="container mx-auto px-6 py-20">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0">
                    <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                        <span class="metal-texture">FORGING</span>
                        <span class="text-var(--accent)">INDUSTRIAL</span>
                        <span class="metal-texture">SOLUTIONS</span>
                    </h1>
                    <p class="text-lg md:text-xl mb-8 text-gray-300">
                        Precision-engineered industrial solutions with uncompromising durability.
                        Built to withstand the toughest environments.
                    </p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                        <button
                            class="bg-var(--accent) hover:bg-opacity-90 text-white font-bold py-3 px-8 rounded-sm transition duration-300 transform hover:scale-105">
                            EXPLORE SOLUTIONS
                        </button>
                        <button
                            class="border-2 border-var(--metal) hover:bg-var(--metal) hover:bg-opacity-20 text-white font-bold py-3 px-8 rounded-sm transition duration-300 transform hover:scale-105">
                            WATCH DEMO <i class="fas fa-play ml-2"></i>
                        </button>
                    </div>
                </div>
                <div class="md:w-1/2 flex justify-center">
                    <div
                        class="relative w-64 h-64 md:w-80 md:h-80 hexagon bg-var(--primary) flex items-center justify-center pulse-animation">
                        <div class="absolute inset-0 border-2 border-var(--accent) hexagon transform rotate-30"></div>
                        <div class="absolute inset-0 border-2 border-var(--metal) hexagon transform rotate-60"></div>
                        <div class="text-center z-10">
                            <i class="fas fa-industry text-6xl md:text-8xl text-var(--accent)"></i>
                            <p class="text-var(--metal) mt-4 font-bold">SINCE 1987</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 concrete-texture">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 text-var(--primary)">INDUSTRIAL-GRADE COMPONENTS</h2>
                <div class="w-20 h-1 bg-var(--accent) mx-auto mb-6"></div>
                <p class="text-lg text-var(--secondary) max-w-2xl mx-auto">
                    Engineered for extreme conditions with military-grade materials and precision manufacturing.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <!-- Feature 1 -->
                <div class="bg-white p-8 shadow-lg transform transition duration-500 hover:scale-105 hover:shadow-xl">
                    <div class="w-16 h-16 bg-var(--primary) rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-cogs text-2xl text-var(--accent)"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-var(--primary)">Precision Engineering</h3>
                    <p class="text-var(--secondary)">
                        Components machined to tolerances within 0.001mm for flawless operation in critical
                        applications.
                    </p>
                    <div class="mt-6 flex items-center">
                        <div class="w-8 h-8 bg-var(--metal) rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-arrow-right text-xs text-var(--primary)"></i>
                        </div>
                        <span class="text-sm font-bold text-var(--accent)">LEARN MORE</span>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white p-8 shadow-lg transform transition duration-500 hover:scale-105 hover:shadow-xl">
                    <div class="w-16 h-16 bg-var(--primary) rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-shield-alt text-2xl text-var(--accent)"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-var(--primary)">Extreme Durability</h3>
                    <p class="text-var(--secondary)">
                        Tested to withstand temperatures from -40°C to 120°C and impacts up to 50G force.
                    </p>
                    <div class="mt-6 flex items-center">
                        <div class="w-8 h-8 bg-var(--metal) rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-arrow-right text-xs text-var(--primary)"></i>
                        </div>
                        <span class="text-sm font-bold text-var(--accent)">VIEW TEST DATA</span>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white p-8 shadow-lg transform transition duration-500 hover:scale-105 hover:shadow-xl">
                    <div class="w-16 h-16 bg-var(--primary) rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-bolt text-2xl text-var(--accent)"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-var(--primary)">Rapid Deployment</h3>
                    <p class="text-var(--secondary)">
                        Modular designs allow for quick installation and replacement with minimal downtime.
                    </p>
                    <div class="mt-6 flex items-center">
                        <div class="w-8 h-8 bg-var(--metal) rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-arrow-right text-xs text-var(--primary)"></i>
                        </div>
                        <span class="text-sm font-bold text-var(--accent)">SEE CASE STUDIES</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20 bg-var(--primary) text-white">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="p-6">
                    <div class="text-4xl md:text-5xl font-bold mb-2 text-var(--accent)">250+</div>
                    <div class="text-sm uppercase tracking-wider text-var(--metal)">Global Clients</div>
                    <div class="mt-4 h-1 w-16 bg-var(--accent) mx-auto"></div>
                </div>
                <div class="p-6">
                    <div class="text-4xl md:text-5xl font-bold mb-2 text-var(--accent)">1.2M</div>
                    <div class="text-sm uppercase tracking-wider text-var(--metal)">Components Produced</div>
                    <div class="mt-4 h-1 w-16 bg-var(--accent) mx-auto"></div>
                </div>
                <div class="p-6">
                    <div class="text-4xl md:text-5xl font-bold mb-2 text-var(--accent)">36</div>
                    <div class="text-sm uppercase tracking-wider text-var(--metal)">Countries Served</div>
                    <div class="mt-4 h-1 w-16 bg-var(--accent) mx-auto"></div>
                </div>
                <div class="p-6">
                    <div class="text-4xl md:text-5xl font-bold mb-2 text-var(--accent)">99.8%</div>
                    <div class="text-sm uppercase tracking-wider text-var(--metal)">Uptime Guarantee</div>
                    <div class="mt-4 h-1 w-16 bg-var(--accent) mx-auto"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="py-20 bg-var(--concrete)">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 text-var(--primary)">OUR INDUSTRIAL WORK</h2>
                <div class="w-20 h-1 bg-var(--accent) mx-auto mb-6"></div>
                <p class="text-lg text-var(--secondary) max-w-2xl mx-auto">
                    Real-world applications of our industrial solutions across various sectors.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="relative group overflow-hidden h-64">
                    <img src="https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                        alt="Manufacturing plant"
                        class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                        <div class="text-center p-4">
                            <h3 class="text-white font-bold text-xl mb-2">Heavy Manufacturing</h3>
                            <p class="text-gray-300">Automotive components production line</p>
                        </div>
                    </div>
                </div>

                <div class="relative group overflow-hidden h-64">
                    <img src="https://images.unsplash.com/photo-1581093057305-25ad20f9a7f9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                        alt="Oil refinery"
                        class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                        <div class="text-center p-4">
                            <h3 class="text-white font-bold text-xl mb-2">Energy Sector</h3>
                            <p class="text-gray-300">High-pressure valve systems</p>
                        </div>
                    </div>
                </div>

                <div class="relative group overflow-hidden h-64">
                    <img src="https://images.unsplash.com/photo-1581094271901-8022df4466f9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                        alt="Construction site"
                        class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                        <div class="text-center p-4">
                            <h3 class="text-white font-bold text-xl mb-2">Construction</h3>
                            <p class="text-gray-300">Hydraulic systems for heavy machinery</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-var(--primary) text-white">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">READY TO POWER YOUR OPERATIONS?</h2>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto mb-10">
                Our team of industrial experts is ready to assess your needs and provide customized solutions.
            </p>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6">
                <button
                    class="bg-var(--accent) hover:bg-opacity-90 text-white font-bold py-4 px-10 rounded-sm transition duration-300 transform hover:scale-105">
                    REQUEST A QUOTE
                </button>
                <button
                    class="border-2 border-white hover:bg-white hover:bg-opacity-10 text-white font-bold py-4 px-10 rounded-sm transition duration-300 transform hover:scale-105">
                    <i class="fas fa-phone-alt mr-2"></i> CONTACT SALES
                </button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black text-gray-400 py-12">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
                <div>
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 bg-var(--accent) rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-bolt text-yellow-500 text-xl"></i>
                        </div>
                        <span class="text-white font-bold text-xl uppercase tracking-wider">IRONHIDE</span>
                    </div>
                    <p class="mb-6">
                        Industrial solutions engineered for durability, precision, and performance in the most demanding
                        environments.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h3 class="text-white font-bold text-lg mb-6 uppercase tracking-wider">Solutions</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="hover:text-white transition duration-300">Heavy Machinery</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">Energy Sector</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">Manufacturing</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">Construction</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">Mining</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-white font-bold text-lg mb-6 uppercase tracking-wider">Company</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="hover:text-white transition duration-300">About Us</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">Leadership</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">Careers</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">News</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">Sustainability</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-white font-bold text-lg mb-6 uppercase tracking-wider">Contact</h3>
                    <address class="not-italic">
                        <p class="mb-3">123 Foundry Lane<br>Industrial District<br>Metropolis, MP 10100</p>
                        <p class="mb-3"><i class="fas fa-phone-alt mr-2"></i> +1 (555) 123-4567</p>
                        <p><i class="fas fa-envelope mr-2"></i> info@ironhide-industry.com</p>
                    </address>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p>© 2023 IRONHIDE Industries. All rights reserved.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="hover:text-white transition duration-300">Privacy Policy</a>
                    <a href="#" class="hover:text-white transition duration-300">Terms of Service</a>
                    <a href="#" class="hover:text-white transition duration-300">Sitemap</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/landing-page.js"></script>
</body>

</html>