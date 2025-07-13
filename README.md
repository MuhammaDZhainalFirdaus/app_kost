# Aplikasi Pengelola Kost - PHP Native

Aplikasi web sederhana untuk mengelola kost berbasis PHP Native tanpa database. Semua data menggunakan dummy data yang hardcode dalam array PHP.

## 🏗️ Struktur Project

```
app_kost/
├── index.php                 # Halaman utama (dashboard)
├── includes/
│   ├── header.php           # Header yang digunakan di semua halaman
│   └── footer.php           # Footer yang digunakan di semua halaman
├── assets/
│   └── css/
│       └── style.css        # File CSS untuk styling
├── admin/
│   ├── dashboard.php        # Dashboard admin
│   ├── penghuni.php         # Pengelolaan penghuni kost
│   ├── kamar.php            # Pengelolaan kamar kost
│   ├── barang.php           # Pengelolaan barang
│   ├── kamar_penghuni.php   # Pengelolaan relasi kamar-penghuni
│   ├── barang_bawaan.php    # Pengelolaan barang bawaan penghuni
│   ├── tagihan.php          # Pengelolaan tagihan
│   ├── pembayaran.php       # Pengelolaan pembayaran
│   └── generate_tagihan.php # Generate tagihan bulanan
└── README.md                # Dokumentasi project
```

## 🚀 Cara Menjalankan

1. **Pastikan XAMPP sudah terinstall dan Apache berjalan**
2. **Letakkan folder `app_kost` di dalam folder `htdocs`**
3. **Buka browser dan akses:**
   ```
   http://localhost/app_kost/
   ```

## 📋 Fitur yang Tersedia

### 🏠 Halaman Utama (Dashboard)
- Tampilan daftar kamar kosong dengan harga sewa
- Tampilan daftar kamar yang harus segera bayar
- Tampilan daftar kamar yang terlambat bayar
- Tombol untuk masuk ke Admin Panel

### 👨‍💼 Admin Panel

#### Dashboard Admin
- Statistik kost (total kamar, kamar terisi, kamar kosong, terlambat bayar)
- Menu cepat untuk akses ke fitur utama
- Aktivitas terbaru

#### Pengelolaan Penghuni Kost
- Daftar penghuni dengan data: nama, nomor KTP, nomor HP, tanggal masuk/keluar
- Fitur tambah, edit, dan hapus penghuni
- Status penghuni (aktif/keluar)

#### Pengelolaan Kamar Kost
- Daftar kamar dengan data: nomor kamar, harga sewa, status, fasilitas
- Fitur tambah, edit, dan hapus kamar
- Statistik kamar (total, terisi, kosong)

#### Pengelolaan Barang
- Daftar barang dengan data: nama, harga, kategori, deskripsi
- Fitur tambah, edit, dan hapus barang
- Kategori barang: Elektronik, Furniture, Dekorasi, Lainnya

#### Pengelolaan Kamar-Penghuni
- Relasi antara kamar dan penghuni
- Data tanggal masuk dan keluar
- Fitur penempatan dan pengeluaran penghuni

#### Pengelolaan Barang Bawaan Penghuni
- Daftar barang yang dibawa penghuni
- Tracking barang per penghuni
- Fitur pengembalian barang

#### Pengelolaan Tagihan
- Daftar tagihan bulanan
- Status tagihan (lunas/belum lunas)
- Filter berdasarkan bulan dan status
- Fitur edit dan hapus tagihan

#### Pengelolaan Pembayaran
- Daftar pembayaran yang telah dilakukan
- Status pembayaran (lunas/sebagian/belum bayar)
- Metode pembayaran (Cash, Transfer Bank, E-Wallet, QRIS)
- Tagihan yang belum lunas

#### Generate Tagihan
- Generate tagihan bulanan otomatis
- Preview kamar yang akan ditagih
- Riwayat generate tagihan
- Panduan penggunaan

## 🎨 Fitur UI/UX

### Design System
- **Color Scheme:** Gradient biru-ungu untuk header, warna-warna modern untuk status
- **Typography:** Segoe UI dengan hierarki yang jelas
- **Layout:** Responsive grid system dengan cards
- **Components:** Buttons, forms, tables, dan cards yang konsisten

### Responsive Design
- Mobile-friendly dengan breakpoint 768px
- Grid layout yang menyesuaikan ukuran layar
- Sidebar yang collapse di mobile

### Interactive Elements
- Hover effects pada cards dan buttons
- Form validation dengan JavaScript
- Confirmation dialogs untuk aksi hapus
- Loading states untuk generate tagihan

## 📊 Data Dummy yang Tersedia

### Penghuni Kost (6 orang)
- Budi Santoso, Siti Nurhaliza, Ahmad Rizki
- Dewi Sartika, Rudi Hartono, Maya Indah

### Kamar Kost (11 kamar)
- **Tipe A:** A1-A4 (Rp 800.000) - AC, Kamar Mandi Dalam, WiFi
- **Tipe B:** B1-B3 (Rp 900.000) - AC, Kamar Mandi Dalam, WiFi, TV
- **Tipe C:** C1-C4 (Rp 1.000.000) - AC, Kamar Mandi Dalam, WiFi, TV, Kulkas

### Barang (8 jenis)
- Elektronik: Kipas Angin, Lampu LED
- Furniture: Lemari Pakaian, Kasur, Meja Belajar, Kursi Kantor
- Dekorasi: Karpet, Cermin

### Tagihan & Pembayaran
- Tagihan Januari 2024 untuk 6 kamar
- Tagihan Desember 2023 untuk 2 kamar
- Pembayaran dengan berbagai status dan metode

## 🔧 Teknologi yang Digunakan

- **Backend:** PHP Native (tanpa framework)
- **Frontend:** HTML5, CSS3, JavaScript (Vanilla)
- **Styling:** Custom CSS dengan Grid dan Flexbox
- **Data Storage:** Array PHP (dummy data)
- **Server:** Apache (XAMPP)

## 📝 Catatan Penting

1. **Tidak ada Database:** Semua data menggunakan array PHP yang hardcode
2. **Tidak ada Backend Logic:** Semua aksi (tambah, edit, hapus) hanya simulasi dengan alert
3. **File-based:** Tidak memerlukan setup database atau konfigurasi khusus
4. **Demo Purpose:** Cocok untuk demo, prototype, atau pembelajaran

## 🎯 Penggunaan

Project ini cocok untuk:
- **Demo aplikasi kost** untuk presentasi
- **Prototype** sebelum pengembangan dengan database
- **Pembelajaran** PHP Native dan frontend development
- **Template** untuk pengembangan aplikasi kost yang lebih lengkap

## 📞 Kontak

Dibuat oleh: Muhammad Zhainal F
NIM: 301220041
Mata Kuliah: UAS

---

**Note:** Project ini dibuat untuk keperluan UAS dan demonstrasi. Untuk penggunaan production, disarankan menggunakan database dan implementasi backend yang proper.
