<?php 
require_once('../../Model/ProductCrud.php');
require_once('../../Model/Item_TempModel.php');
require_once('../../Model/ClientCrud.php');
session_start();
if($_SESSION['tipo'] != "1" || !isset($_SESSION['tipo']))
      {
          header('Location: ../Log-In.php');
      }
      $title="Caja";
      $name=$_SESSION['Nombre'];
      $closing="log-off.php";
      $result=[];
      	if (isset($_GET['search'])) {
      		$searchq=$_GET['search'];
      		$result=ProductCrud::Search($searchq);
      	}

      $listProduct=	Item_TempModel::ItemList();
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
   				 <a href="SaleU.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    			<strong>¡Cuidado!</strong> Los Datos No Fueron Agregados.
  				</div>';


          }
      }
 ?>
<div class="container">
	<div class="col-md-12">
			<div class="col-md-4">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h1 class="panel-title">Buscar Producto</h1>
					</div>
					<div class="panel-body ">
						<form action="SaleU.php" method="GET" accept-charset="utf-8">
						<input type="text" name="search" class="form-control" placeholder="Buscar Producto">
						<br>
						<input type="submit" name="submit" value="Buscar" class="btn btn-primary">	
						</form>
						<hr>
						<div class="table-responsive">
						<table class="table table-condensed table-hovered table-bordered">
							<tr>
								<th>Item</th>
								<th>Nombre</th>
								<th>Precio</th>
								<th>Agregar</th>
							</tr>
							<?php foreach ($result as $key => $value): ?>
							<tr class="dataproduct">
							<form action="../../Controller/SaleUController.php" method="post">

							<input type="text" name="Id" value="<?php echo $value['Id'];?>" hidden>
							<td><input type="number" name="Quantity" class="form-control" maxlength="4" size="4"></td>
							<td><input type="text" name="Name" value="<?php echo $value['Nombre'] ?>" class="form-control" readonly>
							<td><input type="text" name="Price" value="<?php echo $value['Precio'] ?>" class="form-control" readonly></td>
							<td><button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-plus"></i></button></td>
							</tr>
							</form>
							<?php endforeach ?>
						</table>
					</div>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h1 class="panel-title">Productos Agregados</h1>
					</div>
					<div class="panel-body ">
					<form action="../../Controller/SaleUConfirm-Controller.php" method="Post">
						<input type="datetime" name="date" value="<?php echo date("Y-m-d H:i:s"); ?>" readonly hidden>
						<input type="text" name="iduser" value="<?php echo $_SESSION["ID"] ?>" hidden>
						<?php $client=ClientCrud::Index(); ?>
						<label for="cliente" class="label-control">Cliente</label>
					
						<select name="client" class="form-control">
						<?php foreach ($client as $key => $value): ?>
							<option value="<?php echo $value['Id'] ?>"><?php echo $value["Nombre"]; ?></option>
							option
						<?php endforeach ?>
						</select>
						<br>
						
					
					<div class="table-responsive">

						<table class="table table-bordered table-hover table-striped table-condensed dataproduct">
								<tr>
									<th>Item</th>
									<th>Producto</th>
									<th>Precio</th>
									<th>Total</th>
									<th></th>
								</tr>
								<?php $stotal=0; foreach ($listProduct as $key => $value): ?>

								<tr>
									<td><?php echo $value['Cantidad']; ?></td>
									<td><?php echo $value['Nombre'] ?>
									<td><?php echo $value["PrecioProducto"]; ?></td>
									<td id="productoPrecio"><?php $total=$value['Cantidad']*$value['PrecioProducto']; echo "$".$total; ?></td>
									<td><a href="../../Controller/DeleteItemU-Controller.php?Id=<?php echo $value['Id'] ?>"><i class="glyphicon glyphicon-trash"></i></a></td>
								</tr>
								 <?php 

								 $stotal+=$total; ?>
								<?php endforeach ?>
								<tr>
								<td colspan="3">Previo</td>
								<td><?php echo "$".$stotal; ?></td>
								</tr>
						</table>
						
						</div>
						<input type="hidden" name="productid" value="<?php print base64_encode(serialize($listProduct)); ?>">
						<button type="submit" class="btn btn-default">Confirmar Compra</button>
						

						</form>
						
						
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h1 class="panel-title">Confirmación de Compra</h1>
					</div>
					<div class="panel-body">
						<?php  if(isset($_GET['EstadoU']))
      	{
          if($_GET['EstadoU'] == 'true')
          {

            echo '<div class="alert alert-success">
   				 <a href="SaleU.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    			<strong>Gracias</strong> Compra Exitosa
  				</div>';


          }
      }
 ?>
						
					</div>
				</div>

			</div>
	</div>
</div>

</body>
</html>