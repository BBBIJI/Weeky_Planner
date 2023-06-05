<?php
$Event = $_POST['event'];
$Day = $_POST['day'];
$Time = $_POST['time'];

//Make database connection
$conn = new mysqli('localhost','root','','user');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into schedule(Event, Day, Time) values(?,?,?)");
    $stmt->bind_param("sss",$Event,$Day,$Time);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header("Location: t.php");
    die();
}
?>
