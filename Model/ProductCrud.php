<?php 
require_once('Conn.php');
/**
* b
*/
class ProductCrud
{
	
	function Create($code,$name,$description,$quantity,$price,$brand,$idCategory,$idSupplier)
	{
		try {
			global $db;

			$sql="call InsertProduct('$code','$name','$description','$quantity','$price','$brand','$idCategory','$idSupplier')";
			$statement=$db->query($sql);

			if (!$statement) {
				 return false;
			}
			else{
				return true;
			}
				
			} catch (Exception $e) {
				echo "Error".$e;		
			}
	}

	function Index()
	{
		try {
			global $db;
			$sql="call Product_List()";
			$result=$db->query($sql);
				$list=[];
				$i=0;

			if (!$result) {
				return false;
			}
			else{
				while ($rows=$result->fetch()) {
					$list[$i]=$rows;
					$i++;
				}
				return $list;
			}



		} catch (Exception $e) {
		 echo "Error".$e;
		}
	}

    function ReadProduct($id)
	{
		try {
			global $db;
			$list=[];
			$i=0;
			$sql="call ReadProduct('$id')";
			$result=$db->query($sql);
			if (!$result) {

				return false;
			}
			else{
			$rows=$result->fetch(); 
				return $rows;
			}
			
		} catch (Exception $e) {
			echo "Error de consulta ". $e;
		}
	}

	function Edit($id,$name,$description,$quantity,$price,$brand,$category,$supplier)
	{
	
			global $db;
		$sql="CALL UpdateProduct('$id','$name','$description','$quantity','$price','$brand','$category','$supplier')";
		$statement=$db->query($sql);
		if (!$statement) {
			return false;
		}
		else{
			return true;
		}
		
	}

	function Delete($id)
	{
		try {
			global $db;
		$sql="call DeleteProduct('$id')";
		$result=$db->query($sql);
		if (!$result) {
			return false;
		}
		else{
			return true;
		}
		} catch (Exception $e) {
			return false;
		}
		
	}

	function Search($search)
	{
		try {
			global $db;
			$sql="call SearchProduct('$search')";
			$result=$db->query($sql);
				$list=[];
				$i=0;

			if (!$result) {
				return false;
			}
			else{
				while ($rows=$result->fetch()) {
					$list[$i]=$rows;
					$i++;
				}
				return $list;
			}



		} catch (Exception $e) {
		 echo "Error".$e;
		}
	}
	function UpdateProduct($id,$quantity)
	{
		try {
			global $db;
		$sql="CALL UpdateSaleP('$id','$quantity')";
		$statement=$db->query($sql);
		if (!$statement) {
			return false;
		}
		else{
			return true;
		}
		} catch (Exception $e) {
			return false;
		}
		
		
	}

}

?>