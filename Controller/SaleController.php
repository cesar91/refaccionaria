<?php 
require_once '../Model/Item_TempModel.php';
	
	$id=$_POST["Id"];
	$name=$_POST["Name"];
	$quantity=$_POST['Quantity'];
	$price=$_POST["Price"];


	$saveItem=Item_TempModel::Create($id,$name,$quantity,$price);

	if (!$saveItem) {
		header("Location: ../Views/Sales/Sale.php?Estado=true");
	}
	else{
		header("Location: ../Views/Sales/Sale.php");
	}


 ?>	