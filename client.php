<?php
require_once 'Header.php';
require_once 'config.php';

$sql = 'SELECT * FROM clients';
$res = mysqli_query($connect, $sql) or die(mysqli_error($connect));

// $num = mysqli_num_rows($res);



?>



<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">

      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">client list</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <a href="addclient.php" class="btn btn-primary btn-lg float-right mr-4   mt-3">
              <i class="fas fa-user-plus"></i>
              add client</a>
            <table class="table table-sm">
              <thead>
                <tr>
                  <th style="width: 10px">id</th>
                  <th>nom</th>
                  <th>email</th>
                  <th>password</th>
                  <th>role</th>
                  <th>adresse</th>
                  <th>date_creation</th>
                  <th>is_active</th>
                  <th>phone</th>
                  <th>code</th>

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
                    <td><?= $data['email'] ?></td>
                    <td><?= $data['password'] ?></td>
                    <td><?= $data['role'] ?></td>
                    <td><?= $data['adresse'] ?></td>
                    <td><?= $data['date_creation'] ?></td>
                    <td><?= $data['is_active'] ?></td>
                    <td><?= $data['phone'] ?></td>
                    <td><?= $data['code'] ?></td>

                    <td>
                      <a onclick="return confirm('do you really want to delete')" href="deleteclient.php?u=<?= $data['id'] ?>" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i> Del
                      </a>
                      <a href="editclient.php?m=<?= $data['id'] ?>" class="btn btn-info">
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