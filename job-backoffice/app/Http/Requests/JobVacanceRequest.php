<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobVacanceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'            => 'required|string|max:255',
            'description'      => 'required|string',
            'location'         => 'required|string|max:255',
            'salary'           => 'nullable|numeric|min:0',
            'type'             => 'required|in:full-time,remote,contract,hybrid',
            'company_id'       => 'required|exists:companies,id',
            'job_category_id'  => 'required|exists:job_categories,id',
            'deleted_at'       => 'nullable|date',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Job title is required',
            'description.required' => 'Job description is required',
            'location.required' => 'Job location is required',
            'salary.numeric' => 'Salary must be a number',
            'type.in' => 'Job type must be full-time, part-time, contract or internship',
            'company_id.exists' => 'Selected company does not exist',
            'job_category_id.exists' => 'Selected job category does not exist',
        ];
    }
}
