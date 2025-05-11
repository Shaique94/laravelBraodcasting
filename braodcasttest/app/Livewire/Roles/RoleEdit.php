<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class RoleEdit extends Component
{
    public $name,$role;
    public $allPermissions = [];
    public $permissions = [];

    public function mount($id){
        $this->role = \Spatie\Permission\Models\Role::find($id);
        $this->allPermissions = \Spatie\Permission\Models\Permission::get();
        $this->name = $this->role->name;
        $this->permissions = $this->role->permissions->pluck('id')->toArray();
    }

    public function save(){
        $this->validate([
            'name' => 'required|string|max:255',
            'permissions' => 'required|array',
        ]);
        $this->role->update([
            'name' => $this->name,
        ]);
        $permissionNames = Permission::whereIn('id', $this->permissions)->pluck('name');

        $this->role->syncPermissions($permissionNames);        return to_route('roles.index')->with('success', 'Role updated successfully.');
    }
    public function render()
    {
        return view('livewire.roles.role-edit');
    }
}
