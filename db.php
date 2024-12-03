<?php

// Database function, depending on the database you are using
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