# Edutorial
**Edutorial** ( Edukasi berbasis tutorial ) merupakan sebuah aplikasi web untuk berbagi tutorial berbasis artikel, aplikasi web ini dibangun menggunakan **PHP Native** dan **Database PostgreSQL** serta **Stisla Admin** untuk antarmuka pengguna.

## Teknologi yang Digunakan
- **PHP Native**
- **PostgreSQL**
- **Stisla Admin**: Tema admin berbasis bootstap 4.

## Fitur
- **Register**
- **Login**
- **Manajemen Tutorial** : Menambah, mengedit, dan menghapus Tutorial.

## Instalasi
Ikuti langkah-langkah berikut untuk menginstal aplikasi ini di server lokal Anda:

### 1 Pindahkan data ke Localhost
1. Salin repository ini ke komputer Anda dengan mengklik tombol Code, lalu pilih Download ZIP untuk mengunduh file sebagai ZIP, atau clone menggunakan Git `git clone https://github.com/rizkizulfihadi/edutorial.git`
2. Pastikan Anda sudah memiliki **Server Apache** terinstal di komputer Anda.
2. **Letakkan folder aplikasi ini di dalam folder `htdocs`** di direktori instalasi XAMPP Anda. Misalnya: `C:/xampp/htdocs/edutorial` 

### 2 Siapkan Database
Sebelum menjalankan aplikasi, Anda harus mengimpor database terlebih dahulu. Ikuti langkah-langkah berikut untuk mengimpor database:

1. Pastikan Anda sudah memiliki **PostgreSQL** terinstal di komputer Anda.
2. Buat database baru di PostgreSQL dengan nama `edutorial`.
3. Setelah database dibuat, restore database dengan mengimport file SQL yang ada di folder `database/edutorial.sql` ke dalam database `edutorial`. 

### 3. Jalankan Aplikasi
1. Pastikan server apache dan PostgreSQL sudah berjalan dan terkoneksi.
2. Buka browser dan akses aplikasi melalui `http://localhost/edutorial`
3. Saat masuk menampilkan halaman login, masukkan username dan password berikut:
   - **Username**: `rizkiz`
   - **Password**: `123`
