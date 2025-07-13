<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pengelola Kost</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/theme.js"></script>
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

    <?php include 'includes/header.php'; ?>

    <div class="container">
        <h1>Dashboard Kost Management</h1>
        
        <div class="dashboard-grid">
            <!-- Kamar Tersedia -->
            <div class="card">
                <h2>Kamar Tersedia</h2>
                <div class="card-content">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Nomor Kamar</th>
                                <th>Lantai</th>
                                <th>Harga</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>A1</td>
                                <td>1</td>
                                <td>Rp 800.000</td>
                                <td><span style="color: #28a745;">Tersedia</span></td>
                            </tr>
                            <tr>
                                <td>A3</td>
                                <td>1</td>
                                <td>Rp 800.000</td>
                                <td><span style="color: #28a745;">Tersedia</span></td>
                            </tr>
                            <tr>
                                <td>B2</td>
                                <td>2</td>
                                <td>Rp 900.000</td>
                                <td><span style="color: #28a745;">Tersedia</span></td>
                            </tr>
                            <tr>
                                <td>C1</td>
                                <td>3</td>
                                <td>Rp 1.000.000</td>
                                <td><span style="color: #28a745;">Tersedia</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Kamar Perlu Pembayaran -->
            <div class="card">
                <h2>Kamar Perlu Pembayaran</h2>
                <div class="card-content">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Nomor Kamar</th>
                                <th>Penghuni</th>
                                <th>Jatuh Tempo</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>A2</td>
                                <td>Budi Santoso</td>
                                <td>15 Jan 2024</td>
                                <td>Rp 800.000</td>
                            </tr>
                            <tr>
                                <td>B1</td>
                                <td>Siti Nurhaliza</td>
                                <td>20 Jan 2024</td>
                                <td>Rp 900.000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Kamar Terlambat Bayar -->
            <div class="card">
                <h2>Kamar Terlambat Bayar</h2>
                <div class="card-content">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Nomor Kamar</th>
                                <th>Penghuni</th>
                                <th>Jatuh Tempo</th>
                                <th>Keterlambatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="late-payment">
                                <td>B3</td>
                                <td>Ahmad Rizki</td>
                                <td>5 Jan 2024</td>
                                <td>10 hari</td>
                            </tr>
                            <tr class="late-payment">
                                <td>C2</td>
                                <td>Dewi Sartika</td>
                                <td>8 Jan 2024</td>
                                <td>7 hari</td>
                            </tr>
                            <tr class="late-payment">
                                <td>A4</td>
                                <td>Rudi Hartono</td>
                                <td>10 Jan 2024</td>
                                <td>5 hari</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="action-buttons">
            <a href="admin/dashboard.php" class="btn btn-primary">Akses Admin Panel</a>
            <a href="login.php" class="btn btn-secondary">Login Admin</a>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>

    <script>
        // Theme toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
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