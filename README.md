# ForsaHub

ForsaHub is a graduation project from NTI. It is a professional job board web application built with Laravel 12 and MySQL. The platform allows users to browse jobs, apply with their CVs, and enables employers to post and manage job listings with strict access control.  

# Features

# Users
- Guest: can browse jobs only.  
- User: can apply to jobs and manage their own applications.  
- Employer: can create and manage jobs and view applications submitted to their jobs.  

# Job Management
- Browse available jobs with details including title, location, salary, experience level, and category.  
- Soft delete for jobs with a "Deleted" status.  
- Policies:  
  - Only the creator of a job can delete it.  
  - Jobs with applications cannot be edited.  

# Job Applications
- Users can apply with an expected salary and upload their CV.  
- A user cannot apply more than once to the same job.  
- Users can manage their own applications.  

# Employers
- Users can create an employer profile only once.  
- Employers can manage their own jobs and related applications.  
- Access is restricted to employers for job and application management.  

# Technology Stack
- Backend: Laravel 12 (PHP 8.2+)  
- Database: MySQL 8+  

# Installation

1. Clone the repository:  
git clone https://github.com/yourusername/ForsaHub.git
cd ForsaHub


2. Install dependencies:  
composer install


3. Set up environment:  
cp .env.example .env
php artisan key:generate


4. Run migrations and seeders:  
php artisan migrate --seed


5. Serve the application:  
php artisan serve


The app will be available at `http://localhost:8000`.  

# Database & Seeders
- 300 users  
- 20 employers linked to users  
- 100 jobs created by employers  
- Remaining users create between 0–4 applications per job  

# License
This project is licensed under the MIT License.  

# Contributors
This is a collaborative project.  
- Backend:
- Eng. Mahmoud Ebrahim [GitHub](https://github.com/MahmoudEbrahimmm) 
- Frontend:
- Eng. Mohamed Al-Farsisi and
- Eng. Islam Mohamed  
