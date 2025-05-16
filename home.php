<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Maplewood Suites</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body, html {
            height: 100%;
        }

        body {
            background: url('bg1.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .overlay {
            position: absolute;
            width: 100%;
            height: 100%;
            backdrop-filter: blur(4px); /* Slight blur for readability */
            background-color: rgba(0, 0, 0, 0.4); /* Dark overlay for contrast */
            z-index: 0;
        }

        .hero {
            position: relative;
            z-index: 1;
            text-align: center;
            color: #f5f5f5;
            padding: 40px 20px;
        }

        .hero h1 {
            font-size: 3rem;
            color: #D7CCC8; /* Light brown tone */
            margin-bottom: 15px;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 25px;
            color: #FFE0B2; /* Soft brown-gold tone */
        }

        .hero .contact {
            font-size: 1rem;
            margin-bottom: 30px;
            color: #E0E0E0;
        }

        .hero button {
            background-color: #6D4C41;
            color: #fff;
            border: none;
            padding: 12px 25px;
            font-size: 1rem;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .hero button:hover {
            background-color: #5D4037;
        }
    </style>
</head>
<body>

    <div class="overlay"></div>

    <div class="hero">
        <h1>Welcome to Maplewood Suites</h1>
        <p>Enjoy a luxurious escape in the heart of the city.</p>
        <div class="contact">Contact us at: +123 456 7890</div>
        <button onclick="location.href='reservation.html'">Make a Reservation</button>
    </div>

</body>
</html>
