<?php 
require_once('../Model/ProductCrud.php');
$id=$_GET['Id'];

$result=ProductCrud::Delete($id);

if (!$result) {
header("Location: ../Views/Products/Product-Index.php?Estado=false");

}
else{
header("Location: ../Views/Products/Product-Index.php?Estado=true");
	}
 ?>
