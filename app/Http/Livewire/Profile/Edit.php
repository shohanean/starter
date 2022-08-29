<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Livewire\Component;
use Auth;

class Edit extends Component
{
    public $typed_code;
    public $random_code;
    public $disabled;
    public function mount()
    {
        $this->random_code = rand(11111,99999);
    }
    public function checker()
    {
        if($this->typed_code == $this->random_code){
            $this->disabled = true;
        }
        else{
            $this->disabled = false;
        }
    }
    public function deleteaccount()
    {
        User::find(auth()->id())->delete();
        Auth::logout();
        return redirect('/');
    }
    public function render()
    {
        return view('livewire.profile.edit');
    }
}
