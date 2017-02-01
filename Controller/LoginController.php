 <?php 
 	require('../Model/LoginDb.php');

 		$email=$_POST["email"];
 		$password=$_POST["password"];

 		$consulta=Login::LoginIntro($email,$password);
 		var_dump($consulta);
		if ($consulta==null) {

			header("Location: ./../Views/Log-In.php?Estado=false");
			}		
		else{
				session_start();
				$_SESSION['ID']=$consulta['Id'];
				$_SESSION['Nombre']=$consulta['Nombre'];
				$_SESSION['Email']=$consulta['Correo'];
				$_SESSION['Usuario']=$consulta['NombreUsuario'];
				$_SESSION['tipo']=$consulta['Rol'];

				
				if ($_SESSION['tipo']=='2') {
					header("Location: ./../Views/AdminPanel.php");
					}
				else
				{
					header("Location: ./../Views/AdminUsuario.php");
				}
			}

  ?>