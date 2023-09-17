

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
                        <a href = "../index.html" class = "nav-link">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="center">

    <?php

  include("../php/config.php");
  if(isset($_POST['submit'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $verifyEmail = mysqli_query($con, "SELECT email FROM users WHERE email='$email'");

    if(mysqli_num_rows($verifyEmail) != 0) {
      echo " <p> This email was taken, use another please!!</p>";
      
    } else {
      mysqli_query($con, "INSERT INTO users(firstname, lastname, email, password) VALUES('$firstname','$lastname','$email','$password' )") or die(" Error occured");
       echo " <p> success !!!</p>";
    }
  } else {

    ?>

      <h1>Register</h1>
      <form method="post" class="post">
        <div class="txt_field">
          <input type="text" name="firstname" required>
          <span></span>
          <label>First Name</label>
        </div>
        <div class="txt_field">
            <input type="text" name="lastname" required>
            <span></span>
            <label>Last Name</label>
          </div>
          <div class="txt_field">
            <input type="email" name="email" required>
            <span></span>
            <label>Email</label>
          </div>
          <div class="txt_field">
            <input type="password" name="password" required>
            <span></span>
            <label>Password</label>
          </div>
        
            <input type="submit" name="submit" value="Register" style="background: #1ec6b6; width: 100%; height: 50px; border-radius: 25px; font-size: 18px;
  color: #e9f4fb; border: 1px solid;">
        
        <div class="signup_link">
          Already have account? <a href="login.php">LogIn</a>
        </div>
      </form>
      
    </div>
    <?php }?>
  </body>
</html>
