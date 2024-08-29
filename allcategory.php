<?php
session_start();
if ($_SESSION['mine'][0]['id'] == 0) {
    header('location:front.php');
}
$role = $_SESSION['mine'][0]['role'];
// print_r($_SESSION['mine'][0]['password']);


require_once 'config.php';
require_once('functions.php');

$myCats = getLatesCat(3);
// $catID = (isset($_GET['p'])) ? $_GET['p'] : NULL;

// if ($catID)
@$products = getProducts($id);
// echo '<prev>';
// print_r($products);
// echo '</prev>';



echo json_encode($_COOKIE);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
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
            <a href="allcategory.php">Acceuil</a>



            <?php foreach ($myCats as $cat) : ?>
                <a href=" productsCat.php?p=<?= $cat['id'] ?>"><?= $cat['nom'] ?></a>
            <?php endforeach; ?>
            <a href="contact us.php">Contact us</a>
            <?php if ($role != 'user') { ?>
                <button class="btnlogin-popup"><a href="dashboard.php">Administration</a></button>
            <?php } ?>
            <a href="logout.php">logout</a>

        </nav>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Categories menu
            </button>
            <ul class="dropdown-menu">
                <?php foreach ($myCats as $cat) : ?>
                    <li><a href=" productsCat.php?p=<?= $cat['id'] ?>"><?= $cat['nom'] ?></a></li>
                <?php endforeach; ?>

            </ul>
        </div>
    </header>
    <section class="site-section aos-init aos-animate mt-5  " id='sticky'>
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center border-primary">
                    <h2 class="font-weight-light text-primary mb-5">Nos articles</h2>
                    <?php
                    $cookie_nom =  $_SESSION['mine'][0]['nom'];
                    //  
                    if (!isset($_COOKIE[$cookie_nom])) {
                        echo "Cookie nom  " . $cookie_nom  . "  is not set ";
                    } else {
                        echo "Welcome sir : " . $cookie_nom  . " .<br>";
                        echo "Your last choice : " . $_COOKIE[$cookie_nom] . " . <br>";
                    }
                    ?>
                    <p class="color-black-opacity-5">Nos articles les plus demandé </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php foreach ($products as $product) :  ?>
                    <div class="col-4">

                        <div class="card" style="width: 18rem;">
                            <img src="images/<?= $product['photo'] ?>" class="img-fluid" alt="">
                            <div class="card-body" style="height: 25rem;">

                                <h5 class="card-title"><?= $product['nom']  ?></h5>
                                <h5 class="card-title"><?= $product['details']  ?></h5>
                                <span class="badge text-bg-info"><?= getCatById($product['category_id'])['nom'] ?></span>
                                <h5 class="card-title">Stock : <?= $product['stock'] ?></h5>
                                <h5 class="card-title">Prix : <?= $product['prix'] ?>$</h5>


                                <a href="detailproducts.php?m=<?= $product['id'] ?>" name="add" class="btn btn-primary">Add To Cart</a>
                            </div>
                        </div>


                    </div>
                <?php endforeach; ?>
                <hr>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>