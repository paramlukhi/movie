<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id     = $_SESSION['user_id'];
    $showtime_id = $_POST['showtime_id'];
    $seat_id     = $_POST['seat_id'];

    $sql = "INSERT INTO bookings (user_id, showtime_id, seat_id) VALUES ('$user_id','$showtime_id','$seat_id')";
    if ($conn->query($sql) === TRUE) {
        $conn->query("UPDATE seats SET status='booked' WHERE seat_id='$seat_id'");
        echo "✅ Booking confirmed!";
    } else {
        echo "❌ Error: " . $conn->error;
    }
}
?>