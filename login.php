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
    <p>Don't have an account? <a href="register.html">Register</a></p>
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
        echo "<script> window.location='index.html'</script>";
      }
    }
    else{
      echo "invalid";
    }
  }
  ?>
</body>
</html>

 <?php
/*include 'connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $action = $_POST['action'];
    
    if ($action == 'register') {
        // REGISTRATION
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        // Check if email exists
        $check_sql = "SELECT * FROM users WHERE email='$email'";
        $check_result = $conn->query($check_sql);
        
        if ($check_result->num_rows > 0) {
            echo "Email already exists!";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed_password')";
            
            if ($conn->query($sql) === TRUE) {
                echo "Registration successful! You can now login.";
            } else {
                echo "Error: " . $conn->error;
            }
        }
        
    } elseif ($action == 'login') {
        // LOGIN
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['user_name'] = $user['name'];
                echo "Login successful! Welcome " . $user['name'];
            } else {
                echo "Wrong password!";
            }
        } else {
            echo "User not found!";
        }
    }
}*/
?>
