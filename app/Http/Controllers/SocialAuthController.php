<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    
    public function google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function redirect()
    {
        $user = Socialite::driver('google')->user();

        $userExist = User::where('oauth_id', $user->id)->first();
        
        if ($userExist != null) 
        {
            Auth::login($userExist);

            return redirect()->route('dashboard');
        }

        $newUser = User::create([
            'name' => $user->name,
            'email' => $user->email,
            'password' => Hash::make($user->id),
            'profile_photo_path' => $user->avatar,
        ]);

 
        $newUser->oauth_id = $user->id;
        $newUser->save();

        Auth::login($newUser);

        return redirect()->route('dashboard');

    }

}
