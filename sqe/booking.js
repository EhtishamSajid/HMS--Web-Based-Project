// Booking page JavaScript

document.addEventListener('DOMContentLoaded', function() {
    // Get form elements
    const bookingForm = document.getElementById('bookingForm');
    const roomTypeSelect = document.getElementById('roomType');
    const checkInInput = document.getElementById('checkIn');
    const checkOutInput = document.getElementById('checkOut');
    const adultsSelect = document.getElementById('adults');
    const childrenSelect = document.getElementById('children');
    const paymentMethodRadios = document.querySelectorAll('input[name="paymentMethod"]');
    const creditCardDetails = document.getElementById('creditCardDetails');

    // Get summary elements
    const summaryRoom = document.getElementById('summaryRoom');
    const summaryCheckIn = document.getElementById('summaryCheckIn');
    const summaryCheckOut = document.getElementById('summaryCheckOut');
    const summaryGuests = document.getElementById('summaryGuests');
    const summaryTotal = document.getElementById('summaryTotal');

    // Room prices
    const roomPrices = {
        'standard': 99,
        'deluxe': 149,
        'suite': 249
    };

    // Set minimum dates for check-in and check-out
    const today = new Date();
    const tomorrow = new Date(today);
    tomorrow.setDate(tomorrow.getDate() + 1);

    const formatDate = date => {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    };

    checkInInput.min = formatDate(today);
    checkOutInput.min = formatDate(tomorrow);

    // Pre-select room type from URL parameter if available
    const urlParams = new URLSearchParams(window.location.search);
    const roomParam = urlParams.get('room');

    if (roomParam && roomPrices[roomParam]) {
        roomTypeSelect.value = roomParam;
        updateSummary();
    }

    // Update checkout min date when check-in date changes
    checkInInput.addEventListener('change', function() {
        const checkInDate = new Date(this.value);
        const nextDay = new Date(checkInDate);
        nextDay.setDate(nextDay.getDate() + 1);

        checkOutInput.min = formatDate(nextDay);

        // If current checkout date is before new min date, update it
        if (new Date(checkOutInput.value) & lt; = checkInDate) {
            checkOutInput.value = formatDate(nextDay);
        }

        updateSummary();
    });

    // Update summary when form inputs change
    roomTypeSelect.addEventListener('change', updateSummary);
    checkOutInput.addEventListener('change', updateSummary);
    adultsSelect.addEventListener('change', updateSummary);
    childrenSelect.addEventListener('change', updateSummary);

    // Toggle payment method details
    paymentMethodRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.value === 'creditCard' || this.value === 'debitCard') {
                creditCardDetails.style.display = 'block';
            } else {
                creditCardDetails.style.display = 'none';
            }
        });
    });

    // Calculate total price
    function calculateTotal() {
        const roomType = roomTypeSelect.value;
        if (!roomType) return 0;

        const pricePerNight = roomPrices[roomType];
        const checkInDate = new Date(checkInInput.value);
        const checkOutDate = new Date(checkOutInput.value);

        // If dates are invalid, return 0
        if (isNaN(checkInDate.getTime()) || isNaN(checkOutDate.getTime())) {
            return 0;
        }

        // Calculate number of nights
        const timeDiff = checkOutDate.getTime() - checkInDate.getTime();
        const nights = Math.ceil(timeDiff / (1000 * 3600 * 24));

        return pricePerNight * nights;
    }

    // Update booking summary
    function updateSummary() {
        const roomType = roomTypeSelect.value;
        const checkIn = checkInInput.value;
        const checkOut = checkOutInput.value;
        const adults = adultsSelect.value;
        const children = childrenSelect.value;

        // Update summary elements
        if (roomType) {
            const roomName = roomTypeSelect.options[roomTypeSelect.selectedIndex].text.split(' - ')[0];
            summaryRoom.textContent = roomName;
        } else {
            summaryRoom.textContent = 'Not selected';
        }

        summaryCheckIn.textContent = checkIn ? new Date(checkIn).toLocaleDateString() : 'Not selected';
        summaryCheckOut.textContent = checkOut ? new Date(checkOut).toLocaleDateString() : 'Not selected';

        const totalGuests = parseInt(adults) + parseInt(children);
        summaryGuests.textContent = totalGuests > 0 ? `${adults} Adults, ${children} Children` : 'Not selected';

        const total = calculateTotal();
        summaryTotal.textContent = `$${total.toFixed(2)}`;
    }

    // Form validation
    bookingForm.addEventListener('submit', function(e) {
        e.preventDefault();

        // Basic validation
        if (!roomTypeSelect.value) {
            alert('Please select a room type.');
            roomTypeSelect.focus();
            return;
        }

        if (!checkInInput.value) {
            alert('Please select a check-in date.');
            checkInInput.focus();
            return;
        }

        if (!checkOutInput.value) {
            alert('Please select a check-out date.');
            checkOutInput.focus();
            return;
        }

        // Additional validation for payment details
        const paymentMethod = document.querySelector('input[name="paymentMethod"]:checked').value;

        if ((paymentMethod === 'creditCard' || paymentMethod === 'debitCard')) {
            const cardNumber = document.getElementById('cardNumber').value;
            const cardName = document.getElementById('cardName').value;
            const expiryDate = document.getElementById('expiryDate').value;
            const cvv = document.getElementById('cvv').value;

            if (!cardNumber || !cardName || !expiryDate || !cvv) {
                alert('Please fill in all card details.');
                return;
            }
        }

        // If all validation passes, submit the form
        alert('Booking submitted successfully! You will receive a confirmation email shortly.');
        this.submit();
    });

    // Initialize summary
    updateSummary();
});