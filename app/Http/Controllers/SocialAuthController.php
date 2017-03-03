<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SocialAccountService;
use Socialite;
use Auth;

class SocialAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver('facebook')->redirect();   
    }   

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver('facebook')->user();

        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);

        return redirect('/home');
    }

    public function findOrCreateUser($user, $provider)
    {
        $authUser = \App\User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        return \App\User::create([
            'name'     => $user->name,
            'email'    => $user->email,
            'provider' => $provider,
            'provider_id' => $user->id
        ]);
    }

}