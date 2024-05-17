<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db = "TODO_APP";
$conn = mysqli_connect($servername, $username, $password, $db);
if (!$conn) {
    echo "connection failed";
} else {
    echo "connection established";
}

$email=$_POST['emailaddress'];
$password=$_POST['password'];
$check_user_query="SELECT * FROM `signup` WHERE `email` ='$email' AND `password` ='$password'";
$result=mysqli_query($conn,$check_user_query);

if(mysqli_num_rows($result)>0){
    $_SESSION['email']=$email;
    $_SESSION['password']=$password;
    header("Location:task_manager2.php");
    exit();
}
else{
    header("Location:landingpage.php?login_error=true");
    exit();
}
?>