<!DOCTYPE html>
<html lang="hu">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='stylesheet' type='text/css' href='css/index.css'>
</head>

<ul class="nav navbar-nav" style="margin-left: 70px">
        <li><a href="index.php?form=&page=start_page&link=user_link">Kezdőlap</a></li>
        <li><a href="index.php?form=&page=buy_product&link=filter_link">Webshop</a></li>
        <li>
                <a href="index.php?form=&page=shopping_page">
                        <img src="./img/basket.png" style="width: 25px;">
                        <sup>
                                <?php
                                if(isset($_SESSION['cart']))
                                {
                                       echo count($_SESSION['cart']);
                                }
                                ?>
                        </sup>
                </a> 
        </li>
</ul>
<ul class="nav navbar-nav navbar-right">
        <li><a href="index.php?form=&page=profil_page">Profil</a></li>
        <li><a href="includes/logout_user.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
</ul>