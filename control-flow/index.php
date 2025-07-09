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
    <!-- FOR -->
    <div class="card mt-3 mx-auto" style="width: 80%; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <div class="card-body">
            <h1 class="text-start ms-3 fst-italic">Pengulangan For</h1>
            <hr class="mb-4" style="margin: 0 auto; border: 2px solidrgb(0, 0, 0); border-radius: 5px;">
            <table class="table table-bordered table-striped">
                <?php
                for ($i = 1; $i <= 10; $i++) {
                    echo "<tr>";
                    for ($j = 1; $j <= 5; $j++) {
                        echo "<td class='text-center'> $i.$j</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>

    <div class="card mt-3 mb-3 mx-auto"
        style="width: 80%; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <div class="card-body">
            <div class="d-flex justify-content-evenly">
                <div>
                    <?php
                    for ($i = 1; $i <= 10; $i++) {
                        for ($j = 1; $j <= $i; $j++) {
                            echo "*";
                        }
                        echo "<br>";
                    }
                    ?>
                </div>
                <div>
                    <?php
                    for ($i = 10; $i >= 1; $i--) {
                        // Print spaces
                        for ($j = 1; $j <= 10 - $i; $j++) {
                            echo "&nbsp;";
                        }
                        // Print stars
                        for ($k = 1; $k <= (2 * $i - 1); $k++) {
                            echo "*";
                        }
                        echo "<br>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3 mb-3 mx-auto"
        style="width: 80%; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <div class="card-body">
            <div class="d-flex justify-content-evenly">
                <div>
                    <?php
                    for ($i = 10; $i >= 1; $i--) {
                        for ($j = 1; $j <= $i; $j++) {
                            echo "*";
                        }
                        echo "<br>";
                    }
                    ?>
                </div>
                <div>
                    <?php
                    for ($i = 1; $i <= 10; $i++) {
                        // Print spaces
                        for ($j = 1; $j <= 10 - $i; $j++) {
                            echo "&nbsp;";
                        }
                        // Print stars
                        for ($k = 1; $k <= (2 * $i - 1); $k++) {
                            echo "*";
                        }
                        echo "<br>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3 mb-3 mx-auto"
        style="width: 80%; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <div class="card-body">
            <h1 class="text-start ms-3 fst-italic">Pengulangan dengan Pengkondisian</h1>
            <hr class="mb-4" style="margin: 0 auto; border: 2px solidrgb(0, 0, 0); border-radius: 5px;">
            <table class="table table-stripped" id="countingTable">
                <?php
                for ($i = 1; $i <= 10; $i++) {
                    echo "<tr>";
                    for ($j = 1; $j <= 10; $j++) {
                        if ($i % 2 == 0 && $j % 2 == 0) {
                            echo "<td class='text-center table-danger';'>$i.$j</td>";
                        } elseif ($i % 2 == 0 && $j % 2 != 0) {
                            echo "<td class='text-center table-primary'>$i.$j</td>";
                        } elseif ($i % 2 != 0 && $j % 2 == 0) {
                            echo "<td class='text-center table-success'>$i.$j</td>";
                        } elseif ($i % 2 != 0 && $j % 2 != 0) {
                            echo "<td class='text-center table-warning'>$i.$j</td>";
                        } else {
                            echo "<td class='text-center'>$i.$j</td>";
                        }
                    }
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>

    <div class="card mt-3 mb-3 mx-auto"
        style="width: 80%; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <div class="card-body">
            <h1 class="text-start ms-3 fst-italic">Function</h1>
            <hr class="mb-4" style="margin: 0 auto; border: 2px solidrgb(0, 0, 0); border-radius: 5px;">
            <div class="d-flex justify-content-center">
                <div class="card-body mb-3"
                    style="width: 95%; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <h4 class="text-start fst-italic">Strtoupper</h4>
                    <hr class="mb-4" style="margin: 0 auto; border: 2px solidrgb(0, 0, 0); border-radius: 5px;">
                    <div>
                        <?php
                        $text = "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos ipsa consectetur placeat rerum debitis ab esse iste? Error aliquid delectus ut officiis? Natus totam dolorum magnam veritatis unde sit aliquid!";

                        echo ucwords($text) . "<br>";
                        ?>
                    </div>
                </div>
                <div class="card-body mb-3"
                    style="width: 95%; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <h4 class="text-start    fst-italic">Strtolower</h4>
                    <hr class="mb-4" style="margin: 0 auto; border: 2px solidrgb(0, 0, 0); border-radius: 5px;">
                    <div>
                        <?php
                        $text = "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos ipsa consectetur placeat rerum debitis ab esse iste? Error aliquid delectus ut officiis? Natus totam dolorum magnam veritatis unde sit aliquid!";

                        echo strtolower($text);

                        function toLowerCase($text)
                        {
                            return strtolower($text);
                        }
                        ?>
                    </div>
                </div>
                <div class="card-body mb-3"
                    style="width: 95%; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <h4 class="text-start fst-italic">Function</h4>
                    <hr class="mb-4" style="margin: 0 auto; border: 2px solidrgb(0, 0, 0); border-radius: 5px;">
                    <div>
                        <?php

                        function cetak()
                        {
                            $text = "PPKD JAKUT";
                            return "Selamat Datang di " . $text . "<br>";
                        }

                        echo cetak();

                        function hitung()
                        {
                            $angka1 = 10;
                            $angka2 = 3;

                            $hasil = $angka1 * $angka2;
                            return "Hasil dari penjumlahan $angka1 + $angka2 = " . $hasil . "<br>";
                        }

                        echo hitung();
                        ?>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="card-body mb-3"
                    style="width: 95%; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <h4 class="text-start fst-italic">Array Satu Dimensi dengan Foreach</h4>
                    <hr class="mb-4" style="margin: 0 auto; border: 2px solidrgb(0, 0, 0); border-radius: 5px;">
                    <div>
                        <?php
                        $peserta = array(
                            "PPKD JAKPUS",
                            "WEB PROGRAMMING",
                            "2025"
                        );

                        echo "Selamat Datang di " . $peserta[0] . "<br>" . "Kelas " . $peserta[1] . "<br>" . "Tahun " . $peserta[2] . "<br>";

                        echo "<br>Menggunakan Foreach<br>";

                        foreach ($peserta as $key => $value) {
                            echo $key + 1 . ". " . $value . "<br>";
                        }
                        ?>
                    </div>
                </div>

                <div class="card-body mb-3"
                    style="width: 95%; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <h4 class="text-start fst-italic">Array Dua Dimensi dengan Foreach</h4>
                    <hr class="mb-4" style="margin: 0 auto; border: 2px solidrgb(0, 0, 0); border-radius: 5px;">
                    <div>
                        <?php
                        $peserta = [
                            // ["PPKD JAKUT", "WEB PROGRAMMING", "2025"],
                            ["Abroor Rizky", "PHP"],
                            ["Reiji", "Laravel"]
                        ];
                        ?>
                        <div class="card-body" style="border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                            <table class="table table-stripped" style="width: 95%;">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Bahasa Programming</th>
                                    </tr>
                                </thead>
                                <?php
                                $no = 1;
                                foreach ($peserta as $p) {
                                ?>
                                    <tbody>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $p[0] ?></td>
                                            <td><?= $p[1] ?></td>
                                        </tr>
                                    </tbody>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-body mb-3"
                    style="width: 95%; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <h4 class="text-start fst-italic">Array Tiga Dimensi dengan Foreach</h4>
                    <hr class="mb-4" style="margin: 0 auto; border: 2px solidrgb(0, 0, 0); border-radius: 5px;">
                    <div>
                        <?php
                        $mobil = [
                            [
                                "Merek" => "Toyota",
                                "Jenis" => "MPV",
                                "Nama" => "Avanza"
                            ],
                            [
                                "Merek" => "Honda",
                                "Jenis" => "City Car",
                                "Nama" => "Brio"
                            ],
                            [
                                "Merek" => "Nissan",
                                "Jenis" => "Sports Car",
                                "Nama" => "GTR"
                            ]
                        ];
                        ?>

                        <div>
                            <div class="card-body"
                                style="border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                                <table class="table table-stripped" style="width: 95%;">
                                    <thead>
                                        <tr>
                                            <th>Merek</th>
                                            <th>Jenis</th>
                                            <th>Nama</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    foreach ($mobil as $mob):
                                    ?>
                                        <tbody>
                                            <tr>
                                                <td><?= $mob["Merek"] ?></td>
                                                <td><?= $mob["Jenis"] ?></td>
                                                <td><?= $mob["Nama"] ?></td>
                                            </tr>
                                        </tbody>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3 mb-3 mx-auto"
        style="width: 80%; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <div class="card-body">
            <h1 class="text-start ms-3 fst-italic">Tables with Array</h1>
            <hr class="mb-4" style="margin: 0 auto; border: 2px solidrgb(0, 0, 0); border-radius: 5px;">
            <div class="d-flex justify-content-center">
                <div class="card-body mb-3"
                    style="width: 95%; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <!-- <h4 class="text-start fst-italic">Array Satu Dimensi</h4> -->
                    <!-- <hr class="mb-4" style="margin: 0 auto; border: 2px solidrgb(0, 0, 0); border-radius: 5px;"> -->
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Merek</th>
                                    <th>Jenis</th>
                                    <th>Nama</th>
                                    <th>Photo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $peserta = [
                                    [
                                        "Merek" => "Toyota",
                                        "Jenis" => "MPV",
                                        "Nama" => "Avanza",
                                        "Photo" => "https://medias.auto2000.co.id/sys-master-hybrismedia/hd8/h5a/8831557074974/avanza-g-gray_optimized.png"
                                    ],
                                    [
                                        "Merek" => "Honda",
                                        "Jenis" => "City Car",
                                        "Nama" => "Brio",
                                        "Photo" => "https://asset.honda-indonesia.com/variants/images/VmfueMMOko09BwpogWPFmBUShLbLDzik4wPP6AFz.png"
                                    ],
                                    [
                                        "Merek" => "Nissan",
                                        "Jenis" => "Sports Car",
                                        "Nama" => "GTR",
                                        "Photo" => "https://pngimg.com/d/nissan_PNG47.png"
                                    ]
                                ];

                                foreach ($peserta as $key => $value) {
                                    echo "<tr>";
                                    echo "<td>" . ($key + 1) . ". </td>";
                                    echo "<td>" . $value["Merek"] . "</td>";
                                    echo "<td>" . $value["Jenis"] . "</td>";
                                    echo "<td>" . $value["Nama"] . "</td>";
                                    echo "<td><img src='" . $value["Photo"] . "' alt='' class='img-thumbnail' style='width:150px; height:85px; object-fit:cover;'></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-body mb-3"
                style="width: 100%; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <h4 class="text-start fst-italic">Function GET</h4>
                <hr class="mb-4" style="margin: 0 auto; border: 2px solidrgb(0, 0, 0); border-radius: 5px;">
                <div>
                    <div class="mb-3">
                        <form action="" method="get">
                            <input type="text" name="name" placeholder="Nama" class="form-control mb-2"
                                style="width: 30%; display: inline-block;">
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </form>
                    </div>
                    <?php
                    include "data.php";

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
                        <table class="table table-bordered">
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
        </div>
    </div>

    <!-- <script>
        const table = document.getElementById("countingTable");
        const rows = table.getElementsByTagName("tr");
    </script> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>