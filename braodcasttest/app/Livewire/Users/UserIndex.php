<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class UserIndex extends Component
{
    public $users;
    public function mount(){
        $this->users = User::all();
    }
    public function delete($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            $this->users = User::all();
            session()->flash('message', 'User deleted successfully.');
        } else {
            session()->flash('error', 'User not found.');
        }
    }
    #[Layout("components.layouts.app")]
    public function render()
    {
        return view('livewire.users.user-index');
    }
}
