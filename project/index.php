<?php
// Cek apakah user sudah login
session_start();
session_regenerate_id();
include 'database/connect.php';

if (!isset($_SESSION["email"])) {
    header("Location: session/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Λ . Я | Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/dashboard.css">

</head>

<body class="industrial-bg industrial-text min-h-screen">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <?php include 'inc/navbar.php'; ?>

        <!-- Main content -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <!-- Top navigation -->
            <div class="flex items-center justify-between h-16 px-4 industrial-border">
                <div class="flex items-center md:hidden">
                    <button class="text-gray-400 hover:text-white focus:outline-none">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="text-gray-400 hover:text-white focus:outline-none">
                        <i class="fas fa-bell"></i>
                    </button>
                    <button class="text-gray-400 hover:text-white focus:outline-none">
                        <i class="fas fa-envelope"></i>
                    </button>
                </div>
            </div>

            <!-- Content area -->
            <div class="card flex-1 overflow-y-auto industrial-border industrial-bg">
                <!-- Content -->
                <section class="section">
                    <?php
                    if (isset($_GET['page'])) {
                        if (file_exists('pages/' . $_GET['page'] . ".php")) {
                            include_once 'pages/' . $_GET['page'] . ".php";
                        }
                    } else {
                        include 'inc/content.php'; // default page
                    }
                    ?>
                    <!-- / Content -->
                </section>
                <!-- Footer -->
                <!-- <footer class="content-footer footer bg-footer-theme">
                    <?php include_once '../inc/footer.php'; ?>
                </footer> -->
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
        </div>
    </div>

    <!-- Reusable Modal Structure -->
    <div id="modalOverlay" class="modal-overlay flex items-center justify-center">
        <div id="modalContainer" class="modal-container w-full max-w-md mx-4">
            <div class="p-4 industrial-border-b">
                <div class="flex items-center justify-between">
                    <h3 id="modalTitle" class="text-lg font-semibold">Modal Title</h3>
                    <button onclick="closeModal()" class="text-gray-400 hover:text-white">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div id="modalContent" class="p-4">
                <!-- Dynamic content will be inserted here -->
            </div>
            <div class="p-4 industrial-border-t flex justify-end space-x-3">
                <button onclick="closeModal()" class="px-4 py-2 industrial-accent hover:bg-gray-600 rounded">
                    Cancel
                </button>
                <button id="modalAction" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded">
                    Confirm
                </button>
            </div>
        </div>
    </div>

    <!-- Modal Templates -->
    <div id="modalTemplates" style="display: none;">
        <!-- Add Order Modal -->
        <div id="orderModalTemplate">
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Customer Name</label>
                    <input type="text" class="w-full industrial-accent rounded p-2 text-sm"
                        placeholder="Enter customer name">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Order Items</label>
                    <select class="w-full industrial-accent rounded p-2 text-sm">
                        <option>Product 1</option>
                        <option>Product 2</option>
                        <option>Product 3</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Quantity</label>
                    <input type="number" class="w-full industrial-accent rounded p-2 text-sm"
                        placeholder="Enter quantity" value="1">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Order Date</label>
                    <input type="date" class="w-full industrial-accent rounded p-2 text-sm">
                </div>
            </div>
        </div>

        <!-- Confirmation Modal -->
        <div id="confirmModalTemplate">
            <div class="text-center">
                <i class="fas fa-exclamation-triangle text-4xl text-yellow-500 mb-4"></i>
                <p id="confirmMessage">Are you sure you want to perform this action?</p>
            </div>
        </div>
    </div>

    <script src="js/dashboard.js"></script>
</body>

</html>