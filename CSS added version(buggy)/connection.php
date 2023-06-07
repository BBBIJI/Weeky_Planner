<?php      
    $host = "localhost";  
    $User = "root";  
    $Pass = '';  
    $db_name = "user";  
      
    $con = mysqli_connect($host, $User,$Pass, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }
?>