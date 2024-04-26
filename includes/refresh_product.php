<?php
session_start();
if($_SESSION['rank'] == 9){
   include 'connect_db.php';

   $pbrand = $_POST['pbrand'];
   $imagelocation = $_POST['imagelocation'];
   $ptype = $_POST['ptype'];
   $pprice = $_POST['pprice'];
   $discount = $_POST['discount'];

   $sql="UPDATE `products` SET `pbrand`='$pbrand',`imagelocation`='$imagelocation',`ptype`='$ptype', `pprice`='$pprice', `discount`='$discount' WHERE `id`= " . $_SESSION['id'];

   mysqli_query($conn, $sql);

   $conn->close();
   
   header("Location: ../index.php?form=update_product&page=list_product&link=admin_link");
}
else{
   header("Location: ../pages/no_permission.php");
}
?>