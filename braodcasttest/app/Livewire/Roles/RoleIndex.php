<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleIndex extends Component
{
    public $roles;
    public function mount(){
        $this->roles = Role::with("permissions")->get();
    }
    public function delete($id){
        $role = Role::find($id);
        $role->delete();
        return to_route('roles.index')->with('success', 'Role deleted successfully.');
    }
    public function render()
    {
        return view('livewire.roles.role-index');
    }
}
