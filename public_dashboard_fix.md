# Fix: Hapus Tombol Dashboard untuk Pengunjung Publik

## Masalah:
Tombol "← KEMBALI KE DASHBOARD" muncul di halaman artikel publik untuk pengunjung yang belum login.

## Solusi:
Menambahkan kondisi `@if(session('user'))` untuk hanya menampilkan tombol dashboard bagi user yang sudah login.

## Files Modified:
1. **resources/views/articles/public.blade.php**
   - Tombol dashboard hanya muncul jika user sudah login
   - Pengunjung publik hanya melihat tombol "Beranda"

## Hasil:
✅ **Pengunjung publik tidak melihat tombol dashboard**
✅ **User yang login tetap dapat akses tombol dashboard**
✅ **UI lebih bersih untuk pengunjung publik**