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

    protected $rules = [
        'role_title' => 'required|unique:roles,name'
    ];
    public function editrole($id)
    {
        $this->role_id = $id;
        $role = Role::findOrFail($id);
        $this->role_name = $role->name;
        $this->permissions_under_role = $role->getAllPermissions();
    }
    public function deleterole($id)
    {
        Role::findOrFail($id)->delete();
    }
    public function update($id)
    {
        $this->validate([
            'role_name' => 'required|unique:roles,name,'.$this->role_id,
        ]);
        Role::find($id)->update([
            'name' => $this->role_name
        ]);
        $role = Role::find($id);
        $role->syncPermissions($this->update_permissions);
        session()->flash('role_update_message', 'Role updated successfully!.');
    }
    public function submit()
    {
        $this->validate();

        $role = Role::create(['name' => Str::title($this->role_title)]);
        $role->syncPermissions($this->permission);
        $this->resetExcept();
        session()->flash('role_add_message', 'Role added successfully!.');
        // (isset($this->permission)) ? $total_permissions = count($this->permission) : $total_permissions = 0;
        // return back()->with([
        //   'role_success' => $role->name,
        //   'total_permissions' => $total_permissions
        // ]);
    }
    public function render()
    {
        return view('livewire.addrole', [
            'permissions' => Permission::select('id','name')->get(),
            'roles' => Rolecustom::select('id','name')->with('users')->latest()->get()
        ]);
    }
}
