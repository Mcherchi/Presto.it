<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class EditProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $user = Auth::user();
        return [
            'name' => ['required','string','max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'phone' => ['nullable','string','max:255'],
            'birth_date' => 'nullable|date',
            'password'=>[
                'nullable',
                'string',
                'confirmed',
                Password::min(8)->mixedCase()->numbers(),
            ],
            'biography' => ['nullable','string','max:500'],
            'gender' => ['nullable','in:male,female,other'],
        ];
    }
}
