<?php
session_start();
    include 'connect_db.php';

    
    $sql="SELECT * FROM `products` WHERE `id`=" . $_GET['id'];
   
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
    }else{
        echo "Nincs rekord!";
    }

    $conn->close();

    $_SESSION['id'] = $row[0];
    $_SESSION['pbrand'] = $row[1];
    $_SESSION['pimage'] = $row[2];
    $_SESSION['ptype'] = $row[3];
    $_SESSION['pprice'] = $row[4];

    header("Location: ../index.php?form=update_product&page=list_product&link=admin_link");
   
?>