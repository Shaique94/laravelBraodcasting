<?php

namespace App\Livewire\Roles;

use Livewire\Component;

class RoleShow extends Component
{
    public $role;
    public function mount($id)
    {
        $this->role = \Spatie\Permission\Models\Role::find($id);
        // $this->permissions = $this->role->permissions;

    }
    public function render()
    {
        return view('livewire.roles.role-show');
    }
}
