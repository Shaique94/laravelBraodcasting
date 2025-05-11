<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleCreate extends Component
{
    public $name,$permissions = [],$allPermissions = [];
    public function mount(){
        $this->allPermissions = \Spatie\Permission\Models\Permission::all();
    }

    public function save(){
        // dd("shaique");

        $this->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'required',
        ]);
        // dd("shaique");
       $role = Role::create([
        "name" => $this->name,
       ]);

       $permissionNames = Permission::whereIn('id', $this->permissions)->pluck('name');

       $role->syncPermissions($permissionNames);
        
        return to_route('roles.index')->with('success', 'role created successfully.');

        

        session()->flash('message', 'User created successfully.');
    }
    public function render()
    {
        return view('livewire.roles.role-create');
    }
}
