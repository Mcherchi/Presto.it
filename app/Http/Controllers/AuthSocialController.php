<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthSocialController extends Controller
{
    public function providerRedirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function providerCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        
        // Cerca l'utente nel database per l'email
        $existingUser = User::where('email', $user->getEmail())->first();

        if ($existingUser) {
            // Autentica l'utente esistente
            auth()->login($existingUser);
        } else {
            // Crea un nuovo utente
            
            $newUser = new User();
            $newUser->name = $user->getName();
            $newUser->email = $user->getEmail();
            $newUser->password = encrypt('');
            $newUser->save();

            // Autentica il nuovo utente
            auth()->login($newUser);
        }
        return redirect('/welcome');
    } 
}
