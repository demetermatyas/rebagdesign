<style>
    .checkbox-container {
            display: inline-block;
            border: 2px solid #ccc;
            border-radius: 30px;
            margin: 1px;
            border-color: #007bff;
            background-color: #ee9b64;
            color: #fff;
        }
        .checkbox-container input[type="checkbox"] {
            display: none;

        }
        .checkbox-container input[type="checkbox"] + label {
            display: inline-block;
            padding: 3px;
            cursor: pointer;
        }
        .checkbox-container input[type="checkbox"]:checked + label {
          display: inline-block;
          padding: 6px;
          border: 2px solid #ccc;
          border-radius: 30px;
          margin: 1px;
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }
        #selected-checkboxes {
           margin-top: 10px;
           padding: 10px;
           background-color: #ee9b64;
           border-radius: 5px;
       }
</style>


<h2 style="text-align: center;">Szűrés</h2>

<div class="checkbox-container">
    <input type="checkbox" name="vivi" id="vivi-checkbox" checked>
    <label for="vivi-checkbox" id="vivi-label">Vivi táska</label>
</div>
<div class="checkbox-container">
    <input type="checkbox" name="kisvivi" id="kisvivi-checkbox" checked>
    <label for="kisvivi-checkbox" id="kisvivi-label">Kis Vivi táska</label>
</div>
<div class="checkbox-container">
    <input type="checkbox" name="kozepesvivi" id="kozepesvivi-checkbox" checked>
    <label for="kozepesvivi-checkbox" id="kozepesvivi-label">Közepes Vivi táska</label>
</div>
<div></div>
<br>
Lista:
<div id="selected-checkboxes"></div>
<div></div>
<br>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var checkboxes = document.querySelectorAll('.checkbox-container input[type="checkbox"]');
        var selectedDiv = document.getElementById('selected-checkboxes');

        function updateSelectedCheckboxes() {
            var selectedCheckboxes = Array.from(checkboxes).filter(function(checkbox) {
                return checkbox.checked;
            }).map(function(checkbox) {
                return document.querySelector('label[for="' + checkbox.id + '"]').textContent;
            });
            selectedDiv.textContent = selectedCheckboxes.join(', ');
        }

        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', updateSelectedCheckboxes);
        });

        // Az oldal betöltésekor is frissítsük a kiválasztott elemek listáját
        updateSelectedCheckboxes();
    });
</script>
