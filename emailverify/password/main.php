
<?php
$db=mysqli_connect('localhost','root','') or
die('unable to connect.check your connection paramrteres.');
mysqli_select_db($db,'password_manager') or die(mysqli_error($db));
$b=$_POST["website"];
$c=$_POST["username"];
$d=$_POST["password"];
 echo "select the item:".$b. "<br> title:".$c. "<br>price:".$d. ".";
 $qr = "INSERT INTO `storage`(`website`, `username`, `password`) VALUES ('".$b."','".$c."','".$d."')";
mysqli_query($db,$qr) or die('error in update database');
 ?>