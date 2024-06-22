<?php

require_once 'config.php';



$cid = isset($_GET['m']) ? $_GET['m'] : NULL;

$sql = "SELECT * FROM products WHERE id= $cid LIMIT 1";

$q = mysqli_query($connect, $sql) or die("error");

$num = mysqli_num_rows($q);

if ($num == 1) {
  $data = mysqli_fetch_array($q, MYSQLI_ASSOC);
}


// UPDATE DATA .....................

$nom = isset($_POST['nom']) ? $_POST['nom'] : null;
$prix = isset($_POST['prix']) ? $_POST['prix'] : null;
$qty = isset($_POST['qty']) ? $_POST['qty'] : null;
$photo = isset($_POST['photo']) ? $_POST['photo'] : null;
$category_id = isset($_POST['category_id']) ? $_POST['category_id'] : null;
$datetime = isset($_POST['datetime']) ? $_POST['datetime'] : null;
$id = isset($_POST['id']) ? $_POST['id'] : null;

$edit = (isset($_POST['edit'])) ? $_POST['edit'] : null;

if ($edit == 'ok') {

  $sqlU = "UPDATE products SET nom='$nom',prix='$prix',qty='$qty',photo='$photo',category_id='$category_id',datetime='$datetime' WHERE id=$id";

  $set = mysqli_query($connect, $sqlU) or die(mysqli_error($connect));
}

if ($set) {
  header('location:products.php');
}


?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin benbouali</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css" />
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle" />
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Call me whenever you can...</p>
                  <p class="text-sm text-muted">
                    <i class="far fa-clock mr-1"></i> 4 Hours Ago
                  </p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3" />
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">I got your message bro</p>
                  <p class="text-sm text-muted">
                    <i class="far fa-clock mr-1"></i> 4 Hours Ago
                  </p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3" />
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">The subject goes here</p>
                  <p class="text-sm text-muted">
                    <i class="far fa-clock mr-1"></i> 4 Hours Ago
                  </p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8" />
        <span class="brand-text font-weight-light">Administration</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" />
          </div>
          <div class="info">
            <a href="#" class="d-block">Benbouali</a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" />
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="dashbord.php" class="nav-link text-white">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Dashbord

                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="client.php" class="nav-link text-primary">
                <i class="nav-icon fas fa-user-tie"></i>
                <p>
                  client

                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="category.php" class="nav-link text-info">
                <i class="nav-icon fas fa-layer-group"></i>
                <p>
                  category

                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="products.php" class="nav-link text-warning">
                <i class="nav-icon fas fa-barcode"></i>
                <p>
                  products

                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="invoice.php" class="nav-link">
                <i class="nav-icon fas fa-file-invoice-dollar"></i>
                <p>
                  invoice

                </p>
              </a>
            </li>


          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">edit products Page</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">edit products</li>
              </ol>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">edit products</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="" method="post">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="nom">nom</label>
                      <input type="text" class="form-control" name="nom" placeholder="Enter nom" value="<?= $data["nom"] ?>">
                    </div>
                    <div class="form-group">
                      <label for="prix">prix</label>
                      <input type="text" class="form-control" name="prix" placeholder="Enter prix" value="<?= $data["prix"] ?>">
                    </div>
                    <div class="form-group">
                      <label for="qty">qty</label>
                      <input type="number" class="form-control" name="qty" placeholder="Enter qty" value="<?= $data["qty"] ?>">
                    </div>
                    <div class="form-group">
                      <label for="formFile" class="form-label">photo</label>
                      <input type="file" class="form-control" name="photo" id="formFile">
                    </div>
                    <div class="form-group">
                      <label for="category_id">category_id</label>
                      <input type="text" class="form-control" name="category_id" placeholder="Enter category_id" value="<?= $data["category_id"] ?>">
                    </div>
                    <div class="form-group">
                      <label for="datetime">datetime</label>
                      <input type="datetime-local" class="form-control" name="datetime" placeholder="datetime" value="<?= $data["datetime"] ?>">
                    </div>
                    <input type="hidden" name='id' value="<?= $data["id"] ?>">
                    <input type="hidden" name='edit' value='ok'>
                    <button type="submit" class="btn btn-primary">edit products</button>






                  </div>


                </form>








              </div>
              <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
          </div>
          <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php
        require_once 'footer.php';

        ?>