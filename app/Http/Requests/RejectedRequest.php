<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RejectedRequest extends FormRequest
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
        return [
            'rejection_reason' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'rejection_reason.required' => 'Inserire la motivazione del rifiuto',
        ];
    }
}
