<?php 
require('../Model/CategoryCrud.php');
$name=$_POST['name'];


$consulta=CategoryCrud::Create($name);
if (!$consulta) {
	header("Location: ../Views/Products/Category.php?EstadoA=false");
}
else{

header("Location: ../Views/Products/Category.php?Estado=true");
}


 ?>