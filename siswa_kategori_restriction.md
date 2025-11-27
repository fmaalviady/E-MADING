# Pembatasan Akses Kategori untuk Siswa

## Implementasi:

### 1. **Header Navigation**
- Menu KATEGORI disembunyikan dari siswa
- Hanya admin dan guru yang dapat melihat menu kategori

### 2. **Middleware Protection**
- AuthMiddleware diupdate untuk memblokir akses siswa ke routes kategori
- Redirect ke dashboard dengan pesan error jika siswa mencoba akses

### 3. **Error Handling**
- Dashboard siswa menampilkan pesan error jika ada upaya akses kategori
- Pesan yang jelas: "Akses ditolak. Fitur kategori hanya untuk admin dan guru."

## Files Modified:

1. **resources/views/partials/header.blade.php**
   - Kondisi `@if(session('user')->role !== 'siswa')` untuk menu kategori

2. **app/Http/Middleware/AuthMiddleware.php**
   - Pemeriksaan role siswa untuk routes kategori
   - Redirect dengan pesan error khusus

3. **resources/views/dashboard/siswa.blade.php**
   - Tampilan pesan error untuk akses yang ditolak

## Hasil:
✅ **Siswa tidak dapat melihat menu kategori**
✅ **Siswa tidak dapat mengakses halaman kategori secara langsung**
✅ **Pesan error yang jelas jika siswa mencoba akses**
✅ **Admin dan guru tetap dapat mengakses fitur kategori**