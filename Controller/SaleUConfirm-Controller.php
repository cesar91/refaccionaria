<?php 
require_once ('../Model/OrderSaleModel.php');
require_once('../Model/OrderItem.php');

$date=$_POST['date'];
$client=$_POST['client'];
$idUser=$_POST['iduser'];
$product=unserialize(base64_decode($_POST["productid"]));
$IdProduct=0;
$quantity=0;
$total=0;

$createorder=OrderSaleModel::Create($date,$client);

if (!$createorder) {
	echo "No se agrego la compra";
}
else{
	
		$orderId=$createorder['Id'];
		
		foreach ($product as $key => $value) {
			$IdProduct=$value['IdProducto'];
			$quantity=$value['Cantidad'];
			$IdProduct=$value['IdProducto'];
			$total=$total=$value['Cantidad'] * $value['PrecioProducto'];
		
		$stmt=OrderItem::Create($quantity,$total,$IdProduct,$orderId,$idUser);
		if (!$stmt) {
			echo "No agregados";
		}
		else{
			header("Location: ../Views/Sales/SaleU.php?EstadoU=true");
		}

}



			

}
 ?>