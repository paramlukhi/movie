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
?>