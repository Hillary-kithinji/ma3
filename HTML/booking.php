<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database credentials
$servername = "localhost";
$username = "root"; // Change if necessary
$password = ""; // Change if necessary
$dbname = "ma3"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if booking form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['bus_name'])) {
    // Collect and sanitize form data
    $username = $conn->real_escape_string($_POST['username']);
    $phone_number = $conn->real_escape_string($_POST['phone_number']);
    $bus_name = $conn->real_escape_string($_POST['bus_name']);
    $travel_date = $conn->real_escape_string($_POST['travel_date']);
    $seats_booked = (int)$_POST['seats_booked'];
    $total_payment = (float)$_POST['payment_amount'];

    // Check available seats
    $seat_check_sql = "SELECT available_seats FROM buses WHERE bus_name='$bus_name'";
    $result = $conn->query($seat_check_sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['available_seats'] >= $seats_booked) {
            // Proceed with booking
            $sql = "INSERT INTO bookings (username, phone_number, bus_name, travel_date, seats_booked, total_payment) 
                    VALUES ('$username', '$phone_number', '$bus_name', '$travel_date', $seats_booked, $total_payment)";
            if ($conn->query($sql) === TRUE) {
                // Update available seats
                $new_available_seats = $row['available_seats'] - $seats_booked;
                $update_seat_sql = "UPDATE buses SET available_seats=$new_available_seats WHERE bus_name='$bus_name'";
                if ($conn->query($update_seat_sql) === FALSE) {
                    echo "Error updating seats: " . $conn->error;
                } else {
                    // Redirect to landing page after successful booking
                    header("Location:confirmation.php?username=" . urlencode($username));
                    exit();
                }
            } else {
                echo "Error inserting booking: " . $conn->error;
            }
        } else {
            echo "Not enough available seats.";
        }
    } else {
        echo "Bus not found.";
    }
}

// Close connection
$conn->close();
?>


