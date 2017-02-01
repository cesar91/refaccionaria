<?php 
require('Conn.php');
class Login
{
	
	public function LoginIntro($email,$password)
	{
		global $db;
		try {
			$sql="call LoginUserPA('$email','$password')";
			$result=$db->query($sql);
				if (!$result) {
					return false;
			}
		else{
			$row=$result->fetch();
			return $row;
	
			}
		} catch (Exception $e) {
			$error='Error en consulta'.$e.getMessage();
			exit();
		}
		
	}

}

 ?>