<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class UserEdit extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $users;

    public function mount($id){
        $this->users = User::find($id);
        $this->name = $this->users->name;
        $this->email = $this->users->email; 
    }
    public function save(){
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|email',
            'password' => 'confirmed',
        ]);
        $this->users->update([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);
        
        return to_route('user.index')->with('success', 'User updted successfully.');

    }

    public function render()
    {
        return view('livewire.users.user-edit');
    }
}
