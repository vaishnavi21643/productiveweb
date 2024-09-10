<?php
$strconn=mysqli_connect("localhost","root","","project");
if(!$strconn)
    echo "Connection failed".mysqli_connect_error();
else{}



$id=$_GET["id"];
$deletequery="DELETE FROM `notes` WHERE `sno`=$id";
$res=mysqli_query($strconn,$deletequery);
header("location:./index.php");




?>