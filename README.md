<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About This Project

Aplikasi Kasir berbasis Laravel dan Livewire untuk kebutuhan toko kecil dan menengah. Fitur-fitur seperti manajemen produk, transaksi, laporan penjualan, dan sistem login sudah tersedia dalam satu paket aplikasi web.

## Features

- 🔐 Autentikasi Laravel (Login/Register)
- 📦 Manajemen Produk (Tambah, Hapus, Import Excel)
- 💰 Transaksi Langsung (Input produk via kode, bayar, dan hitung kembalian)
- 📊 Laporan Penjualan (Tampilkan semua transaksi & cetak)
- 🧹 Reset transaksi
- 🖨️ Cetak struk/laporan

## Routing

```php
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', App\Livewire\Home::class)->middleware('auth')->name('home');
Route::get('user', App\Livewire\User::class)->middleware('auth')->name('user');
Route::get('laporan', App\Livewire\Laporan::class)->middleware('auth')->name('laporan');
Route::get('product', App\Livewire\Product::class)->middleware('auth')->name('product');
Route::get('transaksi', App\Livewire\Transaksi::class)->middleware('auth')->name('transaksi');
Route::get('cetak', [App\Http\Controllers\HomeController::class, 'cetak']);
