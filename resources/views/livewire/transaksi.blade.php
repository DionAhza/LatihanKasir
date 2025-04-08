<div>
    <div class="container">
      <div class="row mt-3">
         <div class="col-12">
            @if (!$transaksiAktif)
            <button class="btn btn-primary" wire:click = 'transaksiBaru'>Transaksi Baru</button>
            @else
             <button class="btn btn-primary" >Transaksi</button>
             <button class="btn btn-danger" wire:click = 'batalTransaksi'>Batalkan Transaksi</button>
            @endif
            
            <button class="btn btn-info" wire:loading>Loading .....</button>
         </div>
      </div>
      @if ($transaksiAktif)
         
  
      <div class="row mt-2">
         <div class="col-8">
       <div class="card border-primary mt-2">
         <div class="card-body">
            <div class="card-title"><h4>No Invoice: {{ $transaksiAktif->kode }}</h4></div>
            <input type="text" class="form-control" placeholder="No Invoice" wire:model.live='kode'>
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th>No</th> 
                     <th>Kode</th>
                     <th>Nama</th>
                     <th>Harga</th>
                     <th>Stok</th>
                     <th>Sub total</th>
                     <th>------</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($semuaProduk as $produk)
                     <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $produk->produk->kode }}</td>
                        <td>{{ $produk->produk->nama }}</td>
                        <td>{{ number_format($produk->produk->harga, 2,'.','.')  }}</td>
                        <td>
                           {{-- <input type="number" class="form-control" placeholder="Qty" wire:model='qty.{{ $produk->id }}'> --}}
                           {{$produk->jumlah}}
                        </td>
                        <td>{{ number_format($produk->jumlah * $produk->produk->harga, 2,'.','.')  }}</td>
                        <td>
                           <button class="btn btn-danger" wire:click='hapusProduk({{  $produk->id }})'>
                              Hapus
                           </button>
                        </td>
                     </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
       </div>
      </div>
         <div class="col-4">
       <div class="card border-primary mt-2">
         <div class="card-body">
            <div class="card-title">Total Biaya</div>
            <div class="d-flex justify-content-between">
               <span>Rp.</span>
               <span>{{ number_format($totalSemuaBelanja,2,'.','.') }} </span>
            </div>
         </div>
       </div>
       <div class="card border-primary mt-2">
         <div class="card-body">
            <div class="card-title">Bayar</div>
            <input type="number" class="form-control" placeholder="Bayar" wire:model.live='bayar'>
         </div>
       </div>
       <div class="card border-primary mt-2">
         <div class="card-body">
            <div class="card-title">Kembalian</div>
            <div class="d-flex justify-content-between">
               <span>Rp.</span>
               <span>{{ number_format($kembalian,2,'.','.') }} </span>
            </div>
         </div>
       </div>
       @if ($kembalian >= 0)
       <button class="btn btn-success mt-2 w-100" wire:click='transaksiSelesai'>Bayar</button>
       @elseif($kembalian < 0)
         <div class="alert alert-danger" role="alert">
         Duit Kurang
      </div>
       @endif
      </div>
      
      </div>
      @endif
    </div>
</div>
