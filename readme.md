# Step run database
1. `php artisan migrate`
2. `php artisan db:seed --class=CopyDataKTIGuruSeeder`
3. `php artisan db:seed --class=ClearCopyDatabaseTransaksi` pada step ini jalankan nyalakan komentar tabel satu-satu
3. `php artisan db:seed --class=ResetPasswordSeeder` pada step ini jalankan nyalakan komentar tabel satu-satu. Atau bisa juga semuanya