<<<<<<< HEAD
<?php
include 'db.php';
session_start();

try {
    $sql = "SELECT * FROM movies";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $movies = $stmt->fetchAll();

    echo "<h1>🎬 Now Showing</h1>";
    foreach($movies as $row) {
        echo "<div style='margin:10px; border:1px solid #ccc; padding:10px'>";
        echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
        echo "<p>" . htmlspecialchars($row['description']) . "</p>";
        echo "<p><b>Language:</b> " . htmlspecialchars($row['language']) . "</p>";
        echo "<p><b>Duration:</b> " . htmlspecialchars($row['duration']) . "</p>";
        echo "<a href='movietime.php?movie_id=" . $row['movie_id'] . "'>View Showtimes</a>";
        echo "</div>";
    }
} catch(PDOException $e) {
    echo "❌ Error loading movies: " . $e->getMessage();
}
=======
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
>>>>>>> 9588f7820260755ad14d164c2f0fe91e785a94e4
?>