<?php 
require_once('../Model/Item_TempModel.php');
$id=$_GET['Id'];

$result=Item_TempModel::Delete($id);

if (!$result) {
header("Location: ../Views/Sales/Saleu.php?Estado=false");

}
else{
header("Location: ../Views/Sales/Saleu.php");
	}
 ?>