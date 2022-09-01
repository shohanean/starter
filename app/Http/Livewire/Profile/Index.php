<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;
use App\Models\Log;
use App\Models\Profile;

class Index extends Component
{
    public $avatar_link;
    public $more_logs;
    public $loadolder_btn;
    public $name;
    public $phone_number;
    public $phone_number_verified;
    public $country_id;
    public $address;
    public $city_id;
    public $fb_link;
    public $ig_link;
    public $li_link;

    public function mount()
    {
        $this->avatar_link = auth()->user()->avatar;
        $this->name = auth()->user()->name;
        if(Profile::where('user_id', auth()->id())->exists()){
            $profile_info = Profile::where('user_id', auth()->id())->first();
            $this->phone_number = $profile_info->phone_number;
            $this->phone_number_verified = $profile_info->phone_number_verified;
            $this->country_id = $profile_info->country_id;
            $this->city_id = $profile_info->city_id;
            $this->address = $profile_info->address;
            $this->fb_link = $profile_info->fb_link;
            $this->ig_link = $profile_info->ig_link;
            $this->li_link = $profile_info->li_link;
        }
    }
    public function loadolder()
    {
        $this->more_logs = Log::where('user_id', auth()->id())->offset(10)->take(Log::count())->latest()->get();
        $this->loadolder_btn = "d-none";
    }
    public function render()
    {
        return view('livewire.profile.index',[
            // 'logs' => Log::where('user_id', auth()->id())->latest()->get()
            'logs' => Log::where('user_id', auth()->id())->latest()->paginate(10)
        ]);
    }
}
