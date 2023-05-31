<?php
session_start();
$event = "";
$day = "";
$time = "";

$conn = mysqli_connect('localhost','root','','user');

// If the connection did not work, display an error message
if (!$conn) 
{
    echo 'Error Code: ' . mysqli_connect_errno() . '<br>';
    echo 'Error Message: ' . mysqli_connect_error() . '<br>';
    exit;
}

$query_monday = 'SELECT event,time,day
FROM schedule
WHERE day = "monday"
ORDER BY time';
$result_monday = mysqli_query($conn, $query_monday);

$query_tuesday = 'SELECT event,time,day
FROM schedule
WHERE day = "tuesday"
ORDER BY time';
$result_tuesday = mysqli_query($conn, $query_tuesday);

$query_wednesday = 'SELECT event,time,day
FROM schedule
WHERE day = "wednesday"
ORDER BY time';
$result_wednesday = mysqli_query($conn, $query_wednesday);

$query_thursday = 'SELECT event,time,day
FROM schedule
WHERE day = "thursday"
ORDER BY time';
$result_thursday = mysqli_query($conn, $query_thursday);

$query_friday = 'SELECT event,time,day
FROM schedule
WHERE day = "friday"
ORDER BY time';
$result_friday = mysqli_query($conn, $query_friday);

$query_saturday = 'SELECT event,time,day
FROM schedule
WHERE day = "saturday"
ORDER BY time';
$result_saturday = mysqli_query($conn, $query_saturday);

$query_sunday = 'SELECT event,time,day
FROM schedule
WHERE day = "sunday"
ORDER BY time';
$result_sunday = mysqli_query($conn, $query_sunday);


if($_SERVER['REQUEST_METHOD'] === "POST"&& isset($_POST['btn_submit'])){
$event = $_POST['event'];
$day = $_POST['day'];
$time = $_POST['time'];
}

if($_SERVER['REQUEST_METHOD'] === "GET"&& isset($_GET['btn_del'])){
    $del='DELETE FROM schedule';
    $result_del = mysqli_query($conn, $del);
    header("Location: wp.php");
    die();
}


?>


<!DOCTYPE html>
<html lang="en-US">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="wp1.css"   >
        <title>weekly planner</title>
    </head>
    <body style="background-color: #e2da6b88;">
     <div class="div1">
        <h1 class="Logo">Weekly Planner</h1>
        <button type="button"class="item-addtask" onclick="openPopup()">Add</button><br><br>
        <form method="get">
        <input class="item-addtask" type="submit" name = "btn_del" id="btn_del" value="DELETE ALL">
        </form>
    </div>  


    <div class="div2">
        <div class="monday">
           <div class="header-monday">Monday</div>
           <?php while($record = mysqli_fetch_assoc($result_monday)){
                 echo $record['event'].'<br>';
                  echo $record['time'].'<br>';
                  echo '====================<br>';}?>

        </div>
        <div class="tuesday">
            <div class="header-tuesday">Tuesday</div>
            <?php while($record = mysqli_fetch_assoc($result_tuesday)){
                echo $record['event'].'<br>';
                echo $record['time'].'<br>';
                echo '====================<br>';}?>

         </div>
         <div class="wendesday">
            <div class="header-wendesday">Wednesday</div>
            <?php while($record = mysqli_fetch_assoc($result_wednesday)){
                echo $record['event'].'<br>';
                echo $record['time'].'<br>';
                echo '====================<br>';}?> 

         </div>
         <div class="thursday">
            <div class="header-thursday">Thursday</div>
            <?php while($record = mysqli_fetch_assoc($result_thursday)){
                echo $record['event'].'<br>';
                echo $record['time'].'<br>';
                echo '====================<br>';}?>

         </div>
         <div class="friday">
            <div class="header-friday">Friday</div>
            <?php while($record = mysqli_fetch_assoc($result_friday)){
                echo $record['event'].'<br>';
                echo $record['time'].'<br>';
                echo '====================<br>';}?>

         </div>
         <div class="saturday">
            <div class="header-saturday">Saturday</div> 
            <?php while($record = mysqli_fetch_assoc($result_saturday)){
                echo $record['event'].'<br>';
                echo $record['time'].'<br>';
                echo '====================<br>';}?>

         </div>
         <div class="sunday">
            <div class="header-sunday">Sunday</div> 
            <?php while($record = mysqli_fetch_assoc($result_sunday)){
                echo $record['event'].'<br>';
                echo $record['time'].'<br>';
                echo '====================<br>';}?>

        </div>
    </div>

    
    <div3 class="popup" id="popup">
        <form method = "post" action="AddEvent.php">
            <label for="event">Event:</label>
            <input type="text" id="event" name="event"required>
            <input type="button" value="X" onclick="closePopup()">
            <br>
            <label for="day">Day:</label>
            <select name="day" id="day"required>
                <option name="monday" value="monday">Monday</option>
                <option name="tuesday" value="tuesday">Tuesday</option>
                <option name="wendesday" value="wednesday">Wednesday</option>
                <option name="thursday" value="thursday">Thursday</option>
                <option name="friday" value="friday">Friday</option>
                <option name="saturday" value="saturday">Saturday</option>
                <option name="sunday" value="sunday">Sunday</option>
            </select>
            <br>
            <label for="time">Time:</label>
            <input type="time" id="time" name="time"required>
            <br>
            <br>
            <input class="closepopup" type="submit" name = "btn_submit" id="btn_submit" value="SUBMIT">
           </form>
    </div>


    <script>
        
            let popup = document.getElementById("popup");
            function openPopup(){
                popup.classList.add("open-popup");

            }
            function closePopup(){
                popup.classList.remove("open-popup");

            }
    </script>

    
    </body>
</html>