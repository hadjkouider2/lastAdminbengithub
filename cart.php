<?php
session_start();
require_once 'config.php';
require_once('functions.php');
?>




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
        <a href="logout.php">logout</a>
        <nav class="navigation mt-1">
            <?php
            $idclients = $_SESSION['mine'][0]['id'];
            ?>
            <a class="float-end" href="cart.php"><i class="fa-solid fa-cart-shopping"></i> Cart-shopping (<?php echo count($_SESSION['cart'][$idclients]); ?>)</a>


        </nav>
    </header>

    <div class="container site-section aos-init aos-animate mt-5   id='sticky'">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center border-primary">

                <h2 class="font-weight-light text-primary mb-5">Cart-shopping</h2>
                <p class="color-black-opacity-5">Votre commande de produits</p>
            </div>


        </div>

        <div class="row">
            <?php
            $idclients = $_SESSION['mine'][0]['id'];
            $cart = $_SESSION['cart'][$idclients];
            $idproducts = array_keys($cart);
            $idproducts = implode(',', $idproducts);
            $products = getproductsforcart($idproducts);
            // echo "<prev>";
            // print_r($products);
            // echo "</prev>";


            if (empty($cart)) {
            ?>
                <div class="alert alert-marning" role="alert">
                    your cart is empty
                </div>
            <?php
            } else {
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
                            <th scope="col">Operations</th>
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
                            <td><?php echo $product['id'] ?></td>
                            <td><img width="80px" src="images/<?php echo $product['photo'] ?>"> </td>
                            <td><?php echo $product['nom'] ?></td>
                            <td>
                                <form action="Cart.php" method="post">
                                    <button onclick="return false;" class="btn-outline-secondary btn-lg mx-4 counter-plus">plus</button>
                                    <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                    <input class="text-center" value="<?php echo $cart[$product['id']] ?>" type="number" name="qty" id="qty" max="99">
                                    <button onclick="return false;" class="btn-outline-secondary btn-lg mx-4 counter-moins">moin</button>
                                    <input class="btn-success" type="submit" value="Modifier" name="ajouter">
                                </form>
                            </td>
                            <td><?php echo $product['prix'] ?></td>
                            <td><?php echo $totalproduct ?>Da</td>
                        </tr>

                    <?php
                    }
                    ?>
                    <tfoot>
                        <tr>
                            <td colspan="5" align="right"><strong>Total</strong></td>
                            <td><?php echo $total ?>Da</td>
                        </tr>
                    </tfoot>
                </table>
                </ul>
            <?php
            }


            ?>



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