<?php
require_once 'database/connect.php'; // pastikan file ini berisi koneksi ke database

// Ambil user id dari session
$userId = $_SESSION['email'] ?? null;
$photo = $_SESSION['photos'] ?? 'default.png';

if ($userId) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
    }
    $stmt->close();
}
?>

<div class="hidden md:flex md:flex-shrink-0">
    <div class="flex flex-col w-64 industrial-border">
        <div class="flex items-center justify-center h-16 px-4 industrial-border">
            <div class="flex items-center">
                <i class="fas fa-industry text-2xl mr-2 text-gray-300"></i>
                <span class="text-xl font-semibold">INDUSTRIAL ADMIN</span>
            </div>
        </div>
        <div class="flex flex-col flex-grow industrial-border overflow-y-auto">
            <nav class="flex-1 px-2 py-4 space-y-1">
                <a href="index.php"
                    class="group flex items-center px-4 py-2 text-sm font-medium rounded-md industrial-accent">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                <a href="?page=users"
                    class="group flex items-center px-4 py-2 text-sm font-medium rounded-md hover:bg-gray-700">
                    <i class="fas fa-users mr-3"></i>
                    Users
                </a>
                <a href="#" class="group flex items-center px-4 py-2 text-sm font-medium rounded-md hover:bg-gray-700">
                    <i class="fas fa-boxes mr-3"></i>
                    Products
                </a>
                <a href="#" class="group flex items-center px-4 py-2 text-sm font-medium rounded-md hover:bg-gray-700">
                    <i class="fas fa-chart-line mr-3"></i>
                    Analytics
                </a>
                <a href="#" class="group flex items-center px-4 py-2 text-sm font-medium rounded-md hover:bg-gray-700">
                    <i class="fas fa-cog mr-3"></i>
                    Settings
                </a>
            </nav>
        </div>
        <div class="p-4 industrial-border">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" src="assets/newphoto/<?= $photo; ?>" alt="">
                </div>
                <div class="ml-3 flex-1">
                    <p class="text-sm font-medium"><?= $_SESSION["fullname"]; ?></p>
                    <p class="text-xs industrial-text-secondary">Admin</p>
                </div>
                <div class="ml-auto">
                    <a href="session/logout.php"
                        class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded text-sm">
                        <i class="fas fa-sign-out-alt mr-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>