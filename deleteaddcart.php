<?php
session_start();

require_once 'config.php';
require_once('functions.php');


$id = (isset($_GET['m'])) ? $_GET['m'] : NULL;

if (!isset($_SESSION['mine'])) {
    header('location:front.php');
}

$qty = $_POST['qty'];
$idclients = $_SESSION['mine'][0]['id'];
$id = $_POST['id'];
unset($_SESSION['pre-cart'][$idclients][$id]);
header('location:addcart.php');
if (empty($cart)) {
    ?>
        <div class=" text-center alert alert-warning w-100" role="alert">
            your product is empty!!!!!.
        </div>
    <?php
 }