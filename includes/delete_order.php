<?php
session_start();
if($_SESSION['rank'] == 9){
    if(isset($_GET['id'])) {
        $order_id = $_GET['id'];
        
        include 'connect_db.php';

        // termékek visszaállítása
        $sql1 = "SELECT * FROM `products`";
        $result = mysqli_query($conn, $sql1);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                if($row[5] == $order_id){
                    $item = 1;
                    $id = $row[0];
                    $sql1 = "UPDATE `products` SET `item`='$item' WHERE `id`= $id";
                    mysqli_query($conn, $sql1);
                }
            }
        }
    
        // rendelés kivonása hibásan
        $sql = "UPDATE `orders` SET `ocondition`='FAILED' WHERE `id`= $order_id";
        mysqli_query($conn, $sql);
    
        $conn->close();
    }
   header("Location: ../index.php?form=&page=order_page&link=");
}
else{
header("Location: ../index.php?form=&page=order_page&link=");
}
?>