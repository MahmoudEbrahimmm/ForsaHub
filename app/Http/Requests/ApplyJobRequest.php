<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplyJobRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
            return [
        'contact_details' => 'required|string|max:255',
        'summary'         => 'nullable|string',
        'skills'          => 'required|string|max:255',
        'experience'      => 'nullable|string',
        'file_url'        => 'required|file|mimes:pdf,doc,docx|max:5120',
    ];

    }
}
