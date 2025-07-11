<?php
session_start();
include_once '../database/connect.php';

// LOGIN MENGGUNAKAN DATA DARI FILE JSON
// $data = [];
// $dataFile = __DIR__ . '/../data/data.json';

// if (file_exists($dataFile)) {
//     $json = file_get_contents($dataFile);
//     $data = json_decode($json, true);
// }

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $email = $_POST["email"];
//     $password = $_POST['password'];
//     // $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

//     // Validate user credentials (this is just a simple example)
//     $found = false;
//     if (is_array($data)) {
//         foreach ($data as $user) {
//             if ($email === $user['email'] && $password === $user['password']) {
//                 $found = true;
//                 break;
//             }
//         }
//     }
//     if ($found) {
//         $_SESSION["loggedin"] = true;
//         // Cari user yang login berdasarkan email, lalu ambil nama-nya
//         foreach ($data as $user) {
//             if ($email === $user['email']) {
//                 $_SESSION["name"] = $user['name'];
//                 break;
//             }
//         }
//         header("Location: ../index.php");
//         exit;
//     } else {
//         $error = "Invalid email or password. Fuck u!";
//         echo "<script>alert('$error');</script>";
//     }
// }


// REGISTER DENGAN MENYIMPAN DATA KE FILE JSON
// // METHOD POST DENGAN MENYIMPAN DATA KE FILE JSON
// $dataFile = __DIR__ . '/../data/data.json';

// // Ambil data peserta dari file jika ada, jika tidak array kosong
// if (file_exists($dataFile)) {
//     $data = json_decode(file_get_contents($dataFile), true);
//     if (!is_array($data))
//         $data = [];
// } else {
//     $data = [];
// }

// // Cari ID terakhir yang ada di data, lalu tambahkan 1 untuk ID baru
// $lastId = 0;
// if (!empty($data)) {
//     $ids = array_column($data, 'id');
//     $lastId = max($ids);
// }
// $newId = $lastId + 1;

// // Proses POST: tambah data baru ke $data lalu simpan ke file
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $id = $_POST['id'] ?? $newId;
//     $nama = $_POST['name'] ?? '';
//     $umur = $_POST['age'] ?? '';
//     $kota = $_POST['city'] ?? '';
//     $email = $_POST['email'] ?? '';
//     $password = $_POST['password'] ?? '';
//     if ($id && $nama && $umur && $kota && $email && $password) {
//         $data[] = [
//             'id' => $id,
//             'name' => $nama,
//             'age' => $umur,
//             'city' => $kota,
//             'email' => $email,
//             'password' => $password
//         ];
//         file_put_contents($dataFile, json_encode($data, JSON_PRETTY_PRINT));
//     }
// }
// 

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");
    $rows = mysqli_fetch_assoc($query);

    if (mysqli_num_rows($query) > 0) {
        $_SESSION['email'] = $email;
        $_SESSION['fullname'] = $rows['name'];
        $_SESSION['photos'] = $rows['photo'];
        header("Location: ../index.php?login=success");
        exit;
    } else {
        header("Location: login.php?login=error");
        exit;
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <title>Λ . Я | Login Page</title>
</head>

<body>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-900 via-gray-800 to-gray-700">
        <div
            class="bg-gray-800 rounded-2xl shadow-2xl w-full max-w-md p-10 flex flex-col items-center border border-gray-700">
            <h1 class="text-3xl font-bold text-amber-400 mb-2 tracking-wide">Login</h1>
            <hr class="w-1/2 border-amber-500 border-2 rounded mb-6">
            <div class="w-full flex flex-col items-center">
                <form action="" method="POST" class="w-full">
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-amber-300 mb-2">Email :</label>
                        <input type="email"
                            class="block w-full rounded-lg border border-gray-600 bg-gray-900 text-amber-100 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500 transition"
                            id="email" name="email" required autocomplete="username">
                    </div>
                    <div class="mb-6">
                        <label for="password" class="block text-sm font-medium text-amber-300 mb-2">Password :</label>
                        <input type="password"
                            class="block w-full rounded-lg border border-gray-600 bg-gray-900 text-amber-100 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500 transition"
                            id="password" name="password" required autocomplete="current-password">
                    </div>
                    <button type="submit"
                        class="w-full py-2 rounded-lg font-semibold bg-gradient-to-r from-amber-500 to-amber-700 hover:from-amber-600 hover:to-amber-800 text-gray-900 shadow-lg transition"
                        name="login">Login</button>
                </form>
                <div class="mt-5 text-center">
                    <small class="text-gray-400">Don't Have Any Account? <a href="#" id="modal-tambah"
                            class="text-amber-400 underline font-medium hover:text-amber-300 transition">Haha Fuck
                            u!</a></small>
                </div>
            </div>
        </div>
    </div>
    <!-- Tailwind CDN (if not already included in your project) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <script src="../js/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>