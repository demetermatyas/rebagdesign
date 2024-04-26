<!DOCTYPE html>
<html lang="en">
  <?php
session_start();
?>
<head>
  <title>Rebag Design</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

  <link rel="icon" href="img/logokep.png" type="image/x-icon">

  <style>
    body{
      background-color: #EEE; 
      padding-top: 60px; /* A head magassága + padding */
      font-family: verdana;
    }
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
      background-color: #222;
      border-radius: 0 0 30px 30px;
    }
    .row.content {height: 450px}
    .sidenav {
      margin-top: 10px;
      margin-bottom: 30px;
      background-color: #eba764;        
      min-height: 0px;
      border-radius: 30px;
      border-radius: 0 30px 30px 0;
      position: fixed;
    }
    .main{
      margin-left: 250px;
    }
    .formnav{
      position: relative;
    }
    .jobb{
      margin-top: 0;
      margin-bottom: 0;
      background-color: #eba764;        
      min-height: 0px;
      border-radius: 30px;
      border-radius: 30px 0 0 30px;
    }
    footer {
      background-color: #400;
      color: white;
      padding: 15px;
      border-radius: 30px 30px 0 0;
    }
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
    header {
      position: fixed;
      top: 0;
      width: 100%;
      padding: 0;
      text-align: center;
      z-index: 1000; /* Head réteg előtérb */
    }
  </style>

</head>

<body>
  <header> <!-- Felső rész -->
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header" style="margin-left: 50px" >
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">                       
          </button>
          <a class="navbar-brand" href="#">Rebag Design</a>
        </div>

        <div class="collapse navbar-collapse" style="margin-right: 50px;" id="myNavbar" >
          <?php
            if(isset($_SESSION['id'])){
              if($_SESSION['rank'] == 0){
                include 'navs/user0_nav.php';
              }
              if($_SESSION['rank'] == 9){
                include 'navs/admin_nav.php';
              }
              if($_SESSION['rank'] > 0 && $_SESSION['rank'] < 9){
                include 'navs/user1_nav.php';
              } 
            }
          ?>
        </div>
      </div>
    </nav>
  </header>

  <div class="container-fluid">    
    <div class="row content">
      <div class="col-sm-2 sidenav"> <!-- ball széle, oldalon belüli aloldalak -->
        <?php 
        if(isset($_SESSION['id']) && isset($_GET['link'])) { 
          if($_SESSION['rank'] == 9 && $_GET['link'] == 'admin_link'){
            include 'links/admin_link.php';
          }
          if($_SESSION['rank'] == 0 && $_GET['link'] == 'user_link'){
            include 'links/user_link.php';
          }
          if($_SESSION['rank'] == 0 && $_GET['link'] == 'filter_link'){
            include 'links/filter_link.php';
          }
        }
        ?>
    </div>

      <div class="col-sm-8 main"> <!-- Közéspső fő rész -->
        <?php
        if(isset($_SESSION['id']) && isset($_GET['page']))
        {
          if($_GET['page'] == 'start_page')
          {
            include 'pages/start_page.php';
          }
          if($_GET['page'] == 'profil_page')
          {
            include 'pages/profil_page.php';
          }
          if($_GET['page'] == 'list_user')
          {
            include 'pages/list_user.php';
          }
          if($_GET['page'] == 'list_product')
          {
            include 'pages/list_product.php';
          }
          if($_GET['page'] == 'buy_product')
          {
            include 'pages/buy_product.php';
          }
          if($_GET['page'] == 'shopping_page')
          {
            include 'pages/shopping_page.php';
          }
          if($_GET['page'] == 'upload_products')
          {
            include 'pages/upload_products.php';
          }
          if($_GET['page'] == 'admin_page')
          {
            include 'pages/admin_page.php';
          }
          if($_GET['page'] == 'order_page')
          {
            include 'pages/order_page.php';
          }
        }
        else
        {
          include 'pages/start_page.php';
        }
        ?>
      </div>

      <br>

      <div class="col-sm-2 formnav"> <!-- Jobb széle, belépés+regisztálás, főleg adat felvitel, esetleg hirdetmények -->
      <div class="jobb" style="position: fixed">
          <?php
            if(isset($_SESSION['id']))
            {
              if($_GET['form']=='update')
              {
                include 'forms/update_form.php';
              }
              if($_GET['form']=='update_product')
              {
                include 'forms/update_form_product.php';
              }
              if($_GET['form']=='register')
              {
                include 'forms/register_form.php';
              }
              if($_GET['form']=='create_form_product')
              {
                include 'forms/create_form_product.php';
              }
            }
            else
            {
              if(isset($_GET['form']) && $_GET['form']=='register')
              {
                include 'forms/register_form.php';
              }
              else{
                include 'forms/login_form.php';
              }
            }
          ?>
          </div>
      </div>
    </div>
  </div>

  <footer class="container-fluid text-center" style="margin-top: 20px;">
    <p style="text-decoration: underline; font-weight: bold;">Elérhetőségek</p>
    <p>telefonszám: +3630123456789</p>
    <p>e-mail cím: <a href ="#">info@rebagdesign.com</a></p>
    <p>facebook: <a href="https://www.facebook.com/Rebagdesign">https://www.facebook.com/Rebagdesign</a></p>
  </footer>
</body>

</html>


