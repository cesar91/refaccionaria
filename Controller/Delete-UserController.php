<?php 
require_once('../Model/UserCrud.php');
$id=$_GET['Id'];

$result=UserCrud::Delete($id);

if (!$result) {
header("Location: ../Views/Usuarios/User-Index.php?Estado=false");

}
else{
header("Location: ../Views/Usuarios/User-Index.php?Estado=true");
	}
 ?>