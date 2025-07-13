<?php
// Data dummy untuk halaman depan
$kamarKosong = [
    ['nomor' => 'A1', 'harga' => 800000],
    ['nomor' => 'A3', 'harga' => 800000],
    ['nomor' => 'B2', 'harga' => 900000],
    ['nomor' => 'C1', 'harga' => 1000000],
    ['nomor' => 'C4', 'harga' => 1000000]
];

$kamarHarusBayar = [
    ['nomor' => 'A2', 'penghuni' => 'Budi Santoso', 'tagihan' => 800000, 'jatuh_tempo' => '2024-01-15'],
    ['nomor' => 'B1', 'penghuni' => 'Siti Nurhaliza', 'tagihan' => 900000, 'jatuh_tempo' => '2024-01-20'],
    ['nomor' => 'B3', 'penghuni' => 'Ahmad Rizki', 'tagihan' => 900000, 'jatuh_tempo' => '2024-01-25']
];

$kamarTerlambatBayar = [
    ['nomor' => 'A4', 'penghuni' => 'Dewi Sartika', 'tagihan' => 800000, 'terlambat' => 5],
    ['nomor' => 'C2', 'penghuni' => 'Rudi Hartono', 'tagihan' => 1000000, 'terlambat' => 12],
    ['nomor' => 'C3', 'penghuni' => 'Maya Indah', 'tagihan' => 1000000, 'terlambat' => 8]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Aplikasi Pengelola Kost</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <div class="container">
        <h1>Dashboard Pengelola Kost</h1>
        
        <div class="dashboard-grid">
            <!-- Kamar Kosong -->
            <div class="card">
                <h2>Kamar Kosong</h2>
                <div class="card-content">
                    <?php if (empty($kamarKosong)): ?>
                        <p class="no-data">Tidak ada kamar kosong</p>
                    <?php else: ?>
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Nomor Kamar</th>
                                    <th>Harga Sewa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kamarKosong as $kamar): ?>
                                <tr>
                                    <td><?= $kamar['nomor'] ?></td>
                                    <td>Rp <?= number_format($kamar['harga'], 0, ',', '.') ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Kamar Harus Segera Bayar -->
            <div class="card">
                <h2>Harus Segera Bayar</h2>
                <div class="card-content">
                    <?php if (empty($kamarHarusBayar)): ?>
                        <p class="no-data">Tidak ada tagihan yang harus segera dibayar</p>
                    <?php else: ?>
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Nomor Kamar</th>
                                    <th>Penghuni</th>
                                    <th>Tagihan</th>
                                    <th>Jatuh Tempo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kamarHarusBayar as $kamar): ?>
                                <tr>
                                    <td><?= $kamar['nomor'] ?></td>
                                    <td><?= $kamar['penghuni'] ?></td>
                                    <td>Rp <?= number_format($kamar['tagihan'], 0, ',', '.') ?></td>
                                    <td><?= date('d/m/Y', strtotime($kamar['jatuh_tempo'])) ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Kamar Terlambat Bayar -->
            <div class="card">
                <h2>Terlambat Bayar</h2>
                <div class="card-content">
                    <?php if (empty($kamarTerlambatBayar)): ?>
                        <p class="no-data">Tidak ada yang terlambat bayar</p>
                    <?php else: ?>
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Nomor Kamar</th>
                                    <th>Penghuni</th>
                                    <th>Tagihan</th>
                                    <th>Terlambat (Hari)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kamarTerlambatBayar as $kamar): ?>
                                <tr class="late-payment">
                                    <td><?= $kamar['nomor'] ?></td>
                                    <td><?= $kamar['penghuni'] ?></td>
                                    <td>Rp <?= number_format($kamar['tagihan'], 0, ',', '.') ?></td>
                                    <td><?= $kamar['terlambat'] ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="action-buttons">
            <a href="admin/dashboard.php" class="btn btn-primary">Masuk ke Admin Panel</a>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>
</html> 