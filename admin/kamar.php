<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ../login.php');
    exit;
}
// Data dummy kamar kost
$kamar = [
    [
        'id' => 1,
        'nomor' => 'A1',
        'harga' => 800000,
        'status' => 'kosong',
        'fasilitas' => 'AC, Kamar Mandi Dalam, WiFi'
    ],
    [
        'id' => 2,
        'nomor' => 'A2',
        'harga' => 800000,
        'status' => 'terisi',
        'fasilitas' => 'AC, Kamar Mandi Dalam, WiFi'
    ],
    [
        'id' => 3,
        'nomor' => 'A3',
        'harga' => 800000,
        'status' => 'kosong',
        'fasilitas' => 'AC, Kamar Mandi Dalam, WiFi'
    ],
    [
        'id' => 4,
        'nomor' => 'A4',
        'harga' => 800000,
        'status' => 'terisi',
        'fasilitas' => 'AC, Kamar Mandi Dalam, WiFi'
    ],
    [
        'id' => 5,
        'nomor' => 'B1',
        'harga' => 900000,
        'status' => 'terisi',
        'fasilitas' => 'AC, Kamar Mandi Dalam, WiFi, TV'
    ],
    [
        'id' => 6,
        'nomor' => 'B2',
        'harga' => 900000,
        'status' => 'kosong',
        'fasilitas' => 'AC, Kamar Mandi Dalam, WiFi, TV'
    ],
    [
        'id' => 7,
        'nomor' => 'B3',
        'harga' => 900000,
        'status' => 'terisi',
        'fasilitas' => 'AC, Kamar Mandi Dalam, WiFi, TV'
    ],
    [
        'id' => 8,
        'nomor' => 'C1',
        'harga' => 1000000,
        'status' => 'kosong',
        'fasilitas' => 'AC, Kamar Mandi Dalam, WiFi, TV, Kulkas'
    ],
    [
        'id' => 9,
        'nomor' => 'C2',
        'harga' => 1000000,
        'status' => 'terisi',
        'fasilitas' => 'AC, Kamar Mandi Dalam, WiFi, TV, Kulkas'
    ],
    [
        'id' => 10,
        'nomor' => 'C3',
        'harga' => 1000000,
        'status' => 'terisi',
        'fasilitas' => 'AC, Kamar Mandi Dalam, WiFi, TV, Kulkas'
    ],
    [
        'id' => 11,
        'nomor' => 'C4',
        'harga' => 1000000,
        'status' => 'kosong',
        'fasilitas' => 'AC, Kamar Mandi Dalam, WiFi, TV, Kulkas'
    ]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengelolaan Kamar - Admin Panel</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <!-- Sidebar -->
    <div class="admin-sidebar">
        <h2>Admin Panel</h2>
        <ul class="admin-menu">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="penghuni.php">Pengelolaan Penghuni</a></li>
            <li><a href="kamar.php" class="active">Pengelolaan Kamar</a></li>
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
            <h1>Pengelolaan Kamar Kost</h1>
        </div>

        <!-- Tombol Tambah -->
        <div style="margin-bottom: 2rem;">
            <button class="btn btn-primary" onclick="showAddForm()">Tambah Kamar Baru</button>
        </div>

        <!-- Form Tambah/Edit (Hidden by default) -->
        <div id="formKamar" style="display: none; background: white; padding: 2rem; border-radius: 10px; margin-bottom: 2rem; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <h3 id="formTitle">Tambah Kamar Baru</h3>
            <form id="kamarForm">
                <input type="hidden" id="kamarId" name="id">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <div class="form-group">
                        <label for="nomor">Nomor Kamar</label>
                        <input type="text" id="nomor" name="nomor" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Sewa</label>
                        <input type="number" id="harga" name="harga" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status" class="form-control" required>
                            <option value="kosong">Kosong</option>
                            <option value="terisi">Terisi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fasilitas">Fasilitas</label>
                        <textarea id="fasilitas" name="fasilitas" class="form-control" rows="3" required></textarea>
                    </div>
                </div>
                <div style="margin-top: 1rem;">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-secondary" onclick="hideForm()">Batal</button>
                </div>
            </form>
        </div>

        <!-- Statistik Kamar -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-bottom: 2rem;">
            <div style="background: white; padding: 1.5rem; border-radius: 10px; text-align: center; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <h3 style="color: #007bff; font-size: 2rem; margin-bottom: 0.5rem;"><?= count($kamar) ?></h3>
                <p style="margin: 0; color: #666;">Total Kamar</p>
            </div>
            <div style="background: white; padding: 1.5rem; border-radius: 10px; text-align: center; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <h3 style="color: #28a745; font-size: 2rem; margin-bottom: 0.5rem;"><?= count(array_filter($kamar, function($k) { return $k['status'] == 'terisi'; })) ?></h3>
                <p style="margin: 0; color: #666;">Kamar Terisi</p>
            </div>
            <div style="background: white; padding: 1.5rem; border-radius: 10px; text-align: center; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <h3 style="color: #ffc107; font-size: 2rem; margin-bottom: 0.5rem;"><?= count(array_filter($kamar, function($k) { return $k['status'] == 'kosong'; })) ?></h3>
                <p style="margin: 0; color: #666;">Kamar Kosong</p>
            </div>
        </div>

        <!-- Tabel Kamar -->
        <div class="card">
            <h2>Daftar Kamar</h2>
            <div class="card-content">
                <?php if (empty($kamar)): ?>
                    <p class="no-data">Tidak ada data kamar</p>
                <?php else: ?>
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nomor Kamar</th>
                                <th>Harga Sewa</th>
                                <th>Status</th>
                                <th>Fasilitas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kamar as $k): ?>
                            <tr>
                                <td><?= $k['id'] ?></td>
                                <td><strong><?= $k['nomor'] ?></strong></td>
                                <td>Rp <?= number_format($k['harga'], 0, ',', '.') ?></td>
                                <td>
                                    <?php if ($k['status'] == 'terisi'): ?>
                                        <span style="color: #dc3545; font-weight: bold;">Terisi</span>
                                    <?php else: ?>
                                        <span style="color: #28a745; font-weight: bold;">Kosong</span>
                                    <?php endif; ?>
                                </td>
                                <td><?= $k['fasilitas'] ?></td>
                                <td>
                                    <button class="btn btn-secondary" style="padding: 0.25rem 0.5rem; font-size: 0.8rem;" onclick="editKamar(<?= htmlspecialchars(json_encode($k)) ?>)">Edit</button>
                                    <button class="btn btn-danger" style="padding: 0.25rem 0.5rem; font-size: 0.8rem;" onclick="deleteKamar(<?= $k['id'] ?>)">Hapus</button>
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
            document.getElementById('formKamar').style.display = 'block';
            document.getElementById('formTitle').textContent = 'Tambah Kamar Baru';
            document.getElementById('kamarForm').reset();
            document.getElementById('kamarId').value = '';
        }

        function hideForm() {
            document.getElementById('formKamar').style.display = 'none';
        }

        function editKamar(kamar) {
            document.getElementById('formKamar').style.display = 'block';
            document.getElementById('formTitle').textContent = 'Edit Kamar';
            document.getElementById('kamarId').value = kamar.id;
            document.getElementById('nomor').value = kamar.nomor;
            document.getElementById('harga').value = kamar.harga;
            document.getElementById('status').value = kamar.status;
            document.getElementById('fasilitas').value = kamar.fasilitas;
        }

        function deleteKamar(id) {
            if (confirm('Apakah Anda yakin ingin menghapus kamar ini?')) {
                alert('Kamar dengan ID ' + id + ' berhasil dihapus!');
                // Dalam implementasi nyata, ini akan mengirim request ke server
            }
        }

        document.getElementById('kamarForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const id = formData.get('id');
            
            if (id) {
                alert('Data kamar berhasil diperbarui!');
            } else {
                alert('Data kamar berhasil ditambahkan!');
            }
            
            hideForm();
        });
    </script>
</body>
</html> 