<?php
require_once 'config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Fetch rooms data from the database
$sql = "SELECT room_type, description, price_per_night, image_url FROM rooms";
$result = $conn->query($sql);

if ($result === false) {
    die("Database query failed: " . $conn->error);
}

$rooms = [];
while ($row = $result->fetch_assoc()) {
    $rooms[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooms - Luxury Hotel</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            background: #f5f5f5;
        }
        header {
            background-color: #1f3b56;
            color: #fff;
            padding: 1rem 0;
            text-align: center;
        }
        header h1 {
            margin: 0;
        }
        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }
        .rooms-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        .room-card {
            background: #fff;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .room-card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.2);
        }
        .room-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            display: block;
        }
        .room-content {
            padding: 1rem;
        }
        .room-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #333;
            margin: 0 0 0.5rem 0;
        }
        .room-description {
            font-size: 1rem;
            color: #666;
            margin-bottom: 1rem;
        }
        .room-price {
            font-size: 1.2rem;
            font-weight: 700;
            color: #1f3b56;
            margin: 0;
        }
        footer {
            text-align: center;
            margin-top: 2rem;
            padding: 1rem 0;
            background-color: #1f3b56;
            color: #fff;
        }
        footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Luxury Hotel</h1>
    </header>

    <div class="container">
        <h2>Our Rooms</h2>
        <div class="rooms-grid">
            <?php foreach ($rooms as $index => $room): ?>
                <div class="room-card">
                    <img 
                        src="images/room<?= $index + 1 ?>.jpg" 
                        alt="<?= htmlspecialchars($room['room_type']); ?>" 
                        class="room-image">
                    <div class="room-content">
                        <h3 class="room-title"><?= htmlspecialchars($room['room_type']); ?></h3>
                        <p class="room-description"><?= htmlspecialchars($room['description']); ?></p>
                        <p class="room-price">$<?= number_format($room['price_per_night'], 2); ?>/night</p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 Luxury Hotel. All rights reserved.</p>
    </footer>
</body>
</html>
