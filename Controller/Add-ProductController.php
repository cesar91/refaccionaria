<?php 
require_once('../Model/ProductCrud.php');
$code=$_POST["code"];
$name=$_POST["name"];
$description=$_POST["description"];
$quantity=$_POST["quantity"];
$price=$_POST["price"];
$brand=$_POST["brand"];
$idCategory=$_POST["category"];
$idSupplier=$_POST["supplier"];


 $consulta=ProductCRUD::Create($code,$name,$description,$quantity,$price,$brand,$idCategory,$idSupplier);
 
 if ($consulta!=true) {
 	header("Location: ../Views/Products/Product-Index.php?Estado=false");
 }
 else{
 	header("Location: ../Views/Products/Product-Index.php?Estado=true");
 }


 ?>

