<?php
include_once 'database/connect.php';

$sqlReq = mysqli_query($conn, "SELECT * FROM users");
$result = mysqli_fetch_all($sqlReq, MYSQLI_ASSOC);
?>

<div class="flex-1 overflow-y-auto p-6 bg-dark-50 min-h-screen">
    <div class="max-w-5xl mx-auto bg-dark rounded-sm shadow-lg p-6">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-50 text-start">Users List</h1>
            <button type="button" class="bg-amber-500 text-white px-4 py-2 rounded" id="tambah-users" onclick="openModal('orderModal')">Tambah Users</button>
        </div>
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

    <div id="modalTemplates" style="display: none;" name="Form Tambah Users">
        <!-- Add Order Modal -->
        <div id="orderModalTemplate">
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Nama :</label>
                    <input type="text" class="w-full industrial-accent rounded p-2 text-sm"
                        placeholder="Enter username">
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
</div>