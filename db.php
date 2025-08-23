<?php
$host = "localhost";
$user = "root";     // default XAMPP
$pass = "";         // blank if you didn’t set a password
$db   = "movie_booking";  // your database name

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("❌ Database connection failed: " . $conn->connect_error);
}
?>