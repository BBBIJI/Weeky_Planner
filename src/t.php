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
    header("Location: t.php");
    die();
}

if($_SERVER['REQUEST_METHOD'] === "GET"&& isset($_GET['btn_del_single'])){
    $del_single = $_GET['del_input'];
    $deletesingle="DELETE FROM schedule WHERE schedule.ID = $del_single";
    $result_del_single = mysqli_query($conn, $deletesingle);
    header("Location: t.php");
    die();
}
?>



<!DOCTYPE html>

<html lang="en-US"> 
 


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="t1.css">
</head>

<body>
  <div class="container" id="blur" >
    <div class="div1">
      <div class="column">
        <h1 class="Logo">Weekly Planner</h1>
      </div>
      <div class="colomn2" >
        <button type="button" class="delete-item"name = "btn_del" id="btn_del" value="DELETE ALL" onclick="deleteall()">
          <p class="deleteitem">delete all</p>
        </button>
        <button type="button" class="item-addtask" href="#" onclick="toggleBlur()">
          <p class="additem">add</p>
        </button>
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
        <div class="wednesday">
          <div class="header-wednesday">Wednesday</div>
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
  <div class="popup" id="popup">
    <form>
      <label for="event">Event:</label>
      <input type="text" id="event" name="event" required>
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
      <button class="closepopup" type="submit">submit</button>
      <button class="closepopup" type="submit" onclick="closePopup()">X</button>
    </form>
  </div>
  <script type="text/javascript">
    function toggleBlur() {
      var blur= document.getElementById('blur');
      blur.classList.toggle('active');
      var popup = document.getElementById('popup');
      popup.classList.toggle('active');
    }
            
      
          

    
    
  </script>
</body>

</html>
