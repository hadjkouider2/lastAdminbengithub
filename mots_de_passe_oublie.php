<?php

require_once 'config.php';
$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;


$edit = (isset($_POST['v'])) ? $_POST['v'] : null;


if ($edit == 'yes') {


  $sqlU = "UPDATE clients SET password='$password' where email='$email'";

  $set = mysqli_query($connect, $sqlU) or die(mysqli_error($connect));
}

if ($set) {
  header('location:front.php');
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
            <a href="contact us.php">Contact</a>
            <button class="btnLogin-popup">Recover_pass</button>
        </nav>
    </header>
    <section class="site-section aos-init aos-animate mt-5  " id='sticky'>
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center border-primary">
                    <h2 class="font-weight-light text-primary mb-5">Recover-password</h2>
                    <p class="color-black-opacity-5">Veuillez vous identifiez</p>
                </div>
            </div>
            <div class="row">
                <main>
                    <section class="">
                        <div class="form-box login">
                            <h2>Recover-password</h2>
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
                                <div class="input-box">
                                    <span class="icon">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                    <input type="password" name="confirm_password" required>
                                    <label>confirm Password</label>
                                </div>

                                <input type="hidden" name="v" value="yes">
                                <button type="submit" class="btn">change password</button>
                                <div style="color: #ca3b20">
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