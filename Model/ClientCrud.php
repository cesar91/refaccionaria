<?php 
require('Conn.php');

class ClientCrud
{
	
	public function Index()
	{
		
			global $db;
			$sql="call Client_List()";
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



			
	}

	function Create($name,$address,$phone,$email)
	{
		try {
		global $db;
		$sql="call CreateClient('$name','$address','$phone','$email')";
		$result=$db->query($sql);
		if (!$result) {
			return false;
		}
		else{
		return true;
		}
		} catch (Exception $e) {
			return  $e;
		}
		
	}

	function Search($data)
	{
			try {
			global $db;
			$sql="call SearchClient('$data')";
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
 
    function Read($id)
    {
       try {
			global $db;
			$list=[];
			$i=0;
			$sql="call ReadClient('$id')";
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
    
    function Edit($id,$name,$address,$email){
        
        global $db;
		$sql="CALL UpdateClient('$id','$name','$address','$email')";
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
		$sql="call DeleteClient('$id')";
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