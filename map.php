<?php
session_start();
include './db.php';

$conn = connectDatabase('map');
$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT id, longitude, latitude, place_name FROM locations WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$locations = [];

while ($row = $result->fetch_assoc()) {
    $locations[] = $row;
}

echo json_encode($locations);

$stmt->close();
$conn->close();
?>
