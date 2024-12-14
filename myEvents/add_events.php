<?php
session_start();
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = connectDatabase('users');
    $user_id = $_SESSION['user_id'];
    $event_description = $_POST['event_description'];

    $stmt = $conn->prepare("INSERT INTO myEvents (user_id, event_description) VALUES (?, ?)");
    $stmt->bind_param("is", $user_id, $event_description);

    if ($stmt->execute()) {
        echo "Event added successfully";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
