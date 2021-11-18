<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        if ($provider != 'twitch') {
            return Socialite::driver($provider)->redirect();
        }
        return Socialite::driver($provider)
            ->with([
				'code' => Str::random(30),
				'redirect_uri' => config('services.twitch.redirect')
			])
            ->redirect();
    }

    public function handleProviderCallback(Request $request, $provider)
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
