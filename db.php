<?php
// David Hamaoui, 260985825

function connectDatabase($db) {
    $host = 'localhost';
    $user = 'root';
    $pass = '';

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

?>