<?php

namespace App\Models;

use App\Models\Produk;
// use GuzzleHttp\Handler\Proxy;
use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetilTransaksi extends Model
{
    //
    use HasFactory;
    
    protected $fillable = [
        'transaksi_id',
        'produk_id',
        'jumlah'
    ];

    public function transaksi(){
        return $this->belongsTo(Transaksi::class);
    }

    public function produk( ){
        return $this->belongsTo(Produk::class);
    }
}
