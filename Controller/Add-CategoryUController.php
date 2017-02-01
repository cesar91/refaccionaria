<?php 
require('../Model/CategoryCrud.php');
$name=$_POST['name'];


$consulta=CategoryCrud::Create($name);
if (!$consulta) {
	header("Location: ../Views/Products/CategoryU.php?EstadoA=false");
}
else{

header("Location: ../Views/Products/CategoryU.php?Estado=true");
}


 ?>