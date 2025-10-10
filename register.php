<?php
include 'connection.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Register - BookNow</title>
  <link rel="stylesheet" href="style.css">
  <script>
    // document.addEventListener("DOMContentLoaded", function () {
    //   const form = document.querySelector("form");

    //   form.addEventListener("submit", function (event) {
    //     const name = form.name.value.trim();
    //     const email = form.email.value.trim();
    //     const password = form.password.value.trim();

    //     if (name === "" || email === "" || password === "") {
    //       alert("Please fill in all fields before submitting.");
    //       event.preventDefault(); 
    //     }
    //   });
    // });
  </script>
</head>
<body>
  <center>
   <div class="logininfo" >
  <form method="POST">
    <h2>Register</h2>
    <input type="text" name="uname" placeholder="Full Name">
    <input type="email" name="uemail" placeholder="Email">
    <input type="password" name="upassword" placeholder="Password">
    <input type="text" name="ContectNumber" placeholder="ContectNumber">

    <button type="submit" name="btn">Register</button>

    <p>Already have an account? <a href="login.php">Login</a></p>
    <?php
    if(isset($_POST["btn"]))
    {
      $nm = $_POST["uname"];
      $em = $_POST["uemail"];
      $pass = $_POST["upassword"];


      $cn = $_POST["ContectNumber"];
      $sql = "INSERT INTO `users`(`name`, `email`, `password`, `contect_num`) VALUES ('$nm','$em','$pass','$cn')";
      $re = mysqli_query($conn,$sql);
      if($re)
      {
        echo "Successfully data inserted.";
        echo "<script> window.location='login.php'</script>";
      }
      else{
        echo "Data not inserted";
      }
    }
    ?>
  </form>
</body>
</html>

