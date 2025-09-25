<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id     = $_SESSION['user_id'];
    $showtime_id = $_POST['showtime_id'];
    $seat_id     = $_POST['seat_id'];

    try {
        $conn->beginTransaction();

        // Insert booking
        $sql1 = "INSERT INTO bookings (user_id, showtime_id, seat_id) VALUES (:user_id, :showtime_id, :seat_id)";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bindParam(':user_id', $user_id);
        $stmt1->bindParam(':showtime_id', $showtime_id);
        $stmt1->bindParam(':seat_id', $seat_id);
        $stmt1->execute();

        // Update seat status
        $sql2 = "UPDATE seats SET status = 'booked' WHERE seat_id = :seat_id";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bindParam(':seat_id', $seat_id);
        $stmt2->execute();

        $conn->commit();
        echo "✅ Booking confirmed!";

    } catch(PDOException $e) {
        $conn->rollBack();
        echo "❌ Error: " . $e->getMessage();
    }
}
?>