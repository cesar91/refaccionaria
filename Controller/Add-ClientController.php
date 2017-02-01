<?php 
require_once('../Model/ClientCrud.php');
$name=$_POST['name'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$email=$_POST['mail'];


$result=ClientCrud::Create($name,$address,$phone,$email);

	if (!$result) {
	header("Location: ../Views/Clients/Client-Index.php?Estado=false");
	}
	else{
header("Location: ../Views/Clients/Client-Index.php?Estado=true");

	}


 ?>