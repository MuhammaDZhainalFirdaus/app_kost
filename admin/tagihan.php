<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ../login.php');
    exit;
}
// Data dummy tagihan
$tagihan = [
    [
        'id' => 1,
        'bulan' => 'Januari 2024',
        'id_kamar_penghuni' => 1,
        'nomor_kamar' => 'A2',
        'nama_penghuni' => 'Budi Santoso',
        'jumlah_tagihan' => 800000,
        'status' => 'lunas',
        'tgl_jatuh_tempo' => '2024-01-15'
    ],
    [
        'id' => 2,
        'bulan' => 'Januari 2024',
        'id_kamar_penghuni' => 2,
        'nomor_kamar' => 'A4',
        'nama_penghuni' => 'Dewi Sartika',
        'jumlah_tagihan' => 800000,
        'status' => 'belum_lunas',
        'tgl_jatuh_tempo' => '2024-01-15'
    ],
    [
        'id' => 3,
        'bulan' => 'Januari 2024',
        'id_kamar_penghuni' => 3,
        'nomor_kamar' => 'B1',
        'nama_penghuni' => 'Siti Nurhaliza',
        'jumlah_tagihan' => 900000,
        'status' => 'belum_lunas',
        'tgl_jatuh_tempo' => '2024-01-20'
    ],
    [
        'id' => 4,
        'bulan' => 'Januari 2024',
        'id_kamar_penghuni' => 4,
        'nomor_kamar' => 'B3',
        'nama_penghuni' => 'Ahmad Rizki',
        'jumlah_tagihan' => 900000,
        'status' => 'belum_lunas',
        'tgl_jatuh_tempo' => '2024-01-25'
    ],
    [
        'id' => 5,
        'bulan' => 'Januari 2024',
        'id_kamar_penghuni' => 5,
        'nomor_kamar' => 'C2',
        'nama_penghuni' => 'Rudi Hartono',
        'jumlah_tagihan' => 1000000,
        'status' => 'belum_lunas',
        'tgl_jatuh_tempo' => '2024-01-15'
    ],
    [
        'id' => 6,
        'bulan' => 'Januari 2024',
        'id_kamar_penghuni' => 6,
        'nomor_kamar' => 'C3',
        'nama_penghuni' => 'Maya Indah',
        'jumlah_tagihan' => 1000000,
        'status' => 'belum_lunas',
        'tgl_jatuh_tempo' => '2024-01-15'
    ],
    [
        'id' => 7,
        'bulan' => 'Desember 2023',
        'id_kamar_penghuni' => 1,
        'nomor_kamar' => 'A2',
        'nama_penghuni' => 'Budi Santoso',
        'jumlah_tagihan' => 800000,
        'status' => 'lunas',
        'tgl_jatuh_tempo' => '2023-12-15'
    ],
    [
        'id' => 8,
        'bulan' => 'Desember 2023',
        'id_kamar_penghuni' => 2,
        'nomor_kamar' => 'A4',
        'nama_penghuni' => 'Dewi Sartika',
        'jumlah_tagihan' => 800000,
        'status' => 'lunas',
        'tgl_jatuh_tempo' => '2023-12-15'
    ]
];

