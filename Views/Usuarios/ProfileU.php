<?php 
session_start();
if($_SESSION['tipo'] != "1" || !isset($_SESSION['tipo']))
      {
          header('Location: ../Log-In.php');
      }
      $title="Panel | Admin";
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
	<h1 class="text-center"><?php echo $name; ?></h1>
	<div class="col-md-6">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1 class="panel-title text-center">Información Básica</h1>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hover table-striped table-condensed">
					<tr>
						<td>Nombre :</td>
						<td><?php echo $name ?></td>
					</tr>
					<tr>
						<td>Correo Electrónico :</td>
						<td><?php echo $_SESSION['Email'] ?></td>
					</tr>
					<tr>
						<td>Usuario :</td>
						<td><?php echo $_SESSION['Usuario'] ?></td>
					</tr>
					<tr>
						<td>Rol :</td>
						<td><?php if($_SESSION['tipo'] == "2"){
							echo "Administrador";
						}
						else{
							echo "Cajero"; } ?></td>
					</tr>
				</table>
			</div>

			
		</div>
	</div>		
	</div>

</div>





</body>
</html>