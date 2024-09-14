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

// Get user ID from the query parameter
$userId = $_GET['user_id'] ?? null;

// Fetch messages from the database for the specific user
$stmt = $mysqli->prepare("SELECT sender, text FROM messages WHERE recipient_id = ? OR sender = 'admin' ORDER BY timestamp ASC");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$messages = [];

while ($row = $result->fetch_assoc()) {
    $messages[] = $row;
}

$stmt->close();
$mysqli->close();

// Return messages as JSON
echo json_encode($messages);
?>
