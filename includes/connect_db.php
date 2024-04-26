<?php
     $srvname = "localhost";
     $username = "root";
     $dbpassword="";
     $dbname = "webshop";
     
     $conn = mysqli_connect($srvname,  $username,  $dbpassword, $dbname);
 
     if($conn->connect_error){
         die("Hiba a csatlakozásban!");
     }
?>