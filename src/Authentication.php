<?php
include('connection.php');
$Username = $_POST['Username'];
$Password = $_POST['Password'];

// to prevent sqli injection
$Username = stripcslashes($Username);
$Password = stripcslashes($Password);
$Username = mysqli_real_escape_string($con,$Username);
$Password = mysqli_real_escape_string($con,$Password);

//remember to study this part
$sql = "select *from login where username = '$Username' and password = '$Password'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

if($count == 1){
    header("Location: t.php");
    die();
}else{
    echo "<h1><center>Login Failed</center></h1>";
}
?>

