<h1>Választott termékek</h1>

<?php

if(empty($_SESSION['cart'])) {
    echo "Üres a kosár";
    $_SESSION['total'] = 0;

} else {
    for($i = 0; $i < count($_SESSION['cart']); $i++) {
        echo "<li>" . $_SESSION['cart'][$i] . "<a href='#' class='btn'><ion-icon name='bag-remove-outline'></ion-icon> Levétel</a>" . "</li>";
    }
}


$formatted_number = number_format($_SESSION['total'], 0, ',', '.');
echo "<br><p>Összesen:" . $formatted_number . "Ft</p><br>";

echo "<p>Kosár kiüritése: <a href='includes/delete_cart.php'><img src='./img/trash.png' style='width:20px'></a></p>
<p style='text-align:left;'><a href='includes/add_order.php' class='btn btn-primary'>Megrendelés</a></p>
<p style='text-align:left;'><a href='includes/add_local.php' class='btn btn-primary'>Helyszíni átvétel</a></p>";

?>