<?php
$db=mysqli_connect('localhost','root','')or
    die('unable to connect.check your connection paramrteres.');
    mysqli_select_db($db,'testing') or die(mysqli_error($db));
?>