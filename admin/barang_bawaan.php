<?php
// Data dummy barang bawaan penghuni
$barangBawaan = [
    [
        'id' => 1,
        'id_penghuni' => 1,
        'nama_penghuni' => 'Budi Santoso',
        'id_barang' => 1,
        'nama_barang' => 'Kipas Angin',
        'harga_barang' => 500000,
        'tgl_masuk_barang' => '2023-01-15',
        'status' => 'aktif'
    ],
    [
        'id' => 2,
        'id_penghuni' => 1,
        'nama_penghuni' => 'Budi Santoso',
        'id_barang' => 2,
        'nama_barang' => 'Lemari Pakaian',
        'harga_barang' => 800000,
        'tgl_masuk_barang' => '2023-01-15',
        'status' => 'aktif'
    ],
    [
        'id' => 3,
        'id_penghuni' => 2,
        'nama_penghuni' => 'Siti Nurhaliza',
        'id_barang' => 3,
        'nama_barang' => 'Kasur',
        'harga_barang' => 1200000,
        'tgl_masuk_barang' => '2023-02-20',
        'status' => 'aktif'
    ],
    [
        'id' => 4,
        'id_penghuni' => 2,
        'nama_penghuni' => 'Siti Nurhaliza',
        'id_barang' => 4,
        'nama_barang' => 'Meja Belajar',
        'harga_barang' => 400000,
        'tgl_masuk_barang' => '2023-02-20',
        'status' => 'aktif'
    ],
    [
        'id' => 5,
        'id_penghuni' => 3,
        'nama_penghuni' => 'Ahmad Rizki',
        'id_barang' => 5,
        'nama_barang' => 'Kursi Kantor',
        'harga_barang' => 600000,
        'tgl_masuk_barang' => '2023-03-10',
        'status' => 'aktif'
    ],
    [
        'id' => 6,
        'id_penghuni' => 4,
        'nama_penghuni' => 'Dewi Sartika',
        'id_barang' => 6,
        'nama_barang' => 'Lampu LED',
        'harga_barang' => 150000,
        'tgl_masuk_barang' => '2023-04-05',
        'status' => 'aktif'
    ],
    [
        'id' => 7,
        'id_penghuni' => 5,
        'nama_penghuni' => 'Rudi Hartono',
        'id_barang' => 7,
        'nama_barang' => 'Karpet',
        'harga_barang' => 200000,
        'tgl_masuk_barang' => '2023-05-12',
        'status' => 'aktif'
    ],
    [
        'id' => 8,
        'id_penghuni' => 6,
        'nama_penghuni' => 'Maya Indah',
        'id_barang' => 8,
        'nama_barang' => 'Cermin',
        'harga_barang' => 300000,
        'tgl_masuk_barang' => '2023-06-18',
        'status' => 'aktif'
    ]
];

// Data dummy untuk dropdown
$penghuniAktif = [
    ['id' => 1, 'nama' => 'Budi Santoso'],
    ['id' => 2, 'nama' => 'Siti Nurhaliza'],
    ['id' => 3, 'nama' => 'Ahmad Rizki'],
    ['id' => 4, 'nama' => 'Dewi Sartika'],
    ['id' => 5, 'nama' => 'Rudi Hartono'],
    ['id' => 6, 'nama' => 'Maya Indah']
];

