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
        session()->flash('user_delete_message', 'User successfully deleted.');
    }
    public function resetForm()
    {
        $this->resetExcept();
    }
    public function render()
    {
        return view('livewire.adduser', [
            'permissions' => Permission::select('id','name')->get(),
            'roles' => Role::select('id','name')->with('users')->latest()->get(),
            'users' => User::latest()->get()
        ]);
    }
}
