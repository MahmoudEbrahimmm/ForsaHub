<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'role' => ['required', 'in:company-owner,job-seeker'],
            'email' => ['required', 'string', 'email'], // 'unique:users,email'
            'password' => ['nullable', 'string','min:8'],
        ];
    }
    public function messages(){
        return [
            'role.in'=> 'user role must be company-owner,job-seeker',
            // 'email.unique'=> 'Error, The email has already been taken.',
        ];
    }
}
