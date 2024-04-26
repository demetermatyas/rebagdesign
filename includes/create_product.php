<?php

session_start();
if($_SESSION['rank'] == 9){
   include 'connect_db.php';
   
   $pbrand = $_POST['pbrand'];
   $imagelocation = $_POST['imagelocation'];
   $ptype = $_POST['ptype'];
   $pprice = $_POST['pprice'];
   $time = date('y.m.d h:i:s');

   $sql="INSERT INTO `products` (`pbrand`, `imagelocation`, `ptype`, `pprice`, `time`) VALUES ('$pbrand', '$imagelocation', '$ptype', '$pprice', '$time')";

   mysqli_query($conn, $sql);

   $conn->close();
   
   header("Location: ../index.php?form=create_form_product&page=uploade_product&link=admin_link");
}
else{
   header("Location: ../pages/no_permission.php");
}
?>
