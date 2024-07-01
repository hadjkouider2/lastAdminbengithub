<?php
session_start();
$articles = json_decode(file_get_contents('data/articles.json'), true);
require_once 'config.php';
require_once('functions.php');

$myCats = getLatesCat(3);
$id = (isset($_GET['m'])) ? $_GET['m'] : NULL;

if (!isset($_SESSION['mine'])) {
    header('location:front.php');
}
$id = $_POST['id'];
$qty = $_POST['qty'];
$idclients = $_SESSION['mine'][0]['id'];
if (!empty($id)  &&  !empty($qty)) {
    if (!isset($_SESSION['cart'][$idclients])) {
        $_SESSION['cart'][$idclients] = [];
    }
    $_SESSION['cart'][$idclients][$id] = $qty;


    echo "<prev>";
    print_r($_SESSION['cart']);
    echo "</prev>";
    echo count($_SESSION['cart'][$idclients]);
} else {
    header("location:Cart.php?id=$id");
}

if ($id)
    $products = getProductsById($id);

if (!isset($_SESSION['mine'])) {
    header('location:front.php');
}



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
            <a href="#">Acceuil</a>
            <?php foreach ($myCats as $cat) : ?>
                <a href="productsCat.php?p=<?= $cat['id'] ?>"><?= $cat['nom'] ?></a>
            <?php endforeach; ?>
            <a href="contact us.php">Contact</a>
            <a href="logout.php">logout</a>
            <button class="btnLogin-popup"><a href="login.php">Administration</a></button>
        </nav>
    </header>

    <div class="container site-section aos-init aos-animate mt-5   id='sticky'">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center border-primary">

                <h2 class="font-weight-light text-primary mb-5">Nos articles</h2>
                <p class="color-black-opacity-5">Nos articles les plus demandé</p>
            </div>
            <?php
            $idclients = $_SESSION['mine'][0]['id'];
            ?>
            <a class="float-end" href="cart.php"><i class="fa-solid fa-cart-shopping"></i> Cart-shopping (<?php echo count($_SESSION['cart'][$idclients]); ?>)</a>

        </div>

        <div class="row">

            <?php foreach ($products as $product) :  ?>

                <div class="col-md-6">
                    <img class="img img-fluid w-75" src="images/<?= $product['photo'] ?>" class="card-img-top" alt="">
                </div>
                <div class="col-md-6" style="width: 18rem;">
                    <hr>
                    <h2 class="card-title"><?= $product['nom']  ?></h2>
                    <h4 class="card-title"> <span class="badge text-bg-info"><?= getCatById($product['category_id'])['nom'] ?></span></h4>

                    <?php
                    $discount = $product['discount'];
                    $prix = $product['prix'];
                    if (!empty($discount)) {

                        $total = $prix - (($prix * $discount) / 100);
                    ?>
                        <p class="card-text"><strike><strong>Price :<?= $product['prix'] ?>$</strong></strike></p>
                        <p class="card-text"><strong>New Price :<?= $total ?>$</strong></p>
                    <?php
                    } else {
                    ?>
                        <p class="card-text"><strong>Price :<?= $product['prix'] ?>$</strong></p>
                    <?php
                    }
                    ?>
                    <?php if (!empty($product['discount'])) {
                    ?>
                        <p class="card-text"><strong>discount :<?= $product['discount'] ?>%</strong></p>
                    <?php
                    } ?>
                    <div class="card-footer">
                        <!-- <div class="counter"> -->
                        <form action="Cart.php" method="post">
                            <button onclick="return false;" class="btn-outline-secondary btn-lg mx-4 counter-plus">plus</button>
                            <input type="hidden" name="id" value="<?= $product['id'] ?>">
                            <input class="text-center" value="0" type="number" name="qty" id="qty" max="99">
                            <button onclick="return false;" class="btn-outline-secondary btn-lg mx-4 counter-moins">moin</button>
                            <input class="btn btn-success" type="submit" value="Ajouter" name="ajouter">
                        </form>
                        <!-- </div> -->
                    </div>

                    <!-- <a href="cart.php?m=<?= $product['id'] ?>" class="btn btn-primary">Add To Cart</a> -->

                </div>





            <?php endforeach;  ?>

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