$daftarBarang = [
    ['id' => 1, 'nama' => 'Kipas Angin', 'harga' => 500000],
    ['id' => 2, 'nama' => 'Lemari Pakaian', 'harga' => 800000],
    ['id' => 3, 'nama' => 'Kasur', 'harga' => 1200000],
    ['id' => 4, 'nama' => 'Meja Belajar', 'harga' => 400000],
    ['id' => 5, 'nama' => 'Kursi Kantor', 'harga' => 600000],
    ['id' => 6, 'nama' => 'Lampu LED', 'harga' => 150000],
    ['id' => 7, 'nama' => 'Karpet', 'harga' => 200000],
    ['id' => 8, 'nama' => 'Cermin', 'harga' => 300000]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang Bawaan Penghuni - Admin Panel</title>
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
            <li><a href="barang_bawaan.php" class="active">Barang Bawaan</a></li>
            <li><a href="tagihan.php">Pengelolaan Tagihan</a></li>
            <li><a href="pembayaran.php">Pengelolaan Pembayaran</a></li>
            <li><a href="generate_tagihan.php">Generate Tagihan</a></li>
            <li><a href="../index.php">Kembali ke Dashboard</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="admin-content">
        <div class="admin-header">
            <h1>Pengelolaan Barang Bawaan Penghuni</h1>
        </div>

        <!-- Tombol Tambah -->
        <div style="margin-bottom: 2rem;">
            <button class="btn btn-primary" onclick="showAddForm()">Tambah Barang Bawaan</button>
        </div>

        <!-- Form Tambah/Edit (Hidden by default) -->
        <div id="formBarangBawaan" style="display: none; background: white; padding: 2rem; border-radius: 10px; margin-bottom: 2rem; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <h3 id="formTitle">Tambah Barang Bawaan</h3>
            <form id="barangBawaanForm">
                <input type="hidden" id="barangBawaanId" name="id">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
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
                        <label for="id_barang">Barang</label>
                        <select id="id_barang" name="id_barang" class="form-control" required>
                            <option value="">Pilih Barang</option>
                            <?php foreach ($daftarBarang as $b): ?>
                                <option value="<?= $b['id'] ?>" data-harga="<?= $b['harga'] ?>"><?= $b['nama'] ?> - Rp <?= number_format($b['harga'], 0, ',', '.') ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tgl_masuk_barang">Tanggal Masuk Barang</label>
                        <input type="date" id="tgl_masuk_barang" name="tgl_masuk_barang" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status" class="form-control" required>
                            <option value="aktif">Aktif</option>
                            <option value="dikembalikan">Dikembalikan</option>
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
                <h3 style="color: #007bff; font-size: 2rem; margin-bottom: 0.5rem;"><?= count($barangBawaan) ?></h3>
                <p style="margin: 0; color: #666;">Total Barang Bawaan</p>
            </div>
            <div style="background: white; padding: 1.5rem; border-radius: 10px; text-align: center; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <h3 style="color: #28a745; font-size: 2rem; margin-bottom: 0.5rem;"><?= count(array_filter($barangBawaan, function($bb) { return $bb['status'] == 'aktif'; })) ?></h3>
                <p style="margin: 0; color: #666;">Barang Aktif</p>
            </div>
            <div style="background: white; padding: 1.5rem; border-radius: 10px; text-align: center; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <h3 style="color: #ffc107; font-size: 2rem; margin-bottom: 0.5rem;">Rp <?= number_format(array_sum(array_column($barangBawaan, 'harga_barang')), 0, ',', '.') ?></h3>
                <p style="margin: 0; color: #666;">Total Nilai Barang</p>
            </div>
        </div>

        <!-- Tabel Barang Bawaan -->
        <div class="card">
            <h2>Daftar Barang Bawaan Penghuni</h2>
            <div class="card-content">
                <?php if (empty($barangBawaan)): ?>
                    <p class="no-data">Tidak ada data barang bawaan</p>
                <?php else: ?>
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Penghuni</th>
                                <th>Nama Barang</th>
                                <th>Harga Barang</th>
                                <th>Tanggal Masuk</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($barangBawaan as $bb): ?>
                            <tr>
                                <td><?= $bb['id'] ?></td>
                                <td><strong><?= $bb['nama_penghuni'] ?></strong></td>
                                <td><?= $bb['nama_barang'] ?></td>
                                <td>Rp <?= number_format($bb['harga_barang'], 0, ',', '.') ?></td>
                                <td><?= date('d/m/Y', strtotime($bb['tgl_masuk_barang'])) ?></td>
                                <td>
                                    <?php if ($bb['status'] == 'aktif'): ?>
                                        <span style="color: #28a745; font-weight: bold;">Aktif</span>
                                    <?php else: ?>
                                        <span style="color: #dc3545; font-weight: bold;">Dikembalikan</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <button class="btn btn-secondary" style="padding: 0.25rem 0.5rem; font-size: 0.8rem;" onclick="editBarangBawaan(<?= htmlspecialchars(json_encode($bb)) ?>)">Edit</button>
                                    <button class="btn btn-danger" style="padding: 0.25rem 0.5rem; font-size: 0.8rem;" onclick="deleteBarangBawaan(<?= $bb['id'] ?>)">Hapus</button>
                                    <?php if ($bb['status'] == 'aktif'): ?>
                                        <button class="btn btn-warning" style="padding: 0.25rem 0.5rem; font-size: 0.8rem;" onclick="kembalikanBarang(<?= $bb['id'] ?>)">Kembalikan</button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>

        <!-- Ringkasan per Penghuni -->
        <div class="card" style="margin-top: 2rem;">
            <h2>Ringkasan Barang per Penghuni</h2>
            <div class="card-content">
                <?php
                $ringkasanPenghuni = [];
                foreach ($barangBawaan as $bb) {
                    $nama = $bb['nama_penghuni'];
                    if (!isset($ringkasanPenghuni[$nama])) {
                        $ringkasanPenghuni[$nama] = [
                            'jumlah_barang' => 0,
                            'total_nilai' => 0
                        ];
                    }
                    $ringkasanPenghuni[$nama]['jumlah_barang']++;
                    $ringkasanPenghuni[$nama]['total_nilai'] += $bb['harga_barang'];
                }
                ?>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1rem;">
                    <?php foreach ($ringkasanPenghuni as $nama => $data): ?>
                    <div style="background: #f8f9fa; padding: 1rem; border-radius: 8px; border-left: 4px solid #007bff;">
                        <h4 style="margin: 0 0 0.5rem 0; color: #007bff;"><?= $nama ?></h4>
                        <p style="margin: 0.25rem 0; color: #666;">Jumlah Barang: <strong><?= $data['jumlah_barang'] ?></strong></p>
                        <p style="margin: 0.25rem 0; color: #666;">Total Nilai: <strong>Rp <?= number_format($data['total_nilai'], 0, ',', '.') ?></strong></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showAddForm() {
            document.getElementById('formBarangBawaan').style.display = 'block';
            document.getElementById('formTitle').textContent = 'Tambah Barang Bawaan';
            document.getElementById('barangBawaanForm').reset();
            document.getElementById('barangBawaanId').value = '';
        }

        function hideForm() {
            document.getElementById('formBarangBawaan').style.display = 'none';
        }

        function editBarangBawaan(barangBawaan) {
            document.getElementById('formBarangBawaan').style.display = 'block';
            document.getElementById('formTitle').textContent = 'Edit Barang Bawaan';
            document.getElementById('barangBawaanId').value = barangBawaan.id;
            document.getElementById('id_penghuni').value = barangBawaan.id_penghuni;
            document.getElementById('id_barang').value = barangBawaan.id_barang;
            document.getElementById('tgl_masuk_barang').value = barangBawaan.tgl_masuk_barang;
            document.getElementById('status').value = barangBawaan.status;
        }

        function deleteBarangBawaan(id) {
            if (confirm('Apakah Anda yakin ingin menghapus barang bawaan ini?')) {
                alert('Barang bawaan dengan ID ' + id + ' berhasil dihapus!');
                // Dalam implementasi nyata, ini akan mengirim request ke server
            }
        }

        function kembalikanBarang(id) {
            if (confirm('Apakah Anda yakin ingin mengembalikan barang ini?')) {
                alert('Barang dengan ID ' + id + ' berhasil dikembalikan!');
                // Dalam implementasi nyata, ini akan mengirim request ke server
            }
        }

        document.getElementById('barangBawaanForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const id = formData.get('id');
            
            if (id) {
                alert('Data barang bawaan berhasil diperbarui!');
            } else {
                alert('Data barang bawaan berhasil ditambahkan!');
            }
            
            hideForm();
        });
    </script>
</body>
</html> 