<?php
$conn=mysqli_connect("Localhost","root","","userinfo12");
if(!$conn){
    die("Connetion Error".mysqli_connect_error());
}
return $conn;
?>
