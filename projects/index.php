<?php
session_start();
session_regenerate_id(true);

if (!isset($_SESSION["email"])) {
    header("Location: mvc/session/login.php");
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
    <link rel="stylesheet" href="css/dashboard.css">
</head>

<body class="p-2 md:p-4 bg-gray-50 min-h-screen">
    <div class="max-w-8xl mx-auto">
        <!-- Header -->
        <?php include 'mvc/view/inc/header.php' ?>

        <div class="flex flex-col md:flex-row gap-4 md:gap-6">
            <!-- Sidebar -->
            <aside class="w-full md:w-64 mb-4 md:mb-0">
                <?php include 'mvc/view/inc/sidebar.php' ?>
            </aside>

            <!-- Main Content -->
            <main class="flex-1">
                <section class="section rounded-lg shadow p-2 md:p-6">
                    <?php
                    if (isset($_GET['page'])) {
                        if (file_exists('mvc/view/pages/' . $_GET['page'] . ".php")) {
                            include_once 'mvc/view/pages/' . $_GET['page'] . ".php";
                        }
                    } else {
                        include 'mvc/view/inc/home.php'; // default page
                    }
                    ?>
                    <!-- / Content -->
                </section>
            </main>
        </div>
    </div>

    <script src="js/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>