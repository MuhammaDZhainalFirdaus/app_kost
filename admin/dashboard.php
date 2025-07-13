<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Aplikasi Pengelola Kost</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
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
                    <div style="margin-bottom: 1rem; padding: 1rem; background: #f8f9fa; border-radius: 8px; border-left: 4px solid #28a745;">
                        <strong>Pembayaran Berhasil</strong><br>
                        <small>Budi Santoso - Kamar A2 - Rp 800.000</small><br>
                        <small style="color: #666;">2 jam yang lalu</small>
                    </div>
                    <div style="margin-bottom: 1rem; padding: 1rem; background: #f8f9fa; border-radius: 8px; border-left: 4px solid #007bff;">
                        <strong>Penghuni Baru</strong><br>
                        <small>Ahmad Rizki - Kamar B3</small><br>
                        <small style="color: #666;">1 hari yang lalu</small>
                    </div>
                    <div style="margin-bottom: 1rem; padding: 1rem; background: #f8f9fa; border-radius: 8px; border-left: 4px solid #ffc107;">
                        <strong>Tagihan Dibuat</strong><br>
                        <small>Tagihan Januari 2024 untuk 10 kamar</small><br>
                        <small style="color: #666;">2 hari yang lalu</small>
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
        });
    </script>
</body>
</html> 