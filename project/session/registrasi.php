<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

// METHOD POST DENGAN MENYIMPAN DATA KE FILE JSON
// Simulasi penyimpanan data secara "permanen" menggunakan file (misal: data.json)
$dataFile = __DIR__ . '/../data/data.json';


// Ambil data peserta dari file jika ada, jika tidak array kosong
if (file_exists($dataFile)) {
    $data = json_decode(file_get_contents($dataFile), true);
    if (!is_array($data)) $data = [];
} else {
    $data = [];
}

// Cari ID terakhir yang ada di data, lalu tambahkan 1 untuk ID baru
$lastId = 0;
if (!empty($data)) {
    $ids = array_column($data, 'id');
    $lastId = max($ids);
}
$newId = $lastId + 1;

// Proses POST: tambah data baru ke $data lalu simpan ke file
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? $newId;
    $nama = $_POST['name'] ?? '';
    $umur = $_POST['age'] ?? '';
    $kota = $_POST['city'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    if ($id && $nama && $umur && $kota && $email && $password) {
        $data[] = [
            'id' => $id,
            'name' => $nama,
            'age' => $umur,
            'city' => $kota,
            'email' => $email,
            'password' => $password
        ];
        file_put_contents($dataFile, json_encode($data, JSON_PRETTY_PRINT));
    }
}

// Refresh halaman setelah submit POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<script>window.location.href = window.location.pathname;</script>";
}

// Untuk tampilan tabel, gunakan $peserta
$peserta = $data;

// Proses GET: filter data jika ada pencarian nama
if (isset($_GET['name']) && $_GET['name'] !== '') {
    $namaCari = $_GET['name'];
    $peserta = array_filter($data, function ($p) use ($namaCari) {
        return stripos($p['name'], $namaCari) !== false;
    });
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>POST METHODS</title>
</head>

<body>
    <div class="card-body mt-3 mb-3 mx-auto"
        style="width: 80%; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="text-start fst-italic mb-0">Function GET</h4>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
        <hr class="mb-4" style="margin: 0 auto; border: 2px solidrgb(0, 0, 0); border-radius: 5px;">
        <div>
            <div class="mb-3 d-flex justify-content-between align-items-center">
                <form action="" method="get" class="d-flex align-items-center">
                    <input type="text" name="name" placeholder="Nama" class="form-control mb-2 me-2"
                        style="width: 200px;">
                    <button type="submit" class="btn btn-primary me-2">Cari</button>
                    <a href="post-tables.php" class="btn btn-danger">Kembali</a>
                </form>
                <button type="button" class="btn btn-success" id="modal-tambah">Tambah Data</button>
            </div>
            <div class="card-body" style="border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">ID</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Umur</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($peserta as $p) {
                    ?>
                        <tbody>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= $p['id'] ?></td>
                                <td><?= $p['name'] ?></td>
                                <td><?= $p['age'] ?></td>
                                <td><?= $p['city'] ?></td>
                                <td><?= $p['email'] ?></td>
                                <td><?= $p['password'] ?></td>
                            </tr>
                        </tbody>
                    <?php } ?>
                </table>
            </div>

            <!-- Modal Tambah -->
            <div class="card-body bg-black bg-opacity-50 items-center justify-center z-20 d-none" id="tambahModal" style="position: fixed; top:0; left:0; width:100vw; height:100vh;">
                <div class="bg-white rounded shadow-lg p-4 mx-auto" style="max-width: 500px; margin-top: 10vh;">
                    <form action="" method="POST">
                        <h4 class="">Form Tambah</h4>
                        <input type="hidden" name="id" value="<?= $newId ?>">
                        <div class="mb-3">
                            <label for="" class="mb-2">Nama :</label>
                            <input type="text" name="name" placeholder="Nama" class="form-control mb-2"
                                style="width: 100%;">
                        </div>
                        <div class="mb-3">
                            <label for="" class="mb-2">Umur :</label>
                            <input type="number" name="age" placeholder="Umur" class="form-control mb-2"
                                style="width: 100%;">
                        </div>
                        <div class="mb-3">
                            <label for="" class="mb-2">Alamat :</label>
                            <input type="text" name="city" placeholder="Alamat" class="form-control mb-2"
                                style="width: 100%;">
                        </div>
                        <div class="mb-3">
                            <label for="" class="mb-2">Email :</label>
                            <input type="email" name="email" placeholder="Email" class="form-control mb-2"
                                style="width: 100%;">
                        </div>
                        <div class="mb-3">
                            <label for="" class="mb-2">Password :</label>
                            <input type="password" name="password" placeholder="Password" class="form-control mb-2"
                                style="width: 100%;">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                            <button type="button" class="btn btn-danger" id="closed-modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
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
    </script>
</body>

</html>