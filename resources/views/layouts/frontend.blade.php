<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NTI Career | Build Your Future</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/register.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/sign-in.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jobs.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/home.css') }}">
</head>

<body>

    <x-nav />

    <!-- Page Content -->
    {{-- <main class="p-4"> --}}
        @yield('content')
    {{-- </main> --}}

    <x-footer />

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- YOUR CUSTOM JS -->
    <script src="{{ asset('frontend/js/sign-in.js') }}"></script>
    <script src="{{ asset('frontend/js/register.js') }}"></script>
    <script src="{{ asset('frontend/js/jobs.js') }}"></script>
    <script src="{{ asset('frontend/js/home.js') }}"></script>

</body>
</html>
