<?php
session_start();
if($_SESSION['rank'] == 9){
    if(isset($_GET['id'])) {
        $order_id = $_GET['id'];
        
        include 'connect_db.php';

        $sql = "UPDATE `orders` SET `ocondition`='DONE' WHERE `id`= $order_id";
        mysqli_query($conn, $sql);

        $conn->close();

        header("Location: ../index.php?form=&page=order_page&link=");
    } else {
        header("Location: ../index.php?form=&page=order_page&link=");
    }
} else {
    header("Location: ../pages/no_permission.php");
}
?>
