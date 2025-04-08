<div>
   
<div class="container">
    <div class="row my-3">
        <div class="col-12">
            <button wire:click="pilihMenu('lihat')" class="btn {{ $pilihanMenu=='lihat' ? 'btn-primary' : 'btn-outline-primary' }}">
                Semua pengguna
            </button>
            <button wire:click="pilihMenu('tambah')" class="btn {{ $pilihanMenu=='tambah' ? 'btn-primary' : 'btn-outline-primary' }}">
                tambah pengguna
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
                Semua pengguna
            </div>
            <div class="card-body">
                <table class="table table-border">
                    <thead>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($semuaPengguna as $pengguna)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pengguna->name }}</td>
                                <td>{{ $pengguna->email }}</td>
                                <td>{{ $pengguna->role }}</td>
                                <td>
                                    <button wire:click="editUser({{ $pengguna->id }})" class="btn {{ $pilihanMenu=='edit' ? 'btn-secondary' : 'btn-outline-secondary' }}">
                                        edit pengguna
                                    </button>
                                    <button wire:click="deleteUser({{ $pengguna->id }})" class="btn {{ $pilihanMenu=='hapus' ? 'btn-danger' : 'btn-outline-danger' }}">
                                        hapus pengguna
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
            Tambah pengguna
        </div>
        <div class="card-body">
            <form action="" wire:submit='simpan'>
                <label for="" class=""> Nama</label>
                <input type="text" class="form-control" wire:model='nama'>
                @error('nama')
                    <span class="text-danger"> {{ $message }}</span>
                @enderror 
                <br>
                <label for="" class=""> email</label>
                <input type="text" class="form-control" wire:model='email'>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror 
                <br>
                <label for="" class=""> password</label>
                <input type="password" class="form-control" wire:model='password'>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror 
                <br>
                <label for="" class=""> role</label>
               <select name="" id="" class="form-control" wire:model='role'>
                    <option>-----------</option>
                    <option value="admin">admin</option>
                    <option value="kasir">kasir</option>
               </select>
                @error('role')
                    <span class="text-danger">{{ $message }}</span>
                @enderror 
                <br>

                <button type="submit" class="btn btn-primary">Buat</button> <br>
            </form>
        </div>
    </div>

    @elseif($pilihanMenu == 'edit')
    <div class="card border-primary">
        <div class="card-header">
            Edit pengguna
        </div>
        <div class="card-body">
            <form action="" wire:submit='simpanEdit'>
                <label for="" class=""> Nama</label>
                <input type="text" class="form-control" wire:model='nama'>
                @error('nama')
                    <span class="text-danger"> {{ $message }}</span>
                @enderror 
                <br>
                <label for="" class=""> email</label>
                <input type="text" class="form-control" wire:model='email'>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror 
                <br>
                <label for="" class=""> password</label>
                <input type="password" class="form-control" wire:model='password'>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror 
                <br>
                <label for="" class=""> role</label>
               <select name="" id="" class="form-control" wire:model='role'>
                    <option>-----------</option>
                    <option value="admin">admin</option>
                    <option value="kasir">kasir</option>
               </select>
                @error('role')
                    <span class="text-danger">{{ $message }}</span>
                @enderror 
                <br>

                <button type="submit" class="btn btn-info">Simpan</button> <br>
                <button type="submit" class="btn btn-secondary" wire:click='batal'>Batal</button> <br>
                {{-- <button type="submit" class="btn btn-primary">Buat</button> <br> --}}
            </form> 
        </div>
    </div>

    @elseif($pilihanMenu == 'hapus')
    <div class="card border-danger">
        <div class="card-header bg-danger text-white">
            Hapus pengguna
        </div>
        <div class="card-body">
            Anda yakin Akan menghapus user ??
            <p>Nama : {{ $user->name }}</p>
            <button class="btn btn-danger" wire:click='hapus'>Hapus</button>
            <button class="btn btn-secondary" wire:click='batal'>Batal</button>
        </div>
    </div>

        
   
    @endif
</div>
    </div>
</div>

</div>
