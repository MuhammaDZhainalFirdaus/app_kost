<?php
// Data dummy pembayaran
$pembayaran = [
    [
        'id' => 1,
        'id_tagihan' => 1,
        'bulan_tagihan' => 'Januari 2024',
        'nomor_kamar' => 'A2',
        'nama_penghuni' => 'Budi Santoso',
        'jumlah_tagihan' => 800000,
        'jumlah_bayar' => 800000,
        'tgl_bayar' => '2024-01-10',
        'status' => 'lunas',
        'metode_pembayaran' => 'Transfer Bank'
    ],
    [
        'id' => 2,
        'id_tagihan' => 7,
        'bulan_tagihan' => 'Desember 2023',
        'nomor_kamar' => 'A2',
        'nama_penghuni' => 'Budi Santoso',
        'jumlah_tagihan' => 800000,
        'jumlah_bayar' => 800000,
        'tgl_bayar' => '2023-12-12',
        'status' => 'lunas',
        'metode_pembayaran' => 'Cash'
    ],
    [
        'id' => 3,
        'id_tagihan' => 8,
        'bulan_tagihan' => 'Desember 2023',
        'nomor_kamar' => 'A4',
        'nama_penghuni' => 'Dewi Sartika',
        'jumlah_tagihan' => 800000,
        'jumlah_bayar' => 800000,
        'tgl_bayar' => '2023-12-14',
        'status' => 'lunas',
        'metode_pembayaran' => 'Transfer Bank'
    ],
    [
        'id' => 4,
        'id_tagihan' => 2,
        'bulan_tagihan' => 'Januari 2024',
        'nomor_kamar' => 'A4',
        'nama_penghuni' => 'Dewi Sartika',
        'jumlah_tagihan' => 800000,
        'jumlah_bayar' => 400000,
        'tgl_bayar' => '2024-01-12',
        'status' => 'sebagian',
        'metode_pembayaran' => 'Cash'
    ],
    [
        'id' => 5,
        'id_tagihan' => 3,
        'bulan_tagihan' => 'Januari 2024',
        'nomor_kamar' => 'B1',
        'nama_penghuni' => 'Siti Nurhaliza',
        'jumlah_tagihan' => 900000,
        'jumlah_bayar' => 0,
        'tgl_bayar' => null,
        'status' => 'belum_bayar',
        'metode_pembayaran' => '-'
    ]
];

