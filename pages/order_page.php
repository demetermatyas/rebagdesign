<h1>Feldolgozatlan rendelések</h1>


<?php
if(isset($_SESSION['id']) && $_SESSION['rank'] == 9 && $_SESSION['ban'] == 0){
    include './includes/connect_db.php';

    $sql = "SELECT * FROM `orders`";
 
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            if($row[5] != "DONE" && $row[5] != "FAILED"){
                $number = $row[4];
                $formatted_number = number_format($number, 0, ',', '.');
                
                $sql1 = "SELECT * FROM `users` WHERE `id` = $row[2]";
                $felhasz_result = mysqli_query($conn, $sql1);
                $nev = "Nincsen ilyen felhasználó!";

                if(mysqli_num_rows($felhasz_result) > 0){
                    $sor = mysqli_fetch_array($felhasz_result);
                    $nev = $sor[1];
                    $email = $sor[3];
                }

                echo "
                <div class='card bg-warning' float:left; margin:2px; text-align: center;'>
                    <div class='card-body'>
                        <p>Rendelés ideje: $row[1]  |  Rendelés ID: $row[0]</p>
                        <p>Rendelő ID: $row[2]  |  Felhasználó nén: $nev  |  e-mail cím: $email</p>
                        <ul>
                            <p>Termékek:<br>$row[3]</p>
                            <p>Végösszeg: $formatted_number Ft</p>
                            <p>Állapot: $row[5]</p>
                            <ul> 
                                <a href='#' class='btn btn-warning'>Egyeztetés</a>
                                <a href='#' class='btn btn-success'>Csomag feladva</a>
                            </ul>
                            <p></p>
                            <ul>
                                <a href='includes/add_archiving.php?id=$row[0]' class='btn btn-primary'>Archiválás</a>
                                <a href='includes/delete_order.php?id=$row[0]' class='btn btn-danger'>Rendelés visszavonás</a>
                            </ul>
                        </ul>
                    </div>
                </div>
                ";
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
