<?php
session_start();
    array_splice($_SESSION['cart'], 0);
    $_SESSION['total'] =  NULL;


 //vissza aktiválás 
    include 'connect_db.php';

    $sql = "SELECT * FROM `products`";

    $result = mysqli_query($conn, $sql);
 
    if(mysqli_num_rows($result) > 0){
     while($row = mysqli_fetch_array($result)){
            if($row[5] == 2){
            $item = 1;
            $id = $row[0];
            $sql = "UPDATE `products` SET `item`='$item' WHERE `id`= $id";
            mysqli_query($conn, $sql);
            }
     }
    }
    
    $conn->close();






    header("Location: ../index.php?form=&page=shopping_page");
?>