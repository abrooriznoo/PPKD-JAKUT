<?php
include_once 'database/connect.php';

$sqlReq = mysqli_query($conn, "SELECT * FROM users");
$result = mysqli_fetch_all($sqlReq, MYSQLI_ASSOC);
?>

<div class="flex-1 overflow-y-auto p-6 bg-dark-50 min-h-screen">
    <div class="max-w-5xl mx-auto bg-dark rounded-lg shadow-lg p-6">
        <h1 class="text-3xl font-bold mb-8 text-gray-50 text-start">Users List</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-600 text-white">
                        <th class="py-3 px-4 text-left">No.</th>
                        <th class="py-3 px-4 text-left">Name</th>
                        <th class="py-3 px-4 text-left">Phone</th>
                        <th class="py-3 px-4 text-left">Address</th>
                        <th class="py-3 px-4 text-left">Gender</th>
                        <th class="py-3 px-4 text-left">Email</th>
                        <th class="py-3 px-4 text-left">Photo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($result as $user):
                        ?>
                        <tr class="border-b hover:bg-gray-50 transition-colors">
                            <td class="py-2 px-4 text-white"><?= $no++ ?>.</td>
                            <td class="py-2 px-4 text-white"><?= $user["name"]; ?></td>
                            <td class="py-2 px-4 text-white"><?= $user["phone"]; ?></td>
                            <td class="py-2 px-4 text-white"><?= $user["address"]; ?></td>
                            <td class="py-2 px-4 text-white"><?= $user["gender"]; ?></td>
                            <td class="py-2 px-4 text-white"><?= $user["email"]; ?></td>
                            <td class="py-2 px-4 text-white">
                                <img src="assets/<?= htmlspecialchars($user["photo"]); ?>" alt="User Photo"
                                    class="w-12 h-12 object-cover rounded-full border border-gray-300 shadow-sm">
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>