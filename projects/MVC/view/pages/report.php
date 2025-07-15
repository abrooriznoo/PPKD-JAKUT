<?php
// Include database connection
include '../../../connection/connect.php';

$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print</title>
</head>

<body>
    <div class="container mx-auto p-8 bg-white rounded shadow-lg">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Laporan Data Pengguna</h1>
        <table class="min-w-full border border-gray-300 rounded overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border-b text-left text-gray-700">No.</th>
                    <th class="px-4 py-2 border-b text-left text-gray-700">Photo</th>
                    <th class="px-4 py-2 border-b text-left text-gray-700">Nama</th>
                    <th class="px-4 py-2 border-b text-left text-gray-700">Nomor HP</th>
                    <th class="px-4 py-2 border-b text-left text-gray-700">Alamat</th>
                    <th class="px-4 py-2 border-b text-left text-gray-700">Jenis Kelamin</th>
                    <th class="px-4 py-2 border-b text-left text-gray-700">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($result as $user): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border-b"><?= $no++ ?>.</td>
                        <td class="px-4 py-2 border-b">
                            <?php if (!empty($user['photo'])): ?>
                                <img src="../../../assets/newphoto/<?= $user['photo'] ?>" alt="Photo"
                                    class="w-12 h-12 object-cover rounded-full border">
                            <?php else: ?>
                                <span class="inline-block w-12 h-12 bg-gray-200 rounded-full"></span>
                            <?php endif; ?>
                        </td>
                        <td class="px-4 py-2 border-b"><?= $user['name'] ?></td>
                        <td class="px-4 py-2 border-b"><?= $user['phone'] ?></td>
                        <td class="px-4 py-2 border-b"><?= $user['address'] ?></td>
                        <td class="px-4 py-2 border-b"><?= $user['gender'] ?></td>
                        <td class="px-4 py-2 border-b"><?= $user['email'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script>
        window.onload = function () {
            // Set print styles for A4 and center content
            const style = document.createElement('style');
            style.innerHTML = `
            @media print {
                @page {
                    size: A4 portrait;
                    margin: 20mm 10mm 20mm 10mm;
                }
                html, body {
                    width: 210mm;
                    height: 297mm;
                    margin: 0 !important;
                    padding: 0 !important;
                    background: #fff !important;
                }
                body > .container {
                    box-shadow: none !important;
                    margin: 0 auto !important;
                    padding: 0 !important;
                    width: 100% !important;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                }
                table {
                    width: 100% !important;
                    font-size: 12px !important;
                }
                th, td {
                    padding: 6px 4px !important;
                }
            }
            `;
            document.head.appendChild(style);
            window.print();
        };
    </script>

    <script src="https://cdn.tailwindcss.com"></script>

</body>

</html>