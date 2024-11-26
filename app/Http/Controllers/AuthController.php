<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class AuthController extends Controller
{
    // Redirigir a Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Manejar callback de Google
    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        $user = $this->findOrCreateUser($googleUser, 'google');
        Auth::login($user);
        return redirect()->route('home');
    }

    // Redirigir a Facebook
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    // Manejar callback de Facebook
    public function handleFacebookCallback()
    {
        $facebookUser = Socialite::driver('facebook')->user();
        $user = $this->findOrCreateUser($facebookUser, 'facebook');
        Auth::login($user);
        return redirect()->route('home');
    }

    // Buscar o crear el usuario
    private function findOrCreateUser($socialUser, $provider)
    {
        $user = User::where('email', $socialUser->getEmail())->first();

        if (!$user) {
            $user = User::create([
                'name' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
                'provider' => $provider,
                'provider_id' => $socialUser->getId(),
                'password' => bcrypt(str()->random(12)), // Contraseña aleatoria
            ]);
        }

        return $user;
    }
}
