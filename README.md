<div align="center">

# 🌟 IdolVerse 🌟

### The Ultimate K-Pop & J-Pop Encyclopedia and Community Hub

*Proyek Akhir Pemrograman Web II — Teknologi Informasi, Universitas Lambung Mangkurat*

</div>

---

# 📖 Tentang Proyek

**IdolVerse** adalah platform web interaktif yang didedikasikan bagi komunitas penggemar musik Asia, khususnya **K-Pop** dan **J-Pop**. Platform ini berfungsi sebagai ensiklopedia digital terpusat yang memungkinkan pengguna mencari dan menjelajahi profil idol favorit mereka, sekaligus menjadi ruang diskusi komunitas yang dinamis melalui fitur komentar.

Aplikasi ini dibangun menggunakan **Laravel 11**, menerapkan sistem **Role-Based Access Control (RBAC)** kustom, serta memiliki antarmuka responsif yang dikembangkan dengan **Tailwind CSS**.

---

# 🎯 Fitur Utama

Proyek ini dikembangkan untuk memenuhi standar kompetensi Pemrograman Web II dengan fitur-fitur berikut:

### 🔐 Autentikasi & Otorisasi

* Sistem login dan registrasi pengguna.
* Pemisahan hak akses antara **Admin** dan **User** menggunakan **Custom Middleware**.
* Perlindungan rute berdasarkan role pengguna.

### 📂 Manajemen Data (CRUD)

* CRUD lengkap untuk data **Idol**.
* Upload dan manajemen foto idol menggunakan Laravel Storage.
* CRUD komentar pengguna pada halaman detail idol.

### 📊 Dashboard Admin

* Dashboard khusus Admin.
* Statistik jumlah idol dan komentar secara real-time.
* Monitoring data aplikasi secara terpusat.

### 💬 Interaksi Pengguna

* Sistem komentar pada setiap profil idol.
* Pengguna dapat berpartisipasi dalam diskusi komunitas.

### 📱 Responsive Design

* Tampilan responsif untuk desktop.
* Dibangun menggunakan Tailwind CSS.

---

# 🛠️ Teknologi yang Digunakan

| Teknologi      | Kegunaan              |
| -------------- | --------------------- |
| Laravel 11     | Backend Framework     |
| PHP 8.2+       | Bahasa Pemrograman    |
| MySQL          | Database              |
| Tailwind CSS   | Styling Frontend      |
| Blade Template | View Engine           |
| Composer       | Dependency Management |
| Node.js & NPM  | Frontend Build Tools  |

---

# 🚀 Panduan Instalasi Lokal

## 1. Kebutuhan Sistem

Pastikan perangkat Anda telah terpasang:

* PHP >= 8.2
* Composer
* Node.js & NPM
* MySQL Database (XAMPP, Laragon, atau sejenisnya)

---

## 2. Clone Repository

```bash
git clone https://github.com/Clarissadhea/Project-WebII-Team6.git
cd idol-web
```

---

## 3. Install Dependensi

```bash
composer install
npm install
npm run build
```

---

## 4. Setup Environment

Salin file environment dan generate application key:

```bash
cp .env.example .env
php artisan key:generate
```

---

## 5. Konfigurasi Database

Buat database baru dengan nama:

```sql
idolverse_db
```

Kemudian sesuaikan konfigurasi database pada file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=idolverse_db
DB_USERNAME=root
DB_PASSWORD=
```

---

## 6. Migrasi Database & Storage

Jalankan perintah berikut untuk:

* Membuat ulang tabel database
* Menjalankan seeder
* Membuat symbolic link untuk penyimpanan gambar

```bash
php artisan migrate:fresh --seed
php artisan storage:link
```

---

## 7. Menjalankan Aplikasi

```bash
php artisan serve
```

Aplikasi dapat diakses melalui:

```text
http://127.0.0.1:8000
```

---

# 🔐 Akun Pengujian

Data dummy telah disediakan melalui Seeder.

| Role          | Akses                                                       |
| ------------- | ----------------------------------------------------------- |
| Administrator | Dashboard Admin, CRUD Idol, Manajemen Gambar, Moderasi Data |
| User          | Melihat Profil Idol, Pencarian Data, Menambah Komentar      |

> Gunakan kredensial yang telah didefinisikan pada file Seeder proyek.

---


# 👨‍💻 Tim Pengembang (Kelompok 6)

| Nama                  | NIM             | Tanggung Jawab                 |
| --------------------- | --------------- | ------------------------------ |
| Aulia Az-Zahra        | 2410817120021   | Database Development           |
| Clarissa Dhea Allisya | 2410817220023   | Backend Development            |
| Nazwa Amanda          | 2410817320015   | Frontend Development           |

---

# 📄 Lisensi

Proyek ini dikembangkan untuk memenuhi tugas **Proyek Akhir Mata Kuliah Pemrograman Web II** Program Studi Teknologi Informasi, Fakultas Teknik, Universitas Lambung Mangkurat.

---

<div align="center">

### ⭐ IdolVerse — Connecting Fans Through Information and Community ⭐

</div>
