<?php

/////////

if (preg_match("/([[:alnum:]])/", $_POST["n"])) {
    $name = $_POST["n"];
} else {
    print("Invalid name");
    exit;
}

/////////////////////////////////////
$com = ".com";
if (preg_match("/\b([[:alnum:]]+$com)\b/", $_POST["e"])) {
    $email = $_POST["e"];
} else {
    print("Invalid email");
    exit;
}

///////////////////////////////////
if (preg_match("/^([[:alnum:]]).{8,}$/", $_POST["p"])) {
    $pass = $_POST["p"];
} else {
    print("Password Must be greater than 8");
    exit;
}

///////////
if ($_POST['p'] == $_POST['cp']) {
    $conpass = $_POST["cp"];
} else {
    print("Not equal Password");
    exit;
}


$db = mysqli_connect("localhost", "root");




mysqli_select_db($db, "login");


$selectQuery = "SELECT * FROM register WHERE email='$email'";
$result = mysqli_query($db, $selectQuery);




$row = mysqli_fetch_assoc($result);


if ($row) {
   
    $currentName = $row['name'];
    $currentEmail = $row['email'];
    $currentPass = $row['password'];
    $currentConPass = $row['confirm_password'];

    
    $updateQuery ="UPDATE register SET name='$name', email='$email', password='$pass', confirm_password='$conpass'Where email='$currentEmail'";

    if (mysqli_query($db, $updateQuery)) {
        echo "تم تحديث البيانات بنجاح";
    } else {
        echo "حدث خطأ أثناء تحديث البيانات: " . mysqli_error($db);
    }
} else {
    echo "لم يتم العثور على السجل";
}


mysqli_close($db);

?>