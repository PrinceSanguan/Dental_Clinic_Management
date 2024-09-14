<?php
require_once "connect.php";

if (isset($_POST['date'])) {
    $selectedDate = $_POST['date'];
    $selectedDateFormatted = $selectedDate . '%'; // Format for the LIKE query

    // Query to get booked times for the selected date
    $sql = "SELECT appointment_date as booked_time 
            FROM appointment_desc 
            WHERE appointment_date LIKE ? 
            AND appointment_status = 'Approved'";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $selectedDateFormatted);
    $stmt->execute();
    $result = $stmt->get_result();

    $bookedTimes = [];
    while ($row = $result->fetch_assoc()) {
        $bookedTimes[] = $row['booked_time'];
    }

    echo json_encode($bookedTimes);

    $stmt->close();
}

$conn->close();
?>
