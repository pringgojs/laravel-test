# Step awal
1. Backup db terbaru dari server
2. Buat db di local baru.
3. Jalankan perintah create view jika view ada yang belum tergenerate
4. Jalankan perintah buat prosedur yg ada di sql create procedure. Supaya pada saat simpan tidak error.

# Step run database

1. `php artisan migrate`
2. `php artisan db:seed --class=CopyDataKTIGuruSeeder`
3. masukkan periode sebelumnya misal dengan format `tahun.format` misal untuk tahun 2020 periode penilai pertama = `2020.1`
4. `php artisan db:seed --class=ClearCopyDatabaseTransaksi` pada step ini jalankan nyalakan komentar tabel satu-satu
5. `php artisan db:seed --class=ResetPasswordSeeder` pada step ini jalankan nyalakan komentar tabel satu-satu. Atau bisa juga semuanya

# Sudah tidak perlu dijalankan

5. `php artisan db:seed --class=JenisPKBSeeder`
6. `php artisan db:seed --class=JenisPKBDetailSeeder`
7. `php artisan db:seed --class=RefAlasanSeeder`
8. `php artisan db:seed --class=NomerAlasanPenolakanSeeder`
