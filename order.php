<?php
session_start();
if ($_SESSION['mine'][0]['id'] == 0) {
    header('location:front.php');
}
// print_r($_SESSION['mine']);
require_once 'Header.php';
require_once 'config.php';

// $sql0 = 'SELECT * FROM commande';
// $res0 = mysqli_query($connect, $sql0) or die(mysqli_error($connect));
$sql = "SELECT commande. * ,clients.nom AS 'nom' FROM commande INNER JOIN clients ON commande.id_client = clients.id ";
$res = mysqli_query($connect, $sql) or die(mysqli_error($connect));

// $num = mysqli_num_rows($res);

?>

<!-- Main content -->
<div class="content">
    <h2>Order </h2>
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
                                    <th>id_client</th>
                                    <th>total</th>
                                    <th>date_creation</th>
                                    <th>nom</th>
                                    <th>statut</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($data = mysqli_fetch_array($res)) :


                                ?>
                                    <tr>
                                        <td><?= $data['id'] ?></td>
                                        <td><?= $data['id_client'] ?></td>
                                        <td><?= $data['total'] ?></td>
                                        <td><?= $data['date_creation'] ?></td>
                                        <td><?= $data['nom'] ?></td>




                                        <td>
                                            <!-- <a onclick="return confirm('do you really want to delete')" href="deletecategory.php?u=<?= $data['id'] ?>" class="btn btn-danger">
                              <i class="fas fa-trash-alt"></i> Del
                            </a> -->
                                            <a href="list_order.php?m=<?= $data['id'] ?>" class="btn btn-info">
                                                <i class="fas fa-edit"></i> Afficher details
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
    </div>

    </body>

    </html>




    <?php
    require_once 'footer.php';

    ?>