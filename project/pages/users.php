<?php
include_once 'database/connect.php';

$sqlReq = mysqli_query($conn, "SELECT * FROM users");
$result = mysqli_fetch_all($sqlReq, MYSQLI_ASSOC);
?>


<div class="flex-1 overflow-y-auto p-6 bg-dark-50 min-h-screen">
    <div class="max-w-full mx-auto bg-dark rounded-sm shadow-lg p-6"> <!-- max-w-full agar table lebar -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-50 text-start">Users List</h1>
            <button type="button" class="bg-amber-500 text-white px-4 py-2 rounded" id="tambah-users" onclick="openModal('orderModal', {
                title: 'Form Tambah Users',
                modalAction: false,
            })">Tambah Users</button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full"> <!-- min-w dan w-full -->
                <thead>
                    <tr class="bg-gray-600 text-white">
                        <th class="py-3 px-4 text-left">No.</th>
                        <th class="py-3 px-4 text-left">Name</th>
                        <th class="py-3 px-4 text-left">Phone</th>
                        <th class="py-3 px-4 text-left">Address</th>
                        <th class="py-3 px-4 text-left">Gender</th>
                        <th class="py-3 px-4 text-left">Email</th>
                        <th class="py-3 px-4 text-left">Photo</th>
                        <th class="py-3 px-4 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($result as $user):
                        ?>
                        <tr class="border-b"> <!-- hover:bg-gray-50 transition-colors dihapus -->
                            <td class="py-2 px-4 text-white"><?= $no++ ?>.</td>
                            <td class="py-2 px-4 text-white"><?= $user["name"]; ?></td>
                            <td class="py-2 px-4 text-white"><?= $user["phone"]; ?></td>
                            <td class="py-2 px-4 text-white"><?= $user["address"]; ?></td>
                            <td class="py-2 px-4 text-white"><?= $user["gender"]; ?></td>
                            <td class="py-2 px-4 text-white"><?= $user["email"]; ?></td>
                            <td class="py-2 px-4 text-white">
                                <img src="assets/newphoto/<?= $user["photo"]; ?>" alt="User Photo"
                                    class="w-12 h-12 object-cover rounded-full border border-gray-300 shadow-sm">
                            </td>
                            <td class="py-2 px-4 text-white">
                                <div class="flex gap-2">
                                    <a href="javascript:void(0);"
                                        class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded shadow text-sm transition-colors duration-200"
                                        data-bs-toggle="modal" data-bs-target="#modalEdit<?= $user['id'] ?>">
                                        <i class="fas fa-edit mr-1"></i>Edit
                                    </a>
                                    <a href="?page=users&delete=<?= $user['id'] ?>"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded shadow text-sm transition-colors duration-200"
                                        onclick="return confirm('Are you sure you want to delete this user?')">
                                        <i class="fas fa-trash-alt mr-1"></i>Hapus
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>


                    <!-- MODAL EDIT -->
                    <!-- Edit User Modal Template (Tanpa ID Khusus) -->
                    <div class="fixed inset-0 flex items-center justify-center bg-gray bg-opacity-70 z-50 transition-opacity duration-300 opacity-0 pointer-events-none"
                        id="modalEdit<?= $user['id'] ?>">
                        <div class="bg-dark rounded p-4 shadow-lg w-full max-w-md relative transform scale-95 transition-all duration-300 opacity-0"
                            style="max-height: 80vh; overflow-y: auto;">
                            <h2 class="text-lg font-semibold text-white mb-4">Edit User</h2>
                            <hr class="border-gray-600 mb-4">
                            <button type="button"
                                class="close-modal-btn absolute top-2 right-2 text-gray-400 hover:text-white"
                                onclick="closeEditModal('modalEdit<?= $user['id'] ?>')">
                                <i class="fas fa-times"></i>
                            </button>
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="text" name="id" value="<?= $user['id'] ?>" hidden>
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium mb-1">Nama :</label>
                                        <input type="text" class="w-full industrial-accent rounded p-2 text-sm"
                                            placeholder="Enter username" name="name" value="<?= $user['name'] ?>" required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium mb-1">Nomor HP :</label>
                                        <input type="text" class="w-full industrial-accent rounded p-2 text-sm"
                                            placeholder="Enter phone number" name="phone" value="<?= $user['phone'] ?>"
                                            required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium mb-1">Alamat :</label>
                                        <textarea name="address" class="w-full industrial-accent rounded p-2 text-sm"
                                            rows="3" placeholder="Enter address" required><?= $user['address'] ?></textarea>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium mb-1">Jenis Kelamin :</label>
                                        <div class="flex flex-col sm:flex-row gap-4">
                                            <label class="inline-flex items-center">
                                                <input type="radio" class="form-radio text-amber-500" name="gender"
                                                    value="Laki-Laki" <?= $user['gender'] == 'Laki-Laki' ? 'checked' : '' ?>
                                                    required>
                                                <span class="ml-2 text-white">Laki-laki</span>
                                            </label>
                                            <label class="inline-flex items-center">
                                                <input type="radio" class="form-radio text-amber-500" name="gender"
                                                    value="Perempuan" <?= $user['gender'] == 'Perempuan' ? 'checked' : '' ?>>
                                                <span class="ml-2 text-white">Perempuan</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium mb-1">Email :</label>
                                        <input type="email" class="w-full industrial-accent rounded p-2 text-sm"
                                            placeholder="Enter email" name="email" value="<?= $user['email'] ?>" required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium mb-1">Password :</label>
                                        <input type="password" class="w-full industrial-accent rounded p-2 text-sm"
                                            name="password" placeholder="Enter password">
                                        <small class="text-gray-400">Kosongkan jika tidak ingin mengubah password</small>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium mb-1">Photo Profile :</label>
                                        <input type="file" class="w-full industrial-accent rounded p-2 text-sm" name="photo"
                                            placeholder="Insert Photos">
                                        <?php if (!empty($user['photo'])): ?>
                                            <img src="assets/newphoto/<?= $user['photo'] ?>" alt="User Photo"
                                                class="w-12 h-12 object-cover rounded-full mt-2">
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="flex flex-col sm:flex-row justify-end mt-6 gap-2">
                                    <button type="submit"
                                        class="px-6 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded shadow transition-colors duration-200"
                                        name="edit-users">
                                        <i class="fas fa-save mr-2"></i>Simpan Perubahan
                                    </button>
                                    <button type="button"
                                        class="close-modal-btn px-4 py-2 industrial-accent hover:bg-gray-600 rounded"
                                        onclick="closeEditModal('modalEdit<?= $user['id'] ?>')">
                                        Cancel
                                    </button>
                                </div>
                            </form>
                        <?php endforeach; ?>
                    </div>
                </div>
            </table>
        </div>
    </div>
