<?php
if (file_exists(__DIR__ . '/connection/connect.php')) {
    include __DIR__ . '/connection/connect.php';
} else {
    include __DIR__ . '/../../connection/connect.php';
}

function getAllUsers($conn)
{
    $users = [];
    $result = mysqli_query($conn, "SELECT * FROM users");
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
    }
    return $users;
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
        $maxSize = 1 * 1024 * 1024; // 1 MB
        if ($_FILES['photo']['size'] > $maxSize) {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Ukuran file terlalu besar!',
                    text: 'Maksimal ukuran foto adalah 1 MB.',
                    confirmButtonColor: '#d33'
                }).then(() => { window.location.href='../../index.php?page=users&register=failed'; });
            </script>";
            exit;
        }

        $uploadDir = __DIR__ . '../../../assets/newphoto/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $ext = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($ext, $allowed)) {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Ekstensi file tidak diizinkan!',
                    text: 'Hanya file JPG, JPEG, PNG, dan GIF yang diperbolehkan.',
                    confirmButtonColor: '#d33'
                }).then(() => { window.location.href='../../index.php?page=users&register=failed'; });
            </script>";
            $photo = 'default.png';
            exit;
        } else {
            $fileName = uniqid() . '.' . $ext;
            $uploadFile = $uploadDir . $fileName;
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)) {
                $photo = $fileName;
            } else {
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal menyimpan file!',
                        text: 'Terjadi kesalahan saat upload foto.',
                        confirmButtonColor: '#d33'
                    }).then(() => { window.location.href='../../index.php?page=users&register=failed'; });
                </script>";
                $photo = 'default.png';
                exit;
            }
        }
    } else {
        $photo = 'default.png';
    }

    // Simpan data ke database
    $query = mysqli_query($conn, "INSERT INTO users (name, phone, address, gender, email, password, photo) VALUES ('$name', '$phone', '$address', '$gender', '$email', '$password', '$fileName')");

    if ($query) {
        header("Location: ../../index.php?page=users&register=success");
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
        $maxSize = 1 * 1024 * 1024; // 1 MB
        if ($_FILES['photo']['size'] > $maxSize) {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Ukuran file terlalu besar!',
                    text: 'Maksimal ukuran foto adalah 1 MB.',
                    confirmButtonColor: '#d33'
                }).then(() => { window.location.href='../../index.php?page=users&update=failed'; });
            </script>";
            $photo = $oldPhoto;
            exit;
        }

        $uploadDir = __DIR__ . '../../../assets/newphoto/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $ext = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($ext, $allowed)) {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Ekstensi file tidak diizinkan!',
                    text: 'Hanya file JPG, JPEG, PNG, dan GIF yang diperbolehkan.',
                    confirmButtonColor: '#d33'
                }).then(() => { window.location.href='../../index.php?page=users&update=failed'; });
            </script>";
            $photo = $oldPhoto;
            exit;
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
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal menyimpan file!',
                        text: 'Terjadi kesalahan saat upload foto.',
                        confirmButtonColor: '#d33'
                    }).then(() => { window.location.href='../../index.php?page=users&update=failed'; });
                </script>";
                $photo = $oldPhoto;
                exit;
            }
        }
    } else {
        $photo = $oldPhoto;
    }

    $sqlUpdate = mysqli_query($conn, "UPDATE users SET name = '$name', phone = '$phone', address = '$address', gender = '$gender', email = '$email', password = '$password', photo = '$photo' WHERE id = '$id'");

    if ($sqlUpdate) {
        header("Location: ../../?page=users&update=success");
    } else {
        echo "<script>alert('Data Gagal Diupdate'); window.location.href='../../?page=users&update=failed';</script>";
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $sqlGetPhoto = mysqli_query($conn, "SELECT photo FROM users WHERE id = '$id'");
    $dataPhoto = mysqli_fetch_assoc($sqlGetPhoto);
    if ($dataPhoto && isset($dataPhoto['photo']) && $dataPhoto['photo'] !== 'default.png') {
        $photoPath = __DIR__ . '../../../assets/newphoto/' . $dataPhoto['photo'];
        if (file_exists($photoPath)) {
            unlink($photoPath);
        }
    }

    $sqlDelete = mysqli_query($conn, "DELETE FROM users WHERE id = '$id'");

    if ($sqlDelete) {
        header("Location: ../../?page=users&del=success");
        exit;
    } else {
        echo "<script>alert('Data Gagal Dihapus'); window.location.href='?page=users&delete=failed';</script>";
    }
}
?>