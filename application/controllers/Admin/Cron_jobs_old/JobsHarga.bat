@echo off

echo start process update harga...
echo .
echo Mohon Tidak dimatikan

C:\xampp\php\php.exe -f C:\xampp\htdocs\AppInventory\index.php Admin\Cron_jobs JobsHarga HargaJual
Cmd /k