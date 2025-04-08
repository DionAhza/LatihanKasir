<?php

namespace App\Livewire;

use App\Models\Produk as modelProduk;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\Produk as imporProduk;

class Product extends Component
{
    use WithFileUploads;
    public $pilihanMenu = 'lihat';
    public $nama;
    public $kode;
    public $harga;
    public $stok;
    public $produk;
    public $fileExcel;

    public function mount(){
        if(auth()->user()->role != 'admin'){
            abort(403);
        }
    }

    public function importExcel(){
        Excel::import(new imporProduk, $this->fileExcel);
        $this->reset();
    }

    public function editProduk($id){
        $this->produk = modelProduk::find($id);
        $this->nama = $this->produk->nama;
        $this->kode = $this->produk->kode;
        $this->harga = $this->produk->harga;
        $this->stok = $this->produk->stok;

        $this->pilihanMenu = 'edit';
    }
 

    public function simpanEdit(){
        $this->validate([
            'nama'=> 'required',
            'kode'=> ['required','unique:produks,kode,' . $this->produk->id],
            'harga'=> 'required',
            'stok'=> 'required',
            // 'harga'=> 'required',
        ],[
            'nama.required' => 'nama harus diisi',
            'kode.required' => 'kode harus diisi',
            'harga.required' => 'harga harus diisi',
            'stok.required' => 'stok harus diisi',
            // 'harga.required' => 'harga harus diisi'
        ]);
        $simpan = $this->produk;
        $simpan->nama = $this->nama;
        $simpan->kode = $this->kode;
        if($this->harga) {
          $simpan->harga = $this->harga;  
        }
        $simpan->stok = $this->stok;
        $simpan->save();

        $this->reset(['nama','kode','harga','stok',]);
        $this->pilihanMenu = 'lihat';
    }
    public function deleteProduk($id){
        $this->produk = modelProduk::find($id);

        $this->pilihanMenu = 'hapus';
    }

    public function batal(){
        $this->reset();
    }

    public function hapus(){
        $this->produk->delete();
        $this->reset();
    }

    public function simpan(){
        $this->validate([
            'nama'=> 'required',
            'kode'=> 'required|unique:produks,kode,',
            'harga'=> 'required',
            'stok'=> 'required',
        ],[
            'nama.required' => 'nama harus diisi',
            'kode.required' => 'kode harus diisi',
            'harga.required' => 'harga harus diisi',
            'stok.required' => 'stok harus diisi'
        ]);
        $simpan = new modelProduk();
        $simpan->nama = $this->nama;
        $simpan->kode = $this->kode;
        $simpan->stok = $this->stok;
        $simpan->harga = $this->harga;
        $simpan->save();

        $this->reset(['nama','kode','stok','harga']);
        $this->pilihanMenu = 'lihat';
    }
    public function pilihMenu($menu){
        $this->pilihanMenu = $menu;
    }

    public function render()
    {
        return view('livewire.product')->with([
            'products' => modelProduk::all(),
        ]);
    }
}
