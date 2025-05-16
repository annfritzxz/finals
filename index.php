<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel Login</title>
    <link rel="stylesheet" href="styles.css"> <!-- Make sure styles.css is linked -->
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
            background-color: rgba(255, 255, 255, 0.2); /* optional tint */
            z-index: 0;
        }

        .login-container {
            position: relative;
            z-index: 1;
            background-color: rgba(255, 255, 255, 0.95);
            width: 350px;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 20px;
            color: #5D4037; /* Brown tone */
        }

        input[type="text"], input[type="password"] {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        button {
            background-color: #8D6E63; /* Dark brown */
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

    <!-- Background blur effect -->
    <div class="background-blur"></div>

    <div class="login-container">
        <h2>Login to Your Account</h2>
        <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Login</button>
        </form>
        <div class="link">
            <p>Don't have an account? <a href="register.php">Register here</a></p>
        </div>
    </div>

</body>
</html>
