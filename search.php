<?php
require_once 'Header.php';
require_once 'config.php';
$k = $_GET['k'];

$query = "SELECT * FROM products WHERE category_id LIKE '$k%'";
$result = mysqli_query($connect, $query);
$data = mysqli_fetch_array($result);


?>
<!-- Main content -->
<div class="content">
    <h2>search </h2>
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
                                    <!-- <th style="width: 10px">id</th> -->
                                    <th>nom</th>
                                    <th>prix</th>
                                    <th>qty</th>
                                    <th>category-id</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($data = mysqli_fetch_array($result)) :

                                ?>
                                    <tr>
                                        <!-- <td><?= $data['id'] ?></td> -->
                                        <td><?= $data['nom'] ?></td>
                                        <td><?= $data['prix'] ?> </td>
                                        <td><?= $data['qty'] ?> </td>
                                        <td><?= $data['category_id'] ?></td>

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
</div>
<!-- /.content-wrapper -->

<?php
require_once 'footer.php';
