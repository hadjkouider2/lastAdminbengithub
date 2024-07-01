<?php
$articles = json_decode(file_get_contents('data/articles.json'), true);
require_once 'config.php';
require_once('functions.php');

$myCats = getLatesCat(3);
// $catID = (isset($_GET['p'])) ? $_GET['p'] : NULL;

// if ($catID)
@$products = getProducts($id);
// echo '<prev>';
// print_r($products);
// echo '</prev>';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>website with login and register form</title>
    <link href="https://fonts.googleapis.com/css2?family=Kenia&amp;display=swap" rel="stylesheet">
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
            <a href="#">Contact</a>
            <a href="logout.php">logout</a>
            <button class="btnLogin-popup"><a href="login.php">Administration</a></button>
        </nav>
    </header>
    <section class="site-section aos-init aos-animate mt-5  " id='sticky'>
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center border-primary">
                    <h2 class="font-weight-light text-primary mb-5">Nos articles</h2>
                    <p class="color-black-opacity-5">Nos articles les plus demandé</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php foreach ($products as $product) :  ?>
                    <div class="col">

                        <div class="card" style="width: 18rem;">
                            <img src="images/<?= $product['photo'] ?>" class="card-img-top" alt="">
                            <div class="card-body">

                                <h5 class="card-title"><?= $product['nom']  ?></h5>
                                <span class="badge text-bg-info"><?= getCatById($product['category_id'])['nom'] ?></span>
                                <p class="card-text"><?= $product['prix'] ?>$</p>
                                <a href="detailproducts.php?m=<?= $product['id'] ?>" class="btn btn-primary">Add To Cart</a>
                            </div>
                        </div>


                    </div>
                <?php endforeach;  ?>

            </div>
        </div>
    </section>
    </main>
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
    <script src="script/script.js"></script>
</body>

</html>