<?php
session_start();
if($_SESSION['rank'] == 9){
   include 'connect_db.php';

   $uname = $_POST['uname'];
   $email = $_POST['email'];
   $fullname = $_POST['fullname'];

   $sql="UPDATE `users` SET `uname`='$uname',`umail`='$email',`ufullname`='$fullname' WHERE `id`= " . $_SESSION['uid'];

   mysqli_query($conn, $sql);

   $conn->close();
   
   header("Location: ../index.php?form=update&page=list_user&link=admin_link");
}
else{
   header("Location: ../pages/no_permission.php");
}
?>