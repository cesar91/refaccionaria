<?php 
include_once 'Conn.php';
/**
* 
*/
class TaskCrud
{
	
	function Index()
	{
		global $db;

		$sql="call TaskList()";
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

	function Create($title,$description,$userid)
	{
		global $db;
		$sql="call CreateTask('$title','$description','$userid')";
		$result=$db->query($sql);
		if (!$result) {
			return false;
		}
		else{
			return true;
		}

	}

	function ReadTask($id)
	{
		try {
			global $db;
			$list=[];
			$i=0;
			$sql="call ReadTask('$id')";
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

	function Edit($id,$title,$description,$finish,$userid)
	{
		try {
			global $db;
		$sql="CALL UpdateTask('$id','$title','$description','$finish','$userid')";
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

	function Delete($id)
	{
		global $db;
		$sql="call DeleteTask('$id')";
		$result=$db->query($sql);
		if (!$result) {
			return false;
		}
		else{
			return true;
		}
	}

	function Last()
	{
		global $db;

		$sql="call TaskLast()";
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
	function Search($data)
	{
		global $db;
		$sql="call SearchTask('$data')";
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

	function Taskbyuser($userid)
	{
		global $db;

		$sql="call TaskUser($userid)";
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
	
}



 ?>