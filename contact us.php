<?php
require_once 'config.php';
require_once('functions.php');
$myCats = getLatesCat(3);
$catID = (isset($_GET['p'])) ? $_GET['p'] : NULL;

if ($catID)
  $products = getProductsByCat($catID);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>website with login and register form</title>
  <link href="https://fonts.googleapis.com/css2?family=Kenia&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style/bootstrap.min.css">
  <link rel="stylesheet" href="style/all.min.css">
  <link rel="stylesheet" href="style/style2.css">

</head>

<body>
  <header class="titleCommand ">
    <h2 class="logo ">Ecommerce</h2>
    <nav class="navigation mt-1 ">
      <a href="front.php">Acceuil</a>
      <a href="contact us.php">Contact</a>
      <button class="btnLogin-popup"><a href="login.php">Administration</a></button>
    </nav>
  </header>
  <section class="content mt-5">

    <!-- Default box -->
    <div class="card">
      <div class="card-body row">
        <div class="col-5 text-center d-flex align-items-center justify-content-center">
          <div class="">
            <h2>Benbouali<strong></strong></h2>
            <p class="lead mb-5">N°44,DAR EL BEIDA,ALGER ALGERIE<br>
              Phone: + 213 550930010
            </p>
          </div>
        </div>
        <div class="col-7">
          <div class="form-group">
            <label for="inputName" class="mt-5">Name</label>
            <input type="text" id="inputName" class="form-control" />
          </div>
          <div class="form-group">
            <label for="inputEmail">E-Mail</label>
            <input type="email" id="inputEmail" class="form-control" />
          </div>
          <div class="form-group">
            <label for="inputSubject">Subject</label>
            <input type="text" id="inputSubject" class="form-control" />
          </div>
          <div class="form-group">
            <label for="inputMessage">Message</label>
            <textarea id="inputMessage" class="form-control" rows="4"></textarea>
          </div>
          <div class="form-group">
            <input type="submit" class="mt-5 btn btn-primary" value="Send message">
          </div>
        </div>
      </div>
    </div>

  </section>
  <!-- /.content -->


  <footer>
    <div class="container mt-5 ">

      <div class="row pt-5 mt-1 text-center">
        <div class="col-md-12">
          <div class="border-top pt-5">
            <p>
              Copyright ©<script>
                document.write(new Date().getFullYear());
              </script>2023 All rights reserved | This template is made with <i class="icon-heart"></i> by <a href="#" target="_blank">Benbouali</a>
            </p>
          </div>
        </div>

      </div>
    </div>
  </footer>
  <script src="script/script.js"></script>
</body>

</html>