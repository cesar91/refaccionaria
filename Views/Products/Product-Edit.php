<?php 
session_start();
require('../../Model/ProductCrud.php');
require('../../Model/CategoryCrud.php');
require('../../Model/SupplierCrud.php');
if($_SESSION['tipo'] != "2" || !isset($_SESSION['tipo']))
      {
          header('Location: ../Log-In.php');
      }
      $title="Editar Producto";
      $name=$_SESSION['Nombre'];

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
	<title><?php echo $title; ?></title>
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
				<li><a href="Contacto.php" title="Contacto">Contacto</a></li>
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
<?php  if(isset($_GET['Estado']))
      {
          if($_GET['Estado'] == 'false')
          {

            echo '<div class="alert alert-warning">
   				 <a href="Product-index.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    			<strong>¡Cuidado!</strong> Los Datos No Fueron Agregados.
  				</div>';


          }
          else{
          	    echo '<div class="alert alert-success">
   				 <a href="Product-index.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    			<strong>¡Correcto!</strong> Se ha completado el proceso con exito.
  				</div>';
          }
      }
 ?>
<div class="row col-md-12">
    <div class="container">
    	<div class="col-md-7 col-centered">
    		<div class="panel panel-warning">
    			<div class="panel-heading">
    				<h1 class="panel-title text-center">Editar <?php echo $rows["Name"]; ?></h1>
    			</div>
    			<div class="panel-body">
    				<form action="../../Controller/Edit-ProductController.php" method="POST" accept-charset="utf-8">
    				<div class="col-md-6">
						<input type="text" name="id" value="<?php echo $rows['IdProduct']; ?>" hidden>
	 					<div class="form-group">
	 						<label for="code">Codigo del Producto</label>
	 						<input type="text" name="code" value="<?php echo $rows['CodigoProducto']; ?>" class="form-control" readonly>
	 					</div>
	 					<div class="form-group">
	 						<label for="name">Nombre</label>
	 						<input type="text" name="name" value="<?php echo $rows['Name']; ?>" class="form-control">
	 					</div>
	 					 <div class="form-group">
	 						<label for="description">Descripcion</label>
	 						<textarea name="description" class="form-control"><?php echo $rows['Descripcion']; ?></textarea>
	 					</div>
	 					<div class="form-group">
	 						<label for="quantity">Almacen</label>
	 						<input type="text" name="quantity" value="<?php echo $rows['Cantidad']; ?>" class="form-control">
	 					</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
 							<label for="price">Precio</label>
 							<input type="text" name="price" value="<?php echo $rows['Precio']; ?>" class="form-control">
 						</div>
 						<div class="form-group">
 							<label for="brand">Marca</label>
 							<input type="text" name="brand" value="<?php echo $rows['Marca']; ?>" class="form-control">
 						</div>
 						<div class="form-group">
 		 					<?php $consulta=CategoryCrud::ListCategory();?>
 							<label for="category">Categoria</label>
 							<select name="category" class="form-control">
 								<option value="<?php echo $rows['IdCategoria']; ?>"><?php echo $rows['NombreCategoria']; ?></option>
 								<?php foreach ($consulta as $Id => $valor) {
 								echo '<option value="'.$valor["Id"].'">'.$valor["Nombre"].'</option>';
 								} ?>
 							</select>
 						</div>
 						<div class="form-group">
	 		 				<?php $suppliers=SupplierCrud::SupplierList(); ?>
	 						<label for="supplier">Proveedor</label>
	 						<select name="supplier" class="form-control">
	 							<option value="<?php echo $rows['SupplierId']; ?>"><?php echo $rows['SupplierName']; ?></option>
	 							<?php foreach ($suppliers as $DA => $val): ?>
	 							<option value="<?php echo $val['Id']; ?>"><?php echo $val['Nombre']; ?></option>
	 							<?php endforeach ?>
	 						</select>
 						</div>
					</div>
    			</div>
    			<div class="panel-footer">
    				<div class="form-group col-centered">
 						<input type="submit" value="Actualizar" class="btn btn-primary">
 						<a href="Product-Index.php" title="Regresar" class="btn btn-warning">Regresar</a>
 					</div>
 					</form>
    			</div>
    		</div>
		</div>
    </div>
</div>
</body>
</html> 