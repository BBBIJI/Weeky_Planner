
<?php
session_start();
$event = "";
$day = "";
$time = "";
$del_single = "";

$conn = mysqli_connect('localhost','root','','user');

// If the connection did not work, display an error message
if (!$conn) 
{
    echo 'Error Code: ' . mysqli_connect_errno() . '<br>';
    echo 'Error Message: ' . mysqli_connect_error() . '<br>';
    exit;
}

$query_monday = 'SELECT ID,event,time,day
FROM schedule
WHERE day = "monday"
ORDER BY time';
$result_monday = mysqli_query($conn, $query_monday);

$query_tuesday = 'SELECT ID,event,time,day
FROM schedule
WHERE day = "tuesday"
ORDER BY time';
$result_tuesday = mysqli_query($conn, $query_tuesday);

$query_wednesday = 'SELECT ID,event,time,day
FROM schedule
WHERE day = "wednesday"
ORDER BY time';
$result_wednesday = mysqli_query($conn, $query_wednesday);

$query_thursday = 'SELECT ID,event,time,day
FROM schedule
WHERE day = "thursday"
ORDER BY time';
$result_thursday = mysqli_query($conn, $query_thursday);

$query_friday = 'SELECT ID,event,time,day
FROM schedule
WHERE day = "friday"
ORDER BY time';
$result_friday = mysqli_query($conn, $query_friday);

$query_saturday = 'SELECT ID,event,time,day
FROM schedule
WHERE day = "saturday"
ORDER BY time';
$result_saturday = mysqli_query($conn, $query_saturday);

$query_sunday = 'SELECT ID,event,time,day
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

if($_SERVER['REQUEST_METHOD'] === "GET"&& isset($_GET['btn_del_single'])){
    $del_single = $_GET['del_input'];
    $deletesingle="DELETE FROM schedule WHERE schedule.ID = $del_single";
    $result_del_single = mysqli_query($conn, $deletesingle);
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
        <link rel="stylesheet" href="t1.css"   >
        <title>weekly planner</title>
    </head>
    <body>
<div class="container" id="blur">
     <div class="div1">
        <div class="colomn">
        <h1 class="Logo">Weekly Planner</h1>
        </div>
        <div class="colomn2">
        <button type="button"class="item-addtask" href="#" onclick="openPopup()">Add</button><br><br>
        <form method="get">
        <input class="item-addtask" type="submit" name = "btn_del" id="btn_del" value="DELETE ALL"><br><br>
        <input class="item-del_input" type="text" id="del_input" name="del_input">
        <input class="item-addtask" type="submit" name = "btn_del_single" id="btn_del_single" value="DELETE">
        </form>
    </div>  
     </div>


    <div class="div2">
        <div class="monday">
           <div class="header-monday">Monday</div>
           <?php while($record = mysqli_fetch_assoc($result_monday)){
            echo $record['ID'].'<br>';
            echo $record['event'].'<br>';
            echo $record['time'].'<br>';
            echo '====================<br>';}?>
           

        </div>
        <div class="tuesday">
            <div class="header-tuesday">Tuesday</div>
            <?php while($record = mysqli_fetch_assoc($result_monday)){
                echo $record['ID'].'<br>';
                echo $record['event'].'<br>';
                echo $record['time'].'<br>';
                echo '====================<br>';}?>
           

         </div>
         <div class="wendesday">
            <div class="header-wendesday">Wednesday</div>
            <?php while($record = mysqli_fetch_assoc($result_monday)){
                echo $record['ID'].'<br>';
                echo $record['event'].'<br>';
                echo $record['time'].'<br>';
                echo '====================<br>';}?>
             

         </div>
         <div class="thursday">
            <div class="header-thursday">Thursday</div>
            <?php while($record = mysqli_fetch_assoc($result_monday)){
                echo $record['ID'].'<br>';
                echo $record['event'].'<br>';
                echo $record['time'].'<br>';
                echo '====================<br>';}?>
        

         </div>
         <div class="friday">
            <div class="header-friday">Friday</div>
            <?php while($record = mysqli_fetch_assoc($result_monday)){
                echo $record['ID'].'<br>';
                echo $record['event'].'<br>';
                echo $record['time'].'<br>';
                echo '====================<br>';}?>
          

         </div>
         <div class="saturday">
            <div class="header-saturday">Saturday</div> 
            <?php while($record = mysqli_fetch_assoc($result_monday)){
                echo $record['ID'].'<br>';
                echo $record['event'].'<br>';
                echo $record['time'].'<br>';
                echo '====================<br>';}?>
          

         </div>
         <div class="sunday">
            <div class="header-sunday">Sunday</div> 
            <?php while($record = mysqli_fetch_assoc($result_monday)){
                echo $record['ID'].'<br>';
                echo $record['event'].'<br>';
                echo $record['time'].'<br>';
                echo '====================<br>';}?>

        </div>
    </div>
</div>

    
    <div3 class="popup" id="popup">
        <form method = "post" action="AddEvent.php">
            <label for="event">Event:</label>
            <input type="text" id="event" name="event"required>
            
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
            <input type="button" value="X" href="#" onclick="closePopup()">
           </form>
    </div>


    <script>
    
            let popup = document.getElementById("popup");
            function openPopup(){
                popup.classList.add("open-popup");
                var blur= document.getElementById('blur');
                blur.classList.toggle('active');

            }
            function closePopup(){
                popup.classList.remove("open-popup");
                var blur= document.getElementById('blur');
                blur.classList.remove('active');
             

            }
           
    </script>

    
    </body>
</html>

