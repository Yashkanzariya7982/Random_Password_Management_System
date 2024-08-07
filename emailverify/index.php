<?php 
require('connection.php');
session_start();
if(isset($_COOKIE['email_username']) && isset($_COOKIE['password'])){
  $id=$_COOKIE['email_username'];
  $pass=$_COOKIE['password'];
}
else{
  $id="";
  $pass="";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User - Login and Register</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  
<header>
    <h2>GROUP 5</h2>
    <?php
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
    {
      echo '<nav>
              <a href="index.php">HOME</a>
              <a href="password\generator.php">GENERATE PASSWORD</a>
              <a href="password\db.php">VIEW STORED PASSWORDS</a>
              <a href="password\decrypt.php">CONTECT</a>
            </nav>';
      echo "
      <div class='user'>
      $_SESSION[username] - <a href='logout.php'>LOGOUT</a>
      </div>
      ";
    }
    else{
        echo "
        <div class='sign-in-up'>
      <button type='button' onclick=\"popup('login-popup')\">LOGIN</button>
      <button type='button' onclick=\"popup('register-popup')\">REGISTER</button>
    </div>
        ";

    }
    ?>
  </header>
 
  <div class="popup-container" id="login-popup">
    <div class="popup">
      <form method="POST" action="login_register.php">
        <h2>
          <span>USER LOGIN</span>
          <button type="reset" onclick="popup('login-popup')">X</button>
        </h2>
        <input type="text" placeholder="E-mail or Username" name="email_username" value="<?php echo $id ?>">
        <input type="password" placeholder="Password" name="password" value="<?php echo $pass ?>">
        <label>
          <input type="checkbox" name="remember_me">Remember me
        </label>
        <button type="submit" class="login-btn" name="login">LOGIN</button>
      </form>
      <div class="forgot-btn">
        <button type="button" onclick="forgotPopup()">Forgot Password ?</button>
      </div>
    </div>
  </div>

  <div class="popup-container" id="register-popup">
    <div class="register popup">
      <form method="POST" action="login_register.php">
        <h2>
          <span>USER REGISTER</span>
          <button type="reset" onclick="popup('register-popup')">X</button>
        </h2>
        <input type="text" placeholder="Full Name" name="fullname">
        <input type="text" placeholder="Username" name="username">
        <input type="email" placeholder="E-mail" name="email">
        <input type="password" placeholder="Password" name="password">
        <button type="submit" class="register-btn" name="register">REGISTER</button>
      </form>
    </div>
  </div>

  
  <div class="popup-container" id="forgot-popup">
    <div class="forgot popup">
      <form method="POST" action="forgotpassword.php">
        <h2>
          <span>RESET PASSWORD</span>
          <button type="reset" onclick="popup('forgot-popup')">X</button>
        </h2>
        <input type="text" placeholder="E-mail" name="email"> 
        <button type="submit" class="reset-btn" name="send-reset-link">SEND LINK</button>
      </form>
    </div>
  </div>

<?php
 if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
 {
   echo "<h1 style='text-align: center; margin-top: 200px'> WELCOME TO THIS WEBSITE - $_SESSION[username]</h1>";
 }
?>

   
  <script>
    function popup(popup_name)
    {
      get_popup=document.getElementById(popup_name);
      if(get_popup.style.display=="flex")
      {
        get_popup.style.display="none";
      }
      else
      {
        get_popup.style.display="flex";
      }
    }
    function forgotPopup(){
      document.getElementById('login-popup').style.display="none";
      document.getElementById('forgot-popup').style.display="flex";

    }
  </script>
</body>
</html>