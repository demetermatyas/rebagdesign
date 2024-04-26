<?php
session_start();
    include 'connect_db.php';
    if(isset($_SESSION['cart'])){
        $cart="";
        foreach($_SESSION['cart'] as $item){
            $cart = $cart . $item . " | ";
        }
    }

    $total = $_SESSION['total'];

    $uid = $_SESSION['id'];
    $sql1="INSERT INTO `orders`(`uid`, `olist`, `total`, `ocondition`) VALUES ($uid, '$cart', $total, 'WIP')";

    $_SESSION['total'] = 0;
    mysqli_query($conn, $sql1);

    $oid = mysqli_insert_id($conn);

    //eltüntetés a listából
            $sql = "SELECT * FROM `products`";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                        if($row[5] == 2){
                        $item = $oid;
                        $id = $row[0];
                        $sql = "UPDATE `products` SET `item`='$item' WHERE `id`= $id";
                        mysqli_query($conn, $sql);
                        }
                }
            }

    $conn->close();

    include 'send_order_mail.php';

    $_SESSION['cart'] = array();
    setcookie($_SESSION['id'], "" , time() - 3600, "/");


    header("Location: ../index.php?form=&page=buy_product&link=");
?>