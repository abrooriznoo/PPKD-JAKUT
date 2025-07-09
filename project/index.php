<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: session/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Dashboard</title>
</head>

<body>
    <div class="card mx-auto mt-5" style="width: 95%; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <div class="card-header">
            <div class="mb-3 d-flex justify-content-between align-items-center">
                <h2 class="mt-3 ms-2">Dashboard</h2>
                <a href="session/logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-text">Welcome <?= htmlspecialchars($_SESSION["name"]) ?></h5>
            <p class="card-text">This is a protected area. You can access this content because you are logged in.</p>
        </div>
    </div>
</body>

</html>