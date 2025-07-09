<?php
session_start();

$data = [];
$dataFile = __DIR__ . '/data.json';

if (file_exists($dataFile)) {
    $json = file_get_contents($dataFile);
    $data = json_decode($json, true);
}

// var_dump($data);
// die();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate user credentials (this is just a simple example)
    $found = false;
    if (is_array($data)) {
        foreach ($data as $user) {
            if ($email === $user['email'] && $password === $user['password']) {
                $found = true;
                break;
            }
        }
    }
    if ($found) {
        $_SESSION["loggedin"] = true;
        header("Location: post-tables.php");
        exit;
    } else {
        $error = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login Page</title>
</head>

<body>
    <div class="container mt-5">
        <div class="card mx-auto" style="width: 500px; height: 500px; border-radius: 10px; box-shadow: 0 4px 8px rgb(13, 114, 238);">
            <h1 class="card-title text-center mt-5 mb-5">Login</h1>
            <hr style="width: 80%; text-align: center; margin: 0 auto; border: 2px solid rgb(13, 114, 238); border-radius: 5px;">
            <div class="card-body d-flex flex-column justify-content-center align-items-center" style="height: 100%; width: 100%;">
                <form action="" method="POST" style="width: 100%; max-width: 400px;">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>