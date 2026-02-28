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
                        <a href="#" class="footer-logo">
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
    <a href="home.html" class="back-to-top" id="backToTop">
        <i class="fa-solid fa-arrow-up"></i>
    </a>

    <!-- External Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script src="{{ asset('frontend/js/register.js') }}"></script>
    <script src="{{ asset('frontend/js/sign-in.js') }}"></script>
    <script src="{{ asset('frontend/js/jobs.js') }}"></script>
    <script src="{{ asset('frontend/js/home.js') }}"></script>

</body>

</html>
