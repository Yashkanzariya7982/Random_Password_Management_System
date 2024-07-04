<?php 
 require("connection.php");

 use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


function sendMail($email,$reset_token)
{
    require ("PHPMailer/PHPMailer.php");
    require ("PHPMailer/SMTP.php");
    require ("PHPMailer/Exception.php");

    $mail = new PHPMailer(true);
    try {
  
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = '12102040701209@mbit.edu.in';                     //SMTP username
        $mail->Password   = 'Y@SH@2612';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('12102040701209@mbit.edu.in', 'YK WEB');
        $mail->addAddress($email);     //Add a recipient
      
        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = 'password reset link from GROUP-5';
        $mail->Body    =  "We got a request from you to reset your password! <br>
             Click the link below: <br>
             <a href='http://localhost/emailverify/updatepassword.php?email=$email&reset_token=$reset_token'>Reset Password</a>";
    
        $mail->send();
        return true;
       } catch (Exception $e){
        return false;
    }
}


 if(isset($_POST['send-reset-link']))
 {
    $query="SELECT * FROM `registered_users` WHERE `email`='$_POST[email]'";
    $result=mysqli_query($db,$query);
    if($result)
    {
      if(mysqli_num_rows($result)==1)
      {
         $reset_token=bin2hex(random_bytes(16));
         date_default_timezone_set('Asia/kolkata');
         $date=date("Y-m-d");
         $query="UPDATE `registered_users` SET `resettoken`='$reset_token',`resettokenexpre`='$date' WHERE `email`='$_POST[email]'";
         if(mysqli_query($db,$query) && sendMail($_POST['email'],$reset_token))
         {
            echo"
            <script>
            alert('Password Reset Link Send to Mail');
            window.location.href='index.php';
            </script>
          ";
         }
         else{
            echo"
          <script>
          alert('Server Down! Try Again Leter');
          window.location.href='index.php';
          </script>
        ";
         }
      }
      else{
        echo"
          <script>
          alert(' Email Not Found');
          window.location.href='index.php';
          </script>
        ";
      }
    }
    else{
        echo"
          <script>
          alert('cannot run query');
          window.location.href='index.php';
          </script>
        ";

    }
 }
?>