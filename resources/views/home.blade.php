<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NTI Career | Build Your Future</title>

    <!-- External Libraries -->
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- font awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/home.css') }}">
</head>

<body>
    <x-nav />
    <x-header />
    <!-- SECTION: OUR PARTNERS MARQUEE -->
    <section class="partners-section">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-subtitle">Partner Companies</span>
                <h2 class="section-title">Our Partner Organizations</h2>
                <p class="section-desc">
                    Official partner companies collaborating with the National Telecommunication Institute (NTI).
                </p>
            </div>
        </div>
        <!-- OUR PATRTNER -->
        <div class="partners-marquee-wrapper">
            <div class="partners-marquee" id="partnersMarquee">
                <!-- First Set -->
                @foreach ($companies as $company)
                    <div class="partner-logo">
                        <p>{{ $company->name }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Gradient Overlays -->
        <div class="marquee-overlay left"></div>
        <div class="marquee-overlay right"></div>
    </section>

    <!-- SECTION 3: LATEST JOBS -->
    <section class="latest-jobs-section" id="latest-jobs">
        <div class="bg-shape shape-1"></div>
        <div class="bg-shape shape-2"></div>

        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Latest Jobs</h2>
            </div>

            <div class="jobs-carousel-wrapper">
                <div id="jobsCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

                    <div class="carousel-inner">

                        @foreach ($jobVacancy->chunk(3) as $index => $jobs)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <div class="row g-4">

                                    @foreach ($jobs as $job)
                                        <div class="col-lg-4 col-md-6">
                                            <div class="job-card">
                                                <div class="job-header">
                                                    <div class="company-logo">
                                                        <i class="fa-solid fa-building"></i>
                                                    </div>

                                                    <div class="job-meta">
                                                        <span class="job-type full-time">
                                                            {{ ucfirst($job->type) }}
                                                        </span>
                                                        <span class="job-time">
                                                            <i class="fa-regular fa-clock"></i>
                                                            {{ $job->created_at->diffForHumans() }}
                                                        </span>
                                                    </div>
                                                </div>

                                                <h3 class="job-title">{{ $job->name }}</h3>
                                                <p class="company-name">
                                                    {{ $job->company->name ?? 'NTI Partner' }}
                                                </p>

                                                <div class="job-details">
                                                    <span class="detail-item">
                                                        <i class="fa-solid fa-location-dot"></i>
                                                        {{ $job->location }}
                                                    </span>
                                                    <span class="detail-item">
                                                        <i class="fa-solid fa-eye"></i>
                                                        {{ $job->viewCount ?? 0 }}
                                                    </span>
                                                </div>

                                                <p class="job-desc">
                                                    {{ Str::limit($job->description, 120) }}
                                                </p>

                                                <div class="job-footer">
                                                    <a href="{{ route('frontend.job-vacancy.show', $job->id) }}"
                                                        class="btn-apply">
                                                        Show details <i class="fa-solid fa-arrow-right"></i>
                                                    </a>
                                                    <button class="btn-save">
                                                        <i class="fa-regular fa-bookmark"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        @endforeach

                    </div>

                    <!-- Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#jobsCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#jobsCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>

                </div>
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('frontend.job-vacancy.index') }}"
                    class="btn btn-outline-primary btn-lg px-5 rounded-pill">
                    View All Jobs <i class="fa-solid fa-briefcase ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- SECTION: Categories -->
    <section class="partners-section">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-subtitle">Career Sections</span>
                <h2 class="section-title">Available Job Categories</h2>
                <p class="section-desc">
                    A structured overview of job categories offered across various sectors in collaboration with NTI
                    partners.
                </p>
            </div>
        </div>
        <!-- OUR PATRTNER -->
        <div class="partners-marquee-wrapper">
            <div class="partners-marquee" id="partnersMarquee">
                <!-- First Set -->
                @foreach ($categories as $category)
                    <div class="partner-logo">
                        <p>{{ $category->name }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Gradient Overlays -->
        <div class="marquee-overlay left"></div>
        <div class="marquee-overlay right"></div>
    </section>

    <!-- SECTION: CONTACT -->
    <x-contact/>



    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-wave">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path
                    d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                    class="shape-fill"></path>
            </svg>
        </div>

        <div class="container">
            <div class="footer-top">
                <div class="footer-grid">
                    <div class="footer-column footer-brand">
                        <a href="{{ route('home') }}" class="footer-logo">
                            <div class="footer-logo-icon">
                                <i class="fa-solid fa-graduation-cap"></i>
                            </div>
                            <span class="footer-logo-text">NTI <span>CAREER</span></span>
                        </a>
                        <p class="footer-desc">
                            The National Telecommunication Institute provides the best technical training programs
                            in Egypt. We help you build a successful professional future in the world of technology.
                        </p>
                        <div class="footer-contact-info">
                            <div class="footer-contact-item">
                                <i class="fa-solid fa-phone"></i>
                                <span>+20 123 456 7890</span>
                            </div>
                            <div class="footer-contact-item">
                                <i class="fa-solid fa-envelope"></i>
                                <span>info@nti-career.com</span>
                            </div>
                            <div class="footer-contact-item">
                                <i class="fa-solid fa-location-dot"></i>
                                <span>Giza, Egypt</span>
                            </div>
                        </div>
                    </div>

                    <div class="footer-column">
                        <h4>Quick Links</h4>
                        <ul class="footer-links">
                            <li><a href="#">About NTI</a></li>
                            <li><a href="#">Training Tracks</a></li>
                            <li><a href="#">Available Jobs</a></li>
                            <li><a href="#">Instructors</a></li>
                            <li><a href="#">Blog</a></li>
                        </ul>
                    </div>

                    <div class="footer-column">
                        <h4>Support</h4>
                        <ul class="footer-links">
                            <li><a href="#">Help Center</a></li>
                            <li><a href="#">FAQs</a></li>
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#contact">Contact Us</a></li>
                        </ul>
                    </div>

                    <div class="footer-column footer-newsletter">
                        <h4>Newsletter</h4>
                        <p>
                            Subscribe to get the latest training and career opportunities
                            delivered directly to your inbox.
                        </p>
                        <form class="newsletter-form" id="newsletterForm">
                            <div class="newsletter-input-group">
                                <input type="email" class="newsletter-input" placeholder="Your Email Address" required>
                                <button type="submit" class="newsletter-btn">
                                    <i class="fa-solid fa-paper-plane"></i>
                                </button>
                            </div>
                            <p class="newsletter-note">
                                <i class="fa-solid fa-lock"></i>
                                We don't share your email with any third parties
                            </p>
                        </form>

                        <div class="footer-social">
                            <h4>Follow Us</h4>
                            <div class="social-icons">
                                <a href="#" class="social-icon"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="#" class="social-icon"><i class="fa-brands fa-twitter"></i></a>
                                <a href="#" class="social-icon"><i class="fa-brands fa-linkedin-in"></i></a>
                                <a href="#" class="social-icon"><i class="fa-brands fa-instagram"></i></a>
                                <a href="#" class="social-icon"><i class="fa-brands fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-middle">
                <div class="footer-stats">
                    <div class="footer-stat">
                        <span class="footer-stat-number" data-count="15000">0</span>
                        <span class="footer-stat-label">Trainees Annually</span>
                    </div>
                    <div class="footer-stat">
                        <span class="footer-stat-number" data-count="95">0</span>
                        <span class="footer-stat-label">% Employment Rate</span>
                    </div>
                    <div class="footer-stat">
                        <span class="footer-stat-number" data-count="120">0</span>
                        <span class="footer-stat-label">Industry Partners</span>
                    </div>
                    <div class="footer-stat">
                        <span class="footer-stat-number" data-count="25">0</span>
                        <span class="footer-stat-label">Years of Experience</span>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p class="footer-copyright">
                    © 2024 <a href="#">NTI Career</a>. All Rights Reserved.
                </p>

                <ul class="footer-bottom-links">
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#">Sitemap</a></li>
                </ul>

                <div class="footer-payments">
                    <span>Payment Methods:</span>
                    <div class="payment-icons">
                        <div class="payment-icon"><i class="fa-brands fa-cc-visa"></i></div>
                        <div class="payment-icon"><i class="fa-brands fa-cc-mastercard"></i></div>
                        <div class="payment-icon"><i class="fa-brands fa-cc-paypal"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>



    <!-- Back to Top Button -->
    <a href="{{ route('home') }}" class="back-to-top" id="backToTop">
        <i class="fa-solid fa-arrow-up"></i>
    </a>

    <!-- External Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script src="{{ asset('frontend/js/home.js') }}"></script>
</body>

</html>
