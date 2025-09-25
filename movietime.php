<?php
include 'db.php';

$movie_id = $_GET['movie_id'];
$sql = "SELECT * FROM showtimes WHERE movie_id='$movie_id'";
$result = $conn->query($sql);

echo "<h2>Available Showtimes</h2>";
while ($row = $result->fetch_assoc()) {
    echo "<div>";
    echo "<p>Date: " . $row['show_date'] . " | Time: " . $row['show_time'] . "</p>";
    echo "<a href='seatselection.php?showtime_id=" . $row['showtime_id'] . "'>Select Seats</a>";
    echo "</div>";
}
?>