</div>


<div id="addUsersTemplates" style="display: none;">
    <!-- Add Order Modal -->
    <div id="orderModalTemplate">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Nama :</label>
                    <input type="text" class="w-full industrial-accent rounded p-2 text-sm" placeholder="Enter username"
                        name="name" required>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Nomor HP :</label>
                    <input type="number" class="w-full industrial-accent rounded p-2 text-sm"
                        placeholder="Enter phone number" name="phone" required>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Alamat :</label>
                    <textarea name="address" class="w-full industrial-accent rounded p-2 text-sm" id="address" rows="3"
                        placeholder="Enter address" required></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Jenis Kelamin :</label>
                    <div class="flex gap-4">
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio text-amber-500" name="gender" value="Laki-Laki"
                                required>
                            <span class="ml-2 text-white">Laki-laki</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio text-amber-500" name="gender" value="Perempuan">
                            <span class="ml-2 text-white">Perempuan</span>
                        </label>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Email :</label>
                    <input type="email" class="w-full industrial-accent rounded p-2 text-sm"
                        placeholder="Enter quantity" name="email" required>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Password :</label>
                    <input type="password" class="w-full industrial-accent rounded p-2 text-sm" name="password"
                        placeholder="Enter password" required>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Photo Profile :</label>
                    <input type="file" class="w-full industrial-accent rounded p-2 text-sm" name="photo"
                        placeholder="Insert Photos">
                </div>
            </div>
            <div class="flex justify-end mt-6 gap-2">
                <button type="submit"
                    class="px-6 py-2 bg-amber-500 hover:bg-amber-600 text-white font-semibold rounded shadow transition-colors duration-200"
                    name="register-users">
                    <i class="fas fa-user-plus mr-2"></i>Tambah Users
                </button>
                <button onclick="closeModal()" class="px-4 py-2 industrial-accent hover:bg-gray-600 rounded">
                    Cancel
                </button>
            </div>
        </form>
    </div>

    <!-- Confirmation Modal -->
    <div id="confirmModalTemplate">
        <div class="text-center">
            <i class="fas fa-exclamation-triangle text-4xl text-yellow-500 mb-4"></i>
            <p id="confirmMessage">Are you sure you want to perform this action?</p>
        </div>
    </div>
</div>

<script>
    // Modal fade in/out logic
    function openEditModal(id) {
        const modal = document.getElementById(id);
        if (!modal) return;
        modal.classList.remove('pointer-events-none');
        modal.classList.remove('opacity-0');
        setTimeout(() => {
            modal.classList.add('opacity-100');
            modal.children[0].classList.remove('opacity-0', 'scale-95');
            modal.children[0].classList.add('opacity-100', 'scale-100');
        }, 10);
    }

    function closeEditModal(id) {
        const modal = document.getElementById(id);
        if (!modal) return;
        modal.classList.remove('opacity-100');
        modal.children[0].classList.remove('opacity-100', 'scale-100');
        modal.children[0].classList.add('opacity-0', 'scale-95');
        setTimeout(() => {
            modal.classList.add('opacity-0', 'pointer-events-none');
        }, 300);
    }
    // Auto open modal if triggered by data-bs-toggle (for backward compatibility)
    document.querySelectorAll('[data-bs-toggle="modal"]').forEach(btn => {
        btn.addEventListener('click', function () {
            const target = btn.getAttribute('data-bs-target').replace('#', '');
            openEditModal(target);
        });
    });
    // Close modal on background click
    document.querySelectorAll('[id^="modalEdit"]').forEach(modal => {
        modal.addEventListener('click', function (e) {
            if (e.target === modal) closeEditModal(modal.id);
        });
    });
</script>