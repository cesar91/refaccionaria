<?php 
session_start();
require('../../Model/UserCrud.php');

if($_SESSION['tipo'] != "2" || !isset($_SESSION['tipo']))
      {
          header('Location: ../Log-In.php');
      }
      $title="Editar Producto";
      $name=$_SESSION['Nombre'];

if ($_GET['Id']==true) {
	$id=$_GET['Id'];
	$consulta=UserCrud::ReadUser($id);
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
    			<strong>¡Cuidado!</strong> Los Datos No Fueron Agregados.
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
 	<div class="row col-md-12">
       	<div class="container">
			<div class="col-md-5 col-centered">
       			<div class="panel panel-primary">
       				<div class="panel-heading">
       					<h1 class="panel-title text-center">
       						Editar <?php echo $rows["Nombre"]; ?>
       					</h1>
       				</div>
       				<div class="panel-body">
       					<form action="../../Controller/Edit-UserController.php" method="POST" accept-charset="utf-8">
							<input type="text" name="id" value="<?php echo $rows['Id']; ?>" hidden>
 							<div class="form-group">
 								<label for="name">Nombre</label>
 								<input type="text" name="name" value="<?php echo $rows['Nombre']; ?>" class="form-control">
 							</div>
 					 		<div class="form-group">
 								<label for="email">Correo Electronico</label>
 								<input type="email" name="email" value="<?php echo $rows['Correo']; ?>" class="form-control">
 							</div>
 							<div class="form-group">
 								<label for="user">Usuario</label>
 								<input type="text" name="user" value="<?php echo $rows['NombreUsuario']; ?>" class="form-control" readonly>
 							</div>
  							<div class="form-group">
								<div>
									<label>Rol</label>
								</div>
								<div class="form-group">
									<select name="rol" class="form-control">
										<option value=<?php echo $rows['Rol']; ?>><?php if($rows['Rol']==1){echo"Cajero"; }else{ echo "Administrador ";} ?></option>
										<option value='1'>Cajero</option>
										<option value='2'>Administrador</option>}
									</select>
								</div>
							</div>
       				</div>
       				<div class="panel-footer">
       						<div class="form-group">
 								<input type="submit" value="Actualizar" class="btn btn-primary">
 								<a href="User-Index.php" title="Regresar" class="btn btn-warning">Regresar</a>
 							</div>
 						</form>
       				</div>
       			</div>
 			</div>
       	</div>
 	</div>
</div>
</body>
</html> 