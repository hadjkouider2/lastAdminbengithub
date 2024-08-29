<?php
require_once 'Header.php';
require_once 'config.php';
require_once('functions.php');
$clients = getclientsById();
?>
<div class="wrapper">
    <h2>Contact </h2>
    <section class="content">
        <div class="card card-solid">
            <div class="card-body pb-0">
                <div class="row">
                    <?php foreach ($clients as $client) :  ?>
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-header text-muted border-bottom-0">
                                    Digital Strategist
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">

                                        <div class="col-7">
                                            <h2 class="lead"><b><?= $client['nom'] ?></b></h2>
                                            <p class="text-muted text-sm"><b>Email: </b> <?= $client['email'] ?></p>
                                            <ul class="ml-4 mb-0 fa-ul text-muted">

                                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #:<?= $client['phone'] ?></li>
                                            </ul>
                                        </div>
                                        <div class="col-5 text-center">
                                            <img src="img/avatar.png" alt="user-avatar" class="img-circle img-fluid">
                                        </div>

                                    </div>
                                </div>
                                <div class="card-footer">

                                    <div class="text-right">
                                        <a href="contact us.php" class="btn btn-sm bg-teal">
                                            <i class="fas fa-comments"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-primary">
                                            <i class="fas fa-user"></i> View Profile
                                        </a>
                                    </div>

                                </div>

                            </div>

                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </section>
</div>
<?php
require_once 'footer.php';

?>