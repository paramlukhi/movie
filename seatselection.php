<?php
include 'db.php';

$showtime_id = $_GET['showtime_id'];
$sql = "SELECT * FROM seats WHERE showtime_id='$showtime_id'";
$result = $conn->query($sql);

echo "<h2>Select Your Seat</h2>";
echo "<form method='POST' action='booking.php'>";
echo "<input type='hidden' name='showtime_id' value='$showtime_id'>";

while ($row = $result->fetch_assoc()) {
    $disabled = ($row['status'] == 'booked') ? "disabled" : "";
    echo "<label>";
    echo "<input type='radio' name='seat_id' value='" . $row['seat_id'] . "' $disabled> " . $row['seat_number'];
    echo "</label><br>";
}

echo "<button type='submit'>Book Seat</button>";
echo "</form>";
?>