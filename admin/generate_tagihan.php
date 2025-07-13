<?php
// Data dummy kamar yang terisi
$kamarTerisi = [
    [
        'id' => 2,
        'nomor_kamar' => 'A2',
        'nama_penghuni' => 'Budi Santoso',
        'harga_sewa' => 800000
    ],
    [
        'id' => 4,
        'nomor_kamar' => 'A4',
        'nama_penghuni' => 'Dewi Sartika',
        'harga_sewa' => 800000
    ],
    [
        'id' => 5,
        'nomor_kamar' => 'B1',
        'nama_penghuni' => 'Siti Nurhaliza',
        'harga_sewa' => 900000
    ],
    [
        'id' => 7,
        'nomor_kamar' => 'B3',
        'nama_penghuni' => 'Ahmad Rizki',
        'harga_sewa' => 900000
    ],
    [
        'id' => 9,
        'nomor_kamar' => 'C2',
        'nama_penghuni' => 'Rudi Hartono',
        'harga_sewa' => 1000000
    ],
    [
        'id' => 10,
        'nomor_kamar' => 'C3',
        'nama_penghuni' => 'Maya Indah',
        'harga_sewa' => 1000000
    ]
];

// Data dummy tagihan yang sudah ada
$tagihanExisting = [
    'Januari 2024' => ['A2', 'A4', 'B1', 'B3', 'C2', 'C3'],
    'Desember 2023' => ['A2', 'A4']
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Tagihan - Admin Panel</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <!-- Sidebar -->
    <div class="admin-sidebar">
        <h2>Admin Panel</h2>
        <ul class="admin-menu">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="penghuni.php">Pengelolaan Penghuni</a></li>
            <li><a href="kamar.php">Pengelolaan Kamar</a></li>
            <li><a href="barang.php">Pengelolaan Barang</a></li>
            <li><a href="kamar_penghuni.php">Kamar-Penghuni</a></li>
            <li><a href="barang_bawaan.php">Barang Bawaan</a></li>
            <li><a href="tagihan.php">Pengelolaan Tagihan</a></li>
            <li><a href="pembayaran.php">Pengelolaan Pembayaran</a></li>
            <li><a href="generate_tagihan.php" class="active">Generate Tagihan</a></li>
            <li><a href="../index.php">Kembali ke Dashboard</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="admin-content">
        <div class="admin-header">
            <h1>Generate Tagihan Bulanan</h1>
        </div>

        <!-- Form Generate Tagihan -->
        <div class="card">
            <h2>Generate Tagihan Baru</h2>
            <div class="card-content">
                <form id="generateForm">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 2rem;">
                        <div class="form-group">
                            <label for="bulan">Bulan dan Tahun</label>
                            <input type="month" id="bulan" name="bulan" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="tgl_jatuh_tempo">Tanggal Jatuh Tempo</label>
                            <input type="date" id="tgl_jatuh_tempo" name="tgl_jatuh_tempo" class="form-control" required>
                        </div>
                    </div>
                    
                    <div style="margin-bottom: 2rem;">
                        <h3>Kamar yang akan ditagih:</h3>
                        <div style="background: #f8f9fa; padding: 1rem; border-radius: 8px;">
                            <?php if (empty($kamarTerisi)): ?>
                                <p style="color: #6c757d; font-style: italic;">Tidak ada kamar yang terisi</p>
                            <?php else: ?>
                                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1rem;">
                                    <?php foreach ($kamarTerisi as $kamar): ?>
                                    <div style="background: white; padding: 1rem; border-radius: 8px; border-left: 4px solid #007bff;">
                                        <h4 style="margin: 0 0 0.5rem 0; color: #007bff;"><?= $kamar['nomor_kamar'] ?></h4>
                                        <p style="margin: 0.25rem 0; color: #666;">Penghuni: <strong><?= $kamar['nama_penghuni'] ?></strong></p>
                                        <p style="margin: 0.25rem 0; color: #666;">Harga: <strong>Rp <?= number_format($kamar['harga_sewa'], 0, ',', '.') ?></strong></p>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div style="margin-bottom: 2rem;">
                        <h3>Ringkasan Tagihan:</h3>
                        <div style="background: #e8f5e8; padding: 1rem; border-radius: 8px; border-left: 4px solid #28a745;">
                            <p style="margin: 0.25rem 0;"><strong>Total Kamar:</strong> <?= count($kamarTerisi) ?> kamar</p>
                            <p style="margin: 0.25rem 0;"><strong>Total Nilai:</strong> Rp <?= number_format(array_sum(array_column($kamarTerisi, 'harga_sewa')), 0, ',', '.') ?></p>
                            <p style="margin: 0.25rem 0;"><strong>Status:</strong> <span style="color: #28a745; font-weight: bold;">Siap untuk generate</span></p>
                        </div>
                    </div>

                    <div style="text-align: center;">
                        <button type="submit" class="btn btn-success" style="font-size: 1.2rem; padding: 1rem 2rem;">
                            <strong>Generate Tagihan Bulanan</strong>
                        </button>
                        <a href="tagihan.php" class="btn btn-secondary" style="font-size: 1.2rem; padding: 1rem 2rem; margin-left: 1rem;">
                            Lihat Daftar Tagihan
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Riwayat Generate -->
        <div class="card" style="margin-top: 2rem;">
            <h2>Riwayat Generate Tagihan</h2>
            <div class="card-content">
                <?php if (empty($tagihanExisting)): ?>
                    <p class="no-data">Belum ada tagihan yang di-generate</p>
                <?php else: ?>
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1rem;">
                        <?php foreach ($tagihanExisting as $bulan => $kamarList): ?>
                        <div style="background: #f8f9fa; padding: 1.5rem; border-radius: 8px; border-left: 4px solid #007bff;">
                            <h4 style="margin: 0 0 1rem 0; color: #007bff;"><?= $bulan ?></h4>
                            <p style="margin: 0.5rem 0; color: #666;"><strong>Jumlah Kamar:</strong> <?= count($kamarList) ?> kamar</p>
                            <p style="margin: 0.5rem 0; color: #666;"><strong>Kamar:</strong></p>
                            <div style="display: flex; flex-wrap: wrap; gap: 0.5rem; margin-top: 0.5rem;">
                                <?php foreach ($kamarList as $kamar): ?>
                                <span style="background: #007bff; color: white; padding: 0.25rem 0.5rem; border-radius: 4px; font-size: 0.8rem;">
                                    <?= $kamar ?>
                                </span>
                                <?php endforeach; ?>
                            </div>
                            <p style="margin: 1rem 0 0 0; color: #28a745; font-weight: bold;">
                                ✓ Tagihan berhasil di-generate
                            </p>
                        </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Instruksi -->
        <div class="card" style="margin-top: 2rem;">
            <h2>Instruksi Generate Tagihan</h2>
            <div class="card-content">
                <div style="background: #fff3cd; padding: 1rem; border-radius: 8px; border-left: 4px solid #ffc107;">
                    <h4 style="margin: 0 0 1rem 0; color: #856404;">Panduan Generate Tagihan:</h4>
                    <ol style="margin: 0; padding-left: 1.5rem; color: #856404;">
                        <li>Pilih bulan dan tahun untuk tagihan yang akan di-generate</li>
                        <li>Set tanggal jatuh tempo pembayaran</li>
                        <li>Sistem akan otomatis menagih semua kamar yang terisi</li>
                        <li>Tagihan akan dibuat berdasarkan harga sewa masing-masing kamar</li>
                        <li>Setelah di-generate, tagihan dapat dikelola di halaman "Pengelolaan Tagihan"</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Set default values
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date();
            const nextMonth = new Date(today.getFullYear(), today.getMonth() + 1, 1);
            
            // Set default bulan ke bulan depan
            document.getElementById('bulan').value = nextMonth.toISOString().slice(0, 7);
            
            // Set default jatuh tempo ke tanggal 15 bulan depan
            const jatuhTempo = new Date(today.getFullYear(), today.getMonth() + 1, 15);
            document.getElementById('tgl_jatuh_tempo').value = jatuhTempo.toISOString().slice(0, 10);
        });

        document.getElementById('generateForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const bulan = document.getElementById('bulan').value;
            const jatuhTempo = document.getElementById('tgl_jatuh_tempo').value;
            
            if (!bulan || !jatuhTempo) {
                alert('Mohon lengkapi semua field!');
                return;
            }
            
            // Simulasi proses generate
            const loadingBtn = e.target.querySelector('button[type="submit"]');
            const originalText = loadingBtn.innerHTML;
            
            loadingBtn.innerHTML = '<strong>Generating...</strong>';
            loadingBtn.disabled = true;
            
            setTimeout(() => {
                alert('Tagihan berhasil di-generate!\n\nBulan: ' + bulan + '\nJatuh Tempo: ' + jatuhTempo + '\nJumlah Tagihan: <?= count($kamarTerisi) ?> tagihan\nTotal Nilai: Rp <?= number_format(array_sum(array_column($kamarTerisi, 'harga_sewa')), 0, ',', '.') ?>');
                
                loadingBtn.innerHTML = originalText;
                loadingBtn.disabled = false;
                
                // Redirect ke halaman tagihan
                window.location.href = 'tagihan.php';
            }, 2000);
        });
    </script>
</body>
</html> 