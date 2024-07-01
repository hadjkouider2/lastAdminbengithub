<?php

require_once 'config.php';
$nom = isset($_POST['nom']) ? $_POST['nom'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = (isset($_POST['password']) ? $_POST['password']   : null);
$add = isset($_POST['add']) ? $_POST['add'] : null;

if ($add == 'ok' && !empty($nom) && !empty($email) && !empty($password)) {
    $hashedPassword = password_hash('password', PASSWORD_BCRYPT);
    $sql = "INSERT INTO clients (id,nom,email,password) VALUES(NULL,'$nom','$email','$hashedPassword')";
    $set = mysqli_query($connect, $sql) or die(mysqli_error($connect));

    if ($set) {
        header('location:front.php');
    }
}


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
    <header class="titleCommand">
        <h2 class="logo">Ecommerce</h2>
        <nav class="navigation">
            <a href="#">Acceuil</a>
            <!-- <?php foreach ($myCats as $cat) : ?>
        <a href="productsCat.php?p=<?= $cat['id'] ?>"><?= $cat['nom'] ?></a>
      <?php endforeach; ?> -->
            <a href="#">Contact</a>
            <button class="btnLogin-popup">signin</button>
        </nav>
    </header>
    <section class="site-section aos-init aos-animate mt-5  " id='sticky'>
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center border-primary">
                    <h2 class="font-weight-light text-primary mb-5">Inscription</h2>
                    <p class="color-black-opacity-5">Veuillez vous inscrire</p>
                </div>
            </div>
            <div class="row">
                <main>
                    <section class="">
                        <div class="form-box register">
                            <h2>S'inscrire</h2>
                            <form action="" method="POST">
                                <div class="input-box">
                                    <span class="icon">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <input type="text" name="nom" required>
                                    <label>Nom d'utilisateur</label>
                                </div>
                                <div class="input-box">
                                    <span class="icon">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <input type="email" name="email" required>
                                    <label>Email</label>
                                </div>
                                <div class="input-box">
                                    <span class="icon">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                    <input type="password" name="password" required>
                                    <label>Password</label>
                                </div>
                                <div class="remember-forgot">
                                    <label><input type="checkbox">J'accept les termes & conditions
                                    </label>
                                </div>
                                <input type="hidden" name="add" value="ok">

                                <button type="submit" class="btn" value="Log in">S'inscrire</button>
                                <div style="color: #ca3b20">
                                </div>
                                <div class="login-register">
                                    <p>Vous avez deja un compte?<a href="#" class="login-link">Connexion</a></p>
                                </div>

                            </form>


                        </div>
                        </form>


                    </section>


                </main>
            </div>
        </div>


    </section>










    </section>


    <script src="script/script.js"></script>
</body>

</html>