<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;

use App\Http\Requests\ApplyJobRequest;
use App\Models\JobApplication;
use App\Models\JobVacancy;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use OpenAI\Exceptions\RateLimitException;
use OpenAI\Laravel\Facades\OpenAI;

class JobVacancyController extends Controller
{
    public function show(string $id)
    {
        $jobVacancy = JobVacancy::findOrFail($id);
        return view('frontend.job-vacancy.show', compact('jobVacancy'));
    }
    public function apply(string $id)
    {
        $jobVacancy = JobVacancy::findOrFail($id);
        return view('frontend.job-vacancy.apply', compact('jobVacancy'));
    }
    public function proccessApplication(ApplyJobRequest $request, string $id)
{
    $jobVacancy = JobVacancy::findOrFail($id);

    $file = $request->file('file_url');
    $fileName = time() . '_' . $file->getClientOriginalName();
    $filePath = $file->storeAs('resumes', $fileName, 'upload');

    $resume = Resume::create([
        'file_name'       => $fileName,
        'file_url'        => $filePath,
        'contact_details' => $request->contact_details,
        'summary'         => $request->summary,
        'skills'          => $request->skills,
        'experience'      => $request->experience,
        'user_id'         => Auth::id(),
    ]);

    JobApplication::create([
        'job_vacancy_id' => $jobVacancy->id,
        'user_id'        => Auth::id(),
        'resume_id'      => $resume->id,
        'status'         => 'pending',
    ]);

    return redirect()
        ->route('frontend.job-vacancy.show', $jobVacancy->id)
        ->with('success', 'Application submitted successfully');
}



}
