<?php
// Cek apakah user sudah login
session_start();
session_regenerate_id();
ob_flush();
include 'database/connect.php';

if (!isset($_SESSION["email"])) {
    header("Location: session/login.php");
    exit();
}

//USER CUD =================================================================================================================
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

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sqlGet = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
    $result = mysqli_fetch_assoc($sqlGet);
    // print_r($result);
    // die;

    if (!$result) {
        die("Data tidak ditemukan!");
    }
}

if (isset($_POST['edit-users'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];

    // Jika password baru diisi, gunakan password baru (hash sha1), jika tidak, gunakan password lama dari database
    if (!empty($_POST['password'])) {
        $password = sha1($_POST['password']);
    } else {
        // Ambil password lama dari database
        $sqlGetPass = mysqli_query($conn, "SELECT password FROM users WHERE id = '$id'");
        $passData = mysqli_fetch_assoc($sqlGetPass);
        $password = $passData['password'];
    }

    // Ambil data user lama untuk mendapatkan nama file foto lama
    $sqlGetOld = mysqli_query($conn, "SELECT photo FROM users WHERE id = '$id'");
    $oldData = mysqli_fetch_assoc($sqlGetOld);
    $oldPhoto = isset($oldData['photo']) ? $oldData['photo'] : 'default.png';

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . '/assets/newphoto/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $ext = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($ext, $allowed)) {
            echo "Ekstensi file tidak diizinkan.";
            $photo = $oldPhoto;
        } else {
            $fileName = uniqid() . '.' . $ext;
            $uploadFile = $uploadDir . $fileName;
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)) {
                $photo = $fileName;
                // Hapus foto lama jika bukan default.png
                if ($oldPhoto !== 'default.png' && file_exists($uploadDir . $oldPhoto)) {
                    unlink($uploadDir . $oldPhoto);
                }
            } else {
                echo "Gagal menyimpan file.";
                $photo = $oldPhoto;
            }
        }
    } else {
        $photo = $oldPhoto;
    }

    $sqlUpdate = mysqli_query($conn, "UPDATE users SET name = '$name', phone = '$phone', address = '$address', gender = '$gender', email = '$email', password = '$password', photo = '$photo' WHERE id = '$id'");

    if ($sqlUpdate) {
        header("Location: ?page=users&update=success");
    } else {
        echo "<script>alert('Data Gagal Diupdate'); window.location.href='?page=users&update=failed';</script>";
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $sqlGetPhoto = mysqli_query($conn, "SELECT photo FROM users WHERE id = '$id'");
    $dataPhoto = mysqli_fetch_assoc($sqlGetPhoto);
    if ($dataPhoto && isset($dataPhoto['photo']) && $dataPhoto['photo'] !== 'default.png') {
        $photoPath = __DIR__ . '/assets/newphoto/' . $dataPhoto['photo'];
        if (file_exists($photoPath)) {
            unlink($photoPath);
        }
    }

    $sqlDelete = mysqli_query($conn, "DELETE FROM users WHERE id = '$id'");

    if ($sqlDelete) {
        header("Location: ?page=users&del=success");
        exit;
    } else {
        echo "<script>alert('Data Gagal Dihapus'); window.location.href='?page=users&delete=failed';</script>";
    }
}

// if (isset($_GET['success'])) :
//     echo "<script>
//         Swal.fire('Berhasil!', 'Registrasi berhasil dilakukan.', 'success');
//     </script>";
// endif;
// =========================================================================================================================

ob_end_flush();
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
    <!-- SweetAlert2 CSS (optional, jika ingin gunakan tema bawaan) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
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
    <div id="modalOverlay"
        class="modal-overlay flex items-center justify-center fixed inset-0 z-50 bg-black bg-opacity-50">
        <div id="modalContainer" class="modal-container w-full max-w-md mx-4"
            style="max-height: 80vh; overflow-y: auto;">
            <div class="p-4 industrial-border-b">
                <div class="flex items-center justify-between">
                    <h3 id="modalTitle" class="text-lg font-semibold">Modal Title</h3>
                    <button onclick="closeModal()" class="text-gray-400 hover:text-white">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="flex justify-center">
                <hr class="border-gray-600 mb-4" style="width: 90%;">
            </div>
            <div id="modalContent" class="p-4">
                <!-- Dynamic content will be inserted here -->
            </div>
            <div>
                <button onclick="closeModal()" class="px-4 py-2 industrial-accent hover:bg-gray-600 rounded" hidden>
                    Cancel
                </button>
                <button id="modalAction" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded" hidden>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>