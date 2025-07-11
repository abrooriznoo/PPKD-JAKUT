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

if (isset($_POST["register-users"])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    // Handle file upload for photo
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . '/assets/newphoto/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $ext = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($ext, $allowed)) {
            echo "Ekstensi file tidak diizinkan.";
            $photo = 'default.png';
        } else {
            $fileName = uniqid() . '.' . $ext;
            $uploadFile = $uploadDir . $fileName;
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)) {
                $photo = $fileName;
            } else {
                echo "Gagal menyimpan file.";
                $photo = 'default.png';
            }
        }
    } else {
        $photo = 'default.png';
    }

    // Simpan data ke database
    $query = mysqli_query($conn, "INSERT INTO users (name, phone, address, gender, email, password, photo) VALUES ('$name', '$phone', '$address', '$gender', '$email', '$password', '$fileName')");

    if ($query) {
        header("Location: ?page=users&register=success");
        exit;
    } else {
        echo "<script>alert('Registration failed!');</script>";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <title>Λ . Я | Login Page</title>
</head>

<body>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-900 via-gray-800 to-gray-700">
        <div
            class="bg-gray-800 rounded-2xl shadow-2xl w-full max-w-md p-10 flex flex-col items-center border border-gray-700">
            <h1 class="text-5xl font-bold text-amber-400 mb-4 tracking-wide">Login</h1>
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
                    <small class="text-gray-400">Don't Have Any Account? <a href="javascript:void(0);"
                            class="text-amber-400 underline font-medium hover:text-amber-300 transition"
                            data-bs-toggle="modal" data-bs-target="#modalAdd">
                            Haha Fuck u!</a></small>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed inset-0 flex items-center justify-center bg-gray bg-opacity-70 z-50 transition-opacity duration-300 opacity-0 pointer-events-none"
        id="modalAdd">
        <div class="bg-dark rounded p-4 shadow-lg w-full max-w-md relative transform scale-95 transition-all duration-300 opacity-0"
            style="max-height: 80vh; overflow-y: auto;">
            <h2 class="text-lg font-semibold text-gray-300 mb-4">Registrasi User</h2>
            <hr class="mb-4" style="color: white;">
            <button type="button" class="close-modal-btn absolute top-2 right-2 text-gray-400 hover:text-gray-200"
                onclick="closeEditModal('modalAdd')">
                <i class="fas fa-times"></i>
            </button>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium mb-1 text-gray-300">Nama :</label>
                        <input type="text" class="w-full industrial-accent rounded p-2 text-sm" style="color: white;"
                            placeholder="Enter username" name="name" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1 text-gray-300">Nomor HP :</label>
                        <input type="number" class="w-full industrial-accent rounded p-2 text-sm" style="color: white;"
                            placeholder="Enter phone number" name="phone" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1 text-gray-300">Alamat :</label>
                        <textarea name="address" class="w-full industrial-accent rounded p-2 text-sm"
                            style="color: white;" rows="3" placeholder="Enter address" required></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1 text-gray-300">Jenis Kelamin :</label>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <label class="inline-flex items-center text-gray-300">
                                <input type="radio" class="form-radio text-amber-500" name="gender" value="Laki-Laki"
                                    required>
                                <span class="ml-2 text-gray-300">Laki-laki</span>
                            </label>
                            <label class="inline-flex items-center text-gray-300">
                                <input type="radio" class="form-radio text-amber-500" name="gender" value="Perempuan">
                                <span class="ml-2 text-gray-300">Perempuan</span>
                            </label>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1 text-gray-300">Email :</label>
                        <input type="email" class="w-full industrial-accent rounded p-2 text-sm" style="color: white;"
                            placeholder="Enter email" name="email" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1 text-gray-300">Password :</label>
                        <input type="password" class="w-full industrial-accent rounded p-2 text-sm"
                            style="color: white;" name="password" placeholder="Enter password">
                        <small class="text-gray-400">Password Harus Memuat :</small>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1 text-gray-300">Photo Profile :</label>
                        <input type="file" class="w-full industrial-accent rounded p-2 text-sm" style="color: white;"
                            name="photo" placeholder="Insert Photos">
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row justify-end mt-6 gap-2">
                    <button type="submit"
                        class="px-6 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded shadow transition-colors duration-200"
                        name="register-users">
                        <i class="fas fa-save mr-2"></i>Register
                    </button>
                    <button type="button"
                        class="close-modal-btn px-4 py-2 industrial-accent hover:bg-gray-600 rounded text-gray-300"
                        onclick="closeEditModal('modalAdd')">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>


    <!-- Tailwind CDN (if not already included in your project) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist"></script>

    <script src=" ../js/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Modal fade in/out logic
        function openEditModal(id) {
            const modal = document.getElementById(id);
            if (!modal) return;
            modal.classList.remove('pointer-events-none', 'opacity-0');
            setTimeout(() => {
                modal.classList.add('opacity-100');
                const modalContent = modal.querySelector('div.bg-dark');
                if (modalContent) {
                    modalContent.classList.remove('opacity-0', 'scale-95');
                    modalContent.classList.add('opacity-100', 'scale-100');
                }
            }, 10);
        }

        function closeEditModal(id) {
            const modal = document.getElementById(id);
            if (!modal) return;
            modal.classList.remove('opacity-100');
            const modalContent = modal.querySelector('div.bg-dark');
            if (modalContent) {
                modalContent.classList.remove('opacity-100', 'scale-100');
                modalContent.classList.add('opacity-0', 'scale-95');
            }
            setTimeout(() => {
                modal.classList.add('opacity-0', 'pointer-events-none');
            }, 300);
        }

        // Open modal when clicking the register link
        document.querySelectorAll('[data-bs-toggle="modal"]').forEach(btn => {
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                const target = btn.getAttribute('data-bs-target').replace('#', '');
                openEditModal(target);
            });
        });

        // Close modal when clicking on the background (outside modal content)
        document.getElementById('modalAdd').addEventListener('click', function (e) {
            if (e.target === this) closeEditModal(this.id);
        });
    </script>
</body>

</html>