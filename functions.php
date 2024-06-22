<?php
require_once('config.php');
require_once('const.php');
function add($data)
{
    global $connect;
    $sql  = "INSERT INTO cat(id,nom,detail) VALUES(NULL,'${data['nom']}','${data['detail']}')";
    $q = mysqli_query($connect, $sql);
    if ($q)  return 1;
    return 0;
}
/***
 * product file 
 * category 
 * 
 */

function getAllCat()
{
    global $connect;
    $sql = "SELECT id,nom FROM cat";
    $q = mysqli_query($connect, $sql);
    return mysqli_fetch_all($q, MYSQLI_ASSOC);
}



function getLatesCat($num)
{
    global $connect;
    $sql = "SELECT id,nom FROM cat ORDER BY id DESC LIMIT $num";
    $q = mysqli_query($connect, $sql);
    return mysqli_fetch_all($q, MYSQLI_ASSOC);
}



function upload()
{
    // var_dump($_FILES);
    $file_name = generateName('product') . '.' . getExt();
    $size  = getSize();
    if ($size <= MAX_UP && isPhoto()) {
        move_uploaded_file($_FILES['photo']['tmp_name'], P . $file_name);
        return $file_name;
    }
    return 0;
}

function isPhoto()
{
    return in_array(getExt(), PHOTOS);
}


function generateName($name)
{
    return md5($name . '_' . time());
}
function getExt()
{
    $file =  $_FILES['photo']['name'] ? $_FILES['photo']['name'] : 'default.png';
    $file_name_p2 = explode('.', $file);
    $file_name_p2  = end($file_name_p2);
    return $file_name_p2;
}



function getCatById($id)
{
    global $connect;
    $sql = "SELECT nom FROM cat WHERE id= $id  LIMIT 1";
    $q = mysqli_query($connect, $sql);
    return mysqli_fetch_array($q, MYSQLI_ASSOC);
}
function getSize()
{
    return  $_FILES['photo']['size'];
}



function addProduct($data, $file)
{
    global $connect;
    $sql  = "INSERT INTO products(id,nom,prix,qty,cat_id,photo) 
        VALUES(NULL,'${data['nom']}','${data['prix']}',
                    ${data['qty']},${data['cat_id']},'$file')";
    $q = mysqli_query($connect, $sql);
    if ($q)  return 1;
    return 0;
}



function getProductsByCat($id)
{
    global $connect;
    $sql = "SELECT * FROM products WHERE category_id = $id ORDER BY id DESC ";
    $q = mysqli_query($connect, $sql);
    return mysqli_fetch_all($q, MYSQLI_ASSOC);
}



// isActive($id)
// isConfirm($id)
