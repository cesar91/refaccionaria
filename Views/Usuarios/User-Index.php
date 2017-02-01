<?php 
session_start();
require_once('../../Model/UserCrud.php');

if($_SESSION['tipo'] != "2" || !isset($_SESSION['tipo']))
      {
          header('Location: ../Log-In.php');
      }
      $title="Usuarios";
      $name=$_SESSION['Nombre'];
      $closing="log-off.php";

      $result=UserCrud::Index();

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
<?php  if(isset($_GET['Estado']))
      {
          if($_GET['Estado'] == 'false')
          {

            echo '<div class="alert alert-warning">
   				 <a href="User-index.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    			<strong>¡Cuidado!</strong>  No se ha podido realizar su proceso.
  				</div>';


          }
          else{
          	    echo '<div class="alert alert-success">
   				 <a href="User-index.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    			<strong>¡Correcto!</strong> Se ha completado el proceso con exito.
  				</div>';
          }
      }
 ?>
<div class="container">
	<div class="col-md-8 col-centered">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h1 class="panel-title text-center">
					Usuarios
				</h1>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-condensed table-hover table-bordered">
						<tr class="success">
							<th>Nombre Completo</th>
							<th>Correo</th>
							<th>Usuario</th>
							<th colspan="3">Acción</th>
						</tr>
						
							<?php foreach ($result as $Id => $val): ?>
						<tr>
							<td><?php echo $val['Nombre']; ?></td>
							<td><?php echo $val['Correo']; ?></td>
							<td><?php echo $val['NombreUsuario']; ?></td>
							<td><a href="User-Edit.php?Id=<?php echo $val['Id']; ?>" title="Editar"><i class="glyphicon glyphicon-edit"></i></a></td>
							<td><a href="User-Details.php?Id=<?php echo $val['Id']; ?>" title="Detalle"><i class="glyphicon glyphicon-file"></i></a></td>
							<td><a href="../../Controller/Delete-UserController.php?Id=<?php echo $val['Id']; ?>" title="Eliminar"><i class="glyphicon glyphicon-trash"></i></a></td>
						</tr>
							<?php endforeach ?>
			
					</table>
				</div>
			</div>
		</div> 
	</div>
 

<section class="col-md-8 col-centered">

</section>
</div>


