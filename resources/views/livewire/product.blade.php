<div>
   
    <div class="container">
        <div class="row my-3">
            <div class="col-12">
                <button wire:click="pilihMenu('lihat')" class="btn {{ $pilihanMenu=='lihat' ? 'btn-primary' : 'btn-outline-primary' }}">
                    Semua Produk
                </button>
                <button wire:click="pilihMenu('tambah')" class="btn {{ $pilihanMenu=='tambah' ? 'btn-primary' : 'btn-outline-primary' }}">
                    tambah Produk
                </button>
                <button wire:click="pilihMenu('excel')" class="btn {{ $pilihanMenu=='excel' ? 'btn-success' : 'btn-outline-success' }}">
                    Import Excel
                </button>
                <button wire:loading class="btn btn-info">
                    Loading
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
        @if ($pilihanMenu == 'lihat')
            <div class="card border-primary">
                <div class="card-header">
                    Semua Produk
                </div>
                <div class="card-body">
                    <table class="table table-border">
                        <thead>
                            <th>NO</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Stok</th>
                        </thead>
                        <tbody>
                            @foreach ($products as $produk)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $produk->kode }}</td>
                                    <td>{{ $produk->nama }}</td>
                                    <td>{{ $produk->harga  }}</td>
                                    <td>{{ $produk->stok  }}</td>
                                    <td>
                                        <button wire:click="editProduk({{ $produk->id }})" class="btn {{ $pilihanMenu=='edit' ? 'btn-secondary' : 'btn-outline-secondary' }}">
                                            edit produk
                                        </button>
                                        <button wire:click="deleteProduk({{ $produk->id }})" class="btn {{ $pilihanMenu=='hapus' ? 'btn-danger' : 'btn-outline-danger' }}">
                                            hapus produk
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        
        @elseif($pilihanMenu == 'tambah')
        <div class="card border-primary">
            <div class="card-header">
                Tambah Produk
            </div>
            <div class="card-body">
                <form action="" wire:submit='simpan'>
                    <label for="" class=""> Nama</label>
                    <input type="text" class="form-control" wire:model='nama'>
                    @error('nama')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror 
                    <br>
                    <label for="" class=""> Kode / Barcode</label>
                    <input type="text" class="form-control" wire:model='kode'>
                    @error('kode')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror 
                    <br>
                    <label for="" class=""> harga</label>
                    <input type="number" class="form-control" wire:model='harga'>
                    @error('harga')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror 
                    <label for="" class=""> stok</label>
                    <input type="number" class="form-control" wire:model='stok'>
                    @error('stok')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror 
                    <br>
                    {{-- <label for="" class=""> role</label>
                   <select name="" id="" class="form-control" wire:model='role'>
                        <option>-----------</option>
                        <option value="admin">admin</option>
                        <option value="kasir">kasir</option>
                   </select>
                    @error('role')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror  --}}
                    <br>
    
                    <button type="submit" class="btn btn-primary">Buat</button> <br>
                </form>
            </div>
        </div>
    
        @elseif($pilihanMenu == 'edit')
        <div class="card border-primary">
            <div class="card-header">
                Edit Produk
            </div>
            <div class="card-body">
                <form action="" wire:submit='simpanEdit'>
                    <label for="" class=""> Nama</label>
                    <input type="text" class="form-control" wire:model='nama'>
                    @error('nama')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror 
                    <br>
                    <label for="" class=""> Kode / Barcode</label>
                    <input type="text" class="form-control" wire:model='kode'>
                    @error('kode')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror 
                    <br>
                    <label for="" class=""> harga</label>
                    <input type="number" class="form-control" wire:model='harga'>
                    @error('harga')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror 
                    <label for="" class=""> stok</label>
                    <input type="number" class="form-control" wire:model='stok'>
                    @error('stok')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror 
                    <br>
                    {{-- <label for="" class=""> role</label>
                   <select name="" id="" class="form-control" wire:model='role'>
                        <option>-----------</option>
                        <option value="admin">admin</option>
                        <option value="kasir">kasir</option>
                   </select>
                    @error('role')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror  --}}
                    <br>
    
                    <button type="submit" class="btn btn-primary">Buat</button> <br>
                </form>
            </div>
        </div>
    
        @elseif($pilihanMenu == 'hapus')
        <div class="card border-danger">
            <div class="card-header bg-danger text-white">
                Hapus Produk
            </div>
            <div class="card-body">
                Anda yakin Akan menghapus user ??
                <p>Kode : {{ $produk->kode }}</p>
                <p>Nama : {{ $produk->nama }}</p>
                <button class="btn btn-danger" wire:click='hapus'>Hapus</button>
                <button class="btn btn-secondary" wire:click='batal'>Batal</button>
            </div>
        </div>

        @elseif($pilihanMenu == 'excel')
        <div class="card border-success">
            <div class="card-header bg-success text-white">
                Import Excel
            </div>
            <div class="card-body">
                <form action="" wire:submit='importExcel'>
                    <input type="file" name="" id="" class="form-control"  wire:model='fileExcel'> <br>
                    <button class="btn btn-success">Kirim</button>
                    <button class="btn btn-secondary" wire:click='batal'>Batal</button>
                </form>
               
            </div>
        </div>
    
            
       
        @endif
    </div>
        </div>
    </div>
    
    </div>
    