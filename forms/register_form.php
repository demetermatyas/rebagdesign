<form method="POST" action="includes/register_user.php">
            <div class="form-group">
                <label for="uname" class="form-label">*Felhasználó név:</label>
                <input type="text" class="form-control" id="uname" name="uname" 
                required>
            </div>
            <div class="form-group">
                <label for="pwd" class="form-label">*Jelszó:</label>
                <input type="password" class="form-control" id="pwd" name="pwd" required>
            </div>
            <div class="form-group">
                <label for="pwd2" class="form-label">*Jelszó mégegyszer:</label>
                <input type="password" class="form-control" id="pwd2" name="pwd2" required>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">*Email cím:</label>
                <input type="email" class="form-control" id="email" name="email" 
                required>
            </div>
            <div class="form-group">
                <label for="fullname" class="form-label">Teljes név:</label>
                <input type="text" class="form-control" id="fullname" name="fullname"
                >
            </div>
            <div style="text-align:center;">
              <button type="submit" class="btn btn-primary">Regisztrál</button>
            </div>
            
</form>