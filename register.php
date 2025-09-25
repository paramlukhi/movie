<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $pass  = password_hash($_POST['password'], PASSWORD_BCRYPT);

    try {
        $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $pass);
        $stmt->execute();

        echo "✅ Registration successful! <a href='login.html'>Login</a>";
    } catch(PDOException $e) {
        if ($e->getCode() == 23000) {
            echo "❌ Email already exists!";
        } else {
            echo "❌ Error: " . $e->getMessage();
        }
    }
}
?>