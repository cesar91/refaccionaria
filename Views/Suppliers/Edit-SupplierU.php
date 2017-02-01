<?php 
session_start();
require_once('../../Model/SupplierCrud.php');

if($_SESSION['tipo'] != "1" || !isset($_SESSION['tipo']))
      {
          header('Location: ../Log-In.php');
      }
      $title="Detalles";
      $name=$_SESSION['Nombre'];
      $closing="log-off.php";
      $id=$_GET['Id'];
      $result=SupplierCrud::Read($id);

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
				<li><a href="../Sales/SaleU.php" title="Inicio">Inicio</a></li>
				<li><a href="../ContactoU.php" title="Contacto">Contacto</a></li>
				<li><a href="../Products/Product-IndexU.php" title="Productos">Productos</a></li>
				<li><a href="../Sales/SaleU.php" title="Ventas">Ventas</a></li>
				<li><a href="../AdminUsuario.php" title="Panel Admin">Panel Usuario</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="../Usuarios/ProfileU.php?Id=<?php echo $_SESSION['ID']; ?>" title="<?php echo "$name"; ?>"><img src="../img/profile.png"> <?php echo "$name"; ?></a></a></li>
				<li><a href="../Log-Off.php" title="Cerrar Sesión">Cerrar Sesión</a></li>
			</ul>
		</div>
	</nav>
</header>


	<div class="container">
		<div class="col-md-7 col-centered">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h1 class="panel-title text-center">
						Actualizar <?php echo $result['Nombre']; ?>
					</h1>
				</div>
				<div class="panel-body">
					<form action="../../Controller/Edit-SupplierUController.php" method="POST">
	 				<input type="text" name="id" value="<?php echo $result['Id']; ?>" hidden>
	 				<div class="form-group">
	 					<label for="name" class="label-form">Nombre:</label>
	 					<input type="text" name="name" value="<?php echo $result['Nombre']; ?>" class="form-control" required>
	 				</div>
	 				<div class="form-group">
	 					<label for="address" class="label-form">Dirección:</label>
	 					<textarea name="address" class="form-control"><?php echo $result['Direccion']; ?></textarea>
	 				</div>
	 				<div class="form-group">
	 					<label for="phone" class="label-form">Telefono:</label>
	 					<input type="tel" name="phone" value="<?php echo $result['Telefono']; ?>" class="form-control" required>
	 				</div>
	 				<div class="form-group">
	 					<label for="company" class="label-form">Empresa:</label>
	 					<input type="tel" name="company" value="<?php echo $result['Compania'] ?>" class="form-control" required>
	 				</div>
	 				<div class="form-group">
	 					<label for="email" class="label-form">Email:</label>
	 					<input type="email" name="email" value="<?php echo $result['Correo'] ?>" class="form-control" readonly>
	 				</div>
				</div>
				<div class="panel-footer">
					<div class="form-group">
	 					<input type="submit" value="Actualizar" class="btn btn-success">
	 					<a href="Supplier-IndexU.php" title="Regresar" class="btn btn-danger">Cancelar</a>
	 				</div>
	 				</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>