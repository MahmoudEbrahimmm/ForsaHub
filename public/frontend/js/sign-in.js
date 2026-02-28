
        document.addEventListener('DOMContentLoaded', function () {

            // ==========================================
            // TOGGLE PASSWORD VISIBILITY
            // ==========================================

            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');

            if (togglePassword) {
                togglePassword.addEventListener('click', function () {
                    const icon = this.querySelector('i');

                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        icon.classList.remove('fa-eye');
                        icon.classList.add('fa-eye-slash');
                    } else {
                        passwordInput.type = 'password';
                        icon.classList.remove('fa-eye-slash');
                        icon.classList.add('fa-eye');
                    }
                });
            }

            // ==========================================
            // FORM SUBMISSION
            // ==========================================

            const signinForm = document.getElementById('signinForm');
            const signinBtn = document.getElementById('signinBtn');
            const signinSuccess = document.getElementById('signinSuccess');

            if (signinForm) {
                signinForm.addEventListener('submit', async function (e) {
                    e.preventDefault();

                    // Validation
                    const email = document.getElementById('email');
                    const password = document.getElementById('password');
                    let isValid = true;

                    if (!email.value.trim()) {
                        email.style.borderColor = '#dc3545';
                        isValid = false;
                    } else {
                        email.style.borderColor = '';
                    }

                    if (!password.value.trim()) {
                        password.style.borderColor = '#dc3545';
                        isValid = false;
                    } else {
                        password.style.borderColor = '';
                    }

                    if (!isValid) return;

                    // Loading state
                    signinBtn.innerHTML = 'Signing In...';
                    signinBtn.classList.add('loading');
                    signinBtn.disabled = true;

                    // Simulate API call
                    await new Promise(resolve => setTimeout(resolve, 2000));

                    // Show success
                    signinForm.style.display = 'none';
                    document.querySelector('.social-login').style.display = 'none';
                    document.querySelector('.divider').style.display = 'none';
                    signinSuccess.classList.add('show');

                    // Redirect after delay
                    setTimeout(() => {
                        window.location.href = 'index.html';
                    }, 3000);
                });
            }

            // ==========================================
            // FORGOT PASSWORD MODAL
            // ==========================================

            const forgotForm = document.getElementById('forgotForm');

            if (forgotForm) {
                forgotForm.addEventListener('submit', function (e) {
                    e.preventDefault();

                    const btn = this.querySelector('button[type="submit"]');
                    btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Sending...';
                    btn.disabled = true;

                    setTimeout(() => {
                        btn.innerHTML = '<i class="fa-solid fa-check"></i> Link Sent!';
                        btn.classList.remove('btn-primary');
                        btn.classList.add('btn-success');

                        setTimeout(() => {
                            bootstrap.Modal.getInstance(document.getElementById('forgotModal')).hide();
                            // Reset form
                            this.reset();
                            btn.innerHTML = 'Send Reset Link';
                            btn.classList.remove('btn-success');
                            btn.classList.add('btn-primary');
                            btn.disabled = false;
                        }, 1500);
                    }, 2000);
                });
            }

            // ==========================================
            // REAL-TIME VALIDATION
            // ==========================================

            const inputs = signinForm.querySelectorAll('input');
            inputs.forEach(input => {
                input.addEventListener('input', function () {
                    this.style.borderColor = '';
                });
            });

            // ==========================================
            // SOCIAL LOGIN BUTTONS
            // ==========================================

            const socialButtons = document.querySelectorAll('.btn-social');
            socialButtons.forEach(btn => {
                btn.addEventListener('click', function () {
                    const provider = this.getAttribute('data-provider');
                    const originalContent = this.innerHTML;

                    this.innerHTML = `<i class="fa-solid fa-spinner fa-spin"></i> Connecting to ${provider}...`;
                    this.disabled = true;

                    setTimeout(() => {
                        // Simulate success
                        signinForm.style.display = 'none';
                        document.querySelector('.social-login').style.display = 'none';
                        document.querySelector('.divider').style.display = 'none';
                        document.querySelector('.form-header').style.display = 'none';
                        signinSuccess.classList.add('show');
                    }, 2000);
                });
            });
        });