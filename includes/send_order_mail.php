<?php

$products="";
for($i=0; $i<count($_SESSION['cart']); $i++){
	$products .= "<h3>" . $_SESSION['cart'][$i] . "</h3>";
}
$to = $_SESSION['email'];
$subject = 'Megrendelés visszaigazolás';
$content = 'Köszönjük megrendelésed ' . $_SESSION['name'] . "<p> A rendelt termékeid:</p> $products";
$headers = "From: admin\r\n";
$headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

if (mail($to, $subject, $content, $headers))
{
	echo "Success !!!";
} 
else 
{
   	echo "ERROR";
}
?>