// Admin dashboard JavaScript

document.addEventListener('DOMContentLoaded', function() {
    // Toggle dropdown menu
    const profileInfo = document.querySelector('.profile-info');
    const dropdownMenu = document.querySelector('.dropdown-menu');

    if (profileInfo && dropdownMenu) {
        profileInfo.addEventListener('click', function() {
            dropdownMenu.classList.toggle('show');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!profileInfo.contains(e.target)) {
                dropdownMenu.classList.remove('show');
            }
        });
    }

    // Room status chart
    const roomStatusChart = document.getElementById('roomStatusChart');

    if (roomStatusChart) {
        new Chart(roomStatusChart, {
            type: 'doughnut',
            data: {
                labels: ['Occupied', 'Available', 'Maintenance'],
                datasets: [{
                    data: [65, 25, 10],
                    backgroundColor: [
                        '#1e3a8a', // Primary color for Occupied
                        '#10b981', // Success color for Available
                        '#f59e0b' // Warning color for Maintenance
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '70%',
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `${context.label}: ${context.raw}%`;
                            }
                        }
                    }
                }
            }
        });
    }

    // Date range filter
    const dateRangeSelect = document.getElementById('dateRange');

    if (dateRangeSelect) {
        dateRangeSelect.addEventListener('change', function() {
            // In a real application, this would trigger an AJAX request to update the dashboard data
            console.log('Date range changed to:', this.value);

            // For demonstration purposes, we'll just show an alert
            if (this.value === 'custom') {
                alert('In a real application, a date picker would appear here to select a custom date range.');
            }
        });
    }

    // Action buttons functionality
    const viewButtons = document.querySelectorAll('.btn-view');
    const editButtons = document.querySelectorAll('.btn-edit');
    const deleteButtons = document.querySelectorAll('.btn-delete');

    viewButtons.forEach(button => {
        button.addEventListener('click', function() {
            const bookingId = this.closest('tr').querySelector('td:first-child').textContent;
            alert(`Viewing details for booking ${bookingId}`);
            // In a real application, this would open a modal with booking details
        });
    });

    editButtons.forEach(button => {
        button.addEventListener('click', function() {
            const bookingId = this.closest('tr').querySelector('td:first-child').textContent;
            alert(`Editing booking ${bookingId}`);
            // In a real application, this would open a form to edit the booking
        });
    });

    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const bookingId = this.closest('tr').querySelector('td:first-child').textContent;
            if (confirm(`Are you sure you want to cancel booking ${bookingId}?`)) {
                alert(`Booking ${bookingId} has been cancelled.`);
                // In a real application, this would send an AJAX request to cancel the booking
            }
        });
    });

    // Notifications functionality
    const notificationsIcon = document.querySelector('.notifications i');

    if (notificationsIcon) {
        notificationsIcon.addEventListener('click', function() {
            alert('You have 3 new notifications:\n\n1. New booking received (#BK1006)\n2. Room 205 maintenance completed\n3. Low inventory alert: Toiletries');
            // In a real application, this would open a dropdown with notifications
        });
    }
});