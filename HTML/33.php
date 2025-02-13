<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ma3.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .navbar {
            background-color: #333;
            overflow: hidden;
            padding: 10px;
            display: flex;
            align-items: center;
        }
        .navbar a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            text-align: center;
        }
        .navbar a:hover {
            background-color: #575757;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: white;
            margin-right: auto;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover, .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .form-container {
            display: flex;
            flex-direction: column;
        }
        .form-container input {
            margin: 5px 0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-container button {
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #333;
            color: white;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #575757;
        }
        .car-image {
            width: 200px;  /* Increased width */
            height: 120px; /* Increased height */
            object-fit: cover;
            margin-right: 15px;
            border-radius: 4px;
        }
        footer {
            background-color: #998c8c;
            color: #fff;
            padding: 20px;
            text-align: center;
            margin-top: auto;
        }
        #map {
            width: 100%;
            height: 300px;
            border-radius: 4px;
            margin-top: 10px;
        }
        #mapContainer {
            display: none;
            margin-top: 20px;
        }
        .buses-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); /* Adjusted for larger images */
            gap: 20px;
            padding: 20px;
        }
        .bus-item {
            text-align: center;
        }
        #timer {
            font-size: 18px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <img src="../Images/logo.png" alt="Logo" style="height: 40px;">
        </div>
        <a href="ma3.php">Home</a>
        <a href="javascript:void(0)" onclick="showMap()">Locate a Bus</a>
        <a href="#" onclick="showContactUs()">Contact Us</a>
    </div>

    <!-- Contact Us Modal -->
    <div id="contactUsModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeContactUs()">&times;</span>
            <p>Contact Us: 
                <a href="mailto:ma3@gmail.com" style="text-decoration: none; color: inherit;">
                    <i class="fas fa-envelope"></i> ma3@gmail.com
                </a>
            </p>
            <p>
                Phone: 
                <a href="tel:+1234567890" style="text-decoration: none; color: inherit;">
                    <i class="fas fa-phone"></i> +1 234 567 890
                </a>
            </p>
        </div>
    </div>

    <!-- Booking Form Modal -->
    <div id="bookingModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeBookingForm()">&times;</span>
            <h2>Booking Form</h2>
            <div class="form-container">
                <form method="POST" action="booking.php">
                    <input type="text" id="busName" name="bus_name" placeholder="Bus Name" readonly>
                    <input type="text" id="username" name="username" placeholder="Enter Your Username" required>
                    <input type="text" id="phoneNumber" name="phone_number" placeholder="Phone Number" required>
                    <input type="date" id="travelDate" name="travel_date" required>
                    <input type="number" id="seatsToBook" name="seats_booked" placeholder="Number of Seats" min="1" required>
                    <p>Available Seats: <span id="seatCount">10</span></p>
                    <input type="text" id="paymentAmount" name="payment_amount" placeholder="Enter Amount to Pay" required>
                    <button type="submit" onclick="confirmBooking()">Book Now</button>
                </form>
            </div>
            <div id="timer"></div>
            <div id="mapContainer">
                <h2>Your Bus Location</h2>
                <div id="map"></div>
            </div>
        </div>
    </div>

    <div class="container">
        <h1>Book Your Bus #33</h1>
        <div class="buses-container">
            <div class="bus-item">
                <a href="javascript:void(0)" onclick="showBookingForm('Brawl')">
                    <img src="../Images/brawl.jpg" alt="Brawlout" class="car-image">
                    <p class="car-name">BOOK</p>
                </a>
                <p>BRAWLOUT</p>
            </div>
            <div class="bus-item">
                <a href="javascript:void(0)" onclick="showBookingForm('gunit')">
                    <img src="../Images/gunit2.jpg" alt="Menace 004" class="car-image">
                    <p class="car-name">BOOK</p>
                </a>
                <p>G UNIT</p>
            </div>
            <div class="bus-item">
                <a href="javascript:void(0)" onclick="showBookingForm('jinx')">
                    <img src="../Images/jinx.jpeg" alt="Jinx" class="car-image">
                    <p class="car-name">BOOK</p>
                </a>
                <p>JINX</p>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 ma3.com | All rights reserved.</p>
    </footer>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        let totalSeats = 10; // Initial total seats
        let map; // Declare the map variable globally
        let userMarker; // User location marker
        let busMarker; // Bus location marker
        let arrivalTime; // Arrival time variable
        let timerInterval; // Timer interval variable
        let busLocation = [-1.286389, 36.817223]; // Initial bus location (example)

        function showBookingForm(busName) {
            document.getElementById('busName').value = busName;
            document.getElementById('seatCount').innerText = totalSeats; // Display available seats
            document.getElementById('paymentAmount').value = ""; // Reset payment amount
            document.getElementById('bookingModal').style.display = 'block';
            initMap(); // Initialize the map
            getLocation(); // Get user location
            startTimer(); // Start the timer for bus arrival
        }

        function confirmBooking() {
            const seatsToBook = parseInt(document.getElementById('seatsToBook').value);
            const totalPayment = parseInt(document.getElementById('paymentAmount').value);
            const phoneNumber = document.getElementById('phoneNumber').value;
            const username = document.getElementById('username').value;

            if (!username || isNaN(seatsToBook) || seatsToBook <= 0) {
                alert("Please enter your username and a valid number of seats.");
                return;
            }

            const confirmBooking = confirm(`Book ${seatsToBook} seats on ${document.getElementById('busName').value} for Ksh ${totalPayment}?\n\nPhone Number: ${phoneNumber}\nUsername: ${username}`);
            if (confirmBooking) {
                const mpesaPin = prompt("Please enter your M-Pesa PIN to confirm payment:");
                if (mpesaPin) {
                    alert(`Booking confirmed for ${seatsToBook} seats!\nUsername: ${username}\nSeats Booked: ${seatsToBook}\nBus Name: ${document.getElementById('busName').value}`);
                } else {
                    alert("Payment canceled.");
                }
            }
        }

        function closeBookingForm() {
            clearInterval(timerInterval); // Stop the timer when closing the form
            document.getElementById('bookingModal').style.display = 'none';
            if (busMarker) {
                map.removeLayer(busMarker); // Remove the bus marker when closing
            }
        }

        function closeContactUs() {
            document.getElementById('contactUsModal').style.display = 'none';
        }

        function showMap() {
            document.getElementById('mapContainer').style.display = 'block';
        }

        function initMap() {
            map = L.map('map').setView(busLocation, 13); // Default center
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap'
            }).addTo(map);
        }

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(position => {
                    const lat = position.coords.latitude;
                    const lon = position.coords.longitude;
                    userMarker = L.marker([lat, lon]).addTo(map).bindPopup("Your Location").openPopup();
                    map.setView([lat, lon], 15); // Zoom into user location

                    // Add bus marker at the initial bus location
                    busMarker = L.marker(busLocation).addTo(map).bindPopup("Bus Location").openPopup();
                }, () => {
                    alert("Unable to retrieve your location.");
                });
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        function startTimer() {
            const busArrivalTime = new Date();
            busArrivalTime.setMinutes(busArrivalTime.getMinutes() + 3); // Set arrival time to 3 minutes from now
            arrivalTime = busArrivalTime;

            timerInterval = setInterval(() => {
                const now = new Date();
                const timeLeft = arrivalTime - now;

                if (timeLeft <= 0) {
                    clearInterval(timerInterval);
                    document.getElementById('timer').innerText = "Bus has arrived!";
                } else {
                    const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);
                    document.getElementById('timer').innerText = `${minutes}m ${seconds}s left until bus arrival.`;
                }
            }, 1000);
        }
    </script>
</body>
</html>
