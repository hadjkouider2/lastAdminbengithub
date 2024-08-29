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
function getproductsforcart($idproducts)
{
    global $connect;
    $sql = "SELECT * FROM products WHERE id IN ($idproducts)";
    $q = mysqli_query($connect, $sql);
    $counter = mysqli_num_rows($q);
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
// createdbyme:
function getProductsById($id)
{
    global $connect;
    $sql = "SELECT * FROM products WHERE id = $id ";
    $q = mysqli_query($connect, $sql);
    return mysqli_fetch_all($q, MYSQLI_ASSOC);
}
function getclientsById()
{
    global $connect;
    $sql = "SELECT * FROM clients ";
    $q = mysqli_query($connect, $sql);
    return mysqli_fetch_all($q, MYSQLI_ASSOC);
}
function getProducts($id)
{
    global $connect;
    $sql = "SELECT * FROM products ";
    $q = mysqli_query($connect, $sql);
    return mysqli_fetch_all($q, MYSQLI_ASSOC);
}
function getclientById($cid)
{
    global $connect;
    $sql = "SELECT * FROM clients WHERE id = $cid ";
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
function getid()
{
    $email = '';
    global $connect;
    $sql = "SELECT id FROM clients WHERE email = '$email' ";
    $q = mysqli_query($connect, $sql);
    return mysqli_fetch_all($q, MYSQLI_ASSOC);
}

function getmaxid_commande()
{
    global $connect;
    $sql = "SELECT id FROM commande WHERE id = ( SELECT MAX( id ) AS idMax FROM commande )";
    $q = mysqli_query($connect, $sql);
    return mysqli_fetch_array($q, MYSQLI_ASSOC);
}
function getinfoforinvoice()
{
    global $connect;
    $sql = 'SELECT id,nom,prix FROM products';
    $q = mysqli_query($connect, $sql);
    return mysqli_fetch_array($q, MYSQLI_ASSOC);
}
function getinfoclient()
{
    global $connect;
    $sql = 'SELECT id,nom,email FROM clients';
    $q = mysqli_query($connect, $sql);
    return mysqli_fetch_array($q, MYSQLI_ASSOC);
}
function getinfoligne_commande()
{
    global $connect;
    $sql = 'SELECT id_commande,prix,qty,total FROM ligne_commande';
    $q = mysqli_query($connect, $sql);
    return mysqli_fetch_array($q, MYSQLI_ASSOC);
}
function getinfocommande()
{
    global $connect;
    $sql = 'SELECT total,date_creation FROM commande';
    $q = mysqli_query($connect, $sql);
    return mysqli_fetch_array($q, MYSQLI_ASSOC);
}
function getidetnomfromproducts()
{
    global $connect;
    $sql = 'SELECT id,nom FROM products';
    $q = mysqli_query($connect, $sql);
    return mysqli_fetch_array($q, MYSQLI_ASSOC);
}
function gettotalcommande()
{
    $id = '';
    global $connect;
    $sql = "SELECT total FROM commande WHERE id = '$id' ";
    $q = mysqli_query($connect, $sql);
    return mysqli_fetch_array($q, MYSQLI_ASSOC);
}


















?>

<script type="text/javascript">
    function pwd_handler(form) {
        if (form.password.value != '') {
            form.md5password.value = md5(form.password.value);
            form.password.value = '';
        }
    }
</script>
<?php

?>