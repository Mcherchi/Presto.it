<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\File;
use Laravolt\Avatar\Facade as Avatar;

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

            // Crea Avatar 
            $dir = storage_path() . "/app/public/users-avatar/$newUser->id";
            File::makeDirectory($dir);
            // File::makeDirectory($dir, 0775, true,true);
            $file = "public/users-avatar/$newUser->id/$newUser->name-avatar.png";
            Avatar::create($newUser->name)->save( "$dir/$newUser->name-avatar.png", 100);
            $newUser->update(['avatar' => $file]);
            // Autentica il nuovo utente
           
            auth()->login($newUser);
        }
        return redirect('/welcome');
    } 

}