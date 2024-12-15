<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $conn = connectDatabase('307-final');

    // Get email and password
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if McGill email (ends with @mcgill.ca or @mail.mcgill.ca)
    if (!preg_match("/^[a-zA-Z0-9._%+-]+@(mcgill\.ca|mail\.mcgill\.ca)$/", $email)) {
        die("Invalid email. Please use @mcgill.ca or @mail.mcgill.ca.");
    }

    // Check if password is too short
    if (strlen($password) < 5) {
        die("Password must contain at least 5 characters.");
    }

    // Check if email already in 'users'
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();

    // If user exists
    if ($stmt_result->num_rows > 0) {
        echo "Logged in";
    
    // New user
    } else {
        $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");

        // Hash password for security
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param("ss", $email, $hashedPassword);

        // If user is created properly
        if ($stmt->execute()) {
            echo "Signed up";
        
        // If there is an error
        } else {
            echo "Error: " . $conn->error;
        }
    }

    $stmt->close();
    $conn->close();
}
?>
