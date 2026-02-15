<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'     => 'required|string|max:255',
            'address'  => 'required|string|max:500',
            'industry' => 'required|string|max:255',
            'website'  => 'nullable|url|max:255',
            'owner_id' => 'required|exists:users,id',
        ];
    }
}
