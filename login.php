<?php
include 'connection.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - BookNow</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="style22.css">
  
  <script>
    // document.addEventListener("DOMContentLoaded", function ()) {
    //   const form = document.querySelector("form");

    //   form.addEventListener("submit", function (event)) {
    //     const email = form.email.value.trim();
    //     const password = form.password.value.trim();

    //     if (email === "" || password === "") {
    //       alert("Please fill in both email and password.");
    //       event.preventDefault(); 
    //     }
    //   };
    // };
  </script>

</head>
<body>
  <center>
   <div class="logininfo"> 
  <form  method="POST">
    <h2>Login</h2>
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <button type="submit" name='btnlogin'>Login</button><br>
    <p>Don't have an account? <a href="register.php">Register</a></p>
  </form>
  </div>

  <?php 
  if(isset($_POST["btnlogin"]))
  {
    $email=$_POST["email"];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE email='$email'";
    $re =mysqli_query($conn,$sql);
    $data = mysqli_fetch_assoc($re);
    if(mysqli_num_rows($re)>0)
    {
      if($email==$data["email"]  && $password==$data["password"])
      {
        echo "valid user";
        echo "<script> window.location='index.php'</script>";
      }
    }
    else{
      echo "invalid user";
    }
  }
  ?>
</body>
</html>

 

