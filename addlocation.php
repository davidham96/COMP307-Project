<!-- Anna Henderson 261034784-->
<?php
session_start();
include './db.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = connectDatabase('307-final');
    $user_id = $_SESSION['user_id'];
    $long = $_POST['long'];
    $lat = $_POST['lat'];
    $place_name = $_POST['place_name'];

    $stmt = $conn->prepare("INSERT INTO locations (user_id, longitude, latitude, place_name) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("idds", $user_id, $long, $lat, $place_name);

    if ($stmt->execute()) {
        echo "Added to favorites";
    } else {
        echo "Error: " . $conn->error;
    }-

    $stmt->close();
    $conn->close();
}
?>