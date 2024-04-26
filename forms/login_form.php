<form method="POST" action="includes/login_user.php">
  <h2>Bejelentkezés a vásárláshoz</h2><br>
            <div class="form-group">
                <label for="uname" class="form-label">Felhasználó név:</label>
                <input type="text" class="form-control" id="uname" name="uname" 
                required>
            </div>
            <div class="form-group">
                <label for="pwd" class="form-label">Jelszó:</label>
                <input type="password" class="form-control" id="pwd" name="pwd" required>
            </div>
            <div style="text-align:center;">
              <button type="submit" class="btn btn-primary">Belépés</button>
            </div>
            <p style="text-align:center;"><a href="?form=register" style="text-decoration: none;">Regisztrálás</a></p>
</form>