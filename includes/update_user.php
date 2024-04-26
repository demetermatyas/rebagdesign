<?php
session_start();
    include 'connect_db.php';

    
    $sql="SELECT * FROM `users` WHERE `id`=" . $_GET['id'];
   
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
    }else{
        echo "Nincs rekord!";
    }

    $conn->close();

    $_SESSION['uid'] = $row[0];
    $_SESSION['uname'] = $row[1];
    $_SESSION['email'] = $row[3];
    $_SESSION['fullname'] = $row[4];

    header("Location: ../index.php?form=update&page=list_user&link=admin_link");
   
?>