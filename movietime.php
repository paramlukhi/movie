<<<<<<< HEAD
<?php
include 'db.php';

$movie_id = $_GET['movie_id'];

try {
    $sql = "SELECT * FROM showtimes WHERE movie_id = :movie_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':movie_id', $movie_id);
    $stmt->execute();
    $showtimes = $stmt->fetchAll();

    echo "<h2>Available Showtimes</h2>";
    foreach($showtimes as $row) {
        echo "<div>";
        echo "<p>Date: " . htmlspecialchars($row['show_date']) . " | Time: " . htmlspecialchars($row['show_time']) . "</p>";
        echo "<a href='seatselection.php?showtime_id=" . $row['showtime_id'] . "'>Select Seats</a>";
        echo "</div>"; 
    }
} catch(PDOException $e) {
    echo "❌ Error loading showtimes: " . $e->getMessage();
}
=======
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
>>>>>>> 9588f7820260755ad14d164c2f0fe91e785a94e4
?>