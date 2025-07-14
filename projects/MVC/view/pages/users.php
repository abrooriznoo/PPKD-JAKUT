<div class="glass-card p-3 sm:p-5 mb-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 gap-2">
        <h2 class="text-lg sm:text-xl font-semibold">Users</h2>
        <div class="flex space-x-2">
            <button class="neumorphic-btn px-3 py-1 rounded-lg text-sm bg-blue-500 bg-opacity-30" type="button"
                onclick="document.getElementById('addUserModal').classList.remove('hidden')">Add Users</button>
        </div>
    </div>
    <div class="glass-card overflow-x-auto">
        <?php
        include 'mvc/controller/UsersController.php';
        $users = getAllUsers($conn);
        $no = 1;
        ?>
        <table class="min-w-[600px] w-full text-left bg-blue-600 bg-opacity-10 rounded-xl shadow text-xs sm:text-sm">
            <thead>
                <tr>
                    <th class="p-2 sm:p-3">No.</th>
                    <th class="p-2 sm:p-3">Photo</th>
                    <th class="p-2 sm:p-3">Name</th>
                    <th class="p-2 sm:p-3">Phone</th>
                    <th class="p-2 sm:p-3">Gender</th>
                    <th class="p-2 sm:p-3">Address</th>
                    <th class="p-2 sm:p-3">Email</th>
                    <th class="p-2 sm:p-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td class="p-2 sm:p-3"><?= $no++ ?>.</td>
                        <td class="p-2 sm:p-3">
                            <img src="assets/newphoto/<?= $user["photo"] ?>" alt=""
                                class="w-8 h-8 sm:w-10 sm:h-10 rounded-full object-cover bg-gray-200" />
                        </td>
                        <td class="p-2 sm:p-3"><?= $user["name"] ?></td>
                        <td class="p-2 sm:p-3"><?= $user["phone"] ?></td>
                        <td class="p-2 sm:p-3"><?= $user["gender"] ?></td>
                        <td class="p-2 sm:p-3"><?= $user["address"] ?></td>
                        <td class="p-2 sm:p-3"><?= $user["email"] ?></td>
                        <td class="p-2 sm:p-3">
                            <button type="button" class="neumorphic-btn px-2 py-1 text-xs sm:text-sm rounded-lg"
                                onclick="document.getElementById('modalEdit<?= $user['id'] ?>').classList.remove('hidden')">Edit</button>
                            <button type="button"
                                class="neumorphic-btn px-2 py-1 text-xs sm:text-sm text-red-500 rounded-lg"
                                onclick="confirmDeleteUser(<?= $user['id'] ?>, '<?= addslashes($user['name']) ?>')">
                                Hapus
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php foreach ($users as $user): ?>
    <!-- MODAL EDIT -->
    <div id="modalEdit<?= $user['id'] ?>"
        class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
        <div class="glass-card p-3 sm:p-6 rounded-xl w-[95vw] max-w-xs sm:max-w-md relative">
            <h3 class="text-base sm:text-lg font-semibold mb-4 text-start">Edit User</h3>
            <!-- Photo Preview -->
            <div class="flex justify-center mb-4">
                <div
                    class="w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-gray-200 flex items-center justify-center overflow-hidden border-4 border-blue-200">
                    <img id="photoPreviewEdit<?= $user['id'] ?>" src="assets/newphoto/<?= $user['photo'] ?>" alt="Preview"
                        class="object-cover w-full h-full" />
                </div>
            </div>
            <form action="mvc/controller/UsersController.php" method="POST" enctype="multipart/form-data"
                class="space-y-3 sm:space-y-4 text-white-600">
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                <div>
                    <label class="block mb-1 font-medium">Photo</label>
                    <input type="file" name="photo" accept="image/*"
                        class="w-full neumorphic-btn px-3 py-2 rounded-lg bg-blue-100 text-gray-600"
                        onchange="previewPhotoEdit(event, <?= $user['id'] ?>)">
                </div>
                <div>
                    <label class="block mb-1 font-medium">Name :</label>
                    <input type="text" name="name"
                        class="w-full neumorphic-btn px-3 py-2 rounded-lg bg-blue-100 text-gray-600"
                        placeholder="Masukan Nama" value="<?= $user['name'] ?>" required>
                </div>
                <div>
                    <label class="block mb-1 font-medium">Phone :</label>
                    <input type="number" name="phone"
                        class="w-full neumorphic-btn px-3 py-2 rounded-lg bg-blue-100 text-gray-600"
                        placeholder="Masukan Nomor HP" value="<?= $user['phone'] ?>" required>
                </div>
                <div>
                    <label class="block mb-1 font-medium">Gender :</label>
                    <div class="flex flex-col sm:flex-row sm:space-x-2">
                        <label class="inline-flex items-center">
                            <input type="radio" name="gender" value="Laki-Laki" required class="form-radio text-blue-500"
                                <?= $user['gender'] == 'Laki-Laki' ? 'checked' : '' ?>>
                            <span class="ml-2">Laki - Laki</span>
                        </label>
                        <label class="inline-flex items-center mt-1 sm:mt-0">
                            <input type="radio" name="gender" value="Perempuan" required class="form-radio text-blue-500"
                                <?= $user['gender'] == 'Perempuan' ? 'checked' : '' ?>>
                            <span class="ml-2">Perempuan</span>
                        </label>
                    </div>
                </div>
                <div>
                    <label class="block mb-1 font-medium">Address :</label>
                    <textarea name="address" rows="3" cols="30"
                        class="w-full neumorphic-btn px-3 py-2 rounded-lg bg-blue-100 text-gray-600"
                        placeholder="Masukan Alamat" required><?= $user['address'] ?></textarea>
                </div>
                <div>
                    <label class="block mb-1 font-medium">Email :</label>
                    <input type="email" name="email"
                        class="w-full neumorphic-btn px-3 py-2 rounded-lg bg-blue-100 text-gray-600"
                        placeholder="Masukan Email" value="<?= $user['email'] ?>" required>
                </div>
                <div>
                    <label class="block mb-1 font-medium">Password :</label>
                    <div class="relative">
                        <input type="password" name="password" id="passwordInputEdit<?= $user['id'] ?>"
                            class="w-full neumorphic-btn px-3 py-2 rounded-lg bg-blue-100 text-gray-600 pr-10">
                        <button type="button" onclick="togglePasswordVisibilityEdit(<?= $user['id'] ?>)"
                            class="absolute inset-y-0 right-2 flex items-center text-gray-500" tabindex="-1"></button>
                    </div>
                    <small class="text-gray-400">Kosongkan jika tidak ingin mengubah password</small>
                </div>
                <div class="flex justify-end space-x-2 mt-4">
                    <button type="button"
                        onclick="document.getElementById('modalEdit<?= $user['id'] ?>').classList.add('hidden')"
                        class="neumorphic-btn px-4 py-2 rounded-lg bg-gray-500">Cancel</button>
                    <button type="submit" name="edit-users"
                        class="neumorphic-btn px-4 py-2 rounded-lg bg-blue-500 text-white">Save</button>
                </div>
            </form>
            <button onclick="document.getElementById('modalEdit<?= $user['id'] ?>').classList.add('hidden')"
                class="absolute top-2 right-2 text-gray-500 hover:text-red-500 text-xl">&times;</button>
        </div>
    </div>
    <!-- END MODAL EDIT -->
