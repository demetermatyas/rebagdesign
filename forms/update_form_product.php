<head>
<style>
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }
    </style>
</head>


<form method="POST" action="includes/refresh_product.php" enctype="multipart/form-data">
            <!-- ID -->
            <div class="form-group" style="text-align: center">
            <label for="id" class="form-label">Azonosító:</label>
                <input type="number" class="form-control" id="id" name="id" 
                value="<?php 
                if(isset($_SESSION['id']))
                {
                  echo $_SESSION['id'];
                };?>"
                readonly>
            </div>
            <!-- pbrand -->
            <div class="dropdown"  style="text-align: center">
                <label for="pbrand" class="form-label">Típus név:</label>
                <input type="text" class="form-control" id="pbrand" name="pbrand" 
           value="<?php if(isset($_SESSION['pbrand'])) { echo $_SESSION['pbrand']; }; ?>"
           onclick="toggleDropdown()" required>
                <div id="myDropdown" class="dropdown-content">
                    <a href="#" onclick="selectOption('Kis Vivi')">Kis Vivi</a>
                    <a href="#" onclick="selectOption('Kötény - Farmer')">Kötény - Farmer</a>
                    <a href="#" onclick="selectOption('Sprot táska')">Sprot táska</a>
                </div>
            </div>
            <!-- kép -->
            <div class="form-group"  style="text-align: center">
                <label for="pimage" class="form-label">Kép:</label>
                <input type="text" class="form-control" id="pimage" name="pimage" readonly value="<?php 
                if(isset($_SESSION['imagelocation'])) { echo $_SESSION['imagelocation']; };?>">
                <input type="hidden" id="imagelocation" name="imagelocation">
                <button type="button" class="btn btn-primary" onclick="enableFileUpload()">Kép módosítása</button>
                <input type="file" class="form-control" id="fileInput" name="pimage" style="display: none;">
            </div>

            <script>
                function enableFileUpload() {
                    // Kép kiválasztása
                    var fileInput = document.getElementById("fileInput");
                    fileInput.style.display = "block"; // Fájl input megjelenítése

                    fileInput.addEventListener('change', function() {
                        var selectedFile = fileInput.files[0];

                        // Kinyerjük a kép nevét
                        var imageName = selectedFile.name;

                        // Beállítjuk a kép nevét és helyét az elrejtett input mezőkbe
                        document.getElementById("pimage").value = imageName;
                        document.getElementById("imagelocation").value = "./img/" + imageName; // Kép helye

                        // Módosítjuk az input mező stílusát
                        document.getElementById("pimage").removeAttribute("readonly");
                    });
                }
            </script>

            <!-- ptype -->
            <div class="form-group"  style="text-align: center">
                <label for="ptype" class="form-label">Termék neve:</label>
                <input type="text" class="form-control" id="ptype" name="ptype"
                value="<?php 
                if(isset($_SESSION['ptype']))
                {
                  echo $_SESSION['ptype'];
                };?>"
                >
            </div>
            <!-- pprice -->
            <div class="form-group"  style="text-align: center">
                <label for="pprice" class="form-label">Termék ára:</label>
                <input type="text" class="form-control" id="pprice" name="pprice"
                value="<?php 
                if(isset($_SESSION['pprice']))
                {
                  echo $_SESSION['pprice'];
                };?>"
                >
            </div>
            <!-- discount -->
            <div class="form-group" style="text-align:center;">
                Akciós termék?<br>
                    <input type="radio" name="discount"
                    <?php if (isset($_SESSION['discount']) && $discount=="1") echo $_SESSION['discount'];?>
                    value="1">Igen
                    <input type="radio" name="discount"
                    <?php if (isset($_SESSION['discount']) && $discount=="0") echo $_SESSION['discount'];?>
                    value="0">Rendes ár
            </div>

            <div style="text-align:center;">
              <button type="submit" class="btn btn-primary " style='width: 100%;'>Módosít</button>
            </div>
</form>

<script>
    function toggleDropdown() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    function selectOption(option) {
        document.getElementById("pbrand").value = option;
        document.getElementById("myDropdown").classList.remove("show");
    }

    window.onclick = function(event) {
        if (!event.target.matches('.form-control')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>