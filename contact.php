
<?php
include 'Connection.php';
session_start();
 

$result = mysqli_query($conn, "SELECT * FROM contact_us");
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
    <button type="submit" name="sand">Send</button>
  </form>
</body>
</html>

<?php
if(isset($_POST["sand"])){
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contact_us (name, email, message) VALUES ('$name', '$email', '$message')";
    $re= mysqli_query($conn,$sql);
  if($re){
        echo "✅ Message sent successfully!";
        echo "<script> window.location='index.php'</script>";
      
    } else {
        echo "data not inserted";
    }
}