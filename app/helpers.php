<?php

use App\Models\Profile;
use App\Models\User;

function profile_compleation($id){
    $percentage = 10; // if anyone opens an account get 10 points
    if(Profile::where('user_id', $id)->exists()){
        $profile = Profile::where('user_id', $id)->first();
        if($profile->phone_number){
            $percentage += 20;
        }
        if($profile->country_id){
            $percentage += 5;
        }
        if($profile->city_id){
            $percentage += 5;
        }
        if($profile->address){
            $percentage += 10;
        }
        if($profile->fb_link){
            $percentage += 5;
        }
        if($profile->ig_link){
            $percentage += 5;
        }
        if($profile->li_link){
            $percentage += 5;
        }
    }
    if(User::find($id)->avatar){
        $percentage += 35;
    }
    return $percentage;
}
?>
