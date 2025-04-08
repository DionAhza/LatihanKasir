<?php

use App\Livewire\Home;
use App\Livewire\User;
use App\Livewire\Laporan;
use App\Livewire\Product;
use App\Livewire\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('home', Home::class)->middleware('auth')->name('home');
Route::get('user', User::class)->middleware('auth')->name('user');
Route::get('laporan', Laporan::class)->middleware('auth')->name('laporan');
Route::get('product', Product::class)->middleware('auth')->name('product');
Route::get('transaksi', Transaksi::class)->middleware('auth')->name('transaksi');
Route::get('cetak',['App\Http\Controllers\HomeController','cetak']);


