<form method="POST" action="includes/refresh_user.php">
            <div class="form-group">
                <label for="uid" class="form-label">Azonosító:</label>
                <input type="number" class="form-control" id="uid" name="uid" 
                value="<?php 
                if(isset($_SESSION['uid']))
                {
                  echo $_SESSION['uid'];
                };?>"
                readonly>
            </div>
            <div class="form-group">
                <label for="uname" class="form-label">*Felhasználó név:</label>
                <input type="text" class="form-control" id="uname" name="uname" 
                value="<?php 
                if(isset($_SESSION['uname']))
                {
                  echo $_SESSION['uname'];
                };?>"
                required>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">*Email cím:</label>
                <input type="email" class="form-control" id="email" name="email" 
                value="<?php 
                if(isset($_SESSION['email']))
                {
                  echo $_SESSION['email'];
                };?>"
                required>
            </div>
            <div class="form-group">
                <label for="fullname" class="form-label">Teljes név:</label>
                <input type="text" class="form-control" id="fullname" name="fullname"
                value="<?php 
                if(isset($_SESSION['fullname']))
                {
                  echo $_SESSION['fullname'];
                };?>"
                >
            </div>
            <div style="text-align:center;">
              <button type="submit" class="btn btn-warning">Módosít</button>
            </div>
</form>