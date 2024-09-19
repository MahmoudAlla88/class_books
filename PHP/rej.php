<?php





$name=$_POST["n"];

$email=$_POST["e"];
$db=mysqli_connect("localhost","root","","login");
$pass=$_POST["p"];
$conpass=$_POST["cp"];
$query="select email from register where email='$email'";
$result=mysqli_query($db,$query);
$a=mysqli_fetch_assoc($result);
if(isset($a)){
    echo "email has been used";
}
else
{
    $q="INSERT INTO register (name, email, Password, confirm_password) VALUES ('$name', '$email', '$pass', '$conpass')";
    mysqli_query($db,$q);
    echo "successfull";

}


mysqli_close($db); 

?>







































////
?>
