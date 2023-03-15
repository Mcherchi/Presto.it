<?php

namespace App\Actions\Fortify;

use App\Mail\RegisterMail;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravolt\Avatar\Facade as Avatar;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        $dir = storage_path() . "/app/public/users-avatar/$user->id";
        // File::makeDirectory($dir, 0775, true,true);
        File::makeDirectory($dir);
        $file = "public/users-avatar/$user->id/$user->name-avatar.png";
        Avatar::create($user->name)->save( "$dir/$user->name-avatar.png", 100);
        $user->update(['avatar' => $file]);

        Mail::to('admin@presto.it')->send(new RegisterMail($user));
        
        return $user;
    }
}
