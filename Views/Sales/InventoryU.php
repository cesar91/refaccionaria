<?php 
require_once('../../Model/ProductCrud.php');
session_start();
if($_SESSION['tipo'] != "1" || !isset($_SESSION['tipo']))
      {
          header('Location: ../Log-In.php');
      }
      $title="Panel | Admin";
      $name=$_SESSION['Nombre'];
      $closing="log-off.php";
  
$result=ProductCrud::Index();
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


<div class="col-md-8 col-centered">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h2 class="panel-title text-center">Inventario</h2>
		</div>
		<div class="panel-body">
			<table class="table table-hover table-striped table-condensed table-bordered">
				<thead>
					<tr>
						<th>Codigo</th>
						<th>Producto</th>
						<th>Cantidad</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($result as $key => $value): ?>
					<tr>
						<td><?php echo $value['CodigoProducto']; ?></td>
						<td><?php echo $value['Nombre']; ?></td>
						<td><?php echo $value['Cantidad']; ?></td>
					</tr>
				<?php endforeach ?>

				</tbody>
			</table>
		</div>
	</div>
</div>	

