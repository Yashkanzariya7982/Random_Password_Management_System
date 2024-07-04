<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body class="text-center">
<?php
$db=mysqli_connect('localhost','root','') or
die('unable to connect.check your connection paramrteres.');
mysqli_select_db($db,'testing') or die(mysqli_error($db));
$a=$_POST["name"];
$b=$_POST["email"];
$c=$_POST["message"];

echo"<h1> Thank You For Visiting....</h1>";
$qr = "INSERT INTO `feedback`(`name`, `email`, `message`) VALUES ('".$a."','".$b."','".$c."')";
mysqli_query($db,$qr) or die('error in update database');
 ?>
</body>
</html>