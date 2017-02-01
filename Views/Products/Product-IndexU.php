<?php 
session_start();
require_once('../../Model/ProductCrud.php');

if($_SESSION['tipo'] != "1" || !isset($_SESSION['tipo']))
      {
          header('Location: ../Log-In.php');
      }
      $title="Producto Nuevo";
      $name=$_SESSION['Nombre'];
      $closing="log-off.php";

      if (isset($_GET['search'])) {
      	$result=ProductCrud::Search($search=$_GET['search']);
      }
      else{
      	      $result=ProductCrud::Index();
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
<?php  if(isset($_GET['Estado']))
      {
          if($_GET['Estado'] == 'false')
          {

            echo '<div class="alert alert-warning">
   				 <a href="Product-indexU.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    			<strong>¡Cuidado!</strong> No se ha podido realizar su proceso.
  				</div>';


          }
          else{
          	    echo '<div class="alert alert-success">
   				 <a href="Product-indexU.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    			<strong>¡Correcto!</strong> Se ha completado el proceso con exito.
  				</div>';
          }
      }
 ?>
<div class="container">
	<div class="row">
		<section class="col-md-5 col-centered">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h1 class="panel-title">
						<img src="../img/search.png" alt="Buscar">Buscar
					</h1>
				</div>
				<div class="panel-body">
				 	<form action="Product-indexU.php" method="GET" accept-charset="utf-8">
 						<input type="text" name="search" placeholder="Buscar por Nombre" class="form-control">
				</div>
				<div class="panel-footer">
						<input type="submit" name="" value="Buscar" class="btn btn-primary">
						<a href="Product-IndexU.php" title="Todos los Productos" class="btn btn-default">Mostrar Todos</a>
						<a href="Add-ProductU.php" title="Nuevo Producto" class="btn btn-primary">Nuevo Producto</a>
 					</form>
				</div>
			</div>
		</section>
	</div>


	<section class="col-md-8 col-centered">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title text-center"><img src="../img/product24.png" alt="Productos"> Productos</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-condensed table-hover table-bordered table-striped">
						<tr>
							<th>Codigo de Producto</th>
							<th>Producto</th>
							<th>Marca</th>
							<th>Almacen</th>
							<th>Precio</th>
							<th colspan="3">Acción</th>
						</tr>
						<tr>
							<?php foreach ($result as $Id => $val): ?>
						
							<td><?php echo $val['CodigoProducto']; ?></td>
							<td><?php echo $val['Nombre']; ?></td>
							<td><?php echo $val['Marca']; ?></td>
							<td><?php echo $val['Cantidad']; ?></td>
							<td><?php echo "$".$val['Precio']; ?></td>
							<td><a href="Product-EditU.php?Id=<?php echo $val['Id']; ?>" title="Editar"><i class="glyphicon glyphicon-edit"></i></a></td>
							<td><a href="Product-DetailsU.php?Id=<?php echo $val['Id']; ?>" title="Detalle"><i class="glyphicon glyphicon-file"></i></a></td>
							
						</tr>
							<?php endforeach ?>
			
					</table>
				</div>
			</div>
		</div>
	</section>
</div>


