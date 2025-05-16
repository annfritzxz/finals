<?php
session_start();

$conn = new mysqli("localhost", "root", "", "hotel_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if ($password === $user['password']) {
            $_SESSION['user'] = $username;
            header("Location: home.php");
            exit;
        } else {
            $error = "Incorrect password!";
        }
    } else {
        $error = "Username does not exist!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Login - Maplewood Suites</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Comic Sans MS', 'Poppins', cursive, serif;
      background: url('hotel.jpg') no-repeat center center fixed;
      background-size: cover;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      text-align: center;
      position: relative;
    }

    body::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      backdrop-filter: blur(6px);
      background-color: rgba(0, 0, 0, 0.2);
      z-index: 0;
    }

    form {
      position: relative;
      z-index: 1;
      background: rgba(255, 255, 255, 0.95);
      padding: 30px 40px;
      border-radius: 15px;
      box-shadow: 0 0 15px rgba(0,0,0,0.3);
    }

    h2 {
      font-size: 32px;
      font-weight: bold;
      color: #5D4037;
      text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.6);
      margin-bottom: 20px;
    }

    input[type="text"],
    input[type="password"] {
      width: 250px;
      padding: 10px;
      margin: 10px 0;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-family: 'Comic Sans MS', 'Poppins', cursive;
    }

    button {
      background-color: #8D6E63;
      color: white;
      padding: 10px 25px;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
      font-size: 16px;
      box-shadow: 2px 2px 5px rgba(0,0,0,0.5);
      transition: background-color 0.3s, transform 0.2s;
    }

    button:hover {
      background-color: #6D4C41;
      transform: scale(1.05);
    }

    .error {
      color: red;
      font-size: 16px;
      margin-top: 10px;
      font-weight: bold;
      text-shadow: 1px 1px 3px white;
    }

    .link {
      margin-top: 15px;
    }

    .link a {
      color: #6D4C41;
      text-decoration: none;
      font-weight: bold;
    }

    .link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <form method="POST" action="login.php">
    <h2>Login to Maplewood Suites</h2>
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>

    <?php if (!empty($error)): ?>
      <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <div class="link">
      <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div>
  </form>

</body>
</html>
