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
    /*if(isset($_POST["btn"]))
    {
      $nm = $_POST["uname"];
      $em = $_POST["uemail"];
      $pass = $_POST["upassword"];
      $cn = $_POST["ContectNumber"];
      $sql = "INSERT INTO users (name, email, password, contect_num) VALUES ('$nm','$em','$pass','$cn')";
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
    */?>
    

<?php
include 'db.php'; // mysqli connection

if(isset($_POST["btn"])) {
    $nm   = trim($_POST["uname"]);
    $em   = trim($_POST["uemail"]);
    $pass = trim($_POST["upassword"]);
    $cn   = trim($_POST["ContectNumber"]);

    // 1️Validate empty fields
    if(empty($nm) || empty($em) || empty($pass) || empty($cn)) {
        die(" Please fill all fields!");
    }

    // 2️ Check if email already exists
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$em'");
    if(mysqli_num_rows($check) > 0){
        die(" This email is already registered!");
    }

    // 3️ Hash the password
    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

    // 4️ Insert user safely
    $sql = "INSERT INTO users (name, email, password, contect_num) VALUES ('$nm','$em','$hashed_pass','$cn')";
    $re = mysqli_query($conn, $sql);

    if($re){
        echo " Successfully registered.";
        echo "<script>window.location='login.php';</script>";
    } else {
        die(" Data not inserted: " . mysqli_error($conn));
    }
}
?>

  </form>
</body>
</html>

