<?php 
require_once('../Model/UserCrud.php');

$id=$_POST['id'];
$name=$_POST['name'];
$mail=$_POST['email'];
$rol=$_POST['rol'];



$result=UserCrud::Edit($id,$name,$mail,$rol);

if (!$result) {

		header("Location: ../Views/Usuarios/User-Index.php?Estado=false");
}
else{
		header("Location: ../Views/Usuarios/User-Index.php?Estado=true");
}

 ?>