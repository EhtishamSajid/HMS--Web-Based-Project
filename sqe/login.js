// Login page JavaScript

document.addEventListener('DOMContentLoaded', function() {
    // Tab switching functionality
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');

    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons and contents
            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabContents.forEach(content => content.classList.remove('active'));

            // Add active class to clicked button
            this.classList.add('active');

            // Show corresponding content
            const tabId = this.getAttribute('data-tab');
            document.getElementById(`${tabId}-login`).classList.add('active');
        });
    });

    // Form validation for guest login
    const guestLoginForm = document.querySelector('#guest-login form');

    if (guestLoginForm) {
        guestLoginForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const email = document.getElementById('guestEmail').value;
            const password = document.getElementById('guestPassword').value;

            if (!email || !password) {
                alert('Please fill in all fields.');
                return;
            }

            // Submit the form if validation passes
            this.submit();
        });
    }

    // Form validation for staff login
    const staffLoginForm = document.querySelector('#staff-login form');

    if (staffLoginForm) {
        staffLoginForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const username = document.getElementById('staffUsername').value;
            const password = document.getElementById('staffPassword').value;
            const role = document.getElementById('staffRole').value;

            if (!username || !password || !role) {
                alert('Please fill in all fields.');
                return;
            }

            // Submit the form if validation passes
            this.submit();
        });
    }
});