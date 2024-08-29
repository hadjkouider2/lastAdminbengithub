<?php
session_start();
require_once 'config.php';
require_once('functions.php');
$myCats = getLatesCat(3);
$id = (isset($_GET['m'])) ? $_GET['m'] : NULL;
$sql0 = "SELECT nom,email FROM clients WHERE id = '$id' ";
$res = mysqli_query($connect, $sql0) or die(mysqli_error($connect));
$into = mysqli_fetch_array($res, MYSQLI_ASSOC);
$nom = $into['nom'];
$email = $into['email'];
print_r($into);

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





// echo "<prev>";
// var_dump($into);

// echo "</prev>";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>website with login and register form</title>
    <link href="https://fonts.googleapis.com/css2?family=Kenia&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="style/all.min.css">
    <link rel="stylesheet" href="style/style2.css">

</head>

<body>
    <header class="titleCommand">
        <h2 class="logo">Ecommerce</h2>
        < <nav class="navigation mt-1">
            <?php foreach ($myCats as $cat) : ?>
                <a href="productsCat.php?p=<?= $cat['id'] ?>"><?= $cat['nom'] ?></a>
            <?php endforeach; ?>
            <a href="logout.php">logout</a>
            <?php
            $idclients = $_SESSION['mine'][0]['id'];
            define('PRODUCTS_COUNT', count($_SESSION['cart'][$idclients]));
            ?>
            <a class="float-end" href="cart.php"><i class="fa-solid fa-cart-shopping"></i> Cart-shopping (<?php echo PRODUCTS_COUNT; ?>)</a>


            </nav>
    </header>

    <div class="container site-section aos-init aos-animate mt-5   id='sticky'">
        <!-- <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center border-primary">

                <h2 class="font-weight-light text-primary mb-5">Invoice</h2>
                <p class="color-black-opacity-5"> Vos articles </p>
            </div>


        </div> -->
        <div class="col-12">
            <h4>
                <i class="fas fa-globe"></i> Benbouali, Inc.
                <small class="float-right">Date:<?php echo ($date = date("d-m-Y")); ?></small>
            </h4>
        </div>
        <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info ml-2">
        <div class="col-sm-4 invoice-col ">
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
            <b>Payment Due:</b><?php echo ($date = date("d-m-Y")); ?><br>
            <b>Account:</b> ### - ####
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
    <div class="">
        <div class="col-12">
            <form action="" method="post">
                <a href="print.php" class="float-right btn-outline-primary btn-lg mx-5 border border-primary ">
                    <i class="fas fa-print"></i> Print</a>
            </form>

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
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="script/script.js"></script>
    <script src="script/counter.js"></script>
</body>

</html>