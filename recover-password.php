<?php

require_once 'config.php';
// // GET DATA....................




// $sqlm = "SELECT id FROM utilisateur WHERE email = '$email' LIMIT 1";

// $resm = mysqli_query($connect, $sqlm) or die(mysqli_error($connect));

// $num = mysqli_num_rows($resm);

// if ($num == 1) {
//     $data = mysqli_fetch_array($resm, MYSQLI_ASSOC);
// }





// UPDATE DATA .....................

$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;


$edit = (isset($_POST['edit'])) ? $_POST['edit'] : null;


if ($edit == 'ok') {


  $sqlU = "UPDATE utilisateur SET password='$password' where email='$email'";

  $set = mysqli_query($connect, $sqlU) or die(mysqli_error($connect));
}

if ($set) {
  header('location:login.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Recover Password</title>

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
    <div class="login-logo">
      <a href="#"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>

        <form action="" method="post">

          <div class="input-group mb-3">
            <input type="email" class="form-control" name='email' placeholder="email">
            <div class="input-group-append">
              <div class="input-group-text">

              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name='password' placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Confirm Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <input type="hidden" name='edit' value='ok'>
              <button type="submit" class="btn btn-primary btn-block">Change password</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <p class="mt-3 mb-1">
          <a href="login.php">Login</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
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