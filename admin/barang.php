<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ../login.php');
    exit;
}
// Data dummy barang
$barang = [
    [
        'id' => 1,
        'nama' => 'Kipas Angin',
        'harga' => 500000,
        'kategori' => 'Elektronik',
        'deskripsi' => 'Kipas angin portable untuk kamar'
    ],
    [
        'id' => 2,
        'nama' => 'Lemari Pakaian',
        'harga' => 800000,
        'kategori' => 'Furniture',
        'deskripsi' => 'Lemari pakaian 3 pintu'
    ],
    [
        'id' => 3,
        'nama' => 'Kasur',
        'harga' => 1200000,
        'kategori' => 'Furniture',
        'deskripsi' => 'Kasur spring bed ukuran single'
    ],
    [
        'id' => 4,
        'nama' => 'Meja Belajar',
        'harga' => 400000,
        'kategori' => 'Furniture',
        'deskripsi' => 'Meja belajar dengan laci'
    ],
    [
        'id' => 5,
        'nama' => 'Kursi Kantor',
        'harga' => 600000,
        'kategori' => 'Furniture',
        'deskripsi' => 'Kursi kantor ergonomis'
    ],
    [
        'id' => 6,
        'nama' => 'Lampu LED',
        'harga' => 150000,
        'kategori' => 'Elektronik',
        'deskripsi' => 'Lampu LED hemat energi'
    ],
    [
        'id' => 7,
        'nama' => 'Karpet',
        'harga' => 200000,
        'kategori' => 'Dekorasi',
        'deskripsi' => 'Karpet lantai anti slip'
    ],
    [
        'id' => 8,
        'nama' => 'Cermin',
        'harga' => 300000,
        'kategori' => 'Dekorasi',
        'deskripsi' => 'Cermin dinding ukuran besar'
    ]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengelolaan Barang - Admin Panel</title>
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
            <li><a href="barang.php" class="active">Pengelolaan Barang</a></li>
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
            <h1>Pengelolaan Barang</h1>
        </div>

        <!-- Tombol Tambah -->
        <div style="margin-bottom: 2rem;">
            <button class="btn btn-primary" onclick="showAddForm()">Tambah Barang Baru</button>
        </div>

        <!-- Form Tambah/Edit (Hidden by default) -->
        <div id="formBarang" style="display: none; background: white; padding: 2rem; border-radius: 10px; margin-bottom: 2rem; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <h3 id="formTitle">Tambah Barang Baru</h3>
            <form id="barangForm">
                <input type="hidden" id="barangId" name="id">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <div class="form-group">
                        <label for="nama">Nama Barang</label>
                        <input type="text" id="nama" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" id="harga" name="harga" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select id="kategori" name="kategori" class="form-control" required>
                            <option value="">Pilih Kategori</option>
                            <option value="Elektronik">Elektronik</option>
                            <option value="Furniture">Furniture</option>
                            <option value="Dekorasi">Dekorasi</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" class="form-control" rows="3" required></textarea>
                    </div>
                </div>
                <div style="margin-top: 1rem;">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-secondary" onclick="hideForm()">Batal</button>
                </div>
            </form>
        </div>

        <!-- Statistik Barang -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-bottom: 2rem;">
            <div style="background: white; padding: 1.5rem; border-radius: 10px; text-align: center; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <h3 style="color: #007bff; font-size: 2rem; margin-bottom: 0.5rem;"><?= count($barang) ?></h3>
                <p style="margin: 0; color: #666;">Total Barang</p>
            </div>
            <div style="background: white; padding: 1.5rem; border-radius: 10px; text-align: center; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <h3 style="color: #28a745; font-size: 2rem; margin-bottom: 0.5rem;"><?= count(array_filter($barang, function($b) { return $b['kategori'] == 'Elektronik'; })) ?></h3>
                <p style="margin: 0; color: #666;">Elektronik</p>
            </div>
            <div style="background: white; padding: 1.5rem; border-radius: 10px; text-align: center; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <h3 style="color: #ffc107; font-size: 2rem; margin-bottom: 0.5rem;"><?= count(array_filter($barang, function($b) { return $b['kategori'] == 'Furniture'; })) ?></h3>
                <p style="margin: 0; color: #666;">Furniture</p>
            </div>
            <div style="background: white; padding: 1.5rem; border-radius: 10px; text-align: center; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <h3 style="color: #dc3545; font-size: 2rem; margin-bottom: 0.5rem;"><?= count(array_filter($barang, function($b) { return $b['kategori'] == 'Dekorasi'; })) ?></h3>
                <p style="margin: 0; color: #666;">Dekorasi</p>
            </div>
        </div>

        <!-- Tabel Barang -->
        <div class="card">
            <h2>Daftar Barang</h2>
            <div class="card-content">
                <?php if (empty($barang)): ?>
                    <p class="no-data">Tidak ada data barang</p>
                <?php else: ?>
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($barang as $b): ?>
                            <tr>
                                <td><?= $b['id'] ?></td>
                                <td><strong><?= $b['nama'] ?></strong></td>
                                <td>
                                    <span style="padding: 0.25rem 0.5rem; background: #e9ecef; border-radius: 4px; font-size: 0.8rem;">
                                        <?= $b['kategori'] ?>
                                    </span>
                                </td>
                                <td>Rp <?= number_format($b['harga'], 0, ',', '.') ?></td>
                                <td><?= $b['deskripsi'] ?></td>
                                <td>
                                    <button class="btn btn-secondary" style="padding: 0.25rem 0.5rem; font-size: 0.8rem;" onclick="editBarang(<?= htmlspecialchars(json_encode($b)) ?>)">Edit</button>
                                    <button class="btn btn-danger" style="padding: 0.25rem 0.5rem; font-size: 0.8rem;" onclick="deleteBarang(<?= $b['id'] ?>)">Hapus</button>
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
            document.getElementById('formBarang').style.display = 'block';
            document.getElementById('formTitle').textContent = 'Tambah Barang Baru';
            document.getElementById('barangForm').reset();
            document.getElementById('barangId').value = '';
        }

        function hideForm() {
            document.getElementById('formBarang').style.display = 'none';
        }

        function editBarang(barang) {
            document.getElementById('formBarang').style.display = 'block';
            document.getElementById('formTitle').textContent = 'Edit Barang';
            document.getElementById('barangId').value = barang.id;
            document.getElementById('nama').value = barang.nama;
            document.getElementById('harga').value = barang.harga;
            document.getElementById('kategori').value = barang.kategori;
            document.getElementById('deskripsi').value = barang.deskripsi;
        }

        function deleteBarang(id) {
            if (confirm('Apakah Anda yakin ingin menghapus barang ini?')) {
                alert('Barang dengan ID ' + id + ' berhasil dihapus!');
                // Dalam implementasi nyata, ini akan mengirim request ke server
            }
        }

        document.getElementById('barangForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const id = formData.get('id');
            
            if (id) {
                alert('Data barang berhasil diperbarui!');
            } else {
                alert('Data barang berhasil ditambahkan!');
            }
            
            hideForm();
        });
    </script>
</body>
</html> 