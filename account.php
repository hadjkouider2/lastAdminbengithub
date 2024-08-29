<?php
session_start();
require_once 'config.php';
require_once('functions.php');
$myCats = getLatesCat(3);


if (!isset($_SESSION['mine'])) {
    header('location:front.php');
}



$cookies = explode('; ', $_SERVER['HTTP_COOKIE']);
$allCookies = [];

foreach ($cookies as $cookie) {
    $keyAndValue = explode('=', $cookie);
    $allCookies[$keyAndValue[0]] = $keyAndValue[1];
}

var_dump($allCookies);
/*
        array(1) {
            ["testing.dots"]=>
                string(5) "value"
        }
    */

echo $allCookies['testing.dots'];
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

        <nav class="navigation mt-1">
            <a href="allcategory.php">Acceuil</a>
            <?php foreach ($myCats as $cat) : ?>
                <a href="productsCat.php?p=<?= $cat['id'] ?>"><?= $cat['nom'] ?></a>
            <?php endforeach; ?>
            <a href="store.php">Store</a>
            <a href="logout.php">logout</a>
            <a href="invoice.php?m=<?= $_SESSION['mine'][0]['id'] ?>" role="button">Invoice</a>
            <?php
            $idclients = $_SESSION['mine'][0]['id'];
            define('PRODUCTS_COUNT', count($_SESSION['cart'][$idclients]));
            ?>
            <!-- <a class="float-end" href="cart.php"><i class="fa-solid fa-cart-shopping"></i> Cart-shopping (<?php echo PRODUCTS_COUNT; ?>)</a> -->


        </nav>
    </header>

    <div class="container site-section aos-init aos-animate mt-5   id='sticky'">

        <a class="float-end." href="cart.php"><i class=" fa-solid fa-cart-shopping"></i> <strong>Cart-shopping (<?php echo PRODUCTS_COUNT; ?>)</strong></a>


        <div class="row justify-content-center mb-5">

            <div class="col-md-7 text-center border-primary">

                <h2 class="font-weight-light text-primary mb-5">Cart-shopping</h2>
                <p class="font-weight-bold color-black-opacity-5">Votre commande de produits</p>
            </div>
        </div>
        <div class="row">
        <?php
        if (empty($cart)) {
            ?>
                <div class=" text-center alert alert-warning w-100" role="alert">
                    your cart is empty!!!!!.
                </div>
            <?php
            
            } else {
                $idproducts = array_keys($cart);
                $idproducts = implode(',', $idproducts);
                $products = getproductsforcart($idproducts);
            }
            ?>




            <table class="table">
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
                // $total = 0;
                // foreach ($products as $product) {
                //     $idproduct = $product['id'];
                //     $totalproduct = $product['prix'] * $cart[$product['id']];
                //     $total += $totalproduct;
                ?>
                    <tr>
                        <td><strong><?php echo $product['id'] ?></strong></td>

                        <td><img width="80px" src="images/<?php echo $product['photo'] ?>"> </td>
                        <td><strong><?php echo $product['nom'] ?></strong></td>
                        <td>
                            <form action="Cart.php" method="post">
                                <button onclick="return false;" class="btn-outline-primary btn-lg mx-1 counter-plus font-weight-bold">+</button>
                                <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                <input type="hidden" name="nom" value="<?= $product['nom'] ?>">
                                <input type="hidden" name="prix" value="<?= $product['prix'] ?>">
                                <input class="text-center font-weight-bold" value="<?php echo $cart[$product['id']] ?>" type="text" name="qty" id="qty" max="99">
                                <button onclick="return false;" class="btn-outline-primary btn-lg mx-1 counter-moins font-weight-bold ">-</button>
                                <input class="btn-outline-primary btn-lg mx-1" type="submit" value="Ajouter" name="ajouter">
                                <input formaction="store.php" onclick="return confirm('Voulez vous conserver votre choix')" class="btn-outline-primary btn-lg mx-1 float-right " type="submit" value="Store" name="store">
                                <?php
                                if ($qty != 0) {
                                ?>
                                    <input formaction="deleteCart.php" onclick="return confirm('Voulez vous delete ce choix')" class=" btn-outline-danger btn-lg mx-1" type="submit" value="delete" name="delete">

                                <?php
                                }
                                ?>
                            </form>


                        </td>
                        <td><strong><?php echo $product['prix'] ?></strong></td>
                        <td><strong><?php echo $totalproduct ?>Da</strong></td>
                    </tr>

                <?php
                // }
                ?>
                <tfoot>
                    <tr>
                        <td colspan="5" align="right"><strong>Total</strong></td>
                        <td><strong><?php echo $total ?>Da</strong></td>
                    </tr>
                    <tr>
                        <td colspan="6" align="right">

                            <form action="cart.php" method="post">
                                <input class="btn-outline-primary btn-lg mx-4" type="submit" value="Valider la commande" name="valider">
                                <input onclick="return confirm('Voulez vous vraiment vider le panier')" class="btn-outline-danger btn-lg mx-4" type="submit" value="Vider le panier" name="vider">
                            </form>


                        </td>
                    </tr>

                </tfoot>
            </table>
            




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