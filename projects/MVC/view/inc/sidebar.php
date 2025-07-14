<aside class="w-full md:w-64 flex-shrink-0">
    <div class="glass-card p-4 mb-6">
        <div class="flex items-center mb-6">
            <img src="assets/newphoto/<?= $_SESSION['photos'] ?? 'assets/newphoto/Profile4.jpg' ?>" alt="Profile Photo"
                class="w-12 h-12 rounded-full object-cover mr-3">
            <div>
                <h3 class="font-semibold"><?= $_SESSION['fullname'] ?></h3>
                <p class="text-xs opacity-75">Administrator</p>
            </div>
        </div>

        <div class="space-y-2">
            <div class="sidebar-item p-3 rounded-lg flex items-center">
                <a href="index.php">
                    <i class="fas fa-chart-line mr-3 text-blue-300"></i>
                    <span>Dashboard</span>
                </a>
            </div>
            <div class="sidebar-item p-3 rounded-lg flex items-center">
                <i class="fas fa-database mr-3"></i>
                <span>Data Analytics</span>
            </div>
            <div class="sidebar-item p-3 rounded-lg flex items-center">
                <a href="?page=users">
                    <i class="fas fa-users mr-3"></i>
                    <span>User Management</span>
                </a>
            </div>
            <div class="sidebar-item p-3 rounded-lg flex items-center">
                <i class="fas fa-cube mr-3"></i>
                <span>Modules</span>
            </div>
            <div class="sidebar-item p-3 rounded-lg flex items-center">
                <i class="fas fa-chart-pie mr-3"></i>
                <span>Reports</span>
            </div>
            <div class="sidebar-item p-3 rounded-lg flex items-center">
                <i class="fas fa-cog mr-3"></i>
                <span>Settings</span>
            </div>
        </div>
    </div>

    <!-- <div class="glass-card p-4">
        <h3 class="font-semibold mb-3">System Status</h3>
        <div class="space-y-3">
            <div>
                <div class="flex justify-between text-sm mb-1">
                    <span>CPU Usage</span>
                    <span>42%</span>
                </div>
                <div class="progress-bar">
                    <div class="progress-fill" style="width: 42%"></div>
                </div>
            </div>
            <div>
                <div class="flex justify-between text-sm mb-1">
                    <span>Memory</span>
                    <span>68%</span>
                </div>
                <div class="progress-bar">
                    <div class="progress-fill" style="width: 68%"></div>
                </div>
            </div>
            <div>
                <div class="flex justify-between text-sm mb-1">
                    <span>Storage</span>
                    <span>35%</span>
                </div>
                <div class="progress-bar">
                    <div class="progress-fill" style="width: 35%"></div>
                </div>
            </div>
        </div>
    </div> -->
</aside>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const urlParams = new URLSearchParams(window.location.search);
        const currentPage = urlParams.get('page');

        // Ambil semua link sidebar
        const navLinks = document.querySelectorAll('aside .sidebar-item a');

        let found = false;

        navLinks.forEach((link) => {
            const href = link.getAttribute('href');

            if (href.includes('?page=')) {
                const linkParams = new URLSearchParams(href.split('?')[1]);
                const linkPage = linkParams.get('page');

                if (linkPage === currentPage) {
                    link.parentElement.classList.add('active');
                    found = true;
                } else {
                    link.parentElement.classList.remove('active');
                }
            }
        });

        // Jika tidak ada ?page= di URL, aktifkan link index.php
        if (!currentPage && !found) {
            navLinks.forEach((link) => {
                const href = link.getAttribute('href');
                if (href === 'index.php' || href === './index.php' || href === '/') {
                    link.parentElement.classList.add('active');
                } else {
                    link.parentElement.classList.remove('active');
                }
            });
        }
    });
</script>