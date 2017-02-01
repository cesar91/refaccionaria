<?php 
require_once ('Conn.php');

/**
* 
*/
class Item_TempModel
{
	function Create($id,$name,$quantity,$price)
		{
			global $db;
			echo "$id".","."$name".","."$quantity".","."$price";
			$sql="call CreateTemp('$id','$name','$quantity','$price')";
			$result=$db->query($sql);
			if (!$result) {
				return true;
			}
			else{
				return false;
			}

		}

	function ItemList()
		{
			global $db;
		$sql="call ListItem()";
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

	 function Delete($id)
	{
		try {
			global $db;
		$sql="call DeleteItemTemp('$id')";
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

	function DeleteTable()
	{
		
		global $db;
		$sql="call DeleteTemp()";
		$result=$db->query($sql);
		if (!$result) {
			return false;
		}
		else{
			return true;
		}
		
		
	}

	
}


 ?>