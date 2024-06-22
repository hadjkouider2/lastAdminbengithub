<?php
require_once 'config.php';
$cid = $_GET['u'];
$sql = "DELETE FROM products WHERE id=$cid";
$res = mysqli_query($connect, $sql) or die(mysqli_error($connect));
if ($res) {
    header('location:products.php');
}
