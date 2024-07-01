<?php
session_start();
require_once('config.php');
require_once('functions.php');

$email = (isset($_POST['email'])) ? $_POST['email'] : NULL;
$pass = (isset($_POST['password'])) ? $_POST['password'] : NULL;
$isOk = (isset($_POST['v'])) ? $_POST['v'] : NULL;
if ($isOk == 'yes') :
    $email = trim($email);
    $pass = trim($pass);
    $hashedPassword = password_hash('password', PASSWORD_BCRYPT);
    $sql = "SELECT  id , role 
FROM clients
WHERE email ='$email'";
    $q = mysqli_query($connect, $sql);
    $counter = mysqli_num_rows($q);
    $user = mysqli_fetch_all($q, MYSQLI_ASSOC);
    $_SESSION['mine'] = ($user);


    if ($counter > 0) {
        $user = mysqli_fetch_all($q, MYSQLI_ASSOC);
        $hashedPassword = $user['password'];
        if (password_verify($pass, $hashedPassword)) {
            header('Location:allcategory.php');
        }

        if ($_SESSION['mine'][0]['role'] == 'admin') {
            header('Location:dashbord.php');
        } elseif ($_SESSION['mine'][0]['role'] == 'user') {
            header('Location:allcategory.php');
        }
    } else {
        header('Location:signin.php');
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
    <header class="titleCommand">
        <h2 class="logo">Ecommerce</h2>
        <nav class="navigation">
            <a href="#">Acceuil</a>
            <a href="contact us.php">Contact</a>
            <button class="btnLogin-popup">Connexion</button>
        </nav>
    </header>
    <section class="site-section aos-init aos-animate mt-5  " id='sticky'>
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center border-primary">
                    <h2 class="font-weight-light text-primary mb-5">Connexion</h2>
                    <p class="color-black-opacity-5">Veuillez vous connectez</p>
                </div>
            </div>
            <div class="row">
                <main>
                    <section class="">
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
                                    <a href="mots_de_passe_oublie.php">Mot de pass oublié?</a>
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
                    </section>
                </main>
            </div>




        </div>



    </section>

    <script src="script/script.js"></script>
</body>

</html>