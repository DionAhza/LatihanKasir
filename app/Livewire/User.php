<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User as ModelUser;
use Illuminate\Support\Facades\Hash;


class User extends Component
{
    public function render()
    {
        return view('livewire.user')->with([
            'semuaPengguna'=>ModelUser::all()
        ]);
    }

    public $pilihanMenu = 'lihat';
    public $nama;
    public $email;
    public $role;
    public $password;
    public $user;

    public function mount(){
        if(auth()->user()->role != 'admin'){
            abort(403);
        }
    }

    public function editUser($id){
        $this->user = ModelUser::find($id);
        $this->nama = $this->user->name;
        $this->email = $this->user->email;
        $this->role = $this->user->role;

        $this->pilihanMenu = 'edit';
    }


    public function simpanEdit(){
        $this->validate([
            'nama'=> 'required',
            'email'=> ['required','unique:users,email,' . $this->user->id],
            'role'=> 'required',
            // 'password'=> 'required',
        ],[
            'nama.required' => 'nama harus diisi',
            'email.required' => 'email harus diisi',
            'role.required' => 'role harus diisi',
            // 'password.required' => 'password harus diisi'
        ]);
        $simpan = $this->user;
        $simpan->name = $this->nama;
        $simpan->email = $this->email;
        if($this->password) {
          $simpan->password = bcrypt($this->password);  
        }
        $simpan->role = $this->role;
        $simpan->save();

        $this->reset(['nama','email','password','role','user']);
        $this->pilihanMenu = 'lihat';
    }
    public function deleteUser($id){
        $this->user = ModelUser::find($id);

        $this->pilihanMenu = 'hapus';
    }

    public function batal(){
        $this->reset();
    }

    public function hapus(){
        $this->user->delete();
        $this->reset();
    }

    public function simpan(){
        $this->validate([
            'nama'=> 'required',
            'email'=> 'required|unique:users,email,except,id',
            'role'=> 'required',
            'password'=> 'required',
        ],[
            'nama.required' => 'nama harus diisi',
            'email.required' => 'email harus diisi',
            'role.required' => 'role harus diisi',
            'password.required' => 'password harus diisi'
        ]);
        $simpan = new ModelUser();
        $simpan->name = $this->nama;
        $simpan->email = $this->email;
        $simpan->password = bcrypt($this->password);
        $simpan->role = $this->role;
        $simpan->save();

        $this->reset(['nama','email','password','role']);
        $this->pilihanMenu = 'lihat';
    }
    public function pilihMenu($menu){
        $this->pilihanMenu = $menu;
    }
}
