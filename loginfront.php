<?php
require_once('config.php');

$email = (isset($_POST['email'])) ? $_POST['email'] : NULL;
$pass = (isset($_POST['password'])) ? $_POST['password'] : NULL;
$isOk = (isset($_POST['v'])) ? $_POST['v'] : NULL;
if ($isOk == 'yes') :
    $email = trim($email);
    $pass = trim($pass);
    $sql  =  $sql  = "SELECT `email`,`password` 
    FROM clients
    WHERE `email`='$email' AND `password`='$pass' LIMIT 1";
    $q = mysqli_query($connect, $sql);
    $counter = mysqli_num_rows($q);
    if ($counter > 0) {
        header('Location:indexfront.php');
    } else {


        header('Location:loginfront.php');
    }
endif;

 

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
    <header>
        <h2 class="logo">Logo</h2>
        <nav class="navigation">
            <a href="#"></a>
            <a href="#"></a>
            <a href="#"></a>
            <a href="#"></a>
            <button class="btnLogin-popup">Connexion</button>

        </nav>
    </header>
    <main>
        <section class="body">
            <div class="wrapper un <?= $message ?? '' ?> ">
                <span class="icon-close">
                    <i>x</i>
                </span>

                <!-- login -->
                <div class="form-box login">
                    <h2>Connexion</h2>
                    <form action="" method="post">
                        <div class="input-box">
                            <span class="icon">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <input type="email" name="email" required>
                            <label>Email</label>
                        </div>-
                        <div class="input-box">
                            <span class="icon">
                                <i class="fa fa-lock"></i>
                            </span>
                            <input type="password" name="password" required>
                            <label>Password</label>
                        </div>
                        <div class="remember-forgot">
                            <label><input type="checkbox">Se souvenir de moi
                            </label>
                            <a href="#">Mot de pass oublié?</a>
                        </div>
                        <input type="hidden" name="v" value="yes">
                        <button type="submit" class="btn">Connexion</button>
                        <div style="color: #ca3b20">
                        </div>
                        <div class="login-register">
                            <p>Vous n'avez pas de compte?<a href="signin.php" class="register-link">S'inscrire</a></p>
                        </div>
                    </form>

                </div>

                <!-- signin -->
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
                        <button type="submit" class="btn">S'inscrire</button>
                        <div style="color: #ca3b20">
                        </div>
                        <div class="login-register">
                            <p>Vous avez deja un compte?<a href="#" class="login-link">Connexion</a></p>
                        </div>
                    </form>

                </div>
            </div>
            <div class="wrapper deux">
                <div>
                    <h3>le monde appartient à ceux qui ont</h3>
                    <h2>.............le levéto.............</h2>
                </div>
            </div>
        </section>

    </main>

    <script src="script/script.js"></script>
</body>

</html>