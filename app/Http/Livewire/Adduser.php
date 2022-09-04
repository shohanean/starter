<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Log;
use Carbon\Carbon;

class Adduser extends Component
{
    public $name;
    public $email;
    public $password;
    public $role_name;
    public $edit_btn_id;
    public $role_dropdown;
    public $ean;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:App\Models\User,email',
        'password' => 'required',
        'role_name' => 'required',
    ];

    public function submit()
    {
        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'email_verified_at' => Carbon::now()
        ]);

        $user->assignRole($this->role_name);
        Log::create([
            'user_id' => auth()->id(),
            'type' => "info",
            'details' => "You created a new user named <a href='userdetails.php?id=$user->id'>$user->name</a>"
        ]);
        $this->resetExcept();
        session()->flash('user_add_message', 'User added successfully!');
    }
    public function userDelete($id)
    {
        User::findOrFail($id)->delete();
        Log::create([
            'user_id' => auth()->id(),
            'type' => "danger",
            'details' => "You deleted a user"
        ]);
        session()->flash('user_delete_message', 'User successfully deleted.');
    }
    public function userRestore($id)
    {
        User::withTrashed()->where('id', $id)->restore();
        Log::create([
            'user_id' => auth()->id(),
            'type' => "success",
            'details' => "You restored a user"
        ]);
        session()->flash('user_delete_message', 'User restored successfully!.');
    }
    public function userEdit($id)
    {
        $this->edit_btn_id = $id;
    }
    public function updatedRoleDropdown($role_name)
    {
        $user = User::withTrashed()->where('id', $this->edit_btn_id)->first();
        $user->syncRoles($role_name);
        Log::create([
            'user_id' => auth()->id(),
            'type' => "info",
            'details' => "You changed a user's role"
        ]);
        session()->flash('user_delete_message', 'Role changed successfully!.');
    }
    public function resetForm()
    {
        $this->resetExcept();
    }
    public function render()
    {
        return view('livewire.adduser', [
            'permissions' => Permission::select('id','name')->get(),
            'roles' => Role::whereNotIn('name', ['Super Admin'])->select('id','name')->with('users')->latest()->get(),
            'users' => User::withTrashed()->latest()->get()
        ]);
    }
}
