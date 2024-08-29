<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require_once 'config.php';
require_once 'autoload.php';
$nom = isset($_POST['nom']) ? $_POST['nom'] : null;
$adresse = isset($_POST['adresse']) ? $_POST['adresse'] : null;
$phone = isset($_POST['phone']) ? $_POST['phone'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = (isset($_POST['password']) ? $_POST['password']   : null);
$add = isset($_POST['add']) ? $_POST['add'] : null;

if ($add == 'ok' && !empty($nom) && !empty($email) && !empty($password)) {
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
    // $hashedPassword = password_hash('password', PASSWORD_ARGON2I);
    $hashedPassword = md5($password);
    // $key = mt_rand(99999, 999999);
    $sql = "INSERT INTO clients (id,nom,adresse,phone,email,password) VALUES(NULL,'$nom','$adresse','$phone','$email','$hashedPassword')";
    $set = mysqli_query($connect, $sql) or die(mysqli_error($connect));
}

use PHPMailer\PHPMailer\SMTP;


if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'benboualihadjkouider@gmail.com';
    $mail->Password   = 'ighs nkqc pfoa btwd';
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('benboualihadjkouider@gmail.com');
    $mail->addAddress($_POST['email']);
    $mail->isHTML(true);
    $key = mt_rand(99999, 999999);
    $mail->Subject = 'your code is :' . $key;
    $mail->Body = 'Veuilez SVP me renvoyer votre code pour valider votre inscription.your code is :' . $key;
    $mail->send('');
    echo "<script>alert('Message has been sent');</script>";
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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

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
        <h2 class="logo">Ecommerce</h2>
        <nav class="navigation">
            <!-- <a href="#">Acceuil</a>
            <a href="#">Contact</a>
            <button class="btnLogin-popup">signin</button> -->
        </nav>
    </header>
    <section class="site-section aos-init aos-animate mt-5  " id='sticky'>
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center border-primary">
                    <h2 class="font-weight-light text-primary mb-5">Inscription</h2>
                    <p class="color-black-opacity-5 text-primary">Veuillez vous inscrire</p>
                </div>
            </div>
            <div class="container d-flex align-items-center justify-content-center">
                <main>
                    <section class="">
                        <div class="form-box register">
                            <h2><strong>S'inscrire</strong></h2>
                            <form action="" method="POST">
                                <div class="input-box">
                                    <span class="icon">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <input type="text" name="nom" required>
                                    <label><strong>Nom d'utilisateur</strong></label>
                                </div>
                                <div class="input-box">
                                    <span class="icon">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <input type="text" name="adresse" required>
                                    <label><strong>Adresse</strong></label>
                                </div>
                                <div class="input-box">
                                    <span class="icon">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <input type="number" name="phone" required>
                                    <label><strong>Phone number</strong></label>
                                </div>
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
                                <div class="g-recaptcha" data-sitekey="6LcApiUqAAAAAGqnIh_6Wae6UGUiHnTPA8MoOEIv"></div>
                                <div class="remember-forgot mt-1">
                                    <label><input type="checkbox"><strong>J'accept les termes & conditions</strong>
                                    </label>
                                </div>
                                <input type="hidden" name="add" value="ok">

                                <button type="submit" class="btn" value="Log in" name="submit"><strong>S'inscrire</strong></button>
                                <div style="color: #ca3b20">
                                </div>
                                <div class="login-register">
                                    <p><strong>Veuillez vous connectez?</strong><a href="front.php" class="login-link"><strong>Connexion</strong></a></p>
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