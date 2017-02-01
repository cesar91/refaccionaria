<?php 
session_start();
require_once('../../Model/UserCrud.php');

if($_SESSION['tipo'] != "2" || !isset($_SESSION['tipo']))
      {
          header('Location: ../Log-In.php');
      }
      $title="Nuevo Usuario";
      $name=$_SESSION['Nombre'];
      $closing="log-off.php";

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
				<h1 class="panel-title">Nuevo Usuario</h1>
			</div>
			<div class="panel-body">
				<form action="../../Controller/AddUser-UserController.php" method="POST" >
					<div class="form-group">
				 		<label for="name">Nombre</label>
						<input type="text" name="name" placeholder="Nombre Completo" class="form-control" required>
					</div>
					<div class="form-group">
				 		<label for="email">Correo Electrónico</label>
						<input type="email" name="email" placeholder="ejemplo@mail.com.mx" class="form-control" required>
					</div>
					<div class="form-group">
				 		<label for="username">Nombre de Usuario</label>
						<input type="text" name="username" placeholder="Usuario" class="form-control" required>
					</div>
					<div class="form-group">
				 		<label for="password">Contraseña</label>
						<input type="password" name="password"  class="form-control" required>
					</div>
					<div class="form-group">
						<input type="submit" name="submit"   value="Agregar Usuario" class="btn btn-primary" required>
						<a href="User-Index.php" title="Lista de Usuarios" class="btn btn-warning">Lista de Usuarios</a>
					</div>
				</form>
			</div>
		</div>		
	</div>		
</div>


</body>
</html>