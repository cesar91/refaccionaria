<?php
 require('Conn.php');
class CategoryCrud
{
	
	function ListCategory()
	{
		global $db;

		$sql="call CategoryList()";
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

	function Create($name)
	{
		
		global $db;
		$sql="call CategoryInsert('$name')";
		$result=$db->query($sql);
		if (!$result) {
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
		$sql="call DeleteCategory('$id')";
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



	
}
 ?>