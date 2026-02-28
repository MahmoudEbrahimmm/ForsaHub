<section class="contact-section" id="contact">
    <div class="container">
        <div class="contact-wrapper">

            <div class="contact-info">
                <h3 class="contact-info-title">Contact Us</h3>
                <p class="contact-info-text">
                    Our team is available to support you with training programs, job opportunities,
                    and general inquiries related to the National Telecommunication Institute (NTI).
                </p>

                <div class="contact-details">
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div class="contact-item-content">
                            <h4>Address</h4>
                            <p>123 Tahrir St, Mohandessin, Giza, Egypt</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div class="contact-item-content">
                            <h4>Email</h4>
                            <p><a href="mailto:info@nti-career.com">info@nti-career.com</a></p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fa-solid fa-clock"></i>
                        </div>
                        <div class="contact-item-content">
                            <h4>Working Hours</h4>
                            <p>Saturday - Thursday: 9:00 AM - 5:00 PM</p>
                        </div>
                    </div>
                </div>

                <div class="contact-social">
                    <h4>Follow Us</h4>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fa-brands fa-linkedin-in"></i></a>
                        <a href="#" class="social-link"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>
            </div>

            <div class="contact-form-wrapper">
                <div class="form-header">
                    <h3>Send a Message</h3>
                    <p>
                        Please complete the form below, and our team will respond to your inquiry as soon as
                        possible.
                    </p>
                </div>

                <form action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data"
                    class="contact-form" id="contactForm">
                    @csrf
                    <div class="form-group floating">
                        <input type="text" name="name" class="form-input w-100" id="firstName" placeholder=" " required>
                        <label class="form-label" for="firstName">First Name</label>
                    </div>

                    <div class="form-row">
                        <div class="form-group floating">
                            <input type="text" name="email" class="form-input" id="email" placeholder=" " required>
                            <label class="form-label" for="email">Email Address</label>
                        </div>

                        <div class="form-group floating">
                            <input type="text" name="phone" class="form-input" id="phone" placeholder=" ">
                            <label class="form-label" for="phone">Phone Number</label>
                        </div>
                    </div>

                    <div class="form-group floating">
                        <textarea name="description" class="form-textarea" id="message" placeholder=" "
                            required></textarea>
                        <label class="form-label" for="message">Your Message</label>
                    </div>

                    <button type="submit" class="btn-submit">
                        Send Message
                        <i class="fa-solid fa-paper-plane"></i>
                    </button>
                </form>

                <div class="form-success" id="successMessage">
                    <div class="success-icon">
                        <i class="fa-solid fa-check"></i>
                    </div>
                    <h4 class="success-title">Sent Successfully!</h4>
                    <p class="success-text">Thank you for contacting us. We will reply as soon as possible.</p>
                    <button class="btn-submit" onclick="resetForm()">
                        Send Another Message
                    </button>
                </div>
            </div>
        </div>

        <div class="contact-map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3452.777169697081!2d31.02162461271817!3d30.07192112837138!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14585b977a5c432f%3A0x2e5d742b25405395!2z2KfZhNmF2LnZh9ivINin2YTZgtmI2YXZiiDZhNmE2KfYqti12KfZhNin2Ko!5e0!3m2!1sar!2seg!4v1771334257205!5m2!1sar!2seg"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>

            <div class="map-info-overlay">
                <h4>
                    <i class="fa-solid fa-location-dot"></i>
                    NTI Main Headquarters
                </h4>
                <p>National Telecommunication Institute, Tahrir St, Mohandessin, Giza</p>
                <a href="https://www.google.com/maps/dir//2KfZhNmF2LnZh9ivINin2YTZgtmI2YXZiiDZhNmE2KfYqti12KfZhNin2Ko"
                    target="_blank" class="map-directions-btn">
                    Get Directions <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>
