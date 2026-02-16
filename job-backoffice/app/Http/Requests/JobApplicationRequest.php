<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobApplicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'status' =>'bail|required|string|in:pending,accepted,rejected'
        ];
    }
    public function messages(){
        return [
            'status.in' => 'The applicaint status must be either pending,accepted,rejected'
        ];
    }
}
