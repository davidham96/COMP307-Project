<?php

// Database function, depending on the database you are using
function connectDatabase($dbName) {
    $host = 'localhost';
    $user = 'user';
    $pass = 'password';

    $conn = new mysqli($host, $user, $pass, $dbName);

    if ($conn->connect_error) {
        die("Connection failed to $dbName: " . $conn->connect_error);
    }
    return $conn;
}

?>