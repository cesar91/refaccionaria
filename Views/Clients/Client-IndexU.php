<?php 
session_start();
require_once('../../Model/ClientCrud.php');

if($_SESSION['tipo'] != "1" || !isset($_SESSION['tipo']))
      {
          header('Location: ../Log-In.php');
      }
      $title="Cliente";
      $name=$_SESSION['Nombre'];
      $closing="log-off.php";

        $name=$_SESSION['Nombre'];
      $closing="log-off.php";
      if (isset($_GET['data'])) {
      	$result=ClientCrud::Search($data=$_GET['data']);
      }
      else{
      	$result=ClientCrud::Index();
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
   				 <a href="Client-IndexU.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    			<strong>¡Cuidado!</strong> No se ha podido realizar su proceso.
  				</div>';


          }
          else{
          	    echo '<div class="alert alert-success">
   				 <a href="Client-IndexU.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    			<strong>¡Correcto!</strong> Se ha completado el proceso con exito.
  				</div>';
          }
      }
      if (isset($_GET['EstadoA'])) {
      	if ($_GET['EstadoA']=='false') {
     	 echo '<div class="alert alert-warning">
   				 <a href="Client-IndexU.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    			<strong>¡Cuidado!</strong> No se ha podido Eliminar posiblemente por que tenga productos o datos vinculados.
  				</div>';

     }
      }
     
 ?>
<div class="col-md-12 row">
		<div class="col-md-4 col-centered">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h1 class="panel-title">Clientes</h1>
				</div>
				<div class="panel-body">
					<a href="#newform" title="Agregar Cliente" class="btn">Cliente Nuevo</a> |
					<a href="Client-IndexU.php" title="Lista de Clientes" class="btn">Lista de Clientes</a>
					<form action="Client-IndexU.php" method="get">
 						<input type="text" name="data" placeholder="Buscar Por Nombres" class="form-control">
				</div>
				<div class="panel-footer">
						<input type="submit" name="" value="Buscar" class="btn btn-default">
 					<a href="Client-IndexU.php" title="Todos los Clientes">Todos Los Clientes</a>
 					</form>
				</div>
			</div>
		</div>
	
		<div class="col-md-8 col-centered">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h1 class="panel-title text-center">
						Clientes
					</h1>
				</div>
				<div class="panel-body" id="list">
					<div class="panel-responsive">
						<table class="table table-hover table-condensed table-bordered table-striped">
								<tr>
									<th>Nombre</th>
 									<th>Telefono</th>
 									<th>Email</th>
 									<th colspan="3">Acción</th>
								</tr>
 								<?php foreach ($result as $key => $value): ?>
 								<tr>
 									<td><?php echo $value['Nombre']; ?></td>
 									<td><?php echo $value['Telefono']; ?></td>
 									<td><?php echo $value['Mail']; ?></td>
 									<td><a href="EditU-Client.php?Id=<?php echo $value['Id'];?>" title="Editar" class="btn btn-default"><i class="glyphicon glyphicon-edit"></i></a></td>
 									<td><a href="DetailsU-Client.php?Id=<?php echo $value['Id'];?>" title="" class="btn btn-default"><i class="glyphicon glyphicon-file"></i></a></td>
 								</tr>
 								<?php endforeach ?>
						</table>
					</div>
				</div>

			</div>
		</div>

		<div class="col-md-8 col-centered" id="newform">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h1 class="panel-title text-center">Nuevo Cliente</h1>
				</div>
				<div class="panel-body">
					<form action="../../Controller/Add-ClientUController.php" method="POST">
 					<div class="col-md-6">
 						<div class="form-group">
 							<input type="text" name="name"  placeholder="Nombre Completo" class="form-control">
 						</div>
 						<div class="form-group">
 							<input type="text" name="address"  placeholder="Direccion " class="form-control">		
 						</div>
 					</div>
 					<div class="col-md-6">
						<div class="form-group">
 							<input type="tel" name="phone"  placeholder="Telefono" class="form-control">
 						</div>
 						<div class="form-group">
 							<input type="email" name="mail"  placeholder="Correo@electronico.com" class="form-control">
 						</div>
 					</div>
				</div>
				<div class="panel-footer">
						<div class="col-md-4 col-centered">
							<input type="submit"  value="Crear Cliente" class="btn btn-success">
 							<a href="#list" title="Lista de Clientes" class="btn btn-primary">Clientes</a>	
						</div>
 					</form>
				</div>
			</div>
		</div>
	</div>