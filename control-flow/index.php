<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

    <div class="card mt-3 mb-3 mx-auto" style="width: 80%; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
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

    <div class="card mt-3 mb-3 mx-auto" style="width: 80%; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
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

    <div class="card mt-3 mb-3 mx-auto" style="width: 80%; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
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

    <div class="card mt-3 mb-3 mx-auto" style="width: 80%; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <div class="card-body">
            <h1 class="text-start ms-3 fst-italic">Pengulangan dengan Pengkondisian</h1>
            <hr class="mb-4" style="margin: 0 auto; border: 2px solidrgb(0, 0, 0); border-radius: 5px;">
        </div>
    </div>

    <!-- <script>
        const table = document.getElementById("countingTable");
        const rows = table.getElementsByTagName("tr");
    </script> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>