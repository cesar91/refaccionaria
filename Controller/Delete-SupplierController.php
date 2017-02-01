<?php 
require_once('../Model/SupplierCrud.php');
$id=$_GET['Id'];

$result=SupplierCrud::Delete($id);

if (!$result) {
header("Location: ../Views/Suppliers/Supplier-Index.php?EstadoA=false");

}
else{
header("Location: ../Views/Suppliers/Supplier-Index.php?Estado=true");
	}
 ?>