<?php
session_start();
require_once 'config.php';
require_once('functions.php');
$myCats = getLatesCat(3);
// @$products = getProducts($id);
$id = (isset($_GET['m'])) ? $_GET['m'] : NULL;

if (!isset($_SESSION['mine'])) {
    header('location:front.php');
}


$id = $_POST['id'];
$nom = $_POST['nom'];
$cookie_nom =  $_SESSION['mine'][0]['nom'];
$cookie_value = $nom;
setcookie($cookie_nom, $cookie_value, time() + 60 * 60 * 24 * 7, "/");
if (!isset($_COOKIE[$cookie_nom])) {
    echo "Cookie nom  " . $cookie_nom  . "  is not set ";
} else {
    echo "Cookie nom : " . $cookie_nom  . "!<br>";
    echo "Cookie Value : " . $_COOKIE[$cookie_nom] . "!<br>";
}


$idclients = $_SESSION['mine'][0]['id'];
$id = $_POST['id'];
unset($_SESSION['cart'][$idclients][$id]);
header('location:cart.php');


// setcookie("cookiename", "value1;value2;value3;value4");
// and then use explode like so;

// $a = explode(';', $_COOKIE['cookiename']);
// Then you will get an array of values from a single cookie;

// It is also saying you should not do this... in the following sentence of the doc;

// setcookie("cookiename", serialize( array("value1", "value2", "value3") );
// // next request
// $a = unserialize($_COOKIE['cookiename']);



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
    <header>





    </header>
    <div class=" dropdown col-2">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories menu
        </button>
        <ul class="dropdown-menu">
            <?php foreach ($myCats as $cat) : ?>
                <li><a href=" productsCat.php?p=<?= $cat['id'] ?>"><?= $cat['nom'] ?></a></li>
            <?php endforeach; ?>

        </ul>
    </div>
    <?php



    ?>
    <script src="script/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>


</html>