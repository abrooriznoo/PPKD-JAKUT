<header class="flex justify-between items-center mb-8">
    <div class="flex items-center">
        <div class="glass-card p-3 mr-4">
            <i class="fas fa-code text-2xl text-blue-300"></i>
        </div>
        <h1 class="text-2xl md:text-3xl font-bold glow-text">Λ . Я</h1>
    </div>
    <div class="flex items-center space-x-4">
        <div class="glass-card p-3 relative">
            <i class="fas fa-bell text-lg"></i>
            <div class="notification-dot"></div>
        </div>
        <div class="glass-card p-3">
            <i class="fas fa-cog text-lg"></i>
        </div>
        <button type="button" class="glass-card p-2 text-red-500 hover:text-red-700 flex items-center"
            name="logout" onclick="confirmLogout()">
            <i class="fas fa-sign-out-alt mr-1"></i>
            <span class="hidden md:block">Logout</span>
        </button>
    </div>
</header>

<script>
    function confirmLogout() {
        Swal.fire({
            title: 'Are you sure want to Logout?',
            text: ``,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, Logout!',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to delete action (adjust the URL as needed)
                window.location.href =
                    'mvc/controller/SessionsController.php?action=logout';
            }
        })
    }
</script>