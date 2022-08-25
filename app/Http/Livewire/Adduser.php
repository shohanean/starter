<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class Adduser extends Component
{
    public function submit()
    {
        // $validatedData = $this->validate([
        //     'name' => 'required|min:6',
        //     'email' => 'required|email',
        //     'body' => 'required',
        // ]);

        // Contact::create($validatedData);

        // return redirect()->to('/form');

    }
    public function userDelete($id)
    {
        User::findOrFail($id)->delete();
        session()->flash('user_delete_message', 'User successfully deleted.');
    }
    public function render()
    {
        return view('livewire.adduser', [
            'permissions' => Permission::select('id','name')->get(),
            'roles' => Role::select('id','name')->with('users')->latest()->get(),
            'users' => User::all()
        ]);
    }
}
