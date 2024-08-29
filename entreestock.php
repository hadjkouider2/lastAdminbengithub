<?php
require_once 'Header.php';
require_once 'config.php';
require_once 'functions.php';


$nom = isset($_POST['nom']) ? $_POST['nom'] : null;
$cat = isset($_POST['category']) ? $_POST['category'] : null;
$qtyini = isset($_POST['qtyini']) ? $_POST['qtyini'] : null;
$qtyvendu = isset($_POST['qtyvendu']) ? $_POST['qtyvendu'] : null;
$qtyrestante = isset($_POST['qtyrestante']) ? $_POST['qtyrestante'] : null;
$etat = isset($_POST['etat']) ? $_POST['etat'] : null;

$add = isset($_POST['add']) ? $_POST['add'] : null;

if ($add == 'ok') {

    $sql = "INSERT INTO gestion_stock(id,nom,category,qtyini,qtyvendu,qtyrestante,etat) VALUES(NULL,'$nom','$cat','$qtyini','$qtyvendu','$qtyrestante','$etat')";
    $set = mysqli_query($connect, $sql) or die(mysqli_error($connect));

    if ($set) {
        header('location:gestion_stock.php');
    }
}

//get all Category
$data = getAllCat();




?>
<!-- Main content -->
<div class="content">
<h2>Entrée_stock</h2>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Entrée des articles</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nom">nom</label>
                                <input type="nom" class="form-control" name="nom" placeholder="nom">
                            </div>
                            <div class="form-group">
                                <label for="category">category</label>
                                <input type="text" class="form-control" name="category" placeholder="category">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="qtyini">qtyini</label>
                            <input type="number" class="form-control" name="qtyini" id="qtyini">
                        </div>
                        <div class="form-group">
                            <label for="qtyvendu" class="form-label">qtyvendu</label>
                            <input type="number" class="form-control" name="qtyvendu" id="qtyvendu">
                        </div>
                        <div class="form-group">
                            <label for="qtyrestante" class="form-label">qtyrestante</label>
                            <input type="number" class="form-control" name="qtyrestante" id="qtyrestante">

                        </div>

                        <div class="form-group">
                            <label for="etat">etat</label>
                            <input type="text" class="form-control" name="etat" placeholder="etat">
                        </div>


                </div>

                <input type="hidden" name="add" value="ok">
                <button type="submit" class="btn btn-primary">entree</button>

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