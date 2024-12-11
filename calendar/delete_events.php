<?php
session_start();
include '../db.php';

$conn = connectDatabase('users');
$user_id = $_SESSION['user_id'];
$event_id = $_POST['id'];

// Delete event
$stmt = $conn->prepare("DELETE FROM events WHERE id = ? AND user_id = ?");
$stmt->bind_param("ii", $event_id, $user_id);

if ($stmt->execute()) {
    echo "Event deleted";
} else {
    echo "Error: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
