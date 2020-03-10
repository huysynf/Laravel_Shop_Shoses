<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Socialite;

class LoginWithFacebookController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();
            $user = User::where('email', $facebookUser->email)->first();
            if ($user) {
                Auth::loginUsingId($user->id);
            } else {
                $user = User::create([
                    'name' => $facebookUser->name,
                    'email' => $facebookUser->email,
                    'image' => 'default.jpg',
                    'facebook_id' => $facebookUser->id,
                    'password' => '123456',
                    'phone' => '033xxxxxxxx',
                    'gender' => 1
                ]);
                $user->assignRole('CUSTOMER');
                Auth::loginUsingId($user->id);
            }
            return redirect()->route('home');
        } catch (Exception $e) {
            return abort(404);
        }
    }
}
