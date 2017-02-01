<?php 
require('../Model/CategoryCrud.php');
$id=$_GET['Id'];

$consulta=CategoryCrud::Delete($id);
if (!$consulta) {
	header("Location: ../Views/Products/Category.php?Estado=false");
}
else{
	header("Location: ../Views/Products/Category.php?Estado=true");
}


 ?>