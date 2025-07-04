<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Pengulangan</title>
</head>

<body>


    <div class="card mt-5 mx-auto" style="width: 80%; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <div class=" card-body">
            <h1 class="text-start ms-3">Pengulangan</h1>
            <hr class="mb-4" style="margin: 0 auto; border: 2px solidrgb(0, 0, 0); border-radius: 5px;">
            <table class="table table-bordered table-striped">
                <?php
                for ($i = 0; $i <= 10; $i++) {
                    echo "<tr>";
                    for ($j = 0; $j <= 5; $j++) {
                        echo "<td class='text-center'> $i.$j</td>";
                        // if ($i == 0 && $j == 0) {
                        //     echo "<th class='text-center'>X</th>";
                        // } elseif ($i == 0) {
                        //     echo "<th class='text-center'>$j</th>";
                        // } elseif ($j == 0) {
                        //     echo "<th class='text-center'>$i</th>";
                        // } else {
                        //     $hasil = $i * $j;
                        //     echo "<td class='text-center'>$hasil</td>";
                        // }
                    }
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>