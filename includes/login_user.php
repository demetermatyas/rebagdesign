<?php
session_start();
    include 'connect_db.php';

    $uname = $_POST['uname'];
    $upass = $_POST['pwd'];

    $sql="SELECT * FROM `users` WHERE `uname`='$uname'";
 

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    if(password_verify($upass,$row[2])){
        $_SESSION['id'] =  $row[0];
        $_SESSION['name'] =  $row[1];
        $_SESSION['email'] = $row[3];
        $_SESSION['rank'] =  $row[5];
        $_SESSION['ban'] =  $row[6];

        $_SESSION['cart'] = array();

        if(isset($_COOKIE[$_SESSION['id']])){
            $split = explode(";" , $_COOKIE[$_SESSION['id']]);

            foreach($split as $item){
                array_push($_SESSION['cart'], $item);
            }

            array_pop($_SESSION['cart']);
        }

        $date = date("Y-m-d H:i:sa");

        $logtime = "UPDATE `users` SET `logtime`= '$date' WHERE `id`= $row[0]";
        mysqli_query($conn,$logtime);

        switch($_SESSION['rank']){
            
            case 1:{
                header("Location: ../index.php?form=&page=start_page");
                break;
            }

            case 2:{
                header("Location: ../index.php?form=&page=start_page");
                break;
            }
            
            case 9:{
                header("Location: ../index.php?form=&page=admin_page&link=admin_link");
                break;
            }

            default: {
                header("Location: ../index.php?form=&page=buy_product");
                break;
            }
        }
    
    }
    else{
        header("Location: ../index.php");
    }

   
?>