<?php endforeach; ?>

<!-- Modal Overlay -->
<div id="addUserModal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
    <div class="glass-card p-3 sm:p-6 rounded-xl w-[95vw] max-w-xs sm:max-w-md relative">
        <h3 class="text-base sm:text-lg font-semibold mb-4 text-start">Add User</h3>
        <!-- Photo Preview -->
        <div class="flex justify-center mb-4">
            <div
                class="w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-gray-200 flex items-center justify-center overflow-hidden border-4 border-blue-200">
                <img id="photoPreview" src="assets/newphoto/profile4.jpg" alt="Preview"
                    class="object-cover w-full h-full" />
            </div>
        </div>
        <form action="mvc/controller/UsersController.php" method="POST" enctype="multipart/form-data"
            class="space-y-3 sm:space-y-4 text-white-600">
            <div>
                <label class="block mb-1 font-medium">Photo</label>
                <input type="file" name="photo" accept="image/*"
                    class="w-full neumorphic-btn px-3 py-2 rounded-lg bg-blue-100 text-gray-600" required
                    onchange="previewPhoto(event)">
            </div>
            <div>
                <label class="block mb-1 font-medium">Name :</label>
                <input type="text" name="name"
                    class="w-full neumorphic-btn px-3 py-2 rounded-lg bg-blue-100 text-gray-600"
                    placeholder="Masukan Nama" required>
            </div>
            <div>
                <label class="block mb-1 font-medium">Phone :</label>
                <input type="number" name="phone"
                    class="w-full neumorphic-btn px-3 py-2 rounded-lg bg-blue-100 text-gray-600"
                    placeholder="Masukan Nomor HP" required>
            </div>
            <div>
                <label class="block mb-1 font-medium">Gender :</label>
                <div class="flex flex-col sm:flex-row sm:space-x-2">
                    <label class="inline-flex items-center">
                        <input type="radio" name="gender" value="Laki-Laki" required class="form-radio text-blue-500">
                        <span class="ml-2">Laki - Laki</span>
                    </label>
                    <label class="inline-flex items-center mt-1 sm:mt-0">
                        <input type="radio" name="gender" value="Perempuan" required class="form-radio text-blue-500">
                        <span class="ml-2">Perempuan</span>
                    </label>
                </div>
            </div>
            <div>
                <label class="block mb-1 font-medium">Address :</label>
                <textarea name="address" rows="3" cols="30"
                    class="w-full neumorphic-btn px-3 py-2 rounded-lg bg-blue-100 text-gray-600"
                    placeholder="Masukan Alamat" required></textarea>
            </div>
            <div>
                <label class="block mb-1 font-medium">Email :</label>
                <input type="email" name="email"
                    class="w-full neumorphic-btn px-3 py-2 rounded-lg bg-blue-100 text-gray-600"
                    placeholder="Masukan Email" required>
            </div>
            <div>
                <label class="block mb-1 font-medium">Password :</label>
                <div class="relative">
                    <input type="password" name="password" id="passwordInput"
                        class="w-full neumorphic-btn px-3 py-2 rounded-lg bg-blue-100 text-gray-600 pr-10" required>
                    <button type="button" onclick="togglePasswordVisibility()"
                        class="absolute inset-y-0 right-2 flex items-center text-gray-500" tabindex="-1"></button>
                </div>
            </div>
            <div class="flex justify-end space-x-2 mt-4">
                <button type="button" onclick="document.getElementById('addUserModal').classList.add('hidden')"
                    class="neumorphic-btn px-4 py-2 rounded-lg bg-gray-500">Cancel</button>
                <button type="submit" name="register-users"
                    class="neumorphic-btn px-4 py-2 rounded-lg bg-blue-500 text-white">Save</button>
            </div>
        </form>
        <button onclick="document.getElementById('addUserModal').classList.add('hidden')"
            class="absolute top-2 right-2 text-gray-500 hover:text-red-500 text-xl">&times;</button>
    </div>
</div>

<script>
    function confirmDeleteUser(userId, userName) {
        Swal.fire({
            title: 'Are you sure?',
            text: `Delete user "${userName}"?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete!',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to delete action (adjust the URL as needed)
                window.location.href =
                    'mvc/controller/UsersController.php?delete=' +
                    encodeURIComponent(userId)
            }
        })
    }
</script>