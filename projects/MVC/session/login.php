<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Nexus Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --glass-bg: rgba(255, 255, 255, 0.15);
            --glass-border: rgba(255, 255, 255, 0.2);
            --glass-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            --glass-blur: blur(10px);
        }

        body {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            color: #e6e6e6;
            min-height: 100vh;
            font-family: 'Segoe UI', system-ui, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .glass-card {
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            border-radius: 16px;
            backdrop-filter: var(--glass-blur);
            -webkit-backdrop-filter: var(--glass-blur);
            box-shadow: var(--glass-shadow);
            transition: all 0.3s ease;
        }

        .glass-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 40px rgba(31, 38, 135, 0.5);
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .floating {
            animation: float 6s ease-in-out infinite;
        }

        .glow-text {
            text-shadow: 0 0 10px rgba(79, 172, 254, 0.7);
        }
    </style>
</head>

<body>
    <div class="glass-card max-w-md w-full p-8 space-y-6 text-center">
        <!-- Icon -->
        <div class="floating">
            <i class="fas fa-atom text-5xl text-blue-300 mb-4"></i>
        </div>

        <!-- Title -->
        <h2 class="text-2xl font-bold glow-text">Welcome to Dashboard Admin</h2>
        <p class="text-sm opacity-75 mb-4">Please log in to continue</p>

        <!-- Form -->
        <form action="../controller/SessionsController.php" method="POST" class="space-y-4 text-left">
            <div>
                <label class="text-sm opacity-80 block mb-1" for="email">Email</label>
                <input type="email" id="email" name="email" required
                    class="w-full px-4 py-2 rounded-md bg-white/10 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:bg-white/20"
                    autofocus>
            </div>
            <div>
                <label class="text-sm opacity-80 block mb-1" for="password">Password</label>
                <input type="password" id="password" name="password" required
                    class="w-full px-4 py-2 rounded-md bg-white/10 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:bg-white/20">
            </div>
            <div class="flex items-center justify-between text-sm mt-2">
                <label class="flex items-center">
                    <input type="checkbox" class="mr-2 text-blue-400 focus:ring-0 rounded">
                    Remember me
                </label>
                <a href="#" class="text-blue-300 hover:underline">Forgot password?</a>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full mt-4 py-2 rounded-md bg-blue-500 hover:bg-blue-600 transition text-white font-semibold"
                name="login">
                Login
            </button>
        </form>

        <!-- Footer -->
        <p class="text-xs opacity-50 mt-4">© 2025 Nexus Technologies</p>
    </div>
</body>

</html>