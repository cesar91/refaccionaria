<?php 
require_once('../Model/SupplierCrud.php');

$id=$_POST['id'];
$name=$_POST['name'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$company=$_POST['company'];

$result=SupplierCrud::Edit($id,$name,$address,$phone,$company);
if (!$result) {
	header("Location: ../Views/Suppliers/Supplier-Index.php?Estado=false");
}
else{
header("Location: ../Views/Suppliers/Supplier-Index.php?Estado=true");
}



 ?>