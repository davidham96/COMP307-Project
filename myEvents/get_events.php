<?php
session_start();
include '../db.php';

$conn = connectDatabase('users');
$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT id, event_description FROM myEvents WHERE user_id = ?");
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
?>
