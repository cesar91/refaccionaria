<?php 
require_once('Conn.php');
/**
* 
*/
class UserCrud
{
	
	function Index()
	{
		global $db;
        $sql = "call ListUser()";
        $consulta = $db->query($sql);

      $i = 0;
        $lista = [];
        if(!$consulta)
        {
            return false;
        }
        else
        {
            while($row = $consulta->fetch())
            {
                $lista[$i] = $row;
                $i++;
            }
            return $lista;
        }

	}
	
	function Create($name,$email,$username,$password)
	{
		
		global $db;
		$sql="call InsertUser('$name','$email','$username','$password')";
		$result=$db->query($sql);
		var_dump($result);
		if (!$result) {

			return false;
		}
		else{
			return true;
		}
		

	
	}


	function ReadUser($id)
	{
		try {
			global $db;
			$list=[];
			$i=0;
			$sql="call ReadUser('$id')";
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

	function Edit($id,$name,$mail,$rol)
	{
		global $db;
		$sql="CALL UpdateUser('$id','$name','$mail','$rol')";
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
		$sql="call DeleteUser('$id')";
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