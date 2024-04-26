<?php
session_start();

if(isset($_SESSION['cart'])){
    $cart="";
    foreach($_SESSION['cart'] as $item){
        $cart = $cart . $item . ";";
    }
    setcookie($_SESSION['id'], $cart , time() + (86400 * 30), "/");
}

session_destroy();
header("Location: ../index.php");
?>