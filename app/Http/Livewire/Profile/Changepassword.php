<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;

class Changepassword extends Component
{
    public $current_password;
    public $password;
    public $password_confirmation;

    public function save()
    {

    }
    public function render()
    {
        return view('livewire.profile.changepassword');
    }
}
