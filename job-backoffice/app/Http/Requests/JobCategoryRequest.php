<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:job_categories,name',
        ];
    }
    public function messages(){
        return [
            'name.required'=> 'Error, The category name feild is required.',
            'name.unique'=> 'Error, The category name has already been taken.',
            'name.max'=> 'Error, The Category name must be less than 255 characters.',
            'name.string'=> 'Error, The Category name must be a string.',
        ];
    }
}
