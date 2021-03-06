<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterDispatcherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users'],
            'phone' => ['required', 'string', 'unique:users', 'min:6'],
            'password' => ['required', 'confirmed', Password::min(8)],
            'name' => ['required', 'string'],
            'registration_number' => ['required', 'string', 'unique:dispatchers'],
            'address' => ['required', 'string', 'unique:dispatchers']
        ];
    }
}
