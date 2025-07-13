<header class="header">
    <div class="container">
        <div class="header-content">
            <div class="logo">
                <h1>Kost Manager</h1>
            </div>
            <nav class="nav">
                <ul>
                    <li><a href="<?= strpos($_SERVER['PHP_SELF'], '/admin/') !== false ? '../index.php' : 'index.php' ?>">Dashboard</a></li>
                    <li><a href="<?= strpos($_SERVER['PHP_SELF'], '/admin/') !== false ? 'dashboard.php' : 'admin/dashboard.php' ?>">Admin Panel</a></li>
                    <li><a href="<?= strpos($_SERVER['PHP_SELF'], '/admin/') !== false ? 'tentang_saya.php' : 'admin/tentang_saya.php' ?>">Tentang Saya</a></li>
                    <li><a href="<?= strpos($_SERVER['PHP_SELF'], '/admin/') !== false ? '../tentang.php' : 'tentang.php' ?>">Tentang</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header> 