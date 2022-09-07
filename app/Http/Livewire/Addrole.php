<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Rolecustom;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

class Addrole extends Component
{
    public $role_title;
    public $role_name;
    public $permissions_under_role;
    public $permission = [];
    public $update_permissions = [];
    public $role_id;
    public $role_update_btn;
    public $ean = [];

    protected $rules = [
        'role_title' => 'required|unique:roles,name'
    ];
    public function deleterole($id)
    {
        Role::findOrFail($id)->delete();
    }
    public function submit()
    {
        $this->validate();

        $role = Role::create(['name' => Str::title($this->role_title)]);
        $role->syncPermissions($this->permission);
        $this->resetExcept();
        session()->flash('role_add_message', 'Role added successfully!.');
    }
    public function render()
    {
        return view('livewire.addrole', [
            'permissions' => Permission::select('id','name')->get(),
            'roles' => Rolecustom::select('id','name')->with('users')->latest()->get(),
        ]);
    }
}
