<!DOCTYPE html>
<html lang="hu">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='stylesheet' type='text/css' href='css/index.css'>
</head>

<body>
<h1>Termékek:</h1>
<h2>Kis vivi</h2>
<?php
    include './includes/connect_db.php';

    $sql = "SELECT * FROM `products` WHERE `pbrand` = 'Kis vivi'";
    $result = mysqli_query($conn, $sql);
  
    if(mysqli_num_rows($result) > 0){
     while($row = mysqli_fetch_array($result)){
        $number = $row[4];
        $formatted_number = number_format($number, 0, ',', '.');
         echo "
         <div class='card bg-danger' style='width: 15rem; float:left; margin:2px; text-align: center;'>
             <div class='card-body'>
             <p class='card-title'>$row[1]</p>
             <img src='./img/logokep.png' alt='image' style='width: 50%; height: auto'>
             <p class='card-title'>$row[3]</p>
             <p class='card-text'>$formatted_number Ft</p>
             <p class='card-text'>mennyiség: $row[5] db</p>
             <p style='text-align:center;'><a href='includes/buy_list.php?id=$row[0]' class='btn btn-primary'>Kosárba</a></p>
             </div>
         </div>
         ";
     }
    }else{
     echo "Nincs rekord!";
    }
    
    $conn->close();
?>

</body>
</html>
