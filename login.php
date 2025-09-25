<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $pass  = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($pass, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['name']    = $user['name'];
            echo "✅ Login successful! Welcome " . $user['name'] . " <a href='index.php'>Go to Home</a>";
        } else {
            echo "❌ Wrong password.";
        }
    } else {
        echo "❌ No user found.";
    }
}
?>