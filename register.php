<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $pass  = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$pass')";
    if ($conn->query($sql) === TRUE) {
        echo "✅ Registration successful! <a href='login.html'>Login</a>";
    } else {
        echo "❌ Error: " . $conn->error;
    }
}
?>