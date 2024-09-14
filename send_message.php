<?php
$host = 'localhost';
$db = 'onopack_asdasdsa';
$user = 'onopack'; // Update with your DB username
$pass = '09204353341_Account';     // Update with your DB password


// Create a new MySQLi instance
$mysqli = new mysqli($host, $user, $pass, $db);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Get the message, sender, and recipient from the POST request
$message = $_POST['message'] ?? '';
$sender = $_POST['sender'] ?? 'user'; // Default sender is 'user'
$recipient = $_POST['recipient'] ?? null;

if ($message && $sender) {
    // Prepare and bind
    $stmt = $mysqli->prepare("INSERT INTO messages (sender, text, recipient_id) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $sender, $message, $recipient);
    $stmt->execute();
    $stmt->close();
}

$mysqli->close();
?>
