<?php
    session_start();
    include 'connect_db.php';

    $sql = "SELECT * FROM `products` WHERE id=" . $_GET['id'];
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Nincs rekord!";
    }

    $item = 2;
    $id = $_GET['id']; //inaktivítás 
    $sql = "UPDATE `products` SET `item`='$item' WHERE `id`= $id";
    mysqli_query($conn, $sql);

    

    $conn->close();

    $number = (int)$row['pprice'];
    $kedvezmeny = 20;

    if($row['discount'] == 1){
        $number = $number * ((1/100) * (100-$kedvezmeny)); // kedvezmény
        $number = round($number, -1); // 10-re kerekítés
        $vegeredmeny = number_format($number, 0, ',', '.');
        $_SESSION['total'] +=  (int)$number; //azért $number mert a vegeredményben van pont és törtnek veszi -.-"

    }
    else{
        $vegeredmeny = $number;
        $_SESSION['total'] +=  $vegeredmeny;

    }


 
    $product = sprintf("%s ; %s : %s", $row['pbrand'], $row['ptype'], $vegeredmeny);
    array_push($_SESSION['cart'], $product);



    
 
    header("Location: ../index.php?form=&page=buy_product&link=filter_link");
?>
