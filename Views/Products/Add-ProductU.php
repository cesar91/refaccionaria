<?php 
session_start();
require_once('../../Model/CategoryCrud.php');
require_once('../../Model/SupplierCrud.php');
if($_SESSION['tipo'] != "1" || !isset($_SESSION['tipo']))
      {
          header('Location: Log-In.php');
      }
      $title="Producto Nuevo";
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
	<div class="col-md-10 col-centered">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h1 class="panel-title text-center"><img src="../img/addproduct32.png" alt="Nuevo Producto"> Nuevo Producto</h1>
			</div>
			<div class="panel-body">
				<form action="../../Controller/AddU-ProductController.php" method="POST">
				<div class="col-md-6">
					<div class="form-group">
 						<label for="code">Codigo </label>
 						<input type="Text" name="code" class="form-control" required>
 					</div>
 					<div class="form-group">
 			 			<label for="description">Descripción</label>
 			 			<textarea name="description" class="form-control" required></textarea>
 					</div>
 					<div class="form-group">
 						<label for="price">Precio</label>
 						<input type="text" name="price" class="form-control" required>
 					</div>
 					<div class="form-group">
 						<label for="brand">Marca</label>
 						<input type="text" name="brand" class="form-control" required>
 					</div>
				</div>
				<div class="col-md-6">
				 	<div class="form-group">
				 		<label for="name">Nombre</label>
				 		<input type="Text" name="name" class="form-control" required>
				 	</div>	
				 	<div class="form-group">
				 		<label for="quantity">Cantidad</label>
				 		<input type="number" name="quantity" class="form-control" required>
				 	</div>

					<div class="form-group">
				 		<?php $consulta=CategoryCrud::ListCategory(); ?>
				 		<label for="category">Categoria</label>
				 		<select name="category" class="form-control">
				 		<?php foreach ($consulta as $Id => $valor) {
				 		echo '<option value="'.$valor["Id"].'">'.$valor["Nombre"].'</option>';
				 		} ?>
				 		</select>
				 	</div>
				 	<div class="form-group">
				 		<?php $suppliers=SupplierCrud::SupplierList(); ?>
				 		<label for="supplier">Proveedor</label>
				 		<select name="supplier" class="form-control">
				 			<?php foreach ($suppliers as $DA => $val): ?>
				 			<option value="<?php echo $val['Id']; ?>"><?php echo $val['Nombre']; ?></option>
				 			<?php endforeach ?>
				 		</select>
				 	</div>
				</div>
			</div>
			<div class="panel-footer">
				<div class="form-group">
					<div class="col-md-4 col-centered">
 						<input type="submit" name="submit" class="btn btn-success" value="Nuevo Producto">
 						<a href="Product-IndexU.php" class="btn btn-danger">Cancelar</a>
 					</div>	
 				</div>
 				</form>
			</div>
		</div>
	</div>
</div>

