<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function showEditProfile()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function updateProfile(EditProfileRequest $request)
    {
        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->birth_date = $request->birth_date;
        $user->biography = $request->biography;
        $user->password = Hash::make($request->password);

        if($request->hasFile('profile_image') && $request->file('profile_image')->isValid()){
            $fileName = uniqid('profileImg_');

            $imgProfilePath = $request->profile_image->storeAs('public/images', $fileName. '.' .$request->profile_image->extension());

            $user->profile_image = $imgProfilePath;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profilo aggiornato');
    }

    public function showProfile(User $user)
    {
        return view('profile.show', compact('user'));
    }
}
