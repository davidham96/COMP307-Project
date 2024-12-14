<?php
session_start();
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = connectDatabase('users');
    $user_id = $_SESSION['user_id'];
    $event_id = $_POST['id'];
    $event_description = $_POST['event_description'];

    $stmt = $conn->prepare("UPDATE myEvents SET event_description = ? WHERE id = ? AND user_id = ?");
    $stmt->bind_param("sii", $event_description, $event_id, $user_id);

    if ($stmt->execute()) {
        echo "Event updated successfully";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
