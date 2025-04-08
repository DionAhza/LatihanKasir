<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Produk as modelProduk;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class Produk implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection    
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $col){
            $dbKode = modelProduk::where('kode', $col['kode'])->first();
            if(!$dbKode){
                $simpan = new modelProduk();
                $simpan->kode = $col['kode'];
                $simpan->nama = $col['nama'];
                $simpan->harga = $col['harga'];
                $simpan->stok = $col['stok'];
                $simpan->save();
            }
        }
    }
    

    public function startRow() : int {
        return 2;
    }

    // public function headingRow() : int {
    //     return 1;
    // }
}
