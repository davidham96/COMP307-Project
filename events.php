<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    die("Access denied");
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("INSERT INTO events (title, start_date, end_date, description, user_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $title, $start_date, $end_date, $description, $user_id);

    if ($stmt->execute()) {
        echo "Event added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
<form method="POST">
    <input type="text" name="title" placeholder="Event Title" required>
    <input type="date" name="start_date" required>
    <input type="date" name="end_date" required>
    <textarea name="description" placeholder="Event Description"></textarea>
    <button type="submit">Add Event</button>
</form>
