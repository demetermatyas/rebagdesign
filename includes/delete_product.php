<?php
session_start();
if($_SESSION['rank'] == 9){
    include 'connect_db.php';

    $delproduct = $_GET['id'];

    $sql="DELETE FROM `products` WHERE `id`= $delproduct";
    
    mysqli_query($conn, $sql);
    
    $conn->close();

    header("Location: ../index.php?form=&page=list_product");
}
else{
    header("Location: ../pages/no_permission.php");
}
?>