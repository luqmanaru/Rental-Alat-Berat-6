# README.md untuk Rental-Alat-Berat-6

![CodeIgniter](https://img.shields.io/badge/CodeIgniter-3.x-orange.svg)
![PHP](https://img.shields.io/badge/PHP-7.x-blue.svg)
![MySQL](https://img.shields.io/badge/MySQL-5.x-green.svg)
![Bootstrap](https://img.shields.io/badge/Bootstrap-4.x-purple.svg)

# Sistem Rental Alat Berat

Sistem informasi rental alat berat yang dibangun menggunakan framework CodeIgniter dengan fitur lengkap untuk manajemen data alat berat, customer, transaksi, dan laporan.

## 📋 Deskripsi

Aplikasi ini dirancang khusus untuk membantu pengelolaan usaha rental alat berat dengan fitur-fitur yang lengkap dan user-friendly. Sistem ini memungkinkan pengelola untuk:

- Mengelola data alat berat (tambah, edit, hapus)
- Mengelola data customer
- Mencatat transaksi penyewaan alat berat
- Mencetak laporan transaksi berdasarkan periode tertentu
- Memantau status ketersediaan alat berat

## ✨ Fitur Utama

### 🔐 Sistem Autentikasi
- Halaman login yang aman
- Session management
- Proteksi halaman berdasarkan status login

### 📊 Dashboard
- Statistik real-time (total alat, customer, transaksi, pendapatan)
- Grafik pendapatan dan status alat berat
- Tabel transaksi terbaru
- Tabel alat berat yang sedang disewa

### 🚜 Manajemen Alat Berat
- CRUD lengkap untuk data alat berat
- Informasi detail (nama, merk, jenis, plat nomor, tahun, harga sewa)
- Status alat berat (tersedia, disewa, perbaikan)
- Modal konfirmasi untuk hapus data

### 👥 Manajemen Customer
- CRUD lengkap untuk data customer
- Informasi detail (nama, alamat, no HP, no KTP, email)
- Validasi form input
- Modal konfirmasi untuk hapus data

### 📝 Manajemen Transaksi
- CRUD lengkap untuk data transaksi
- Form transaksi dengan dropdown customer dan alat berat
- Update otomatis status alat berat saat transaksi dibuat/selesai
- Form penyelesaian transaksi dengan tanggal pengembalian dan denda
- Status transaksi (proses, selesai, batal)

### 📈 Laporan dan Pencetakan
- Filter laporan berdasarkan periode tanggal
- Tampilan laporan transaksi dalam bentuk tabel
- Total pendapatan per periode
- Cetak laporan dengan format yang rapi dan siap pakai

## 🛠 Teknologi yang Digunakan

- **Backend**: PHP 7.x, CodeIgniter 3.x
- **Database**: MySQL
- **Frontend**: HTML5, CSS3, JavaScript
- **Framework CSS**: Bootstrap 4.x
- **Library**: jQuery, DataTables, Chart.js
- **Server**: Apache/Nginx

## 📁 Struktur Direktori

```
application/
├── config/
│   ├── autoload.php
│   ├── config.php
│   ├── database.php
│   └── routes.php
├── controllers/
│   ├── Welcome.php
│   └── Admin.php
├── models/
│   └── Ab_rental.php
├── views/
│   ├── admin/
│   │   ├── header.php
│   │   ├── index.php
│   │   ├── footer.php
│   │   ├── alatberat.php
│   │   ├── tambahalatberat.php
│   │   ├── editalatberat.php
│   │   ├── customer.php
│   │   ├── tambahcustomer.php
│   │   ├── editcustomer.php
│   │   ├── peminjaman.php
│   │   ├── tambah_peminjaman.php
│   │   ├── edit_peminjaman.php
│   │   ├── transaksi_selesai.php
│   │   ├── laporan_transaksi.php
│   │   └── laporan_print_transaksi.php
│   └── login.php
└── ...
assets/
├── css/
├── js/
├── vendor/
└── ...
```

## 🗄 Struktur Database

### Tabel: admin
| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id_admin | INT(11) | Primary Key, Auto Increment |
| username | VARCHAR(50) | Username untuk login |
| password | VARCHAR(255) | Password terenkripsi |
| nama_admin | VARCHAR(100) | Nama lengkap admin |
| email | VARCHAR(100) | Email admin |
| level | ENUM('admin', 'superadmin') | Level akses admin |
| status | ENUM('aktif', 'nonaktif') | Status akun admin |

### Tabel: alat_berat
| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id_alat | INT(11) | Primary Key, Auto Increment |
| nama_alat | VARCHAR(100) | Nama alat berat |
| merk | VARCHAR(50) | Merek alat berat |
| jenis | VARCHAR(50) | Jenis alat berat |
| plat_nomor | VARCHAR(15) | Plat nomor alat berat |
| tahun | INT(4) | Tahun pembuatan |
| harga_sewa | DECIMAL(10,2) | Harga sewa per hari |
| status | ENUM('tersedia', 'disewa', 'perbaikan') | Status alat berat |

### Tabel: customer
| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id_customer | INT(11) | Primary Key, Auto Increment |
| nama_customer | VARCHAR(100) | Nama customer |
| alamat | TEXT | Alamat customer |
| no_hp | VARCHAR(15) | Nomor HP customer |
| no_ktp | VARCHAR(20) | Nomor KTP customer |
| email | VARCHAR(100) | Email customer |

### Tabel: transaksi
| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id_transaksi | INT(11) | Primary Key, Auto Increment |
| id_customer | INT(11) | Foreign Key ke customer.id_customer |
| id_alat | INT(11) | Foreign Key ke alat_berat.id_alat |
| id_admin | INT(11) | Foreign Key ke admin.id_admin |
| tanggal_sewa | DATE | Tanggal mulai sewa |
| tanggal_kembali | DATE | Tanggal selesai sewa |
| total_bayar | DECIMAL(10,2) | Total pembayaran |
| status | ENUM('proses', 'selesai', 'batal') | Status transaksi |
| tanggal_pengembalian | DATE | Tanggal pengembalian aktual |
| denda | DECIMAL(10,2) | Denda jika terlambat |

## 🚀 Cara Instalasi

### Persyaratan
- PHP 7.x atau lebih tinggi
- MySQL 5.x atau lebih tinggi
- Web Server (Apache, Nginx, dll.)
- Composer (opsional)

### Langkah-langkah instalasi

1. **Clone repositori**
   ```bash
   git clone https://github.com/luqmanaru/Rental-Alat-Berat-6.git
   ```

2. **Pindahkan ke direktori web server**
   ```bash
   # Untuk XAMPP
   cp -R Rental-Alat-Berat-6 /opt/lampp/htdocs/rental_alatberat
   
   # Untuk server Linux
   sudo cp -R Rental-Alat-Berat-6 /var/www/html/rental_alatberat
   ```

3. **Buat database**
   ```sql
   CREATE DATABASE db_rental_alatberat;
   ```

4. **Import struktur database**
   - Buka phpMyAdmin
   - Pilih database `db_rental_alatberat`
   - Klik tab "Import"
   - Pilih file SQL yang tersedia di folder `database/`

5. **Konfigurasi database**
   - Buka file `application/config/database.php`
   - Sesuaikan konfigurasi database:
   ```php
   $db['default'] = array(
       'hostname' => 'localhost',
       'username' => 'root',
       'password' => '',
       'database' => 'db_rental_alatberat',
       'dbdriver' => 'mysqli',
       // ... konfigurasi lainnya
   );
   ```

6. **Konfigurasi base URL**
   - Buka file `application/config/config.php`
   - Sesuaikan base URL:
   ```php
   $config['base_url'] = 'http://localhost/rental_alatberat/';
   ```

7. **Akses aplikasi**
   - Buka browser dan akses `http://localhost/rental_alatberat/`
   - Login dengan username dan password default (biasanya `admin`/`admin`)

---
**luqmanaru**

Ini adalah proyek pengembangan web lanjut untuk memenuhi tugas kuliah Pemrograman Web Lanjut
