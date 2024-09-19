<?php





$email=$_POST["e"];
$pa=$_POST["pas"];

$db=mysqli_connect("localhost","root","","login");

mysqli_select_db($db,"login");

$r=mysqli_query($db,"SELECT * FROM register WHERE email='$email' AND password='$pa'");

$check =mysqli_fetch_array($r);
if($check){
$delet="DELETE FROM register WHERE email='$email' AND password='$pa'";
echo '<script>alert("The account has been deleted successfully")</script>';
mysqli_query($db,$delet);
mysqli_close($db);
}
else
    echo '<script>alert("password or name is incorrect")</script>';
?>