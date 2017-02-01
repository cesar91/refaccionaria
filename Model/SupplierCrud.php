<?php 
 require('Conn.php');
class SupplierCrud
{
	
	function SupplierList()
	{
		global $db;
		$sql="call allSuppliers()";
		$result=$db->query($sql);
		$list=[];
		$i=0;

		if (!$result) {
			return false;
		}
		else{
			while ($row=$result->fetch()) {
				$list[$i]=$row;
				$i++;
			}
			return $list;
		}
	}

	function Index()
	{
		global $db;
		$sql="call listSupplier()";
		$result=$db->query($sql);
		$list=[];
		$i=0;

		if (!$result) {
			return false;
		}
		else{
			while ($row=$result->fetch()) {
				$list[$i]=$row;
				$i++;
			}
			return $list;
		}
	}

	function Create($name,$address,$phone,$company,$email)
	{
		try {
			global $db;
		$sql="call create_supplier('$name','$address','$phone','$company','$email')";
		$consulta=$db->query($sql);
		if (!$consulta) {
			return false;
		}
		else{
			return true;
		}
		} catch (Exception $e) {
			echo "Error de ".$e;
		}
		
	}

	function Edit($id,$name,$address,$phone,$company)
	{
		global $db;
		$sql="call UpdateSupplier('$id','$name','$address','$phone','$company')";
		$result=$db->query($sql);
		if (!$result) {
			return false;
		}
		else{
			return true;
		}
	}

	function Delete($Id)
	{
		try {
			global $db;
		$sql="call DeleteSupplier('$Id')";
		$result=$db->query($sql);

		if (!$result) {
			return false;
		}
		else{
			return true;
		}	
		} catch (Exception $e) {
			echo "Error en ".$e;
		}
				
	}

	function Read($id)
	{
		global $db;
		$sql="call ReadSupplier('$id')";
		$result=$db->query($sql);
		$rows=$result->fetch();
		if (!$rows) {
			return false;
		}
		else{
			return $rows;
		}
	}
}

 ?>