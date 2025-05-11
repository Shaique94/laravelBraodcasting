<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserCreate extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $allRoles;
    public $roles = [];

    public function mount(){
        $this->allRoles = \Spatie\Permission\Models\Role::get();
    }
    public function save(){
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'roles' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);
        $roleNames = Role::whereIn('id', $this->roles)->pluck('name');

        $user->syncRoles($roleNames);
        
        return to_route('user.index')->with('success', 'User created successfully.');

       

        session()->flash('message', 'User created successfully.');
    }
    public function render()
    {
        return view('livewire.users.user-create');
    }
}
