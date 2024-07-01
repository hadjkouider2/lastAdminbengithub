<?php
require_once('config.php');
$email = (isset($_POST['email'])) ? $_POST['email'] : NULL;
$pass = (isset($_POST['pass'])) ? $_POST['pass'] : NULL;
$isOk = (isset($_POST['v'])) ? $_POST['v'] : NULL;
if ($isOk == 'yes') :
    $email = trim($email);
    $pass = trim($pass);
    $sql  =  $sql  = "SELECT `email`,`password` 
    FROM utilisateur
    WHERE `email`='$email' AND `password`='$pass' LIMIT 1";
    $q = mysqli_query($connect, $sql);
    $counter = mysqli_num_rows($q);
    if ($counter > 0 && !empty($email) && !empty($pass)) {
        header('Location:dashbord.php');
    } else {


        header('Location:front.php');
    }
endif;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in (v2)</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->

    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>Administration</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg"></p>

                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="pass" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <input type="hidden" name="v" value="yes">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
            </div>
            </form>


        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="js/adminlte.min.js"></script>
</body>

</html>