<?php
require_once('config.php');

$email = (isset($_POST['email'])) ? $_POST['email'] : NULL;
$pass = (isset($_POST['password'])) ? $_POST['password'] : NULL;
$isOk = (isset($_POST['v'])) ? $_POST['v'] : NULL;
if ($isOk == 'yes') :
    $email = trim($email);
    $pass = trim($pass);
    $sql  =  $sql  = "SELECT `email`,`password` 
    FROM utilisateur
    WHERE `email`='$email' AND `password`='$pass' LIMIT 1";
    $q = mysqli_query($connect, $sql);
    $counter = mysqli_num_rows($q);
    if ($counter > 0) {
        header('Location:e404.php');
    } else {


        header('Location:login.php');
    }
endif;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="style/style2.css">
    <title>Administration</title>
</head>

<body>
    <header class="titleCommand">
        <h2 class="logo">Logo</h2>
        <nav class="navigation">
            <a href="#">Acceuil</a>
            <a href="#">Apropos</a>
            <a href="#">Articles</a>
            <a href="#">Contact</a>
            <button class="btnLogin-popup">Connexion</button>
        </nav>
    </header>
    <main class="p-3 container" style="margin-top: 100px;">
        <div class="child p-3">
            <h3>Connexion</h3>
            <form  method="POST" action="">
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label>Mot de pass</label>
                    <input type="text" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
            </form>
        </div>
    </main>
    <main class="p-3" style="margin-top: 100px;">
        <h3 class=" d-flex align-items-center justify-content-center">Page d'aministration</h3>
        <p class="d-flex align-items-center justify-content-center text-black">Voici les commandes</p>
        <div class="row">
            <div class="col-md-4 mb-4 col-lg-4" style="max-width: 300px;">
                <div class="listing-item">
                    <div class="listing-image">
                        <img src="images/curren-sport.JPG" alt="Image" class="img-fluid">
                    </div>
                    <div class="listing-item-content">
                        <a href="commande.php?id=12" class="bookmark d-flex align-items-center justify-content-center text-white" style="font-size: 12px;">32
                        </a>
                        <a class="px-3 mb-3 category" href="#">22$</a>
                        <h2 class="mb-1"><a href="#">TMONTRE ROLEX</a></h2>
                        <span class="address">BUJA MUTAKURA</span>
                    </div>
                </div>
                <div style="background-color: #9a8bc6;" class="p-2 d-flex">
                    <div style="max-width: 100px;" class="pr-3">
                        <img src="images/avatar9.jpg" style="width: 100%;">
                    </div>
                    <div>
                        <p class="p-0 m-0">Nom: John Doe</p>
                        <p class="p-0 m-0">Email: his email</p>
                        <p class="p-0 m-0">Adress: adress de l'users</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer style="background-color: rgb(0 0 0 / 60%); color: white;">
        <div class="container">

            <div class="row pt-5 mt-5 text-center">
                <div class="col-md-12">
                    <div class="border-top pt-5">
                        <p>
                            Copyright ©<script>
                                document.write(new Date().getFullYear());
                            </script>2023 All rights reserved | <i class="fas fa-heart"></i> by <a href="https://accrodev.xyz" target="_blank">AccroDev</a>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </footer>
</body>

</html>