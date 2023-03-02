<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

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
            return redirect('/welcome');
        } else {
            // Crea un nuovo utente
            
            $newUser = new User();

            $newUser->name = $user->getName();
            $newUser->email = $user->getEmail();
            $newUser->is_completed = false;
            $newUser->password = encrypt('');
            $newUser->save();

            // Autentica il nuovo utente
           
            auth()->login($newUser);
        }
        return redirect()->route('show.update.password'); 
    } 

    public function showPasswordForm()
    {
            $user = Auth::user();
    
            if ($user->is_completed == false) {
                return view('auth.setFirstLogSocialPass');
            } else {
                return redirect()->route('homepage');
            }
        
    }

    public function setPassword(Request $request)
    {
        // Valida i dati del form
        $request->validate([
            'password' => [
                'required',
                'confirmed',
                Password::min(8)->mixedCase()->numbers(),
            ],
        ]);

        // Recupera l'utente autenticato
        $user = Auth::user();

        // Imposta la nuova password
        $user->password = Hash::make($request->password);
        $user->is_completed = true;
        $user->save();

        // Reindirizza l'utente alla pagina di benvenuto
        return redirect('/welcome');
    }

}