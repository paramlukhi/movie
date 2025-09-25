<?php
include 'db.php';

$showtime_id = $_GET['showtime_id'];

try {
    $sql = "SELECT * FROM seats WHERE showtime_id = :showtime_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':showtime_id', $showtime_id);
    $stmt->execute();
    $seats = $stmt->fetchAll();

    echo "<h2>Select Your Seat</h2>";
    echo "<form method='POST' action='booking.php'>";
    echo "<input type='hidden' name='showtime_id' value='" . htmlspecialchars($showtime_id) . "'>";

    foreach($seats as $row) {
        $disabled = ($row['status'] == 'booked') ? "disabled" : "";
        echo "<label>";
        echo "<input type='radio' name='seat_id' value='" . $row['seat_id'] . "' $disabled> " . htmlspecialchars($row['seat_number']);
        echo "</label><br>";
    }

    echo "<button type='submit'>Book Seat</button>";
    echo "</form>";
} catch(PDOException $e) {
    echo "❌ Error loading seats: " . $e->getMessage();
}
?>
