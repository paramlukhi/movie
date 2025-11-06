
<?php
include 'connection.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
 
  <title>Contact Us</title>
  <link rel="stylesheet" href="style.css">
   <style>
body{
  margin-top:110px;
}
  </style>
</head>
<body><center>
  <h2 style="text-align:center;">Contact Us</h2>
  <form action="submit_contact.php" method="POST">
    <input type="text" name="name" required placeholder="Your Name">
    <input type="email" name="email" required placeholder="Your Email">
    <textarea name="message" required placeholder="Your Message"></textarea>
    <button type="submit">Send</button>
  </form>
</body>
</html>

<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $message = $_POST['message'];

    try {
        $sql = "INSERT INTO contacts (name, email, message) VALUES (:name, :email, :message)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);
        $stmt->execute();

        echo "✅ Message sent successfully!";
    } catch(PDOException $e) {
        echo "❌ Error: " . $e->getMessage();
    }
}