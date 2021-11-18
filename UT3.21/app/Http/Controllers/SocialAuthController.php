<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)
            ->with(['response_type' => 'code', 'code' => '394a8bc98028f39660e53025de824134fb46313'])
            ->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $socialUser = Socialite::driver($provider)->user();

        if ($user = User::where('email', $socialUser->getEmail())->first()) {
            return $this->authAndRedirect($user);
        }
        $user = User::create([
            'name' => $socialUser->getName() ?? $socialUser->getNickname(),
            'email' => $socialUser->getEmail(),
            'provider' => $provider,
            'provider_id' => $socialUser->getId(),
            'avatar' => $socialUser->getAvatar(),
        ]);
        return $this->authAndRedirect($user);
    }

    public function authAndRedirect($user)
    {
        Auth::login($user);
        return redirect()->to('/dashboard');
    }
}
