<?php
session_start();
require_once 'config.php';
require_once('functions.php');
$myCats = getLatesCat(3);
$id = (isset($_GET['m'])) ? $_GET['m'] : NULL;


$idclients = $_SESSION['mine'][0]['id'];
$cart = $_SESSION['cart'][$idclients];

$idproducts = array_keys($cart);

$idproducts = implode(',', $idproducts);

$sql = "SELECT * FROM products WHERE id IN ($idproducts)";
$q = mysqli_query($connect, $sql);
$counter = mysqli_num_rows($q);
$idproducts = mysqli_fetch_all($q, MYSQLI_ASSOC);


$idproducts = array_keys($cart);
$idproducts = implode(',', $idproducts);
$products = getproductsforcart($idproducts);

$sql = "SELECT commande.*,clients.email , clients.nom FROM commande INNER JOIN clients ";
$rest = mysqli_query($connect, $sql);
$info = mysqli_fetch_array($rest, MYSQLI_ASSOC);
$date_creation = $info['date_creation'];
$nom = $info['nom'];
$email = $info['email'];
print_r($info);


echo "<prev>";
// var_dump($idproducts);

echo "</prev>";

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
                        Email: <?php echo ($email) ?>
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>Invoice #007612</b><br>
                    <br>
                    <b>Order ID:</b> 4F3S8J<br>
                    <b>Payment Due:</b><?php echo ($date_creation) ?><br>
                    <b>Account:</b> 968-34567
                </div>
                <!-- /.col -->
            </div>
            <div class="col-12 table-responsive row ml-2 ">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Idproduits</th>
                            <th scope="col">Image</th>
                            <th scope="col">noms</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Total</th>

                        </tr>
                    </thead>
                    <?php
                    $total = 0;
                    foreach ($products as $product) {
                        $idproduct = $product['id'];
                        $totalproduct = $product['prix'] * $cart[$product['id']];
                        $total += $totalproduct;
                    ?>
                        <tr>
                            <td><strong><?php echo $product['id'] ?></strong></td>

                            <td><img width="80px" src="images/<?php echo $product['photo'] ?>"> </td>
                            <td><strong><?php echo $product['nom'] ?></strong></td>
                            <td>
                                <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                <input class="text-center font-weight-bold" value="<?php echo $cart[$product['id']] ?>" type="text" name="qty" id="qty" max="99">
                            </td>
                            <td><strong><?php echo $product['prix'] ?></strong></td>
                            <td><strong><?php echo $totalproduct ?>Da</strong></td>
                        </tr>

                    <?php
                    }
                    ?>
                    <tfoot>
                        <tr>
                            <td colspan="5" align="right"><strong>Total</strong></td>
                            <td><strong><?php echo $total ?>Da</strong></td>
                        </tr>

                    </tfoot>
                </table>
            </div>
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

        </section>

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