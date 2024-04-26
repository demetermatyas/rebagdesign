<!DOCTYPE html>
<html lang="hu">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='stylesheet' type='text/css' href='css/index.css'>
        <link rel="stylesheet" href="style.css">
        <style>
            .card{
                width: 30rem;
                border-radius: 15px;
                margin: 4px;
                float:left;
                text-align: center;
            }
            .card-body {
                border-radius: 30px;
                background: #ee9b64;
                -webkit-mask:   radial-gradient(circle 32px at top left, transparent 98%, #000)top left,
                                radial-gradient(circle 32px at top right, transparent 98%, #000)top right,
                                radial-gradient(circle 32px at bottom left, transparent 98%, #000)bottom left,
                                radial-gradient(circle 32px at bottom right, transparent 98%, #000)bottom right;
                -webkit-mask-size: 51% 51%;
                -webkit-mask-repeat: no-repeat;
                transition: 0.25s;
            }

        </style>
</head>

<body>
<h1>Termékek:</h1>
<?php
    include './includes/connect_db.php';

    $sql = "SELECT * FROM `products`";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
     while($row = mysqli_fetch_array($result)){
        $item = $row[5];
        $number = $row[4];
        $formatted_number = number_format($number, 0, ',', '.');

        $kedvezmeny = 20;

        if($item == 1){ //a termék még nincsen a kosárban
            $kep = $row[8];
            if($row[7] == 1){
                $number = $number * ((1/100) * (100-$kedvezmeny)); // kedvezmény
                $number = round($number, -1); // 10-re kerekítés
                $discount_number = number_format($number, 0, ',', '.');
                


                echo "
                <div class='card' title='$row[1] - $row[3]' onmouseover='changeImage(this, true)' onmouseout='changeImage(this, false)'>
                    <div class='card-body' style='position: relative;'>
                        <br>
                        <img src=$kep alt='' style='width: 200px; height: 200px' id='productImage'>
                        <p class='card-title'>$row[1]</p>
                        <p class='card-title'>$row[3]</p>
                        <p class='card-text' style='color: red; font-size: 14px;'><s>$formatted_number Ft</s></p>
                        <p class='card-text' style='font-size: 20px;'>$discount_number Ft</p>
                        <p style='text-align:center;'><a id='buyButton' class='btn btn-primary' onclick='disableButton($item)' href='includes/buy_list.php?id=$row[0]' style='width: 100%;'><ion-icon name='bag-add-outline'></ion-icon> Kosárba</a></p>
                    </div>
                </div>
                ";
            }

            if($row[7] == 0){
                $discount_number = NULL;

                echo "
                <div class='card' title='$row[1] - $row[3]' onmouseover='changeImage(this, true)' onmouseout='changeImage(this, false)'>
                    <div class='card-body'>
                    <br>
                    <img src=$kep alt='' style='width: 200px; height: 200px' id='productImage'>
                    <p class='card-title'>$row[1]</p>
                    <p class='card-title'>$row[3]</p>
                    <p class='card-text' style='font-size: 20px;'>$formatted_number Ft</p><br>
                    <p class='card-text'>$discount_number</p>
                    <p style='text-align:center;'><a id='buyButton' class='btn btn-primary' onclick='disableButton($item)' href='includes/buy_list.php?id=$row[0]'  style='width: 100%;'><ion-icon name='bag-add-outline'></ion-icon> Kosárba</a></p>
                    </div>
                </div>
                ";
            }


        } //a termék a kosárhoz van adva
        if($item == 2){
            if($row[7] == 1){
                $number = $number * ((1/100) * (100-$kedvezmeny)); // kedvezmény
                $number = round($number, -1); // 10-re kerekítés
                $discount_number = number_format($number, 0, ',', '.');



                echo "
                <div class='card' title='item: $row[5]\ndiscount: $row[7]\npimage: $row[2]\nimage_location: $row[8]'>
                    <div class='card-body' style='background-color: grey'>
                    <br>
                    <div style='position: relative;'>
                        <img src='$row[8]' alt='' style='width: 200px; height: 200px'>
                        <div style='position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); opacity: 0.75;'>
                            <img src='./img/basket.png' alt='' style='width: 100px; height: 100px;'>
                        </div>
                    </div>
                    <p class='card-title'>$row[1]</p>
                    <p class='card-title'>$row[3]</p>
                    <p class='card-text'  style='color: red; font-size: 14px;'><s>$formatted_number Ft</s></p>
                    <p class='card-text' style='font-size: 20px;'>$discount_number Ft</p>
                    <p style='text-align:center;'><a id='buyButton' class='btn btn-primary' style='width: 100%;'><ion-icon name='bag-check-outline'></ion-icon> Kosárhoz adva</a></p>
                    </div>
                </div>
            ";
            }

            if($row[7] == 0){
                $discount_number = NULL;

                echo "
                <div class='card' title='item: $row[5]\ndiscount: $row[7]\npimage: $row[2]\nimage_location: $row[8]'>
                    <div class='card-body' style='background-color: grey'>
                    <br>
                    <div style='position: relative;'>
                        <img src='$row[8]' alt='' style='width: 200px; height: 200px'>
                        <div style='position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); opacity: 0.75;'>
                            <img src='./img/basket.png' alt='' style='width: 100px; height: 100px;'>
                        </div>
                    </div>
                    <p class='card-title'>$row[1]</p>
                    <p class='card-title'>$row[3]</p>
                    <p class='card-text' style='font-size: 20px;'>$formatted_number Ft</p><br>
                    <p class='card-text'>$discount_number</p>
                    <p style='text-align:center;'><a id='buyButton' class='btn btn-primary' style='width: 100%;'><ion-icon name='bag-check-outline'></ion-icon> Kosárhoz adva</a></p>
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
?>
    <!-- <script src="./js/tolist.js"></script> -->
    <script>
        var originalImage = $kep;

        function changeImage(card, isMouseOver) {
            var image = card.querySelector("#productImage");
            var originalImage = image.getAttribute("data-original-src");
            if (image) {
                if (isMouseOver) {
                    image.setAttribute("data-original-src", image.src);
                    image.src = "./img/logokep.png";
                } else {
                    image.src = originalImage;
                }
            }
        }

    </script>
</body>
</html>
