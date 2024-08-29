<?php
require_once 'Header.php';
require_once 'config.php';

$sql = 'SELECT * FROM products';
$res = mysqli_query($connect, $sql) or die(mysqli_error($connect));

// $num = mysqli_num_rows($res);



?>
<!-- Main content -->
<div class="content">
  <h2>list products </h2>
  <div class="container-fluid">

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <!-- <h3 class="card-title">list products</h3> -->
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <a href="addproducts.php" class="btn btn-primary btn-lg float-right mr-4   mt-3">
              <i class="fas fa-user-plus"></i>
              add products</a>
            <table class="table table-sm">
              <thead>
                <tr>
                  <th style="width: 10px">id</th>
                  <th>nom</th>
                  <th>prix</th>
                  <th>stock</th>
                  <th>photo</th>
                  <th>category-id</th>
                  <th>discount</th>
                  <th>details</th>
                  <th>datetime</th>
                  <th>update_by</th>



                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($data = mysqli_fetch_array($res)) :

                ?>
                  <tr>
                    <td><?= $data['id'] ?></td>
                    <td><?= $data['nom'] ?></td>
                    <td><?= $data['prix'] ?> </td>
                    <td><?= $data['stock'] ?> </td>
                    <td><?= $data['photo'] ?></td>
                    <td><?= $data['category_id'] ?></td>
                    <td><?= $data['discount'] ?></td>
                    <td><?= $data['details'] ?></td>
                    <td><?= $data['datetime'] ?></td>
                    <td><?= $data['update_by'] ?></td>



                    <td>
                      <a onclick="return confirm('do you really want to delete')" href="deleteproducts.php?u=<?= $data['id'] ?>" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i> Del
                      </a>
                      <a href="editproducts.php?m=<?= $data['id'] ?>" class="btn btn-info">
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
</div>
<!-- /.content-wrapper -->

<?php
require_once 'footer.php';

?>