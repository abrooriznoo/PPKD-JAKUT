<!-- TABLE USERS -->
<div class="glass-card">
        <?php
        include 'mvc/controller/UsersController.php';
        $users = getAllUsers($conn);
        $no = 1;
        ?>
        <?php
        // Paging setup
        $perPage = 5;
        $totalUsers = count($users);
        $totalPages = ceil($totalUsers / $perPage);
        $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
        $start = ($page - 1) * $perPage;
        $usersPage = array_slice($users, $start, $perPage);
        $no = $start + 1;
        ?>
        <table class="w-full text-left bg-blue-600 bg-opacity-10 rounded-xl shadow">
                <thead>
                        <tr>
                                <th class="p-3">No.</th>
                                <th class="p-3">Photo</th>
                                <th class="p-3">Name</th>
                                <th class="p-3">Phone</th>
                                <th class="p-3">Gender</th>
                                <th class="p-3">Address</th>
                                <th class="p-3">Email</th>
                                <th class="p-3">Actions</th>
                        </tr>
                </thead>
                <tbody>
                        <?php foreach ($usersPage as $user): ?>
                                <tr>
                                        <td class="p-3"><?= $no++ ?>.</td>
                                        <td class="p-3">
                                                <img src="assets/newphoto/<?= $user["photo"] ?>" alt=""
                                                        class="w-10 h-10 rounded-full object-cover bg-gray-200" />
                                        </td>
                                        <td class="p-3"><?= $user["name"] ?></td>
                                        <td class="p-3"><?= $user["phone"] ?></td>
                                        <td class="p-3"><?= $user["gender"] ?></td>
                                        <td class="p-3"><?= $user["address"] ?></td>
                                        <td class="p-3"><?= $user["email"] ?></td>
                                        <td class="p-3">
                                                <button class="neumorphic-btn px-2 py-1 text-sm rounded-lg">Edit</button>
                                                <button
                                                        class="neumorphic-btn px-2 py-1 text-sm text-red-500 rounded-lg">Delete</button>
                                        </td>
                                </tr>
                        <?php endforeach; ?>
                </tbody>
                <tfoot>
                        <tr>
                                <td colspan="8" class="p-3">
                                        <div class="flex justify-between items-center">
                                                <small>
                                                        Showing <?= htmlspecialchars($start + 1) ?> -
                                                        <?= htmlspecialchars(min($start + $perPage, $totalUsers)) ?> of
                                                        <?= htmlspecialchars($totalUsers) ?> users
                                                </small>
                                                <div class="flex space-x-2">
                                                        <?php if ($page > 1): ?>
                                                                <a href="?page=<?= $page - 1 ?>"
                                                                        class="neumorphic-btn px-2 py-1 text-sm rounded-lg">&laquo;
                                                                        Prev</a>
                                                        <?php endif; ?>

                                                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                                                <a href="?page=<?= $i ?>"
                                                                        class="neumorphic-btn px-2 py-1 text-sm rounded-lg <?= ($i == $page) ? 'bg-blue-500 text-white' : '' ?>">
                                                                        <?= $i ?>
                                                                </a>
                                                        <?php endfor; ?>

                                                        <?php if ($page < $totalPages): ?>
                                                                <a href="?page=<?= $page + 1 ?>"
                                                                        class="neumorphic-btn px-2 py-1 text-sm rounded-lg">Next
                                                                        &raquo;</a>
                                                        <?php endif; ?>
                                                </div>
                                        </div>
                                </td>
                        </tr>
                </tfoot>
        </table>
</div>