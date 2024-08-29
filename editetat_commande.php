<?php

require_once 'Header.php';
require_once 'config.php';



$cid = isset($_GET['m']) ? $_GET['m'] : NULL;

$sql = "SELECT * FROM etat_commande WHERE id= $cid LIMIT 1";

$q = mysqli_query($connect, $sql) or die("error");

$num = mysqli_num_rows($q);

if ($num == 1) {
  $data = mysqli_fetch_array($q, MYSQLI_ASSOC);
}


// UPDATE DATA .....................

$id_commande = isset($_POST['id_commande']) ? $_POST['id_commande'] : null;
$nom = isset($_POST['nom']) ? $_POST['nom'] : null;
$adresse = isset($_POST['adresse']) ? $_POST['adresse'] : null;
$phone = isset($_POST['phone']) ? $_POST['phone'] : null;
$date_achat = isset($_POST['date_achat']) ? $_POST['date_achat'] : null;
$total = isset($_POST['total']) ? $_POST['total'] : null;
$payement = isset($_POST['payement']) ? $_POST['payement'] : null;
$livraison = isset($_POST['livraison']) ? $_POST['livraison'] : null;
$date_livraison = isset($_POST['date_livraison']) ? $_POST['date_livraison'] : null;
$id = isset($_POST['id']) ? $_POST['id'] : null;

$edit = (isset($_POST['edit'])) ? $_POST['edit'] : null;

if ($edit == 'ok') {

  $sqlU = "UPDATE etat_commande SET id_commande='$id_commande', nom='$nom',adresse='$adresse',phone='$phone',date_achat='$date_achat',total='$total',payement='$payement',livraison='$livraison',date_livraison='$date_livraison' WHERE id=$id";

  $set = mysqli_query($connect, $sqlU) or die(mysqli_error($connect));
}

if ($set) {
  header('location:etat_commande.php');
}


?>
<!-- Main content -->
<div class="content">
  <h2>Edit etat_commande</h2>
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
                <label for="id_commande">id_commande</label>
                <input type="text" class="form-control" name="id_commande" placeholder="Enter id_commande" value="<?= $data["id_commande"] ?>">
              </div>
              <div class="form-group">
                <label for="nom">nom</label>
                <input type="text" class="form-control" name="nom" placeholder="Enter nom" value="<?= $data["nom"] ?>">
              </div>
              <div class="form-group">
                <label for="adresse">adresse</label>
                <input type="text" class="form-control" name="adresse" placeholder="Enter adresse" value="<?= $data["adresse"] ?>">
              </div>
              <div class="form-group">
                <label for="phone" class="form-label">phone</label>
                <input type="text" class="form-control" name="phone" id="phone">
              </div>
              <div class="form-group">
                <label for="date_achat">date_achat</label>
                <input type="datetime-local" class="form-control" name="date_achat" placeholder="Enter date_achat" value="<?= $data["date_achat"] ?>">
              </div>
              <div class="form-group">
                <label for="total">total</label>
                <input type="number" class="form-control" name="total" placeholder="Enter total" value="<?= $data["total"] ?>">
              </div>
              <div class="form-group">
                <label for="payement">payement</label>
                <input type="text" class="form-control" name="payement" placeholder="payement" value="<?= $data["payement"] ?>">
              </div>
              <div class="form-group">
                <label for="livraison">livraison</label>
                <input type="text" class="form-control" name="livraison" placeholder="livraison" value="<?= $data["livraison"] ?>">
              </div>
              <div class="form-group">
                <label for="date_livraison">date_livraison</label>
                <input type="datetime-local" class="form-control" name="date_livraison" placeholder="date_livraison" value="<?= $data["date_livraison"] ?>">
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