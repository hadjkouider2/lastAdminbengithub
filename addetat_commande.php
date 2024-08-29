<?php
require_once 'Header.php';
require_once 'config.php';
require_once 'functions.php';


$id_commande = isset($_POST['id_commande']) ? $_POST['id_commande'] : null;
$nom = isset($_POST['nom']) ? $_POST['nom'] : null;
$adresse = isset($_POST['adresse']) ? $_POST['adresse'] : null;
$phone = isset($_POST['phone']) ? $_POST['phone'] : null;

$total = isset($_POST['total']) ? $_POST['total'] : null;
$payement = isset($_POST['payement']) ? $_POST['payement'] : null;
$livraison = isset($_POST['livraison']) ? $_POST['livraison'] : null;
// $date_livraison = isset($_POST['date_livraison']) ? $_POST['date_livraison'] : null;

$add = isset($_POST['add']) ? $_POST['add'] : null;

if ($add == 'ok') {

    $sql = "INSERT INTO etat_commande(id,id_commande,nom,adresse,phone,total,payement,livraison) VALUES(NULL,'$id_commande','$nom','$adresse','$phone','$total','$payement','$livraison')";
    $set = mysqli_query($connect, $sql) or die(mysqli_error($connect));

    if ($set) {
        header('location:etat_commande.php');
    }
}

//get all Category
$data = getAllCat();




?>
<!-- Main content -->
<div class="content">
    <h2>Add etat_commande</h2>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="id_commande">id_commande</label>
                                <input type="text" class="form-control" name="id_commande" placeholder="id_commande">
                            </div>
                            <div class="form-group">
                                <label for="nom">nom</label>
                                <input type="nom" class="form-control" name="nom" placeholder="nom">
                            </div>
                            <div class="form-group">
                                <label for="adresse">adresse</label>
                                <input type="text" class="form-control" name="adresse" placeholder="adresse">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone">phone</label>
                            <input type="number" class="form-control" name="phone" id="phone">
                        </div>
                        <div class="form-group">
                            <label for="date_achat" class="form-label">date_achat</label>
                            <input type="text" class="form-control" name="date_achat" id="date_achat">
                        </div>
                        <div class="form-group">
                            <label for="total" class="form-label">total</label>
                            <input type="text" class="form-control" name="total" id="total">
                        </div>
                        <div class="form-group">
                            <label for="payement">payement</label>
                            <input type="text" class="form-control" name="payement" placeholder="payement">
                        </div>
                        <div class="form-group">
                            <label for="livraison">livraison</label>
                            <input type="text" class="form-control" name="livraison" placeholder="livraison">
                        </div>
                        <div class="form-group">
                            <label for="date_livraison">date_livraison</label>
                            <input type="text" class="form-control" name="date_livraison" placeholder="date_livraison">
                        </div>


                </div>

                <input type="hidden" name="add" value="ok">
                <button type="submit" class="btn btn-primary">add</button>

                </form>
            </div>
        </div>







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