<?php 
session_start();
require_once('../../Model/ProductCrud.php');
if($_SESSION['tipo'] != "2" || !isset($_SESSION['tipo']))
      {
          header('Location: ../Log-In.php');
      }
      $title="Detalle";
      $name=$_SESSION['Nombre'];
      $closing="log-off.php";
      if ($_GET['Id']==true) {
		$id=$_GET['Id'];
		$consulta=ProductCrud::ReadProduct($id);
	if (!$consulta) {
		 echo '<div class="alert alert-warning">
   				 <a href="Product-index.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    			<strong>¡Cuidado!</strong> Error de datos.
  				</div>';
	}
	else{
		$rows=$consulta;

	} 
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
	<div class="col-md-7 col-centered">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h1 class="panel-title text-center">
					Detalle de <?php echo $rows['Name']; ?>
				</h1>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class=" table table-condensed table-hover table-striped table-bordered">
						<tr>
							<td>Codigo Producto</td>
							<td><?= $rows['CodigoProducto']; ?></td>
						</tr>
						<tr>
							<td>Nombre</td>
							<td><?= $rows['Name']; ?></td>
						</tr>
						<tr>
							<td>Descripción</td>
							<td><?= $rows['Descripcion']; ?></td>
						</tr>
						<tr>
							<td>Existencia</td>
							<td><?= $rows['Cantidad']; ?></td>
						</tr>
						<tr>
							<td>Precio</td>
							<td>$<?= $rows['Precio']; ?></td>
						</tr>
						<tr>
							<td>Marca</td>
							<td><?= $rows['Marca']; ?></td>
						</tr>
						<tr>
							<td>Categoría</td>
							<td><?= $rows['NombreCategoria']; ?></td>
						</tr>
						<tr>
							<td>Proveedor</td>
							<td><?= $rows['SupplierName']; ?></td>
						</tr>
						<tr class="text-center">
							<td><a href="Product-Edit.php?Id=<?php echo $rows['IdProduct']; ?>" title="Editar" class="btn btn-primary">Actualizar</a></td>
							<td><a href="Product-Index.php" title="Regresar" class="btn btn-warning">Lista de Productos</a></td>
						</tr>
					</table>
				</div>
			</div>
	</div>
</div>
</body>
</html>