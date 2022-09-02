<?php

namespace App\Http\Livewire\Profile;

use App\Models\Log;
use App\Models\User;
use App\Models\Profile;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Changepassword extends Component
{
    public $current_password;
    public $disabled = "disabled";
    public $password;
    public $password_confirmation;
    public $avatar_link;
    public $name;
    public $fb_link;
    public $ig_link;
    public $li_link;

    public function mount()
    {
        $this->avatar_link = auth()->user()->avatar;
        $this->name = auth()->user()->name;
        if(Profile::where('user_id', auth()->id())->exists()){
            $profile_info = Profile::where('user_id', auth()->id())->first();
            $this->fb_link = $profile_info->fb_link;
            $this->ig_link = $profile_info->ig_link;
            $this->li_link = $profile_info->li_link;
        }
    }
    public function updatedCurrentPassword()
    {
        if(Auth::attempt(['email' => auth()->user()->email, 'password' => $this->current_password])){
            $this->disabled = "";
        }else{
            $this->disabled = "disabled";
        }
    }
    public function save()
    {
        $this->validate([
            'password' => 'required|min:9',
            'password_confirmation' => 'required|same:password',
        ]);

        User::find(auth()->id())->update([
            'password' => bcrypt($this->password),
            'password_changed_at' => Carbon::now()
        ]);
        Log::create([
            'user_id' => auth()->id(),
            'type' => "warning",
            'details' => "You set a new password"
        ]);
        $this->reset();
        session()->flash('success', 'New password set successfully!.');
    }
    public function render()
    {
        return view('livewire.profile.changepassword');
    }
}
