<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' href='css/index.css'>
</head>

<body>



<div style="width: 100%; clear: both;">
<h1>Ezek a még shopban lévő termékek</h1>

<?php
if(isset($_SESSION['id']) && $_SESSION['rank'] == 9 && $_SESSION['ban'] == 0){
    include './includes/connect_db.php';

    $sql = "SELECT * FROM `products`";
 
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){   //ezek a még shopban lévő termékek
        $number = $row[4];
        $formatted_number = number_format($number, 0, ',', '.');
        $discount_number = 0;

        $kedvezmeny = 20;

        if($row[5] == 1){
            if($row[7] == 1){
                $number = $number * ((1/100) * (100-$kedvezmeny)); // kedvezmény
                $number = round($number, -1); // 10-re kerekítés
                $discount_number = number_format($number, 0, ',', '.');

                echo "
                <script langauge='javascript'>
        
                function deleteProductChoice(uid)
                {
                    answer=confirm('Biztos hogy törlöd a terméket?');
        
                    if(answer != 0)
                    {
                        location = 'includes/delete_product.php?id='+uid; 
                    }
                }
        
                </script>
        
                <div class='card bg-warning' style='width: 15rem; float:left; margin:2px;; text-align: center;'>
                    <div class='card-body'>
                    <p class='card-title'>$row[1]</p>
                    <img src=$row[8] alt='image' style='width: 100px; height: 100px'>
                    <p class='card-title'>$row[3]</p>
                    <p class='card-text'  style='color: red; font-size: 14px;'><s>$formatted_number Ft</s></p>
                    <p class='card-text' style='font-size: 20px;'>$discount_number Ft</p>
                    <p class='card-title'>$row[5]</p>
                    <p style='text-align:center;'><a href='#' class='btn btn-danger' onclick='deleteProductChoice($row[0]); return false;'>Töröl</a></p>
                    <p style='text-align:center;'><a href='includes/update_product.php?id=$row[0]' class='btn btn-primary'>Módosít</a></p>
                    </div>
                </div>
                ";
            }

            if($row[7] == 0){
                $discount_number = NULL;
                echo "
                <script langauge='javascript'>
        
                function deleteProductChoice(uid)
                {
                    answer=confirm('Biztos hogy törlöd a terméket?');
        
                    if(answer != 0)
                    {
                        location = 'includes/delete_product.php?id='+uid; 
                    }
                }
        
                </script>
        
                <div class='card bg-warning' style='width: 15rem; float:left; margin:2px;; text-align: center;'>
                    <div class='card-body'>
                    <p class='card-title'>$row[1]</p>
                    <img src=$row[8] alt='image' style='width: 100px; height: 100px'>
                    <p class='card-title'>$row[3]</p>
                    <p class='card-text' style='font-size: 20px;'>$formatted_number Ft</p><br>
                    <p class='card-text'>$discount_number</p>
                    <p class='card-title'>$row[5]</p>
                    <p style='text-align:center;'><a href='#' class='btn btn-danger' onclick='deleteProductChoice($row[0]); return false;'>Töröl</a></p>
                    <p style='text-align:center;'><a href='includes/update_product.php?id=$row[0]' class='btn btn-primary'>Módosít</a></p>
                    </div>
                </div>
                ";
            }
        }
    }
    }else{
     echo "Nincs rekord!";
    }
    
    $conn->close();
}
else{
    header("Location: pages/no_permission.php");
}
 
?>
</div>










<div style="width: 100%; clear: both;">
<h1>Ezek az eladott termékek:</h1>


<?php
if(isset($_SESSION['id']) && $_SESSION['rank'] == 9 && $_SESSION['ban'] == 0){
    include './includes/connect_db.php';

    $sql = "SELECT * FROM `products`";
 
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){   //ezek az eladot termékek
        $number = $row[4];
        $formatted_number = number_format($number, 0, ',', '.');
        $discount_number = 0;

        $kedvezmeny = 20;

        if($row[5] > 2){
            if($row[7] == 1){
                $number = $number * ((1/100) * (100-$kedvezmeny)); // kedvezmény
                $number = round($number, -1); // 10-re kerekítés
                $discount_number = number_format($number, 0, ',', '.');

                echo "
                <script langauge='javascript'>
        
                function deleteProductChoice(uid)
                {
                    answer=confirm('Biztos hogy törlöd a terméket?');
        
                    if(answer != 0)
                    {
                        location = 'includes/delete_product.php?id='+uid; 
                    }
                }
        
                </script>
        
                <div class='card' style='width: 15rem; float:left; margin:2px;; text-align: center; background-color: grey;'>
                    <div class='card-body'>
                    <p class='card-title'>$row[1]</p>
                    <img src=$row[8] alt='image' style='width: 100px; height: 100px'>
                    <p class='card-title'>$row[3]</p>
                    <p class='card-text'  style='color: red; font-size: 14px;'><s>$formatted_number Ft</s></p>
                    <p class='card-text' style='font-size: 20px;'>$discount_number Ft</p>
                    <p style='text-align:center;'><a href='#' class='btn btn-danger'>Archiválás</a></p>
                    <p class='card-title'>$row[5]</p>
                    </div>
                </div>
                ";
            }

            if($row[7] == 0){
                $discount_number = NULL;
                echo "
                <script langauge='javascript'>
        
                function deleteProductChoice(uid)
                {
                    answer=confirm('Biztos hogy törlöd a terméket?');
        
                    if(answer != 0)
                    {
                        location = 'includes/delete_product.php?id='+uid; 
                    }
                }
        
                </script>
        
                <div class='card' style='width: 15rem; float:left; margin:2px;; text-align: center; background-color: grey;'>
                    <div class='card-body'>
                    <p class='card-title'>$row[1]</p>
                    <img src=$row[8] alt='image' style='width: 100px; height: 100px'>
                    <p class='card-title'>$row[3]</p>
                    <p class='card-text' style='font-size: 20px;'>$formatted_number Ft</p><br>
                    <p class='card-text'>$discount_number</p>
                    <p style='text-align:center;'><a href='#' class='btn btn-danger'>Archiválás</a></p>
                    <p class='card-title'>$row[5]</p>
                    </div>
                </div>
                ";
            }
        }
    }
    }else{
     echo "Nincs rekord!";
    }
    
    $conn->close();
}
else{
    header("Location: pages/no_permission.php");
}
 
?>
</div>

</body>
</html>