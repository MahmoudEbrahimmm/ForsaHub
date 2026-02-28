<!-- resources/views/login.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In | NTI Career</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
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
                <span class="text-white me-3">Don't have an account?</span>
                <a href="{{ route('register') }}" class="btn btn-outline-light btn-sm">Register</a>
            </div>
        </div>
    </nav>

    <!-- Sign In Section -->
    <section class="register-section">
        <div class="register-bg">
            <div class="register-shape shape-1"></div>
            <div class="register-shape shape-2"></div>
        </div>

        <div class="container">
            <div class="register-wrapper d-flex flex-wrap">

                <!-- Left Side Info (Visual) -->
                <div class="register-info col-lg-6 d-none d-lg-block">
                    <div class="info-content p-4">
                        <h1>Welcome Back!</h1>
                        <p class="lead">Continue your journey to success. Your dream career is just a click away.</p>

                        <div class="floating-cards mb-4 d-flex gap-3">
                            <div class="float-card"><i class="fa-solid fa-briefcase"></i> 1,240 Jobs</div>
                            <div class="float-card"><i class="fa-solid fa-graduation-cap"></i> 50+ Courses</div>
                            <div class="float-card"><i class="fa-solid fa-users"></i> 15K+ Students</div>
                        </div>

                        <div class="benefits-list mt-3">
                            <div class="benefit-item mb-2"><i class="fa-solid fa-check text-success me-2"></i>Access exclusive job opportunities</div>
                            <div class="benefit-item mb-2"><i class="fa-solid fa-check text-success me-2"></i>Track your learning progress</div>
                            <div class="benefit-item mb-2"><i class="fa-solid fa-check text-success me-2"></i>Connect with top employers</div>
                        </div>
                    </div>
                </div>

                <!-- Right Side Form -->
                <div class="register-form-container col-12 col-lg-6 d-flex justify-content-center align-items-center p-4">
                    <div class="form-box w-100" style="max-width:400px;">
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <div class="form-header text-center mb-4">
                            <h2>Sign In</h2>
                            <p>Enter your credentials to access your account</p>
                        </div>

                        <!-- Login Form -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email -->
                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                                <label for="email">Email Address</label>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="form-floating mb-3 position-relative">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" placeholder="Password" required>
                                <label for="password">Password</label>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Remember Me & Forgot -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="remember" id="remember">
                                    <label class="form-check-label" for="remember">Remember me</label>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary w-100">Sign In</button>
                        </form>

                        <div class="mt-4 text-center">
                            <small>Need Help? Contact <a href="mailto:support@nti-career.com">support@nti-career.com</a></small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend/js/register.js') }}"></script>
</body>

</html>
