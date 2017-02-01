<?php 
require_once('../Model/ProductCrud.php');

$id=$_POST['id'];
$code=$_POST['code'];
$name=$_POST['name'];
$description=$_POST['description'];
$quantity=$_POST['quantity'];
$price=$_POST['price'];
$brand=$_POST['brand'];
$category=$_POST['category'];
$supplier=$_POST['supplier'];



$result=ProductCrud::Edit($id,$name,$description,$quantity,$price,$brand,$category,$supplier);

if (!$result) {

		header("Location: ../Views/Products/Product-IndexU.php?Estado=false");
}
else{
		header("Location: ../Views/Products/Product-IndexU.php?Estado=true");
}

 ?>