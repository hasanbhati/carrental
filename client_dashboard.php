<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['usertype'] !== 'client') {
    header('Location: index.html');
    exit();
}
include 'php/db.php';
$username = $_SESSION['username'];

// Fetch cars from DB
$available = $conn->query("SELECT * FROM cars WHERE status = 'available'");
$rented = $conn->query("SELECT * FROM cars WHERE status = 'rented' AND rented_by = '$username'");
// Fetch rental history from rental_history table
$history = $conn->query("SELECT h.*, c.brand, c.model, c.type FROM rental_history h JOIN cars c ON h.car_id = c.id WHERE h.username = '$username' ORDER BY h.action_time DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Client Dashboard - Car Rental</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/main.js" defer></script>
</head>
<body>
    <div class="dashboard-container">
        <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
        <a href="php/logout.php" class="logout-btn">Logout</a>
        <h3>Available Cars for Rental</h3>
        <table class="car-table" id="available-cars">
            <thead>
                <tr>
                    <th>Brand</th><th>Model</th><th>Type</th><th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($car = $available->fetch_assoc()): ?>
                <tr class="car-row" data-car-id="<?php echo $car['id']; ?>">
                    <td><?php echo htmlspecialchars($car['brand']); ?></td>
                    <td><?php echo htmlspecialchars($car['model']); ?></td>
                    <td><?php echo htmlspecialchars($car['type']); ?></td>
                    <td><button class="rent-btn" data-car-id="<?php echo $car['id']; ?>">Rent a car</button></td>
                </tr>
                <tr class="car-details-row" style="display:none;"><td colspan="4"></td></tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <h3>Cars You Have Rented</h3>
        <table class="car-table" id="rented-cars">
            <thead>
                <tr>
                    <th>Brand</th><th>Model</th><th>Type</th><th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($car = $rented->fetch_assoc()): ?>
                <tr class="car-row" data-car-id="<?php echo $car['id']; ?>">
                    <td><?php echo htmlspecialchars($car['brand']); ?></td>
                    <td><?php echo htmlspecialchars($car['model']); ?></td>
                    <td><?php echo htmlspecialchars($car['type']); ?></td>
                    <td><button class="release-btn" data-car-id="<?php echo $car['id']; ?>">Release a car</button></td>
                </tr>
                <tr class="car-details-row" style="display:none;"><td colspan="4"></td></tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <h3>Rental History</h3>
        <table class="car-table" id="history-cars">
            <thead>
                <tr>
                    <th>Brand</th><th>Model</th><th>Type</th><th>Action</th><th>Date/Time</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $history->fetch_assoc()): ?>
                <tr class="car-row" data-car-id="<?php echo $row['car_id']; ?>">
                    <td><?php echo htmlspecialchars($row['brand']); ?></td>
                    <td><?php echo htmlspecialchars($row['model']); ?></td>
                    <td><?php echo htmlspecialchars($row['type']); ?></td>
                    <td><?php echo htmlspecialchars(ucfirst($row['action'])); ?></td>
                    <td><?php echo htmlspecialchars($row['action_time']); ?></td>
                </tr>
                <tr class="car-details-row" style="display:none;"><td colspan="5"></td></tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html> 