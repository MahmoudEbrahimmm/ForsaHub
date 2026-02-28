<!-- resources/views/register.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | NTI Career - Build Your Future</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/register.css') }}">
</head>

<body class="register-page">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark register-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <span class="brand-text">NTI CAREER</span>
            </a>
            <div class="ms-auto">
                <span class="text-white me-3">Already have an account?</span>
                <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Sign In</a>
            </div>
        </div>
    </nav>

    <!-- Register Section -->
    <section class="register-section">
        <div class="register-bg">
            <div class="register-shape shape-1"></div>
            <div class="register-shape shape-2"></div>
        </div>

        <div class="container">
            <div class="register-wrapper">

                <!-- Left Side Info -->
                <div class="register-info">
                    <div class="info-content">
                        <h1>Start Your Journey</h1>
                        <p class="lead">Join thousands of successful professionals who started their career with NTI.
                        </p>

                        <div class="benefits-list">
                            <div class="benefit-item">
                                <div class="benefit-icon"><i class="fa-solid fa-check"></i></div>
                                <div class="benefit-text">
                                    <h4>Expert Training</h4>
                                    <p>Learn from industry professionals with real-world experience</p>
                                </div>
                            </div>
                            <div class="benefit-item">
                                <div class="benefit-icon"><i class="fa-solid fa-check"></i></div>
                                <div class="benefit-text">
                                    <h4>Job Guarantee</h4>
                                    <p>95% of our graduates find jobs within 3 months</p>
                                </div>
                            </div>
                            <div class="benefit-item">
                                <div class="benefit-icon"><i class="fa-solid fa-check"></i></div>
                                <div class="benefit-text">
                                    <h4>Global Certificates</h4>
                                    <p>Internationally recognized certifications</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side Form -->
                <div class="register-form-container">
                    <div class="form-header">
                        <h2>Create Account</h2>
                        <p>Complete the form below to get started</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}" class="register-form">
                        @csrf

                        <div class="row g-2">
                            <!-- Name -->
                            <div class="col-md-12 mt-5">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" placeholder="Full Name" value="{{ old('name') }}" required autofocus>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email & Role -->
                            <div class="col-md-6 mt-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" placeholder="Email Address" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <select name="role" class="form-control @error('role') is-invalid @enderror" required>
                                    <option value="" disabled {{ old('role') ? '' : 'selected' }}>Select Role</option>
                                    <option value="job-seeker" {{ old('role') == 'job-seeker' ? 'selected' : '' }}>I’m
                                        looking for a job</option>
                                    <option value="company-owner" {{ old('role') == 'company-owner' ? 'selected' : '' }}>
                                        I’m a company owner</option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password & Confirm Password -->
                            <div class="col-md-6 mt-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="Password" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="Confirm Password" required>
                            </div>

                            <!-- Terms -->
                            <div class="col-12 mt-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terms" required>
                                    <label class="form-check-label" for="terms">
                                        I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy
                                            Policy</a>
                                    </label>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-primary text-center w-100">
                                    Create Account
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend/js/register.js') }}"></script>
</body>

</html>
