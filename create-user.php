<?php
session_start(); // Start the session

$conn = new mysqli("localhost", "root", "", "hotel_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Check hashed password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $username;
            header("Location: home.html");
            exit(); // Always add exit after header redirection
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "Username does not exist!";
    }

    $conn->close();
}
?>
