        // Toggle Sidebar on Mobile
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
        }

        // Logout Function
        function logout() {
            if (confirm('Are you sure you want to logout?')) {
                window.location.href = 'index.html';
            }
        }

        // Animate Progress Bars on Load
        document.addEventListener('DOMContentLoaded', function () {
            const progressBars = document.querySelectorAll('.skill-fill, .progress-fill');

            progressBars.forEach(bar => {
                const width = bar.style.width;
                bar.style.width = '0';
                setTimeout(() => {
                    bar.style.width = width;
                }, 300);
            });

            // Remove welcome toast after animation
            setTimeout(() => {
                const toast = document.getElementById('welcomeToast');
                if (toast) {
                    toast.remove();
                }
            }, 5000);
        });

        // Calendar Day Click
        document.querySelectorAll('.calendar-day').forEach(day => {
            day.addEventListener('click', function () {
                document.querySelectorAll('.calendar-day').forEach(d => d.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Job Apply Buttons
        document.querySelectorAll('.btn-job.apply').forEach(btn => {
            btn.addEventListener('click', function () {
                this.textContent = 'Applied';
                this.style.background = '#28a745';
                setTimeout(() => {
                    alert('Application submitted successfully!');
                }, 300);
            });
        });

        // Save Job Buttons
        document.querySelectorAll('.btn-job.saved').forEach(btn => {
            btn.addEventListener('click', function () {
                const icon = this.querySelector('i');
                if (icon.classList.contains('fa-bookmark')) {
                    icon.classList.remove('fa-bookmark');
                    icon.classList.add('fa-solid', 'fa-check');
                    this.style.background = '#00AEEF';
                    this.style.color = 'white';
                } else {
                    icon.classList.remove('fa-check');
                    icon.classList.add('fa-bookmark');
                    this.style.background = '#f8f9fa';
                    this.style.color = '#6c757d';
                }
            });
        });