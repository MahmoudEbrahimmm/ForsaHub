@extends('layouts.frontend')
@section('content')
<x-header-job />
    <div class="py-5 mt-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">

                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <!-- Back Button -->
                            <div class="mb-4">
                                <a href="{{ route('frontend.job-vacancy.show', $jobVacancy->id) }}"
                                    class="btn btn-outline-secondary btn-sm">
                                    ← Back to Job Details
                                </a>
                            </div>

                            <!-- Apply Form -->
                            <form action="{{ route('frontend.job-vacancy.proccess-Application', $jobVacancy->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </div>
                                @endif
                                <!-- Instructions -->
                                <div class="mb-4">
                                    <h5 class="fw-bold">Submit Your Resume</h5>
                                    <p class="text-muted small">
                                        You can either select from your existing resume or upload a new one.
                                        Supported formats: PDF, DOC, DOCX. Max size: 5MB.
                                    </p>
                                </div>

                                <!-- Drag & Drop Zone -->
                                <div class="mb-4">
                                    <div class="mb-2">
                                        <label for="resume" class="w-100 cursor-pointer">
                                            <div id="dropZone"
                                                class="border border-dashed rounded p-5 text-center h-100"
                                                style="border-style: dashed !important;">
                                                <i class="bi bi-upload fs-2 mb-3 text-muted"></i>
                                                <div id="dropText" class="fw-semibold text-muted">
                                                    Drag & Drop your resume here or click to browse
                                                </div>
                                                <div class="text-muted small mt-1">
                                                    Maximum file size: 5MB
                                                </div>
                                                <input type="file" name="file_url" id="resume"
                                                    class="form-control d-none">
                                            </div>
                                        </label>
                                        @error('file_url')
                                            <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Contact Details -->
                                <div class="mb-3">
                                    <label class="form-label">Contact Details</label>
                                    <input type="text" name="contact_details" class="form-control"
                                        placeholder="Name - Email - Phone" value="{{ old('contact_details') }}">
                                </div>

                                <!-- Summary -->
                                <div class="mb-3">
                                    <label class="form-label">Professional Summary</label>
                                    <textarea name="summary" rows="3" class="form-control"
                                        placeholder="Brief summary about you">{{ old('summary') }}</textarea>
                                </div>

                                <!-- Skills -->
                                <div class="mb-3">
                                    <label class="form-label">Skills</label>
                                    <input type="text" name="skills" class="form-control"
                                        placeholder="Laravel, PHP, MySQL..." value="{{ old('skills') }}">
                                </div>

                                <!-- Experience -->
                                <div class="mb-3">
                                    <label class="form-label">Experience</label>
                                    <textarea name="experience" rows="3" class="form-control"
                                        placeholder="Your work experience">{{ old('experience') }}</textarea>
                                </div>

                                <!-- Submit Button -->
                                <div class="d-grid mt-3">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        Apply Now
                                    </button>
                                </div>

                            </form>

                            <!-- Optional Footer -->
                            <div class="mt-4 pt-3 border-top text-muted small text-center">
                                Your application will be sent directly to the company.
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        const resumeInput = document.getElementById('resume');
        const dropText = document.getElementById('dropText');
        const dropZone = document.getElementById('dropZone');

        resumeInput.addEventListener('change', function () {
            if (this.files && this.files.length > 0) {
                dropText.textContent = this.files[0].name;
            } else {
                dropText.textContent = "Drag & Drop your resume here or click to browse";
            }
        });

        dropZone.addEventListener('dragover', function (e) {
            e.preventDefault();
            dropZone.classList.add('bg-light');
        });

        dropZone.addEventListener('dragleave', function (e) {
            dropZone.classList.remove('bg-light');
        });

        dropZone.addEventListener('drop', function (e) {
            e.preventDefault();
            dropZone.classList.remove('bg-light');
            if (e.dataTransfer.files.length > 0) {
                resumeInput.files = e.dataTransfer.files;
                dropText.textContent = e.dataTransfer.files[0].name;
            }
        });
    </script>

@endsection
