<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Pengulangan</title>
</head>

<body>
    <div class="card-body mt-3 mb-3 mx-auto"
        style="width: 80%; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <h4 class="text-start fst-italic">Function GET</h4>
        <hr class="mb-4" style="margin: 0 auto; border: 2px solidrgb(0, 0, 0); border-radius: 5px;">
        <div>
            <div class="mb-3">
                <form action="" method="get">
                    <input type="text" name="name" placeholder="Nama" class="form-control mb-2"
                        style="width: 30%; display: inline-block;">
                    <button type="submit" class="btn btn-primary">Cari</button>
                    <a href="get-tables.php" class="btn btn-danger">Kembali</a>
                </form>
            </div>
            <?php
            include "../data.php";

            $peserta = $data; // Ambil semua data dari file data.php
            $allPeserta = $peserta; // Simpan array asli untuk pencarian index

            if (!empty($_GET)) {
                $name = $_GET['name'];
                $peserta = array_filter($peserta, function ($p) use ($name, $allPeserta) {
                    if (stripos($p['name'], $name) !== false) {
                        $index = array_search($p, $allPeserta, true);
                        // echo "Data Ditemukan dengan Nilai Array ke-{$index} <br>";
                        return true;
                    }
                    return false;
                });
            }

            ?>
            <div class="card-body" style="border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <table class="table table-bordered" style="width: 80%;">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Umur</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($peserta as $p) {
                    ?>
                        <tbody>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= $p['name'] ?></td>
                                <td><?= $p['age'] ?></td>
                                <td><?= $p['city'] ?></td>
                            </tr>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>