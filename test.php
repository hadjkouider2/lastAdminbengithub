<?php
require_once 'config.php';
function getAllclients()
{
    global $connect;
    $sql = "SELECT id,nom,email,password,role FROM clients ";
    $q = mysqli_query($connect, $sql);
    return mysqli_fetch_all($q, MYSQLI_ASSOC);
}
function getAllidandroleofclients()
{
    global $connect;
    $sql = "SELECT id,role FROM clients ";
    $q = mysqli_query($connect, $sql);
    return mysqli_fetch_all($q, MYSQLI_ASSOC);
}
function getAllemailpassroleofclients()
{
    global $connect;
    $sql = "SELECT email,password,role FROM clients ";
    $q = mysqli_query($connect, $sql);
    return mysqli_fetch_all($q, MYSQLI_ASSOC);
}
function getrole()
{
    global $connect;
    $sql = "SELECT role FROM clients ";
    $q = mysqli_query($connect, $sql);
    return mysqli_fetch_all($q, MYSQLI_ASSOC);
}


$clients = getAllclients();
$idroleclients = getAllidandroleofclients();
$users  = getAllemailpassroleofclients();
$role = getrole();

// echo '<prev>';
// var_dump($role);
// echo '</prev>';
?>
<?php
function getid()
{
    $email = 'ecoin@dz.com';
    global $connect;
    $sql = "SELECT id FROM clients WHERE email = '$email' ";
    $q = mysqli_query($connect, $sql);
    return mysqli_fetch_all($q, MYSQLI_ASSOC);
}
$users = getid();
// echo '<prev>';
// print_r($users);
// echo '</prev>';
$pass = password_hash('123',PASSWORD_DEFAULT);

$password = '123';

if ($password == password_verify($password,$pass)){
    echo('yesss');
}else{
    echo('NOOOO');
}
password = password_verify($password,$pass);
?>
<!--  -->





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>