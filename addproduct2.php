<?php
//connect database
require_once 'config.php';

require_once 'functions.php';
include_once 'inc/header.php';

//get all Category
$data = getAllCat();

//get all data
$product['nom'] = (isset($_POST['nom']))?$_POST['nom']:NULL;
$product['prix'] = (isset($_POST['prix']))?$_POST['prix']:NULL;
$product['qty'] = (isset($_POST['qty']))?$_POST['qty']:NULL;
$product['cat_id'] = (isset($_POST['cat_id']))?$_POST['cat_id']:NULL;
//$product['photo'] = (isset($_POST['photo']))?$_POST['photo']:NULL;
$isSubmit= (isset($_POST['addproduct']))?$_POST['addproduct']:NULL;
if ($isSubmit == 'added') {
  //upload file
 $file = upload();
     if($file != 0){
      $isOk = addProduct($product,$file) ; 
      if($isOk)  echo "<h1>Product Added </h1>";
     } else echo "<h1>Error</h1>";
//var_dump($data);
}




?>
<div class="container">
  <div class="row">
  <h3>Add Products</h3>
<form class="row g-3" method='post' action='' enctype='multipart/form-data'>
  <div class="col-8">
    <label for="nom" class="form-label">Product Name</label>
    <input type="text" name="nom" class="form-control" id="nom" >
  </div>
  <div class="col-8">
    <label for="price" class="form-label">Price</label>
    <input type="text"  name="prix" class="form-control" id="price" >
  </div>
  <div class="col-8">
    <label for="qty" class="form-label">Qty</label>
    <input type="number"  name="qty" class="form-control" id="qty" >
  </div>

  <div class="col-8">
    <label for="cat" class="form-label">category</label>
    <select name="cat_id" class="form-select" aria-label="Default select example">
  <option selected>Select your Category</option>
  <?php  foreach($data as $v):   ?>
  <option value="<?=$v['id'] ?>"><?=$v['nom'] ?></option>
  <?php  endforeach;   ?>
</select>
    
  </div>

  <div class="col-8 mb-3">
  <label for="formFile" class="form-label">Product Photo</label>
  <input class="form-control"  name="photo" type="file" id="formFile">
</div>
<input type="hidden" name="addproduct" value="added">
  <div class="col-8">
    <button type="submit" class="btn btn-primary mb-3">Add</button>
  </div>
</form>
  </div>
</div>



<?php
include_once 'inc/footer.php';


?>
