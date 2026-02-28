document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("registerForm");
  const submitBtn = document.getElementById("submitBtn");

  // Password Strength Meter
  const passwordInput = document.getElementById("password");
  const strengthFill = document.querySelector(".strength-fill");
  const strengthText = document.querySelector(".strength-text");

  if (passwordInput) {
    passwordInput.addEventListener("input", function () {
      const password = this.value;
      let strength = 0;
      let status = "Weak";
      let color = "#dc3545";

      if (password.length >= 8) strength++;
      if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength++;
      if (password.match(/\d/)) strength++;
      if (password.match(/[^a-zA-Z\d]/)) strength++;

      switch (strength) {
        case 0:
        case 1:
          status = "Weak";
          color = "#dc3545";
          break;
        case 2:
          status = "Fair";
          color = "#ffc107";
          break;
        case 3:
          status = "Good";
          color = "#17a2b8";
          break;
        case 4:
          status = "Strong";
          color = "#28a745";
          break;
      }

      strengthFill.style.width = `${(strength / 4) * 100}%`;
      strengthFill.style.background = color;
      strengthText.textContent = `Password strength: ${status}`;
      strengthText.style.color = color;
    });
  }

  // Toggle Password Visibility
  const togglePassword = document.querySelector(".toggle-password");
  if (togglePassword) {
    togglePassword.addEventListener("click", function () {
      const input = document.getElementById("password");
      const icon = this.querySelector("i");

      if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
      } else {
        input.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
      }
    });
  }

  // Form Validation
  function validateForm() {
    let isValid = true;
    const requiredFields = form.querySelectorAll("[required]");

    requiredFields.forEach((field) => {
      if (!field.value.trim()) {
        isValid = false;
        field.classList.add("error");
      } else {
        field.classList.remove("error");
      }
    });

    // Email validation
    const email = document.getElementById("email");
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email && !emailRegex.test(email.value)) {
      isValid = false;
      email.classList.add("error");
    }

    // Password match
    const password = document.getElementById("password");
    const confirmPassword = document.getElementById("confirmPassword");
    if (
      password &&
      confirmPassword &&
      password.value !== confirmPassword.value
    ) {
      isValid = false;
      confirmPassword.classList.add("error");
      alert("Passwords do not match!");
    }

    // Terms check
    const terms = document.getElementById("terms");
    if (terms && !terms.checked) {
      isValid = false;
      alert("Please agree to the Terms of Service");
    }

    return isValid;
  }

  // Real-time validation
  const inputs = form.querySelectorAll("input, select");
  inputs.forEach((input) => {
    input.addEventListener("blur", function () {
      if (this.hasAttribute("required") && !this.value.trim()) {
        this.classList.add("error");
      } else {
        this.classList.remove("error");
      }
    });

    input.addEventListener("input", function () {
      this.classList.remove("error");
    });
  });

  // Form Submission
  form.addEventListener("submit", async function (e) {
    e.preventDefault();

    if (!validateForm()) return;

    // Loading state
    submitBtn.innerHTML =
      '<i class="fa-solid fa-spinner fa-spin"></i> Creating Account...';
    submitBtn.disabled = true;

    // Simulate API call
    await new Promise((resolve) => setTimeout(resolve, 2000));

    // Show success
    form.style.display = "none";
    document.querySelector(".form-header").style.display = "none";
    document.getElementById("successMessage").classList.add("show");

    // Confetti effect
    createConfetti();
  });

  function createConfetti() {
    const colors = ["#00AEEF", "#003366", "#28a745", "#ffc107"];
    for (let i = 0; i < 50; i++) {
      const confetti = document.createElement("div");
      confetti.style.cssText = `
                        position: fixed;
                        width: 10px;
                        height: 10px;
                        background: ${colors[Math.floor(Math.random() * colors.length)]};
                        left: ${Math.random() * 100}vw;
                        top: -10px;
                        border-radius: ${Math.random() > 0.5 ? "50%" : "0"};
                        animation: confetti-fall ${2 + Math.random() * 2}s linear forwards;
                        z-index: 9999;
                    `;
      document.body.appendChild(confetti);

      setTimeout(() => confetti.remove(), 4000);
    }
  }
});
