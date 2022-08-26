<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

class Addrole extends Component
{
    public $role_title;
    public $permission = [];

    protected $rules = [
        'role_title' => 'required|unique:roles,name'
    ];
    public function submit()
    {
        $this->validate();

        $role = Role::create(['name' => Str::title($this->role_title)]);
        $role->syncPermissions($this->permission);
        // (isset($this->permission)) ? $total_permissions = count($this->permission) : $total_permissions = 0;
        // return back()->with([
        //   'role_success' => $role->name,
        //   'total_permissions' => $total_permissions
        // ]);
    }
    public function render()
    {
        return view('livewire.addrole', [
            'permissions' => Permission::select('id','name')->get()
        ]);
    }
}
