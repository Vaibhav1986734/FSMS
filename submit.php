<?php
$servername = "localhost"; 
$username = "root";
$password = ""; 
$dbname = "fsms"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $message);

// Set parameters and execute
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

if ($stmt->execute()) {
    $response = "New record created successfully";
} else {
    $response = "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

echo "<script type='text/javascript'>
        alert('$response');
        window.location.href='index.php'; 
      </script>";
?>
