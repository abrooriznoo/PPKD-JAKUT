<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Belajar Membuat Table</title>
</head>

<style>
    body {
        background-image: linear-gradient(to top right, rgb(255, 255, 255), rgb(122, 182, 250));
        /* Gradasi ke pojok kanan atas */
        height: 100vh;
        /* Tinggi layar penuh */
        margin: 0;
        /* Menghilangkan margin default body */
        text-align: center;
    }
</style>

<body>
    <div class="card mt-5 mx-auto" style="width: 80%;">
        <h1 class="m-4 badge bg-primary text-wrap fs-3" id="tittle">TABEL BIODATA SAYA</h1>
        <div class="card-body p-4">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="align-middle">No. </th>
                        <th class="align-middle">Nama</th>
                        <th class="align-middle">Umur</th>
                        <th class="align-middle">Email</th>
                        <th class="align-middle">Foto</th>
                        <th class="align-middle col-5">Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    ?>
                    <tr>
                        <td class="align-middle"><?= $no++ ?>.</td>
                        <td class="align-middle">Abroor Rizky</td>
                        <td class="align-middle">23 Tahun</td>
                        <td class="align-middle">abroorrizky@gmail.com</td>
                        <td class="align-middle">
                            <img src="assets/foto/profile.jpeg" alt="Foto Abroor Rizky" class="img-fluid" style="width:75px; height: 105px; border-radius: 10px;">
                        </td>
                        <td id="deskripsi" style="background-color: aquamarine; text-align: justify; font-size: 16px;">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deserunt voluptas dolorum corporis quia ducimus iusto? Ipsa laborum deserunt tempora tempore enim sunt officiis, eum eos accusamus. Beatae totam ipsum officiis.</p>
                            <p style="font-family: Arial; color:red;">Saya adalah seorang mahasiswa yang sedang menempuh pendidikan di Universitas XYZ. Saya memiliki minat dalam bidang teknologi informasi dan pengembangan perangkat lunak. Selain itu, saya juga aktif dalam berbagai kegiatan organisasi kampus.</p>

                            <div class="text-end mx-2">
                                <button type="button" class="btn btn-light" id="modal-details-btn">Details</button>
                            </div>

                        </td>
                    </tr>
            </table>
            <button class="btn btn-primary" onclick="changeTitle()" type="button" id="ubahJudulBtn">Ubah Judul Tabel</button>
            <br>
            <!-- <button class="btn btn-danger" onclick="changeTitleBack()" type="button" id="ubahJudulBtn">Kembalikan Judul Tabel</button><br> -->
            <small class="fst-italic" style="color: red;">*Klik tombol di atas untuk mengubah judul tabel</small>
        </div>

        <div class="card-body bg-black bg-opacity-50 items-center justify-center z-20 d-none" id="modal-details" style="position: fixed; top:0; left:0; width:100vw; height:100vh;">
            <div class="bg-white rounded shadow-lg p-4 mx-auto" style="max-width: 500px; margin-top: 10vh;">
                <!-- <h1 class="mb-4">Details</h1> -->
                <h4 class="mb-4">Deskripsi</h4>
                <div class="col-12 align-middle">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deserunt voluptas dolorum corporis quia ducimus iusto? Ipsa laborum deserunt tempora tempore enim sunt officiis, eum eos accusamus. Beatae totam ipsum officiis.</p>
                    <p style="font-family: Arial; color:red;">Saya adalah seorang mahasiswa yang sedang menempuh pendidikan di Universitas XYZ. Saya memiliki minat dalam bidang teknologi informasi dan pengembangan perangkat lunak. Selain itu, saya juga aktif dalam berbagai kegiatan organisasi kampus.</p>
                </div>
                <button type="button" id="closed-modal" class="btn btn-dark">Closed</button>
            </div>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="script.js"></script>

</html>