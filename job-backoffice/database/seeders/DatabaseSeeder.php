<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\JobApplication;
use App\Models\JobCategory;
use App\Models\JobVacancy;
use App\Models\Resume;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

use function Symfony\Component\Clock\now;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        JobCategory::factory(50)->create();

        User::create([
            'name' => 'mahmoud',
            'email' => 'mahmoud@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'email_verified_at'=> now()
        ]);

        $jobData = json_decode(file_get_contents(database_path('data/job_data.json')), true);
        $jobApplications = json_decode(file_get_contents(database_path('data/job_applications.json')), true);

        foreach ($jobData['jobCategories'] as $category) {
            JobCategory::firstOrCreate([
                'name' => $category,
            ]);
        }

        foreach ($jobData['companies'] as $company) {
            $companyOwner = User::firstOrCreate([
                'email' => fake()->unique()->safeEmail(),
            ], [
                'name' => fake()->name(),
                'password' => Hash::make('password'),
                'role' => 'company-owner',
                'email_verified_at' => now()
            ]);

            Company::firstOrCreate([
                'name' => $company['name'],
            ], [
                'address' => $company['address'],
                'industry' => $company['industry'],
                'website' => $company['website'],
                'owner_id' => $companyOwner->id,
            ]);
        }

        foreach ($jobData['jobVacancies'] as $job) {
            $company = Company::where('name', $job['company'])->firstOrFail();

            $jobCategory = JobCategory::where('name', $job['category'])->firstOrFail();
            JobVacancy::firstOrCreate([
                'title' => $job['title'],
            ], [
                'description' => $job['description'],
                'location' => $job['location'],
                'type' => $job['type'],
                'salary' => $job['salary'],
                'job_category_id' => $jobCategory->id,
                'company_id' => $company->id,
            ]);
        }

        foreach ($jobApplications['jobApplications'] as $application) {
            $JobVacancy = JobVacancy::inRandomOrder()->first();
            $applicant = User::firstOrCreate([
                'email' => fake()->unique()->safeEmail(),
            ], [
                'name' => fake()->name(),
                'password' => Hash::make('password'),
                'role' => 'job-seeker',
                'email_verified_at' => now()
            ]);

            $resume = Resume::create([
                'user_id' => $applicant->id,
                'file_name' => $application['resume']['filename'],
                'file_url' => $application['resume']['fileUri'],
                'contact_details' => $application['resume']['contactDetails'],
                'summary' => $application['resume']['summary'],
                'skills' => $application['resume']['skills'],
                'experience' => $application['resume']['experience'],
            ]);

            JobApplication::create([
                'job_vacancy_id' => $JobVacancy->id,
                'user_id' => $applicant->id,
                'resume_id' => $resume->id,
                'status' => $application['status'],
                'ai_generated_score' => $application['aiGeneratedScore'],
                'ai_generated_feedback' => $application['aiGeneratedFeedback'],
            ]);
        }
    }
}
