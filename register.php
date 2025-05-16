<?php
$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("localhost", "root", "", "hotel_db");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    // Check if username exists
    $check = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($check);

    if ($result->num_rows > 0) {
        // Username already used
        echo "<script>alert('Username already used. Please choose another.'); window.location.href='register.php';</script>";
        exit();
    } else {
        // Insert new user
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Registration successful!'); window.location.href='index.php';</script>";
            exit();
        } else {
            $message = "Database error: " . $conn->error;
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel Registration</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('hotel.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .background-blur {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            backdrop-filter: blur(8px);
            background-color: rgba(255, 255, 255, 0.2);
            z-index: 0;
        }

        .register-container {
            position: relative;
            z-index: 1;
            background-color: rgba(255, 255, 255, 0.95);
            width: 350px;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
            text-align: center;
        }

        .register-container h2 {
            margin-bottom: 20px;
            color: #5D4037;
        }

        input[type="text"], input[type="password"] {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        button {
            background-color: #8D6E63;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background-color: #6D4C41;
        }

        .link {
            margin-top: 15px;
            display: block;
        }

        .link a {
            color: #6D4C41;
            text-decoration: none;
        }

        .link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="background-blur"></div>

    <div class="register-container">
        <h2>Create Your Account</h2>

        <form action="register.php" method="POST">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Register</button>
        </form>

        <div class="link">
            <p>Already have an account? <a href="index.php">Login here</a></p>
        </div>
    </div>

</body>
</html>
