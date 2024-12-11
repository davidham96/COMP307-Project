<?php
session_start();
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = connectDatabase('users');
    $user_id = $_SESSION['user_id'];
    $event_id = $_POST['id'];
    $event_date = $_POST['event_date'];
    $event_description = $_POST['event_description'];

    $stmt = $conn->prepare("INSERT INTO events (user_id, event_date, event_description) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $user_id, $event_date, $event_description);

    if ($stmt->execute()) {
        echo "Event updated";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
