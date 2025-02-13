<?php
session_start(); // Start the session

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the username and password from POST request
    $Username = trim($_POST['Username']);
    $password = trim($_POST['password']);

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'ma3');

    // Check connection
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("SELECT password FROM users WHERE Username = ?");
    $stmt->bind_param("s", $Username);
    $stmt->execute();
    $stmt->store_result();

    // Check if username exists
    if ($stmt->num_rows > 0) {
        // Bind result variable
        $stmt->bind_result($stored_password);
        $stmt->fetch();

        // Verify the password directly (no hashing)
        if ($password === $stored_password) {
            // Set session variable
            $_SESSION['Username'] = $Username;
            // Redirect to landing page after successful login
            header("Location: ma3.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Username not found.";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>

