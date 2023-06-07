<?php
$Username = $_POST['Username'];
$Password = $_POST['Password'];

//Make database connection
$conn = new mysqli('localhost','root','','user');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into login(Username, Password) values(?,?)");
    $stmt->bind_param("ss",$Username,$Password);
    $stmt->execute();
    echo "registration success";
    $stmt->close();
    $conn->close();
    
}
?>

