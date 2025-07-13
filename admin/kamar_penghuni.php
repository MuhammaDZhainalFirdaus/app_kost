<?php
// Data dummy kamar-penghuni
$kamarPenghuni = [
    [
        'id' => 1,
        'id_kamar' => 2,
        'nomor_kamar' => 'A2',
        'id_penghuni' => 1,
        'nama_penghuni' => 'Budi Santoso',
        'tgl_masuk' => '2023-01-15',
        'tgl_keluar' => null,
        'status' => 'aktif'
    ],
    [
        'id' => 2,
        'id_kamar' => 4,
        'nomor_kamar' => 'A4',
        'id_penghuni' => 4,
        'nama_penghuni' => 'Dewi Sartika',
        'tgl_masuk' => '2023-04-05',
        'tgl_keluar' => null,
        'status' => 'aktif'
    ],
    [
        'id' => 3,
        'id_kamar' => 5,
        'nomor_kamar' => 'B1',
        'id_penghuni' => 2,
        'nama_penghuni' => 'Siti Nurhaliza',
        'tgl_masuk' => '2023-02-20',
        'tgl_keluar' => null,
        'status' => 'aktif'
    ],
    [
        'id' => 4,
        'id_kamar' => 7,
        'nomor_kamar' => 'B3',
        'id_penghuni' => 3,
        'nama_penghuni' => 'Ahmad Rizki',
        'tgl_masuk' => '2023-03-10',
        'tgl_keluar' => null,
        'status' => 'aktif'
    ],
    [
        'id' => 5,
        'id_kamar' => 9,
        'nomor_kamar' => 'C2',
        'id_penghuni' => 5,
        'nama_penghuni' => 'Rudi Hartono',
        'tgl_masuk' => '2023-05-12',
        'tgl_keluar' => null,
        'status' => 'aktif'
    ],
    [
        'id' => 6,
        'id_kamar' => 10,
        'nomor_kamar' => 'C3',
        'id_penghuni' => 6,
        'nama_penghuni' => 'Maya Indah',
        'tgl_masuk' => '2023-06-18',
        'tgl_keluar' => null,
        'status' => 'aktif'
    ]
];

// Data dummy untuk dropdown
$kamarKosong = [
    ['id' => 1, 'nomor' => 'A1'],
    ['id' => 3, 'nomor' => 'A3'],
    ['id' => 6, 'nomor' => 'B2'],
    ['id' => 8, 'nomor' => 'C1'],
    ['id' => 11, 'nomor' => 'C4']
];

