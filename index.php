<?php
include 'db.php';
session_start();

$sql = "SELECT * FROM movies";
$result = $conn->query($sql);

echo "<h1>🎬 Now Showing</h1>";
while ($row = $result->fetch_assoc()) {
    echo "<div style='margin:10px; border:1px solid #ccc; padding:10px'>";
    echo "<h3>" . $row['title'] . "</h3>";
    echo "<p>" . $row['description'] . "</p>";
    echo "<p><b>Language:</b> " . $row['language'] . "</p>";
    echo "<p><b>Duration:</b> " . $row['duration'] . "</p>";
    echo "<a href='movietime.php?movie_id=" . $row['movie_id'] . "'>View Showtimes</a>";
    echo "</div>";
}
?>