// Data dummy untuk dropdown
$kamarPenghuniAktif = [
    ['id' => 1, 'nomor_kamar' => 'A2', 'nama_penghuni' => 'Budi Santoso'],
    ['id' => 2, 'nomor_kamar' => 'A4', 'nama_penghuni' => 'Dewi Sartika'],
    ['id' => 3, 'nomor_kamar' => 'B1', 'nama_penghuni' => 'Siti Nurhaliza'],
    ['id' => 4, 'nomor_kamar' => 'B3', 'nama_penghuni' => 'Ahmad Rizki'],
    ['id' => 5, 'nomor_kamar' => 'C2', 'nama_penghuni' => 'Rudi Hartono'],
    ['id' => 6, 'nomor_kamar' => 'C3', 'nama_penghuni' => 'Maya Indah']
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengelolaan Tagihan - Admin Panel</title>
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
            <li><a href="tagihan.php" class="active">Pengelolaan Tagihan</a></li>
            <li><a href="pembayaran.php">Pengelolaan Pembayaran</a></li>
            <li><a href="generate_tagihan.php">Generate Tagihan</a></li>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="../index.php">Kembali ke Dashboard</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="admin-content">
        <div class="admin-header">
            <h1>Pengelolaan Tagihan</h1>
        </div>

        <!-- Tombol Tambah -->
        <div style="margin-bottom: 2rem;">
            <button class="btn btn-primary" onclick="showAddForm()">Tambah Tagihan Manual</button>
            <a href="generate_tagihan.php" class="btn btn-success">Generate Tagihan Bulanan</a>
        </div>

        <!-- Form Tambah/Edit (Hidden by default) -->
        <div id="formTagihan" style="display: none; background: white; padding: 2rem; border-radius: 10px; margin-bottom: 2rem; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <h3 id="formTitle">Tambah Tagihan Manual</h3>
            <form id="tagihanForm">
                <input type="hidden" id="tagihanId" name="id">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <div class="form-group">
                        <label for="bulan">Bulan</label>
                        <input type="month" id="bulan" name="bulan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="id_kamar_penghuni">Kamar-Penghuni</label>
                        <select id="id_kamar_penghuni" name="id_kamar_penghuni" class="form-control" required>
                            <option value="">Pilih Kamar-Penghuni</option>
                            <?php foreach ($kamarPenghuniAktif as $kp): ?>
                                <option value="<?= $kp['id'] ?>"><?= $kp['nomor_kamar'] ?> - <?= $kp['nama_penghuni'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_tagihan">Jumlah Tagihan</label>
                        <input type="number" id="jumlah_tagihan" name="jumlah_tagihan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="tgl_jatuh_tempo">Tanggal Jatuh Tempo</label>
                        <input type="date" id="tgl_jatuh_tempo" name="tgl_jatuh_tempo" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status" class="form-control" required>
                            <option value="belum_lunas">Belum Lunas</option>
                            <option value="lunas">Lunas</option>
                        </select>
                    </div>
                </div>
                <div style="margin-top: 1rem;">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-secondary" onclick="hideForm()">Batal</button>
                </div>
            </form>
        </div>

        <!-- Statistik -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-bottom: 2rem;">
            <div style="background: white; padding: 1.5rem; border-radius: 10px; text-align: center; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <h3 style="color: #007bff; font-size: 2rem; margin-bottom: 0.5rem;"><?= count($tagihan) ?></h3>
                <p style="margin: 0; color: #666;">Total Tagihan</p>
            </div>
            <div style="background: white; padding: 1.5rem; border-radius: 10px; text-align: center; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <h3 style="color: #28a745; font-size: 2rem; margin-bottom: 0.5rem;"><?= count(array_filter($tagihan, function($t) { return $t['status'] == 'lunas'; })) ?></h3>
                <p style="margin: 0; color: #666;">Lunas</p>
            </div>
            <div style="background: white; padding: 1.5rem; border-radius: 10px; text-align: center; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <h3 style="color: #dc3545; font-size: 2rem; margin-bottom: 0.5rem;"><?= count(array_filter($tagihan, function($t) { return $t['status'] == 'belum_lunas'; })) ?></h3>
                <p style="margin: 0; color: #666;">Belum Lunas</p>
            </div>
            <div style="background: white; padding: 1.5rem; border-radius: 10px; text-align: center; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <h3 style="color: #ffc107; font-size: 2rem; margin-bottom: 0.5rem;">Rp <?= number_format(array_sum(array_column($tagihan, 'jumlah_tagihan')), 0, ',', '.') ?></h3>
                <p style="margin: 0; color: #666;">Total Nilai</p>
            </div>
        </div>

        <!-- Filter -->
        <div style="background: white; padding: 1rem; border-radius: 10px; margin-bottom: 2rem; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <h3 style="margin-bottom: 1rem;">Filter Tagihan</h3>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                <div class="form-group">
                    <label for="filterBulan">Bulan</label>
                    <select id="filterBulan" class="form-control" onchange="filterTagihan()">
                        <option value="">Semua Bulan</option>
                        <option value="Januari 2024">Januari 2024</option>
                        <option value="Desember 2023">Desember 2023</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="filterStatus">Status</label>
                    <select id="filterStatus" class="form-control" onchange="filterTagihan()">
                        <option value="">Semua Status</option>
                        <option value="lunas">Lunas</option>
                        <option value="belum_lunas">Belum Lunas</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Tabel Tagihan -->
        <div class="card">
            <h2>Daftar Tagihan</h2>
            <div class="card-content">
                <?php if (empty($tagihan)): ?>
                    <p class="no-data">Tidak ada data tagihan</p>
                <?php else: ?>
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Bulan</th>
                                <th>Kamar</th>
                                <th>Penghuni</th>
                                <th>Jumlah Tagihan</th>
                                <th>Jatuh Tempo</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tagihanTableBody">
                            <?php foreach ($tagihan as $t): ?>
                            <tr data-bulan="<?= $t['bulan'] ?>" data-status="<?= $t['status'] ?>">
                                <td><?= $t['id'] ?></td>
                                <td><strong><?= $t['bulan'] ?></strong></td>
                                <td><?= $t['nomor_kamar'] ?></td>
                                <td><?= $t['nama_penghuni'] ?></td>
                                <td>Rp <?= number_format($t['jumlah_tagihan'], 0, ',', '.') ?></td>
                                <td><?= date('d/m/Y', strtotime($t['tgl_jatuh_tempo'])) ?></td>
                                <td>
                                    <?php if ($t['status'] == 'lunas'): ?>
                                        <span style="color: #28a745; font-weight: bold;">Lunas</span>
                                    <?php else: ?>
                                        <span style="color: #dc3545; font-weight: bold;">Belum Lunas</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <button class="btn btn-secondary" style="padding: 0.25rem 0.5rem; font-size: 0.8rem;" onclick="editTagihan(<?= htmlspecialchars(json_encode($t)) ?>)">Edit</button>
                                    <button class="btn btn-danger" style="padding: 0.25rem 0.5rem; font-size: 0.8rem;" onclick="deleteTagihan(<?= $t['id'] ?>)">Hapus</button>
                                    <?php if ($t['status'] == 'belum_lunas'): ?>
                                        <button class="btn btn-success" style="padding: 0.25rem 0.5rem; font-size: 0.8rem;" onclick="markAsPaid(<?= $t['id'] ?>)">Tandai Lunas</button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
        function showAddForm() {
            document.getElementById('formTagihan').style.display = 'block';
            document.getElementById('formTitle').textContent = 'Tambah Tagihan Manual';
            document.getElementById('tagihanForm').reset();
            document.getElementById('tagihanId').value = '';
        }

        function hideForm() {
            document.getElementById('formTagihan').style.display = 'none';
        }

        function editTagihan(tagihan) {
            document.getElementById('formTagihan').style.display = 'block';
            document.getElementById('formTitle').textContent = 'Edit Tagihan';
            document.getElementById('tagihanId').value = tagihan.id;
            document.getElementById('bulan').value = tagihan.bulan.replace(' ', '-');
            document.getElementById('id_kamar_penghuni').value = tagihan.id_kamar_penghuni;
            document.getElementById('jumlah_tagihan').value = tagihan.jumlah_tagihan;
            document.getElementById('tgl_jatuh_tempo').value = tagihan.tgl_jatuh_tempo;
            document.getElementById('status').value = tagihan.status;
        }

        function deleteTagihan(id) {
            if (confirm('Apakah Anda yakin ingin menghapus tagihan ini?')) {
                alert('Tagihan dengan ID ' + id + ' berhasil dihapus!');
                // Dalam implementasi nyata, ini akan mengirim request ke server
            }
        }

        function markAsPaid(id) {
            if (confirm('Apakah Anda yakin ingin menandai tagihan ini sebagai lunas?')) {
                alert('Tagihan dengan ID ' + id + ' berhasil ditandai sebagai lunas!');
                // Dalam implementasi nyata, ini akan mengirim request ke server
            }
        }

        function filterTagihan() {
            const bulan = document.getElementById('filterBulan').value;
            const status = document.getElementById('filterStatus').value;
            const rows = document.querySelectorAll('#tagihanTableBody tr');

            rows.forEach(row => {
                const rowBulan = row.getAttribute('data-bulan');
                const rowStatus = row.getAttribute('data-status');
                
                const matchBulan = !bulan || rowBulan === bulan;
                const matchStatus = !status || rowStatus === status;
                
                if (matchBulan && matchStatus) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        document.getElementById('tagihanForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const id = formData.get('id');
            
            if (id) {
                alert('Data tagihan berhasil diperbarui!');
            } else {
                alert('Data tagihan berhasil ditambahkan!');
            }
            
            hideForm();
        });
    </script>
</body>
</html> 