$penghuniAktif = [
    ['id' => 1, 'nama' => 'Budi Santoso'],
    ['id' => 2, 'nama' => 'Siti Nurhaliza'],
    ['id' => 3, 'nama' => 'Ahmad Rizki'],
    ['id' => 4, 'nama' => 'Dewi Sartika'],
    ['id' => 5, 'nama' => 'Rudi Hartono'],
    ['id' => 6, 'nama' => 'Maya Indah']
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kamar-Penghuni - Admin Panel</title>
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
            <li><a href="kamar_penghuni.php" class="active">Kamar-Penghuni</a></li>
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
            <h1>Pengelolaan Kamar-Penghuni</h1>
        </div>

        <!-- Tombol Tambah -->
        <div style="margin-bottom: 2rem;">
            <button class="btn btn-primary" onclick="showAddForm()">Tambah Penempatan Baru</button>
        </div>

        <!-- Form Tambah/Edit (Hidden by default) -->
        <div id="formKamarPenghuni" style="display: none; background: white; padding: 2rem; border-radius: 10px; margin-bottom: 2rem; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <h3 id="formTitle">Tambah Penempatan Baru</h3>
            <form id="kamarPenghuniForm">
                <input type="hidden" id="penempatanId" name="id">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <div class="form-group">
                        <label for="id_kamar">Kamar</label>
                        <select id="id_kamar" name="id_kamar" class="form-control" required>
                            <option value="">Pilih Kamar</option>
                            <?php foreach ($kamarKosong as $k): ?>
                                <option value="<?= $k['id'] ?>"><?= $k['nomor'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_penghuni">Penghuni</label>
                        <select id="id_penghuni" name="id_penghuni" class="form-control" required>
                            <option value="">Pilih Penghuni</option>
                            <?php foreach ($penghuniAktif as $p): ?>
                                <option value="<?= $p['id'] ?>"><?= $p['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tgl_masuk">Tanggal Masuk</label>
                        <input type="date" id="tgl_masuk" name="tgl_masuk" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="tgl_keluar">Tanggal Keluar (Opsional)</label>
                        <input type="date" id="tgl_keluar" name="tgl_keluar" class="form-control">
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
                <h3 style="color: #007bff; font-size: 2rem; margin-bottom: 0.5rem;"><?= count($kamarPenghuni) ?></h3>
                <p style="margin: 0; color: #666;">Total Penempatan</p>
            </div>
            <div style="background: white; padding: 1.5rem; border-radius: 10px; text-align: center; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <h3 style="color: #28a745; font-size: 2rem; margin-bottom: 0.5rem;"><?= count(array_filter($kamarPenghuni, function($kp) { return $kp['status'] == 'aktif'; })) ?></h3>
                <p style="margin: 0; color: #666;">Penempatan Aktif</p>
            </div>
            <div style="background: white; padding: 1.5rem; border-radius: 10px; text-align: center; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <h3 style="color: #ffc107; font-size: 2rem; margin-bottom: 0.5rem;"><?= count($kamarKosong) ?></h3>
                <p style="margin: 0; color: #666;">Kamar Tersedia</p>
            </div>
        </div>

        <!-- Tabel Kamar-Penghuni -->
        <div class="card">
            <h2>Daftar Penempatan Kamar</h2>
            <div class="card-content">
                <?php if (empty($kamarPenghuni)): ?>
                    <p class="no-data">Tidak ada data penempatan</p>
                <?php else: ?>
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nomor Kamar</th>
                                <th>Nama Penghuni</th>
                                <th>Tanggal Masuk</th>
                                <th>Tanggal Keluar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kamarPenghuni as $kp): ?>
                            <tr>
                                <td><?= $kp['id'] ?></td>
                                <td><strong><?= $kp['nomor_kamar'] ?></strong></td>
                                <td><?= $kp['nama_penghuni'] ?></td>
                                <td><?= date('d/m/Y', strtotime($kp['tgl_masuk'])) ?></td>
                                <td><?= $kp['tgl_keluar'] ? date('d/m/Y', strtotime($kp['tgl_keluar'])) : '-' ?></td>
                                <td>
                                    <?php if ($kp['status'] == 'aktif'): ?>
                                        <span style="color: #28a745; font-weight: bold;">Aktif</span>
                                    <?php else: ?>
                                        <span style="color: #dc3545; font-weight: bold;">Selesai</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <button class="btn btn-secondary" style="padding: 0.25rem 0.5rem; font-size: 0.8rem;" onclick="editPenempatan(<?= htmlspecialchars(json_encode($kp)) ?>)">Edit</button>
                                    <button class="btn btn-danger" style="padding: 0.25rem 0.5rem; font-size: 0.8rem;" onclick="deletePenempatan(<?= $kp['id'] ?>)">Hapus</button>
                                    <?php if ($kp['status'] == 'aktif'): ?>
                                        <button class="btn btn-warning" style="padding: 0.25rem 0.5rem; font-size: 0.8rem;" onclick="keluarkanPenghuni(<?= $kp['id'] ?>)">Keluarkan</button>
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
            document.getElementById('formKamarPenghuni').style.display = 'block';
            document.getElementById('formTitle').textContent = 'Tambah Penempatan Baru';
            document.getElementById('kamarPenghuniForm').reset();
            document.getElementById('penempatanId').value = '';
        }

        function hideForm() {
            document.getElementById('formKamarPenghuni').style.display = 'none';
        }

        function editPenempatan(penempatan) {
            document.getElementById('formKamarPenghuni').style.display = 'block';
            document.getElementById('formTitle').textContent = 'Edit Penempatan';
            document.getElementById('penempatanId').value = penempatan.id;
            document.getElementById('id_kamar').value = penempatan.id_kamar;
            document.getElementById('id_penghuni').value = penempatan.id_penghuni;
            document.getElementById('tgl_masuk').value = penempatan.tgl_masuk;
            document.getElementById('tgl_keluar').value = penempatan.tgl_keluar || '';
        }

        function deletePenempatan(id) {
            if (confirm('Apakah Anda yakin ingin menghapus penempatan ini?')) {
                alert('Penempatan dengan ID ' + id + ' berhasil dihapus!');
                // Dalam implementasi nyata, ini akan mengirim request ke server
            }
        }

        function keluarkanPenghuni(id) {
            if (confirm('Apakah Anda yakin ingin mengeluarkan penghuni dari kamar ini?')) {
                const tglKeluar = prompt('Masukkan tanggal keluar (YYYY-MM-DD):', new Date().toISOString().split('T')[0]);
                if (tglKeluar) {
                    alert('Penghuni berhasil dikeluarkan pada tanggal ' + tglKeluar);
                    // Dalam implementasi nyata, ini akan mengirim request ke server
                }
            }
        }

        document.getElementById('kamarPenghuniForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const id = formData.get('id');
            
            if (id) {
                alert('Data penempatan berhasil diperbarui!');
            } else {
                alert('Data penempatan berhasil ditambahkan!');
            }
            
            hideForm();
        });
    </script>
</body>
</html> 