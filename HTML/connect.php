<?php 

$Username = $_POST['Username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'ma3');

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO users (Username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $Username, $email, $password);
    
    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to the welcome page after successful registration
        header("Location: ma3.php");
        exit();
    } else {
        echo "Error: " . $stmt->error; // Output error if it fails
    }

    $stmt->close();
    $conn->close();
}
?>
