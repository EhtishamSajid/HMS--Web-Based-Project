<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Room - Luxury Hotel</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <header>
        <div class="container">
            <div class="logo">
                <h1>Luxury Hotel</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="rooms.php">Rooms</a></li>
                    <li><a href="booking.php" class="active">Book Now</a></li>
                    <li><a href="feedback.php">Feedback</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="login.php" class="btn-login">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="page-banner">
        <div class="container">
            <h2>Book Your Stay</h2>
        </div>
    </section>

    <section class="booking-form">
        <div class="container">
            <div class="form-container">
                <h2>Reservation Details</h2>
                <form id="bookingForm" action="php/process_booking.php" method="POST">
                    <div class="form-group">
                        <label for="fullName">Full Name</label>
                        <input type="text" id="fullName" name="fullName" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="checkIn">Check-in Date</label>
                            <input type="date" id="checkIn" name="checkIn" required>
                        </div>
                        <div class="form-group">
                            <label for="checkOut">Check-out Date</label>
                            <input type="date" id="checkOut" name="checkOut" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="adults">Adults</label>
                            <select id="adults" name="adults" required>
                                <option value="1">1</option>
                                <option value="2" selected>2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="children">Children</label>
                            <select id="children" name="children">
                                <option value="0" selected>0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="roomType">Room Type</label>
                        <select id="roomType" name="roomType" required>
                            <option value="">Select a room type</option>
                            <option value="standard">Standard Room - $99/night</option>
                            <option value="deluxe">Deluxe Room - $149/night</option>
                            <option value="suite">Suite - $249/night</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="specialRequests">Special Requests</label>
                        <textarea id="specialRequests" name="specialRequests" rows="4"></textarea>
                    </div>
                    <div class="form-group payment-options">
                        <label>Payment Method</label>
                        <div class="payment-methods">
                            <div class="payment-method">
                                <input type="radio" id="creditCard" name="paymentMethod" value="creditCard" checked>
                                <label for="creditCard">Credit Card</label>
                            </div>
                            <div class="payment-method">
                                <input type="radio" id="debitCard" name="paymentMethod" value="debitCard">
                                <label for="debitCard">Debit Card</label>
                            </div>
                            <div class="payment-method">
                                <input type="radio" id="paypal" name="paymentMethod" value="paypal">
                                <label for="paypal">PayPal</label>
                            </div>
                        </div>
                    </div>
                    <div id="creditCardDetails" class="payment-details">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="cardNumber">Card Number</label>
                                <input type="text" id="cardNumber" name="cardNumber" placeholder="XXXX XXXX XXXX XXXX">
                            </div>
                            <div class="form-group">
                                <label for="cardName">Name on Card</label>
                                <input type="text" id="cardName" name="cardName">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="expiryDate">Expiry Date</label>
                                <input type="text" id="expiryDate" name="expiryDate" placeholder="MM/YY">
                            </div>
                            <div class="form-group">
                                <label for="cvv">CVV</label>
                                <input type="text" id="cvv" name="cvv" placeholder="XXX">
                            </div>
                        </div>
                    </div>
                    <div class="form-group terms">
                        <input type="checkbox" id="termsAgree" name="termsAgree" required>
                        <label for="termsAgree">I agree to the <a href="#">terms and conditions</a></label>
                    </div>
                    <div class="booking-summary" id="bookingSummary">
                        <h3>Booking Summary</h3>
                        <div class="summary-details">
                            <p>Room: <span id="summaryRoom">Not selected</span></p>
                            <p>Check-in: <span id="summaryCheckIn">Not selected</span></p>
                            <p>Check-out: <span id="summaryCheckOut">Not selected</span></p>
                            <p>Guests: <span id="summaryGuests">Not selected</span></p>
                            <p>Total: <span id="summaryTotal">$0.00</span></p>
                        </div>
                    </div>
                    <button type="submit" class="btn-primary">Confirm Booking</button>
                </form>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Luxury Hotel</h3>
                    <p>Experience luxury and comfort like never before.</p>
                </div>
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="rooms.html">Rooms</a></li>
                        <li><a href="booking.html">Book Now</a></li>
                        <li><a href="feedback.html">Feedback</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Contact Us</h3>
                    <p><i class="fas fa-map-marker-alt"></i> 123 Hotel Street, City, Country</p>
                    <p><i class="fas fa-phone"></i> +1 234 567 890</p>
                    <p><i class="fas fa-envelope"></i> info@luxuryhotel.com</p>
                </div>
                <div class="footer-section">
                    <h3>Follow Us</h3>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Luxury Hotel. All rights reserved. | Developed by Ehtisham Sajid (44201)</p>
            </div>
        </div>
    </footer>

    <script src="booking.js"></script>
</body>

</html>