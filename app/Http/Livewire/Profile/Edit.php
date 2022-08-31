<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use App\Models\Log;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Khsing\World\World;
use Khsing\World\Models\Country;

class Edit extends Component
{
    use WithFileUploads;

    public $avatar;
    public $avatar_link;

    public $name;

    public $typed_code;
    public $random_code;
    public $disabled;

    public $country_id;
    public $cities;

    public function mount()
    {
        $this->random_code = rand(11111,99999);
        $this->avatar_link = auth()->user()->avatar;
    }
    public function updatedCountryId()
    {
        // if you want to get divisions list then active below code
        // $this->cities = Country::getByCode($this->country_id)->divisions()->get();

        if ($this->country_id != "") {
            $this->cities = Country::getByCode($this->country_id)->children();
        }
        else{
            $this->cities = [];
        }
    }
    public function save()
    {
        $this->validate([
            'avatar' => 'required|image|max:1024', // 1MB Max
            'name' => 'required',
        ]);

        $upload_name = $this->avatar->store('avatars');
        User::find(auth()->id())->update([
            'avatar' => $upload_name
        ]);
        $this->avatar_link = $upload_name;

        Log::create([
            'user_id' => auth()->id(),
            'type' => "success",
            'details' => "You changed your avatar"
        ]);
        session()->flash('success', 'Avatar successfully updated.');
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
        Log::create([
            'user_id' => auth()->id(),
            'type' => "danger",
            'details' => "You deleted your account"
        ]);
        Auth::logout();
        return redirect('/');
    }
    public function render()
    {
        return view('livewire.profile.edit',[
            'countries' => World::Countries()
        ]);
    }
}
