<?php
require_once 'Header.php';
require_once 'config.php';
$id = (isset($_GET['m'])) ? $_GET['m'] : NULL;


$sql = "SELECT * FROM ligne_commande WHERE id_commande = '$id' ORDER BY id DESC";
$res = mysqli_query($connect, $sql) or die(mysqli_error($connect));

// $num = mysqli_num_rows($res);



?>
<!-- Main content -->
<div class="content">
<h2>list of order </h2>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <!-- <h3 class="card-title">list of order</h3> -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">

                        <!-- <a href="addcategory.php" class="btn btn-primary btn-lg float-right mr-4   mt-3">
                    <i class="fas fa-user-plus"></i>
                    add category</a> -->
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th style="width: 10px p-10">id</th>
                                    <th>id_products</th>
                                    <th>id_commande</th>
                                    <th>prix</th>
                                    <th>qty</th>
                                    <th>total</th>

                                </tr>

                            </thead>
                            <tbody>

                                <?php

                                while ($data = mysqli_fetch_array($res)) :

                                ?>
                                    <tr>
                                        <td><?= $data['id'] ?></td>
                                        <td><?= $data['id_products'] ?></td>
                                        <td><?= $data['id_commande'] ?></td>
                                        <td><?= $data['prix'] ?></td>
                                        <td><?= $data['qty'] ?></td>
                                        <td><?= $data['total'] ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            <tfoot>


                            </tfoot>


                            <tr>
                                <td colspan="6" align="right">

                                    <a href="printlistorder.php?m=<?= $_GET['m'] ?>" class="btn btn-info">
                                        <i class="fas fa-edit"></i> Print
                                    </a>
                                </td>
                            </tr>

                            </tbody>
                        </table>

                    </div>
                    <!-- /.card-body -->
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