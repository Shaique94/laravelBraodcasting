<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class UserCreate extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function save(){
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);
        
        return to_route('user.index')->with('success', 'User created successfully.');

        // Here you would typically save the user to the database
        // User::create([
        //     'name' => $this->name,
        //     'email' => $this->email,
        //     'password' => bcrypt($this->password),
        // ]);

        session()->flash('message', 'User created successfully.');
    }
    public function render()
    {
        return view('livewire.users.user-create');
    }
}
