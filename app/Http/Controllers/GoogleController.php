<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    /**
     * Sends a sign in request to Google
     *
     * @return RedirectResponse
     */
    public function signInwithGoogle() : RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * A callback function required in order to log in with Google
     *
     * @return RedirectResponse
     */
    public function callbackToGoogle() : RedirectResponse
    {
        $user = Socialite::driver('google')->user();
        $finduser = User::where('gauth_id', $user->id)->first();

        if($finduser){

            Auth::login($finduser);

        }else{

            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'gauth_id'=> $user->id,
                'gauth_type'=> 'google',
                'password' => encrypt('admin@123')
            ]);

            Auth::login($newUser);

        }
        return redirect('/');
    }

}
