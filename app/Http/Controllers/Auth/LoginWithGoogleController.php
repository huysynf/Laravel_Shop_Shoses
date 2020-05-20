<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Socialite;

class LoginWithGoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $user = User::where('email',$googleUser->email)->first();
            if($user) {
                $user->updated([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'image' => 'default.jpg',
                    'google_id' => $googleUser->id,
                    'password' => '123456',
                    'phone'=>'033xxxxxxxx',
                    'gender'=>1
                ]);
                Auth::loginUsingId($user->id);
            }
            else {
               $user= User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'image' => 'default.jpg',
                    'google_id' => $googleUser->id,
                    'password' => '123456',
                    'phone'=>'033xxxxxxxx',
                    'gender'=>1
                ]);
                $user->assignRole('CUSTOMER');
                Auth::loginUsingId($user->id);
            }
            return redirect()->intended();
        }
        catch (Exception $e) {
            return abort(404);
        }
    }
}
