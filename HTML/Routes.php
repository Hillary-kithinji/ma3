<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form Modal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #1e8d10;
        }
        header {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        #map {
            height: 400px; /* Set the height of the map */
            width: 100%;   /* Set the width of the map */
        }
        header {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        #map {
            height: 400px; /* Set the height of the map */
            width: 100%;   /* Set the width of the map */
        }
        header {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .header-logo img {
            height: 40px; /* Adjust logo size as needed */
        }
        .nav-links {
            display: flex;
            gap: 20px;
        }
        .nav-links a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
        }
        .nav-links a:hover {
            background-color: #ddd;
            color: black;
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
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 400px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .modal-form {
            display: flex;
            flex-direction: column;
        }
        .modal-form input[type="text"], 
        .modal-form input[type="password"] {
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .modal-form button {
            padding: 10px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .modal-form button:hover {
            background-color: #555;
        }
        .modal-form a {
            color: #333;
            text-decoration: none;
            text-align: center;
            display: block;
            margin-top: 10px;
        }
        .modal-form a:hover {
            text-decoration: underline;
        }
        header .container {
            display: flex;
            justify-content: space-between;
            align-items:left;
        }
        
        header nav ul {
            list-style: none;
        }
        
        header nav ul li {
            display: inline;
            margin-right: 30px;
        }
        
        header nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
        }
        
        header nav ul li a:hover {
            text-decoration: underline;
        }
        
        .modal {
            display: none; /* Hidden by default */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5); /* Black w/ opacity */
        }
        .modal-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 90%;
            max-width: 500px;
            border-radius: 8px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 24px;
            font-weight: bold;
            cursor: pointer;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-group textarea {
            resize: vertical;
        }
        .btn-submit {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .btn-submit:hover {
            background-color: #0056b3;
        }
        #map {
            height: 400px; /* Set the height of the map */
            width: 100%;   /* Set the width of the map */
        }
        .container {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="number"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 15px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        /* Additional styles remain unchanged */
    </style>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
</head>
<body>

<header>
    <div class="header-logo">
        <img src="../Images/logo.png" alt="Logo">
    </div>
    <nav class="nav-links">
        <a href="ma3.php">Home</a>
        
        <a href="#" id="contact">Contact Us</a>
        <a href="#" id="login"></a>
    </nav>
</header>

<!-- Booking Modal -->
<div id="bookingModal" class="modal">
    <div class="modal-content">
        <span class="close" id="bookingClose">&times;</span>
        <h2>Booking Form</h2>
        <div id="map"></div>
        <div class="container">
            <h1>Bus Booking:</h1>
            <form method="post" action="booking.php" id="bookingForm">
    <div class="form-group">
        <label for="seatsToBook">Seats to Book:</label>
        <input type="number" id="seatsToBook" min="1" max="10" required>
    </div>
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" placeholder="Enter your Username" required>
    </div>
    <div class="form-group">
        <label for="from">From:</label>
        <input type="text" id="from" placeholder="Enter departure city" required>
    </div>
    <div class="form-group">
        <label for="to">To:</label>
        <input type="text" id="to" placeholder="Enter destination city" required>
    </div>
    <div class="form-group">
        <label for="bookingDate">Date:</label>
        <input type="date" id="bookingDate" required>
    </div>
    <div class="form-group">
        <label for="mpesa-number">M-Pesa Number:</label>
        <input type="tel" id="mpesa-number" placeholder="Enter your M-Pesa number" required>
    </div>
    <div class="form-group">
        <label for="amount">Amount:</label>
        <input type="number" id="amount" placeholder="Enter amount to pay" required>
    </div>
    <button type="submit" onclick="confirmBooking()">Book Seats</button>
    <div id="message" style="margin-top: 15px;"></div>
</form>

        </div>
    </div>
</div>

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
<script>
    const map = L.map('map').setView([-1.286389, 36.817223], 12); // Center on Nairobi
    let userMarker;

    // Add OpenStreetMap tiles
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    function locateUser() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(position => {
                const lat = position.coords.latitude;
                const lon = position.coords.longitude;

                // Center the map on the user's location
                map.setView([lat, lon], 15);

                // Add a marker for the user's location
                if (userMarker) {
                    userMarker.setLatLng([lat, lon]);
                } else {
                    userMarker = L.marker([lat, lon]).addTo(map);
                }
            }, () => {
                alert('Unable to retrieve your location.');
            });
        } else {
            alert('Geolocation is not supported by this browser.');
        }
    }

    function calculateRoute() {
        const fromCity = document.getElementById('from').value;
        const toCity = document.getElementById('to').value;

        // Simulated coordinates for demonstration
        const fromCoords = [-1.286389, 36.817223]; // Nairobi
        const toCoords = [-1.2921, 36.8219]; // Another location in Nairobi

        L.Routing.control({
            waypoints: [
                L.latLng(fromCoords[0], fromCoords[1]),
                L.latLng(toCoords[0], toCoords[1])
            ],
            routeWhileDragging: true
        }).addTo(map);
    }
    function confirmBooking() {
    const totalSeatsInput = document.getElementById('totalSeats');
    const seatsToBookInput = document.getElementById('seatsToBook');
    const messageDiv = document.getElementById('message');
    const usernameInput = document.getElementById('username');
    const mpesaInput = document.getElementById('mpesa-number');
    const amountInput = document.getElementById('amount');
    const bookingDateInput = document.getElementById('bookingDate');

    let totalSeats = parseInt(totalSeatsInput.value);
    let seatsToBook = parseInt(seatsToBookInput.value);

    // Validate input
    if (!seatsToBook || seatsToBook < 1 || seatsToBook > totalSeats) {
        messageDiv.textContent = 'Invalid number of seats to book.';
        messageDiv.style.color = 'red';
        return;
    }

    const mpesaPin = prompt(`Please enter your M-Pesa PIN to confirm payment of KES ${amountInput.value} for ${seatsToBook} seat(s):`);
    
    if (mpesaPin) {
        const params = new URLSearchParams();
        params.append('seatsToBook', seatsToBook);
        params.append('username', usernameInput.value);
        params.append('from', document.getElementById('from').value);
        params.append('to', document.getElementById('to').value);
        params.append('bookingDate', bookingDateInput.value);
        params.append('amount', amountInput.value);
        params.append('mpesaNumber', mpesaInput.value);

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "booking.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    messageDiv.textContent = response.message;
                    messageDiv.style.color = response.success ? 'green' : 'red';

                    if (response.success) {
                        totalSeats -= seatsToBook;
                        totalSeatsInput.value = totalSeats; // Update total seats
                    }
                } else {
                    messageDiv.textContent = 'An error occurred. Please try again.';
                    messageDiv.style.color = 'red';
                }
            }
        };

        xhr.send(params.toString());
    } else {
        messageDiv.textContent = 'Payment canceled.';
        messageDiv.style.color = 'red';
    }

    seatsToBookInput.value = '';
}



    // Start locating the user on page load
    window.onload = function() {
        locateUser();
        document.getElementById('bookingModal').style.display = 'block';
    }

    // Close modal functionality
    document.getElementById('bookingClose').onclick = function() {
        document.getElementById('bookingModal').style.display = 'none';
    }
</script>
</body>
</html>
