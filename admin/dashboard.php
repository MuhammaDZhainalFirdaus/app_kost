<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ../login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Aplikasi Pengelola Kost</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/theme.js"></script>
</head>
<body>
    <!-- Theme Toggle Button -->
    <button class="theme-toggle" id="themeToggle" title="Toggle Dark Mode">
        <svg class="sun-icon" viewBox="0 0 24 24">
            <path d="M12 2.25a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM7.5 12a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM18.894 6.166a.75.75 0 00-1.06-1.06l-1.591 1.59a.75.75 0 101.06 1.061l1.591-1.59zM21.75 12a.75.75 0 01-.75.75h-2.25a.75.75 0 010-1.5H21a.75.75 0 01.75.75zM17.834 18.894a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 10-1.061 1.06l1.59 1.591zM12 18a.75.75 0 01.75.75V21a.75.75 0 01-1.5 0v-2.25A.75.75 0 0112 18zM7.758 17.303a.75.75 0 00-1.061-1.06l-1.591 1.59a.75.75 0 001.06 1.061l1.591-1.59zM6 12a.75.75 0 01-.75.75H3a.75.75 0 010-1.5h2.25A.75.75 0 016 12zM6.697 7.757a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 00-1.061 1.06l1.59 1.591z"/>
        </svg>
        <svg class="moon-icon" viewBox="0 0 24 24">
            <path d="M9.528 1.718a.75.75 0 01.162.819A8.97 8.97 0 009 6a9 9 0 009 9 8.97 8.97 0 003.463-.69.75.75 0 01.981.98 10.503 10.503 0 01-9.694 6.46c-5.799 0-10.5-4.701-10.5-10.5 0-4.368 2.667-8.112 6.46-9.694a.75.75 0 01.818.162z"/>
        </svg>
    </button>

    <!-- Sidebar -->
    <div class="admin-sidebar">
        <h2>Admin Panel</h2>
        <ul class="admin-menu">
            <li><a href="dashboard.php" class="active">Dashboard</a></li>
            <li><a href="penghuni.php">Pengelolaan Penghuni</a></li>
            <li><a href="kamar.php">Pengelolaan Kamar</a></li>
            <li><a href="barang.php">Pengelolaan Barang</a></li>
            <li><a href="kamar_penghuni.php">Kamar-Penghuni</a></li>
            <li><a href="barang_bawaan.php">Barang Bawaan</a></li>
            <li><a href="tagihan.php">Pengelolaan Tagihan</a></li>
            <li><a href="pembayaran.php">Pengelolaan Pembayaran</a></li>
            <li><a href="generate_tagihan.php">Generate Tagihan</a></li>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="../index.php">Kembali ke Dashboard</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="admin-content">
        <div class="admin-header">
            <h1>Dashboard Admin</h1>
        </div>

        <div class="dashboard-grid">
            <!-- Statistik -->
            <div class="card">
                <h2>Statistik Kost</h2>
                <div class="card-content">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        <div style="text-align: center; padding: 1rem; background: #e3f2fd; border-radius: 8px;">
                            <h3 style="color: #1976d2; font-size: 2rem; margin-bottom: 0.5rem;">15</h3>
                            <p style="margin: 0; color: #666;">Total Kamar</p>
                        </div>
                        <div style="text-align: center; padding: 1rem; background: #e8f5e8; border-radius: 8px;">
                            <h3 style="color: #388e3c; font-size: 2rem; margin-bottom: 0.5rem;">10</h3>
                            <p style="margin: 0; color: #666;">Kamar Terisi</p>
                        </div>
                        <div style="text-align: center; padding: 1rem; background: #fff3e0; border-radius: 8px;">
                            <h3 style="color: #f57c00; font-size: 2rem; margin-bottom: 0.5rem;">5</h3>
                            <p style="margin: 0; color: #666;">Kamar Kosong</p>
                        </div>
                        <div style="text-align: center; padding: 1rem; background: #fce4ec; border-radius: 8px;">
                            <h3 style="color: #c2185b; font-size: 2rem; margin-bottom: 0.5rem;">3</h3>
                            <p style="margin: 0; color: #666;">Terlambat Bayar</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Menu Cepat -->
            <div class="card">
                <h2>Menu Cepat</h2>
                <div class="card-content">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        <a href="penghuni.php" class="btn btn-primary" style="text-align: center; display: block;">
                            Kelola Penghuni
                        </a>
                        <a href="kamar.php" class="btn btn-secondary" style="text-align: center; display: block;">
                            Kelola Kamar
                        </a>
                        <a href="tagihan.php" class="btn btn-success" style="text-align: center; display: block;">
                            Kelola Tagihan
                        </a>
                        <a href="generate_tagihan.php" class="btn btn-danger" style="text-align: center; display: block;">
                            Generate Tagihan
                        </a>
                    </div>
                </div>
            </div>

            <!-- Aktivitas Terbaru -->
            <div class="card">
                <h2>Aktivitas Terbaru</h2>
                <div class="card-content">
                    <div class="activity-item" style="border-left-color: #28a745;">
                        <strong>Pembayaran Berhasil</strong><br>
                        <small>Budi Santoso - Kamar A2 - Rp 800.000</small><br>
                        <small>2 jam yang lalu</small>
                    </div>
                    <div class="activity-item" style="border-left-color: #007bff;">
                        <strong>Penghuni Baru</strong><br>
                        <small>Ahmad Rizki - Kamar B3</small><br>
                        <small>1 hari yang lalu</small>
                    </div>
                    <div class="activity-item" style="border-left-color: #ffc107;">
                        <strong>Tagihan Dibuat</strong><br>
                        <small>Tagihan Januari 2024 untuk 10 kamar</small><br>
                        <small>2 hari yang lalu</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Highlight menu aktif
        document.addEventListener('DOMContentLoaded', function() {
            const currentPage = window.location.pathname.split('/').pop();
            const menuLinks = document.querySelectorAll('.admin-menu a');
            
            menuLinks.forEach(link => {
                if (link.getAttribute('href') === currentPage) {
                    link.classList.add('active');
                }
            });
            
            // Theme toggle functionality
            const themeToggle = document.getElementById('themeToggle');
            const html = document.documentElement;
            
            themeToggle.addEventListener('click', function() {
                const currentTheme = html.getAttribute('data-theme');
                const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
                
                html.setAttribute('data-theme', newTheme);
                localStorage.setItem('theme', newTheme);
                
                // Add animation effect
                themeToggle.style.transform = 'scale(0.9)';
                setTimeout(() => {
                    themeToggle.style.transform = 'scale(1)';
                }, 150);
            });
        });
    </script>
</body>
</html> 