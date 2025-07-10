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
        $_SESSION['photo'] = $rows['photo'];
        header("Location: ../index.php?login=succeed");
    } else {
        echo "<script>alert('EMAIL DAN PASSWORD SALAH!')</script>";
        header("Location: login.php?login=error");
    }
}

// if (isset($_POST["register"])) {
//     $name = $_POST['name'];
//     $phone = $_POST['phone'];
//     $address = $_POST['address'];
//     $gender = $_POST['gender'];
//     $email = $_POST['email'];
//     $password = sha1($_POST['password']);
//     $photo = $_POST['photo'] ?? 'default.png';

//     // Simpan data ke database
//     $query = mysqli_query($conn, "INSERT INTO users (name, phone, address, gender, email, password, photo) VALUES ('$name', '$phone', '$address', '$gender', '$email', '$password', '$photo')");


//     if ($query) {
//         echo "<script>alert('Registration successful!');</script>";
//         header("Location: login.php");
//     } else {
//         echo "<script>alert('Registration failed!');</script>";
//     }
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Λ . Я | Login Page</title>
</head>

<body>
    <div class="container mt-5">
        <div class="card mx-auto"
            style="width: 500px; height: 500px; border-radius: 10px; box-shadow: 0 4px 8px rgb(13, 114, 238);">
            <h1 class="card-title text-center mt-5 mb-5">Login</h1>
            <hr
                style="width: 80%; text-align: center; margin: 0 auto; border: 2px solid rgb(13, 114, 238); border-radius: 5px;">
            <div class="card-body d-flex flex-column justify-content-center align-items-center"
                style="height: 100%; width: 100%;">
                <form action="" method="POST" style="width: 100%; max-width: 400px;">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email :</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password :</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100" name="login">Login</button>
                </form>
                <div class="mt-3 mb-5">
                    <small>Don't Have Any Account? <a href="#" id="modal-tambah">Register Here</a></small>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL REGISTRASI -->
    <!-- <div class="card-body bg-secondary bg-opacity-75 items-center justify-center z-20 d-none" id="tambahModal"
        style="position: fixed; top:0; left:0; width:100vw; height:100vh;">
        <div class="bg-white rounded shadow-lg p-4 mx-auto" style="max-width: 500px; margin-top: 10vh;">
            <form action="" method="POST">
                <h4 class="">Form Tambah</h4>
                <hr>
                <div class="mb-3">
                    <label for="" class="mb-2">Nama :</label>
                    <input type="text" name="name" placeholder="Nama" class="form-control mb-2" style="width: 100%;"
                        autofocus required>
                </div>
                <div class="mb-3">
                    <label for="" class="mb-2">Nomor HP :</label>
                    <input type="number" name="phone" placeholder="Nomor HP" class="form-control mb-2"
                        style="width: 100%;" required>
                </div>
                <div class="mb-3">
                    <label for="" class="mb-2">Alamat :</label>
                    <input type="text" name="address" placeholder="Alamat" class="form-control mb-2"
                        style="width: 100%;">
                </div>
                <div class="mb-3">
                    <label for="" class="mb-2">Jenis Kelamin :</label>
                    <div class="d-flex gap-3">
                        <label>
                            <input type="radio" name="gender" value="Laki-Laki" required> Laki-laki
                        </label>
                        <label>
                            <input type="radio" name="gender" value="Perempuan"> Perempuan
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="mb-2">Email :</label>
                    <input type="email" name="email" placeholder="Email" class="form-control mb-2" style="width: 100%;">
                </div>
                <div class="mb-3">
                    <label for="" class="mb-2">Password :</label>
                    <input type="password" name="password" placeholder="Password" class="form-control mb-2"
                        style="width: 100%;">
                </div>
                <div class="mb-3">
                    <label for="" class="mb-2">Photo Profile :</label>
                    <input type="file" name="photo" placeholder="Insert Photos" class="form-control mb-2"
                        style="width: 100%;">
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-2" name="register">Simpan</button>
                    <button type="button" class="btn btn-danger" id="closed-modal">Batal</button>
                </div>
            </form>
        </div>
    </div> -->

    <!-- <script>
        const modalDetails = document.querySelector("#tambahModal");
        const btnTambah = document.getElementById("modal-tambah");
        const closeDetails = document.getElementById("closed-modal");

        btnTambah?.addEventListener("click", () => {
            const modalDetail = document.getElementById("tambahModal");
            modalDetail.classList.remove("d-none");
            modalDetail.classList.add("hidden");
        });

        closeDetails?.addEventListener("click", () => {
            const modalDetail = document.getElementById("tambahModal");
            modalDetail.classList.remove("hidden");
            modalDetail.classList.add("d-none");
        });
    </script> -->
</body>

</html>