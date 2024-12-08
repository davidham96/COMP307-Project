<?php
include 'db.php';
session_start();

$conn = connectDatabase('users');
$user_id = $_SESSION['user_id'];

// Get calendar events based on user ID
$stmt = $conn->prepare("SELECT id, event_date, event_description FROM events WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$events = [];

while ($row = $result->fetch_assoc()) {
    $events[] = $row;
}

echo json_encode($events);

$stmt->close();
$conn->close();