// Data dummy tagihan yang belum lunas
$tagihanBelumLunas = [
    ['id' => 2, 'bulan' => 'Januari 2024', 'nomor_kamar' => 'A4', 'nama_penghuni' => 'Dewi Sartika', 'jumlah' => 800000, 'sisa' => 400000],
    ['id' => 3, 'bulan' => 'Januari 2024', 'nomor_kamar' => 'B1', 'nama_penghuni' => 'Siti Nurhaliza', 'jumlah' => 900000, 'sisa' => 900000],
    ['id' => 4, 'bulan' => 'Januari 2024', 'nomor_kamar' => 'B3', 'nama_penghuni' => 'Ahmad Rizki', 'jumlah' => 900000, 'sisa' => 900000],
    ['id' => 5, 'bulan' => 'Januari 2024', 'nomor_kamar' => 'C2', 'nama_penghuni' => 'Rudi Hartono', 'jumlah' => 1000000, 'sisa' => 1000000],
    ['id' => 6, 'bulan' => 'Januari 2024', 'nomor_kamar' => 'C3', 'nama_penghuni' => 'Maya Indah', 'jumlah' => 1000000, 'sisa' => 1000000]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengelolaan Pembayaran - Admin Panel</title>
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
            <li><a href="pembayaran.php" class="active">Pengelolaan Pembayaran</a></li>
            <li><a href="generate_tagihan.php">Generate Tagihan</a></li>
            <li><a href="../index.php">Kembali ke Dashboard</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="admin-content">
        <div class="admin-header">
            <h1>Pengelolaan Pembayaran</h1>
        </div>

        <!-- Tombol Tambah -->
        <div style="margin-bottom: 2rem;">
            <button class="btn btn-primary" onclick="showAddForm()">Tambah Pembayaran</button>
        </div>

        <!-- Form Tambah/Edit (Hidden by default) -->
        <div id="formPembayaran" style="display: none; background: white; padding: 2rem; border-radius: 10px; margin-bottom: 2rem; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <h3 id="formTitle">Tambah Pembayaran</h3>
            <form id="pembayaranForm">
                <input type="hidden" id="pembayaranId" name="id">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <div class="form-group">
                        <label for="id_tagihan">Tagihan</label>
                        <select id="id_tagihan" name="id_tagihan" class="form-control" required onchange="updateTagihanInfo()">
                            <option value="">Pilih Tagihan</option>
                            <?php foreach ($tagihanBelumLunas as $t): ?>
                                <option value="<?= $t['id'] ?>" data-sisa="<?= $t['sisa'] ?>" data-nama="<?= $t['nama_penghuni'] ?>" data-kamar="<?= $t['nomor_kamar'] ?>">
                                    <?= $t['bulan'] ?> - <?= $t['nomor_kamar'] ?> (<?= $t['nama_penghuni'] ?>) - Sisa: Rp <?= number_format($t['sisa'], 0, ',', '.') ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_bayar">Jumlah Bayar</label>
                        <input type="number" id="jumlah_bayar" name="jumlah_bayar" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="tgl_bayar">Tanggal Bayar</label>
                        <input type="date" id="tgl_bayar" name="tgl_bayar" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="metode_pembayaran">Metode Pembayaran</label>
                        <select id="metode_pembayaran" name="metode_pembayaran" class="form-control" required>
                            <option value="">Pilih Metode</option>
                            <option value="Cash">Cash</option>
                            <option value="Transfer Bank">Transfer Bank</option>
                            <option value="E-Wallet">E-Wallet</option>
                            <option value="QRIS">QRIS</option>
                        </select>
                    </div>
                </div>
                <div id="tagihanInfo" style="background: #f8f9fa; padding: 1rem; border-radius: 8px; margin-top: 1rem; display: none;">
                    <h4 style="margin: 0 0 0.5rem 0;">Informasi Tagihan</h4>
                    <p style="margin: 0.25rem 0;" id="infoPenghuni"></p>
                    <p style="margin: 0.25rem 0;" id="infoKamar"></p>
                    <p style="margin: 0.25rem 0;" id="infoSisa"></p>
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
                <h3 style="color: #007bff; font-size: 2rem; margin-bottom: 0.5rem;"><?= count($pembayaran) ?></h3>
                <p style="margin: 0; color: #666;">Total Pembayaran</p>
            </div>
            <div style="background: white; padding: 1.5rem; border-radius: 10px; text-align: center; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <h3 style="color: #28a745; font-size: 2rem; margin-bottom: 0.5rem;"><?= count(array_filter($pembayaran, function($p) { return $p['status'] == 'lunas'; })) ?></h3>
                <p style="margin: 0; color: #666;">Lunas</p>
            </div>
            <div style="background: white; padding: 1.5rem; border-radius: 10px; text-align: center; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <h3 style="color: #ffc107; font-size: 2rem; margin-bottom: 0.5rem;"><?= count(array_filter($pembayaran, function($p) { return $p['status'] == 'sebagian'; })) ?></h3>
                <p style="margin: 0; color: #666;">Sebagian</p>
            </div>
            <div style="background: white; padding: 1.5rem; border-radius: 10px; text-align: center; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <h3 style="color: #dc3545; font-size: 2rem; margin-bottom: 0.5rem;">Rp <?= number_format(array_sum(array_column($pembayaran, 'jumlah_bayar')), 0, ',', '.') ?></h3>
                <p style="margin: 0; color: #666;">Total Terbayar</p>
            </div>
        </div>

        <!-- Tabel Pembayaran -->
        <div class="card">
            <h2>Daftar Pembayaran</h2>
            <div class="card-content">
                <?php if (empty($pembayaran)): ?>
                    <p class="no-data">Tidak ada data pembayaran</p>
                <?php else: ?>
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tagihan</th>
                                <th>Kamar</th>
                                <th>Penghuni</th>
                                <th>Jumlah Tagihan</th>
                                <th>Jumlah Bayar</th>
                                <th>Tanggal Bayar</th>
                                <th>Metode</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pembayaran as $p): ?>
                            <tr>
                                <td><?= $p['id'] ?></td>
                                <td><strong><?= $p['bulan_tagihan'] ?></strong></td>
                                <td><?= $p['nomor_kamar'] ?></td>
                                <td><?= $p['nama_penghuni'] ?></td>
                                <td>Rp <?= number_format($p['jumlah_tagihan'], 0, ',', '.') ?></td>
                                <td>Rp <?= number_format($p['jumlah_bayar'], 0, ',', '.') ?></td>
                                <td><?= $p['tgl_bayar'] ? date('d/m/Y', strtotime($p['tgl_bayar'])) : '-' ?></td>
                                <td><?= $p['metode_pembayaran'] ?></td>
                                <td>
                                    <?php if ($p['status'] == 'lunas'): ?>
                                        <span style="color: #28a745; font-weight: bold;">Lunas</span>
                                    <?php elseif ($p['status'] == 'sebagian'): ?>
                                        <span style="color: #ffc107; font-weight: bold;">Sebagian</span>
                                    <?php else: ?>
                                        <span style="color: #dc3545; font-weight: bold;">Belum Bayar</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <button class="btn btn-secondary" style="padding: 0.25rem 0.5rem; font-size: 0.8rem;" onclick="editPembayaran(<?= htmlspecialchars(json_encode($p)) ?>)">Edit</button>
                                    <button class="btn btn-danger" style="padding: 0.25rem 0.5rem; font-size: 0.8rem;" onclick="deletePembayaran(<?= $p['id'] ?>)">Hapus</button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>

        <!-- Tagihan Belum Lunas -->
        <div class="card" style="margin-top: 2rem;">
            <h2>Tagihan Belum Lunas</h2>
            <div class="card-content">
                <?php if (empty($tagihanBelumLunas)): ?>
                    <p class="no-data">Tidak ada tagihan yang belum lunas</p>
                <?php else: ?>
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>ID Tagihan</th>
                                <th>Bulan</th>
                                <th>Kamar</th>
                                <th>Penghuni</th>
                                <th>Jumlah Tagihan</th>
                                <th>Sisa Tagihan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tagihanBelumLunas as $t): ?>
                            <tr>
                                <td><?= $t['id'] ?></td>
                                <td><strong><?= $t['bulan'] ?></strong></td>
                                <td><?= $t['nomor_kamar'] ?></td>
                                <td><?= $t['nama_penghuni'] ?></td>
                                <td>Rp <?= number_format($t['jumlah'], 0, ',', '.') ?></td>
                                <td>Rp <?= number_format($t['sisa'], 0, ',', '.') ?></td>
                                <td>
                                    <?php if ($t['sisa'] == 0): ?>
                                        <span style="color: #28a745; font-weight: bold;">Lunas</span>
                                    <?php elseif ($t['sisa'] < $t['jumlah']): ?>
                                        <span style="color: #ffc107; font-weight: bold;">Sebagian</span>
                                    <?php else: ?>
                                        <span style="color: #dc3545; font-weight: bold;">Belum Bayar</span>
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
            document.getElementById('formPembayaran').style.display = 'block';
            document.getElementById('formTitle').textContent = 'Tambah Pembayaran';
            document.getElementById('pembayaranForm').reset();
            document.getElementById('pembayaranId').value = '';
            document.getElementById('tagihanInfo').style.display = 'none';
        }

        function hideForm() {
            document.getElementById('formPembayaran').style.display = 'none';
        }

        function updateTagihanInfo() {
            const select = document.getElementById('id_tagihan');
            const selectedOption = select.options[select.selectedIndex];
            const tagihanInfo = document.getElementById('tagihanInfo');
            
            if (select.value) {
                const sisa = selectedOption.getAttribute('data-sisa');
                const nama = selectedOption.getAttribute('data-nama');
                const kamar = selectedOption.getAttribute('data-kamar');
                
                document.getElementById('infoPenghuni').textContent = 'Penghuni: ' + nama;
                document.getElementById('infoKamar').textContent = 'Kamar: ' + kamar;
                document.getElementById('infoSisa').textContent = 'Sisa Tagihan: Rp ' + parseInt(sisa).toLocaleString('id-ID');
                
                document.getElementById('jumlah_bayar').max = sisa;
                document.getElementById('jumlah_bayar').placeholder = 'Maksimal: Rp ' + parseInt(sisa).toLocaleString('id-ID');
                
                tagihanInfo.style.display = 'block';
            } else {
                tagihanInfo.style.display = 'none';
            }
        }

        function editPembayaran(pembayaran) {
            document.getElementById('formPembayaran').style.display = 'block';
            document.getElementById('formTitle').textContent = 'Edit Pembayaran';
            document.getElementById('pembayaranId').value = pembayaran.id;
            document.getElementById('id_tagihan').value = pembayaran.id_tagihan;
            document.getElementById('jumlah_bayar').value = pembayaran.jumlah_bayar;
            document.getElementById('tgl_bayar').value = pembayaran.tgl_bayar;
            document.getElementById('metode_pembayaran').value = pembayaran.metode_pembayaran;
            
            updateTagihanInfo();
        }

        function deletePembayaran(id) {
            if (confirm('Apakah Anda yakin ingin menghapus pembayaran ini?')) {
                alert('Pembayaran dengan ID ' + id + ' berhasil dihapus!');
                // Dalam implementasi nyata, ini akan mengirim request ke server
            }
        }

        document.getElementById('pembayaranForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const id = formData.get('id');
            
            if (id) {
                alert('Data pembayaran berhasil diperbarui!');
            } else {
                alert('Data pembayaran berhasil ditambahkan!');
            }
            
            hideForm();
        });
    </script>
</body>
</html> 