<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body class="text-center">
<?php
$db=mysqli_connect('localhost','root','') or
die('unable to connect.check your connection paramrteres.');
mysqli_select_db($db,'password_manager') or die(mysqli_error($db));
$b=$_POST["website"];
$c=$_POST["username"];
$d=$_POST["password"];
 //echo "select the item:".$b. "<br> title:".$c. "<br>price:".$d. ".";
 $qr = "INSERT INTO `storage`(`website`, `username`, `password`) VALUES ('".$b."','".$c."','".$d."')";
mysqli_query($db,$qr) or die('error in update database');
 ?>
 <div class="text-center"><form action="db.php" method="post">
    <button class="btn">View Stored Password</button>
</form>
<form method="post" action="Feedback.html">
        <button class="btn">Exit</button>
    </form></div>

</body>
</html>