@echo off

echo start process update harga...
echo .
echo Mohon Tidak dimatikan

C:\xampp\php\php.exe -f C:\xampp\htdocs\AppInventory\index.php Cron_jobs JobsHarga HargaJual
@REM Cmd /k