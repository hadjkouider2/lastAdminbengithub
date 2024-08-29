<?php

require_once 'config.php';
require_once('functions.php');
$id = (isset($_GET['m'])) ? $_GET['m'] : NULL;

$sql = "SELECT * FROM ligne_commande WHERE id_commande = '$id' ORDER BY id DESC";
$res = mysqli_query($connect, $sql) or die(mysqli_error($connect));

// $num = mysqli_num_rows($res);
$id = (isset($_GET['m'])) ? $_GET['m'] : NULL;

$sql = "SELECT total FROM commande WHERE id = '$id' ";
$q = mysqli_query($connect, $sql);
$tg = mysqli_fetch_array($q, MYSQLI_ASSOC);
$total = implode(',', $tg);

$sql = "SELECT commande.*,clients.email , clients.nom FROM commande INNER JOIN clients ON commande.id_client = clients.id";
$rest = mysqli_query($connect, $sql);
$info = mysqli_fetch_array($rest, MYSQLI_ASSOC);
$date_creation = $info['date_creation'];
$nom = $info['nom'];
$email = $info['email'];
// print_r($info);
// $infG = implode(',', $info);
// echo ($infG);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Benbouali.INC | Invoice Print</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/adminlte.min.css">
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h2 class="page-header">
                        <i class="fas fa-globe"></i> Benbouali.Inc.
                        <small class="float-right">Date: <?php echo ($date = date("d-m-Y")); ?></small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    From
                    <address>
                        <strong>Benbouali, Inc.</strong><br>
                        Cite colonel CHAABANI, BT 44<br>
                        DAR EL BEIDA, CP 16032<br>
                        Phone: (055) 093-0010<br>
                        Email: benboualihk@gmail.com
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    To
                    <address>
                        <strong>M°<?php echo ($nom) ?></strong><br>
                        Phone: (555) 539-1037<br>
                        Email:<?php echo ($email) ?>
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>Invoice #007612</b><br>
                    <br>
                    <b>Order ID:</b><?php echo ($id); ?><br>
                    <b>Payment Due:</b><?php echo ($date_creation) ?><br>
                    <b>Account:</b> 968-34567
                </div>
                <!-- /.col -->
            </div>
            <table class="table table-lg">
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
                    <tr>
                        <td colspan="5" align="right">
                            <p>Total : <?php echo ($total); ?></p>
                        </td>
                    </tr>
                </tfoot>

                </tbody>
            </table>
        </section>
    </div>
    <!-- /.card-body -->
    <div class="row">
        <!-- accepted payments column -->
        <div class="col-6">
            <p class="lead">Payment Methods:</p>
            <img src="img/credit/visa.png" alt="Visa">
            <img src="img/credit/mastercard.png" alt="Mastercard">
            <img src="img/credit/american-express.png" alt="American Express">
            <img src="img/credit/paypal2.png" alt="Paypal">
        </div>
    </div>
    <footer>
        <div class="container">

            <div class="row pt-5 mt-5 text-center">
                <div class="col-md-12">
                    <div class="border-top pt-5">
                        <p>
                            Copyright ©<script>
                                document.write(new Date().getFullYear());
                            </script>2023 All rights reserved | This template is made with <i class="icon-heart"></i> by <a href="#" target="_blank">Benbouali</a>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </footer>

    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>