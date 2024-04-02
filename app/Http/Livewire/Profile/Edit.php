<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use App\Models\Log;
use App\Models\Profile;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Khsing\World\World;
use Khsing\World\Models\Country;
use Illuminate\Support\Facades\Storage;

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

    public $phone_number;
    public $city_id;
    public $address;
    public $fb_link;
    public $ig_link;
    public $li_link;

    public function mount()
    {
        $this->random_code = rand(11111, 99999);
        $this->avatar_link = auth()->user()->avatar;
        $this->name = auth()->user()->name;
        if (Profile::where('user_id', auth()->id())->exists()) {
            $profile_info = Profile::where('user_id', auth()->id())->first();
            $this->phone_number = $profile_info->phone_number;
            $this->country_id = $profile_info->country_id;
            $this->city_id = $profile_info->city_id;
            $this->address = $profile_info->address;
            $this->fb_link = $profile_info->fb_link;
            $this->ig_link = $profile_info->ig_link;
            $this->li_link = $profile_info->li_link;
        }
        if ($this->country_id) {
            $this->cities = Country::getByCode($this->country_id)->children();
        }
    }
    public function updatedCountryId()
    {
        // if you want to get divisions list then active below code
        // $this->cities = Country::getByCode($this->country_id)->divisions()->get();

        if ($this->country_id != "") {
            $this->cities = Country::getByCode($this->country_id)->children();
        } else {
            $this->cities = [];
        }
    }
    public function save()
    {
        $this->validate([
            'avatar' => 'nullable|image|max:1024', // 1MB Max
            'name' => 'required',
        ]);
        if ($this->avatar) {
            $upload_name = $this->avatar->store('avatars');
            // if old photo available then delete it first
            if (auth()->user()->avatar) {
                Storage::delete(auth()->user()->avatar);
            }
            User::find(auth()->id())->update([
                'avatar' => $upload_name
            ]);
            $this->avatar_link = $upload_name;

            Log::create([
                'user_id' => auth()->id(),
                'type' => "success",
                'details' => "You changed your avatar"
            ]);
        }
        User::find(auth()->id())->update([
            'name' => $this->name
        ]);
        Profile::updateOrCreate(
            [
                'user_id'   => auth()->id(),
            ],
            [
                'phone_number' => $this->phone_number,
                'country_id' => $this->country_id,
                'city_id' => $this->city_id,
                'address' => $this->address,
                'fb_link' => $this->fb_link,
                'ig_link' => $this->ig_link,
                'li_link' => $this->li_link,
            ],
        );
        session()->flash('success', 'Profile successfully updated.');
    }
    public function checker()
    {
        if ($this->typed_code == $this->random_code) {
            $this->disabled = true;
        } else {
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
        return view('livewire.profile.edit', [
            // 'countries' => World::Countries()
        ]);
    }
}
