<?php
   include 'connect_db.php';

   $sql = "SELECT * FROM `users`";

   $result = mysqli_query($conn, $sql);

   if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
        echo "
        <script langauge='javascript'>

        function deleteUserChoice()
        {
           answer=confirm('Biztos hogy törlöd a felhasználót?');

           if(answer != 0)
           {
                location = 'includes/delete_user.php?id=$row[0]'; 
           }
        }

        </script>

        <div class='card bg-danger' style='width: 15rem; float:left; margin:2px;'>
            <div class='card-body'>
            <p class='card-title'>$row[1]</p>
            <p class='card-title'>$row[3]</p>
            <p class='card-text'>$row[4]</p>
            <p style='text-align:center;'><a href='#' class='btn btn-danger' onclick='deleteUserChoice(); return false;'>Töröl</a></p>
            <p style='text-align:center;'><a href='includes/update_user.php?id=$row[0]' class='btn btn-primary'>Módosít</a></p>
            </div>
        </div>
        ";
    }
   }else{
    echo "Nincs rekord!";
   }
   
   $conn->close();
?>