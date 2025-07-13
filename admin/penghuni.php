<?php
// Data dummy penghuni kost
$penghuni = [
    [
        'id' => 1,
        'nama' => 'Budi Santoso',
        'ktp' => '3273012345678901',
        'hp' => '081234567890',
        'tgl_masuk' => '2023-01-15',
        'tgl_keluar' => null
    ],
    [
        'id' => 2,
        'nama' => 'Siti Nurhaliza',
        'ktp' => '3273012345678902',
        'hp' => '081234567891',
        'tgl_masuk' => '2023-02-20',
        'tgl_keluar' => null
    ],
    [
        'id' => 3,
        'nama' => 'Ahmad Rizki',
        'ktp' => '3273012345678903',
        'hp' => '081234567892',
        'tgl_masuk' => '2023-03-10',
        'tgl_keluar' => null
    ],
    [
        'id' => 4,
        'nama' => 'Dewi Sartika',
        'ktp' => '3273012345678904',
        'hp' => '081234567893',
        'tgl_masuk' => '2023-04-05',
        'tgl_keluar' => null
    ],
    [
        'id' => 5,
        'nama' => 'Rudi Hartono',
        'ktp' => '3273012345678905',
        'hp' => '081234567894',
        'tgl_masuk' => '2023-05-12',
        'tgl_keluar' => null
    ],
    [
        'id' => 6,
        'nama' => 'Maya Indah',
        'ktp' => '3273012345678906',
        'hp' => '081234567895',
        'tgl_masuk' => '2023-06-18',
        'tgl_keluar' => null
    ]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengelolaan Penghuni - Admin Panel</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <!-- Sidebar -->
    <div class="admin-sidebar">
        <h2>Admin Panel</h2>
        <ul class="admin-menu">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="penghuni.php" class="active">Pengelolaan Penghuni</a></li>
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
            <h1>Pengelolaan Penghuni Kost</h1>
        </div>

        <!-- Tombol Tambah -->
        <div style="margin-bottom: 2rem;">
            <button class="btn btn-primary" onclick="showAddForm()">Tambah Penghuni Baru</button>
        </div>

        <!-- Form Tambah/Edit (Hidden by default) -->
        <div id="formPenghuni" style="display: none; background: white; padding: 2rem; border-radius: 10px; margin-bottom: 2rem; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <h3 id="formTitle">Tambah Penghuni Baru</h3>
            <form id="penghuniForm">
                <input type="hidden" id="penghuniId" name="id">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="ktp">Nomor KTP</label>
                        <input type="text" id="ktp" name="ktp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="hp">Nomor HP</label>
                        <input type="text" id="hp" name="hp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="tgl_masuk">Tanggal Masuk</label>
                        <input type="date" id="tgl_masuk" name="tgl_masuk" class="form-control" required>
                    </div>
                </div>
                <div style="margin-top: 1rem;">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-secondary" onclick="hideForm()">Batal</button>
                </div>
            </form>
        </div>

        <!-- Tabel Penghuni -->
        <div class="card">
            <h2>Daftar Penghuni</h2>
            <div class="card-content">
                <?php if (empty($penghuni)): ?>
                    <p class="no-data">Tidak ada data penghuni</p>
                <?php else: ?>
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Nomor KTP</th>
                                <th>Nomor HP</th>
                                <th>Tanggal Masuk</th>
                                <th>Tanggal Keluar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($penghuni as $p): ?>
                            <tr>
                                <td><?= $p['id'] ?></td>
                                <td><?= $p['nama'] ?></td>
                                <td><?= $p['ktp'] ?></td>
                                <td><?= $p['hp'] ?></td>
                                <td><?= date('d/m/Y', strtotime($p['tgl_masuk'])) ?></td>
                                <td><?= $p['tgl_keluar'] ? date('d/m/Y', strtotime($p['tgl_keluar'])) : '-' ?></td>
                                <td>
                                    <?php if ($p['tgl_keluar']): ?>
                                        <span style="color: #dc3545; font-weight: bold;">Keluar</span>
                                    <?php else: ?>
                                        <span style="color: #28a745; font-weight: bold;">Aktif</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <button class="btn btn-secondary" style="padding: 0.25rem 0.5rem; font-size: 0.8rem;" onclick="editPenghuni(<?= htmlspecialchars(json_encode($p)) ?>)">Edit</button>
                                    <button class="btn btn-danger" style="padding: 0.25rem 0.5rem; font-size: 0.8rem;" onclick="deletePenghuni(<?= $p['id'] ?>)">Hapus</button>
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
            document.getElementById('formPenghuni').style.display = 'block';
            document.getElementById('formTitle').textContent = 'Tambah Penghuni Baru';
            document.getElementById('penghuniForm').reset();
            document.getElementById('penghuniId').value = '';
        }

        function hideForm() {
            document.getElementById('formPenghuni').style.display = 'none';
        }

        function editPenghuni(penghuni) {
            document.getElementById('formPenghuni').style.display = 'block';
            document.getElementById('formTitle').textContent = 'Edit Penghuni';
            document.getElementById('penghuniId').value = penghuni.id;
            document.getElementById('nama').value = penghuni.nama;
            document.getElementById('ktp').value = penghuni.ktp;
            document.getElementById('hp').value = penghuni.hp;
            document.getElementById('tgl_masuk').value = penghuni.tgl_masuk;
        }

        function deletePenghuni(id) {
            if (confirm('Apakah Anda yakin ingin menghapus penghuni ini?')) {
                alert('Penghuni dengan ID ' + id + ' berhasil dihapus!');
                // Dalam implementasi nyata, ini akan mengirim request ke server
            }
        }

        document.getElementById('penghuniForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const id = formData.get('id');
            
            if (id) {
                alert('Data penghuni berhasil diperbarui!');
            } else {
                alert('Data penghuni berhasil ditambahkan!');
            }
            
            hideForm();
        });
    </script>
</body>
</html> 