<?php
session_start();
    include 'connect_db.php';

    $uname=$_POST['uname'];
    $upass=$_POST['pwd'];
    $hashed_pass = password_hash($upass, PASSWORD_DEFAULT);
    $uemail=$_POST['email'];
    $ufullname=$_POST['fullname'];
  
    $sql ="INSERT INTO `users`(`uname`, `upass`, `umail`, `ufullname`) VALUES ('$uname','$hashed_pass','$uemail','$ufullname')";
    
    mysqli_query($conn, $sql);
    
    $conn->close();

    switch($_SESSION['rank']){

        case 0:{
            header("Location: ../index.php?form=login&page=user_page");
            break;
        }

        case 1:{
            header("Location: ../index.php?form=register&page=user_page");
            break;
        }

        case 2:{
            header("Location: ../index.php?form=register&page=user_page");
            break;
        }


        case 9:{
            header("Location: ../index.php?form=register&page=list_user&link=admin_link");
            break;
        }

        default :{

            break;
        }
        
    }
   
  
?>