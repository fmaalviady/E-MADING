@echo off
echo ========================================
echo UPLOAD PROJECT KE GITHUB
echo ========================================
echo.

cd c:\xampp\htdocs\fasya_ujikom

echo [1/5] Inisialisasi Git...
git init

echo.
echo [2/5] Menambahkan semua file...
git add .

echo.
echo [3/5] Commit pertama...
git commit -m "Initial commit - Mading Fasya Laravel Project"

echo.
echo [4/5] Menghubungkan ke repository GitHub...
git remote add origin https://github.com/fmaalviady/E-MADING.git

echo.
echo [5/5] Push ke GitHub...
git branch -M main
git push -u origin main --force

echo.
echo ========================================
echo UPLOAD SELESAI!
echo ========================================
echo.
echo Repository: https://github.com/fmaalviady/E-MADING
echo.
pause
