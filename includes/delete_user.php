<?php
session_start();
if($_SESSION['rank'] == 9){
    include 'connect_db.php';

    $deluser = $_GET['id'];

    $sql="DELETE FROM `users` WHERE `id`= $deluser";
    
    mysqli_query($conn, $sql);
    
    $conn->close();

    header("Location: ../index.php?form=register&page=list_user&link=admin_link");
}
else{
    header("Location: ../pages/no_permission.php");
}
?>