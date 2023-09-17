<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>URugendo</title>
    <link rel="stylesheet" href="style.css">
    <link rel = "stylesheet" href = "../css/utility.css">
    <link rel = "stylesheet" href = "../css/style.css">
    <link rel = "stylesheet" href = "../css/responsive.css">
  </head>
  <body>
    <nav class = "navbar">
      <div class = "container flex">
          <a href = "../index.html" class = "site-brand">
              U<span>Rugendo</span>
          </a>

          <button type = "button" id = "navbar-show-btn" class = "flex">
              <i class = "fas fa-bars"></i>
          </button>
          <div id = "navbar-collapse">
              <button type = "button" id = "navbar-close-btn" class = "flex">
                  <i class = "fas fa-times"></i>
              </button>
              <ul class = "navbar-nav">
                  
                  <li class = "nav-item">
                      <a href = "register.php" class = "nav-link">Register</a>
                  </li>
                  <li class = "nav-item">
                      <a href = "login.php" class = "nav-link">Login</a>
                  </li>
                  <li class = "nav-item">
                      <a href = "#" class = "nav-link">About</a>
                  </li>
              </ul>
          </div>
      </div>
  </nav>
    <div class="center">
      <?php
        include("../php/config.php");

        if(isset($_POST['submit'])){

          $email=mysqli_real_escape_string($con,$_POST['email']);
          $password = mysqli_real_escape_string($con,$_POST['password']);

          $result = mysqli_query($con,"SELECT * FROM users WHERE email='$email' AND password='$password' ") or die("Select Error");
          $row = mysqli_fetch_assoc($result);

          if(is_array($row) && !empty($row)){
            $_SESSION['valid'] = $row['email'];
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['lastname'] = $row['lastname'];
        }else{
            echo "<div class='message'>
              <p>Wrong Username or Password</p>
               </div> <br>";
           echo "<a href='login.php'><button class='btn'>Go Back</button>";
 
        }
        if(isset($_SESSION['valid'])){
            header("Location:../home.php");
        }

           
        } else {
      ?>
      <h1>Login</h1>
      <form method="post" class="post1">
        <div class="txt_field">
          <input type="Email" name="email" required>
          <span></span>
          <label>Email</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass">Forgot Password?</div>
       
          <input class="formsubm" type="submit" name="submit"  value="Login" style="background: #1ec6b6; width: 100%; height: 50px; border-radius: 25px; font-size: 18px;
  color: #e9f4fb; border: 1px solid;">
     
        <div class="signup_link">
          Not a member? <a href="register.php">Signup</a>
        </div>
      </form>
    </div>
   <?php }?>
  </body>
</html>
