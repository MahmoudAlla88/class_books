<?php

$email=$_POST["email"];
$pa=$_POST["pas"];

$db=mysqli_connect("localhost","root");

mysqli_select_db($db,"login");


$r=mysqli_query($db,"SELECT * FROM register WHERE email='$email' AND password='$pa'");

$check =mysqli_fetch_array($r);
mysqli_close($db);
session_start();
if(isset($check))
header("location:home.html");
else
    echo '<script>alert("password or name is incorrect")</script>';
?>
