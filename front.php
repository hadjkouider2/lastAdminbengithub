<?php
session_start();
require_once('config.php');
require_once('functions.php');
require_once 'autoload.php';
$email = (isset($_POST['email'])) ? $_POST['email'] : NULL;
$pass = (isset($_POST['password'])) ? $_POST['password'] : NULL;
$isOk = (isset($_POST['q'])) ? $_POST['q'] : NULL;

if (isset($_POST['v'])) {
    $recaptcha = new \ReCaptcha\ReCaptcha("6LcApiUqAAAAAEACtCdFQ1THHsqt9i47lLjiGQR3");
    $gRecaptchaResponse = $_POST["g-recaptcha-response"];
    $resp = $recaptcha->setExpectedHostname('localhost')
        ->verify($gRecaptchaResponse, $remoteIp);
    if ($resp->isSuccess()) {
        echo "Success ! ";
    } else {
        $errors = $resp->getErrorCodes();
        var_dump($errors);
    }
}
if ($isOk == 'ok') {
    $email = trim($email);
    $pass = md5(trim($pass));
    $sql  = "SELECT * FROM clients
     WHERE `email`='$email' AND `password`='$pass' LIMIT 1";
    $q = mysqli_query($connect, $sql);
    $row =  mysqli_fetch_all($q, MYSQLI_ASSOC);
    $_SESSION['mine'] = ($row);


    $counter = mysqli_num_rows($q);
    if ($counter > 0) {


        if ($_SESSION['mine'][0]['role'] == 'admin') {
            header('Location:allcategory.php');
        } elseif ($_SESSION['mine'][0]['role'] == 'user') {
            header('Location:allcategory.php');
        }
    } else header('Location:file.php');
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

    <head>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    </head>

</head>
<style>
    body {
        background-image: url('images/unsplash1.jpg');
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<body>
    <header>
        <h2 class="logo ">Ecommerce</h2>




    </header>
    <section class="site-section aos-init aos-animate mt-5  " id='sticky'>
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center border-primary">
                    <h2 class="font-weight-light text-primary mb-5">Connexion</h2>
                    <p class="color-black-opacity-5"><strong>Veuillez vous connectez</strong></p>
                </div>
            </div>
            <div class="container d-flex align-items-center justify-content-center">
                <main>
                    <section class="">
                        <div class="form-box login ">
                            <h2><strong>Connexion</strong></h2>
                            <form action="" method="post">

                                <div class="input-box">
                                    <span class="icon">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <input type="email" name="email" required>
                                    <label><strong>Email</strong></label>
                                </div>
                                <div class="input-box">
                                    <span class="icon">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                    <input type="password" name="password" required>
                                    <label><strong>Password</strong></label>
                                </div>
                                <div class="remember-forgot">
                                    <!-- <label><input type="checkbox"><strong>Se souvenir de moi</strong>
                                    </label> -->

                                    <a href="mots_de_passe_oublie.php"><strong>Mot de pass oublié?</strong></a>
                                </div>
                                <div class="g-recaptcha" name="v" value="yes" data-sitekey="6LcApiUqAAAAAGqnIh_6Wae6UGUiHnTPA8MoOEIv"></div>
                                <div>
                                    <!-- <p><strong>Veuillez remplir votre formulaire?</strong><a href="formulaire.php" class="register-link"><strong>Formulaire</strong></a></p> -->
                                </div>
                                <input type="hidden" name="q" value="ok">
                                <button type="submit" name="submit" class="btn"><strong>Connexion</strong></button>
                                <div style="color: #ca3b20">
                                </div>
                                <div class="login-register">

                                    <p><strong>Vous n'avez pas de compte?</strong><a href="signin.php" class="register-link"><strong>S'inscrire</strong></a></p>
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