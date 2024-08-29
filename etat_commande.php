<?php
require_once 'Header.php';
require_once 'config.php';

$sql = 'SELECT * FROM etat_commande';
$res = mysqli_query($connect, $sql) or die(mysqli_error($connect));

// $num = mysqli_num_rows($res);



?>
<!-- Main content -->
<div class="content">
    <h2>Etat commande </h2>
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <!-- <h3 class="card-title">list products</h3> -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">

                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th style="width: 10px">id</th>
                                    <th>id_commande</th>
                                    <th>nom</th>
                                    <th>adresse</th>
                                    <th>phone</th>
                                    <th>date_achat</th>
                                    <th>total</th>
                                    <th>payement</th>
                                    <th>livraison</th>
                                    <th>date_livraison</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($data = mysqli_fetch_array($res)) :

                                ?>
                                    <tr>
                                        <td><?= $data['id'] ?></td>
                                        <td><?= $data['id_commande'] ?></td>
                                        <td><?= $data['nom'] ?> </td>
                                        <td><?= $data['adresse'] ?> </td>
                                        <td><?= $data['phone'] ?></td>
                                        <td><?= $data['date_achat'] ?></td>
                                        <td><?= $data['total'] ?></td>
                                        <td><?= $data['payement'] ?></td>
                                        <td><?= $data['livraison'] ?></td>
                                        <td><?= $data['date_livraison'] ?></td>




                                        <td>
                                            <a onclick="return confirm('do you really want to delete')" href="deletat_commande.php?u=<?= $data['id'] ?>" class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i> Del
                                            </a>
                                            <a href="editetat_commande.php?m=<?= $data['id'] ?>" class="btn btn-info">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>

                                        </td>
                                    </tr>
                                <?php endwhile; ?>
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

<!-- /.content-wrapper -->

<?php
require_once 'footer.php';

?>