<?php 
require_once('../Model/SupplierCrud.php');

$name=$_POST['name'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$company=$_POST['company'];
$email=$_POST['email'];

$result=SupplierCrud::Create($name,$address,$phone,$company,$email);
if (!$result) {
	header("Location: ../Views/Suppliers/Supplier-IndexU.php?Estado=false");
}
else{
header("Location: ../Views/Suppliers/Supplier-IndexU.php?Estado=true");
}

 ?>