<?php
// David Hamaoui, 260985825

session_start();
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = connectDatabase('users');
    $user_id = $_SESSION['user_id'];
    $event_id = $_POST['id'];
    $event_date = $_POST['event_date'];
    $event_description = $_POST['event_description'];

    // Update event depending on user ID and event ID
    $stmt = $conn->prepare("UPDATE events SET event_date = ?, event_description = ? WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ssii", $event_date, $event_description, $event_id, $user_id);

    if ($stmt->execute()) {
        echo "Event updated";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
