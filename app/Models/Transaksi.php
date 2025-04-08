<?php

namespace App\Models;

use App\Models\DetilTransaksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    //
    use HasFactory;
    
    protected $fillable = [
        'kode',
        'total',
        'status'
    ];

    public function detilTransaksi(){
        return $this->hasMany(DetilTransaksi::class);
    }
}
