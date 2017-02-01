<?php 
session_start();
require_once('../../Model/UserCrud.php');

if($_SESSION['tipo'] != "2" || !isset($_SESSION['tipo']))
      {
          header('Location: ../Log-In.php');
      }
      $title="Actualizar Usuario";
      $name=$_SESSION['Nombre'];
      $closing="log-off.php";

      $id=$_GET['Id'];
      $result=UserCrud::ReadUser($id);
      if (!$result) {
      	echo '<div class="alert alert-warning">
   				 <a href="User-index.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    			<strong>¡Cuidado!</strong> Error en la busqueda
  				</div>';
      }
      else {
      	$rows=$result;
      }

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo "$title"; ?></title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<header id="header" class="">
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<a href="index.php" title="Refaccionaria Perez" class="navbar-brand">Refaccionaria Perez</a>
				<p class="navbar-text">Punto de Venta</p>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="../Sales/Sale.php" title="Inicio">Inicio</a></li>
				<li><a href="../Contacto.php" title="Contacto">Contacto</a></li>
				<li><a href="../Products/Product-Index.php" title="Productos">Productos</a></li>
				<li><a href="../Sales/Sale.php" title="Ventas">Ventas</a></li>
				<li><a href="../AdminPanel.php" title="Panel Admin">Panel Administrador</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="../Usuarios/Profile.php?Id=<?php echo $_SESSION['ID']; ?>" title="<?php echo "$name"; ?>"><?php echo "$name"; ?></a></li>
				<li><a href="../Log-Off.php" title="Cerrar Sesión">Cerrar Sesión</a></li>
			</ul>
		</div>
	</nav>
</header>
<div class="container">
	<div class="col-md-6 col-centered">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h1 class="panel-title">Detalle de <?php echo $rows['Nombre']; ?></h1>
			</div>
			<div class="panel-body">
				<table class="table table-condensed table-hover table-bordered table-striped">
					<tr>
						<td><b>Nombre</b></td>
						<td><?= $rows['Nombre']; ?></td>
					</tr>
					<tr>
						<td><b>Correo Electrónico</b></td>
						<td><?= $rows['Correo']; ?></td>
					</tr>
					<tr>
						<td><b>Nombre de Usuario</b></td>
						<td><?= $rows['NombreUsuario']; ?></td>
					</tr>
					<tr>
						<td><b>Contraseña</b></td>
						<td><?= $rows['Contrasena']; ?></td>
					</tr>
					<tr>
						<td><b>Rol</b></td>
						<td><?php if ($rows['Rol']==1):
							echo 'Usuario';
						else:
							echo 'Administrador';
						endif ?></td>
					</tr>
					<tr>
						<td><a href="User-Edit.php?Id=<?php echo $rows['Id']; ?>" title="Editar" class="btn btn-primary">Actualizar</a></td>
						<td><a href="User-Index.php" title="Regresar" class="btn btn-warning">Todos los Usuarios</a></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
</body>
</html>
