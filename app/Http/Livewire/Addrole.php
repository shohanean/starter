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
    public $ean = "kanna";

    protected $rules = [
        'role_title' => 'required|unique:roles,name'
    ];
    public function editrole($id)
    {
        $this->role_id = $id;
        $role = Role::findOrFail($id);
        $this->role_name = $role->name;

        // foreach ($role->getAllPermissions()->pluck('name') as $already_selected_permission) {
        //     $this->permissions_under_role .= $already_selected_permission;
        // }

        // $diff = ->diff();
        // $this->permissions_under_role = $role->getAllPermissions()->pluck('name')->contains('name', 'can add role');

        // $hudai = [];
        // foreach (Permission::select('name')->get() as $d_permission) {

        //     if($role->getAllPermissions()->pluck('name')->contains('name', $d_permission)){
        //         $hudai["$d_permission"] = 'already ase';
        //     }
        //     else{
        //         $hudai["$d_permission"] = 'from bd';
        //     }
        // }
        // $this->permissions_under_role = $hudai;

        // $this->permissions_under_role = $role->getAllPermissions()->pluck('name')->contains('name', 'can add role');
        $this->permissions_under_role = $role->getAllPermissions()->pluck('name');
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
            'roles' => Rolecustom::select('id','name')->with('users')->latest()->get(),
        ]);
    }
}
