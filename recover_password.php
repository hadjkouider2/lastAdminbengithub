<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require_once 'config.php';
$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = (isset($_POST['password']) ? $_POST['password']   : null);
$add = isset($_POST['add']) ? $_POST['add'] : null;

if ($add == 'ok' && !empty($nom) && !empty($email) && !empty($password)) {
    $email = trim($email);
    $pass = md5(trim($pass));

    $sqlu = "UPDATE clients SET Password='$pass' WHERE email='$email'";
    $set = mysqli_query($connect, $sqlu) or die(mysqli_error($connect));
}

use PHPMailer\PHPMailer\SMTP;


if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'benboualihadjkouider@gmail.com';
    $mail->Password   = 'cpuf kxjy iict vlic';
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('benboualihadjkouider@gmail.com');
    $mail->addAddress($_POST['email']);
    $mail->isHTML(true);
    $key = mt_rand(99999, 999999);
    $mail->Subject = 'your new password';
    $mail->Body    = 'Veuilez SVP enregistrer votre nouveau mots de passe.';
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
 
    </header>
    <section class="site-section aos-init aos-animate mt-5  " id='sticky'>
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center border-primary">
                    <h2 class="font-weight-light text-primary mb-5">Recover-password</h2>
                    <p class="color-black-opacity-5 text-primary">Veuillez vous identifiez</p>
                </div>
            </div>
            <div class="container d-flex align-items-center justify-content-center">
                <main>
                    <section class="">
                        <div class="form-box register">
                            <h2><strong>Recover-password</strong></h2>
                            <form action="" method="POST">
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
                                <div class="input-box">
                                    <span class="icon">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                    <input type="password" name="confirm_password" required>
                                    <label><strong>confirm_password</strong></label>
                                </div>
                                <input type="hidden" name="add" value="ok">

                                <button type="submit" class="btn" value="Log in" name="submit"><strong>Change password</strong></button>
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