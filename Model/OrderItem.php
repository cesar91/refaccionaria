<?php 
require_once('Conn.php');
require_once('ProductCrud.php');
require_once('Item_TempModel.php');

/**
* 
*/
class OrderItem
{
	
	function Create($quantity,$total,$IdProduct,$orderId,$idUser)
	{
		global $db;

		$sql="Call CreateOrderItem('$quantity','$total','$IdProduct','$orderId','$idUser')";
		$stmt=$db->query($sql);
		if (!$stmt) {
			return false;	
		}
		else{
			$statement=ProductCrud::ReadProduct($IdProduct);
			$quantityProduct=$statement['Cantidad'];
			$restProduct=$quantityProduct-$quantity;
			if (!$restProduct) {
				return false;
			}
			else{
				$Productupdate=ProductCrud::UpdateProduct($IdProduct,$restProduct);
				if (!$Productupdate) {
					return false;
				}
				else{
					$deleteTable=Item_TempModel::DeleteTable();
					if (!$deleteTable) {
						return false;
					}
					else
					{
						return true;
					}
				}
			}
		}
	}
}


 ?>