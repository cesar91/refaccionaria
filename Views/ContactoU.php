<?php 
session_start();

if($_SESSION['tipo'] != "1" || !isset($_SESSION['tipo']))
      {
          header('Location: ../Log-In.php');
      }
      $title="Detalles";
      $name=$_SESSION['Nombre'];
      $closing="log-off.php";
     

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo "$title"; ?></title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
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
        <li><a href="Sales/SaleU.php" title="Inicio">Inicio</a></li>
        <li><a href="ContactoU.php" title="Contacto">Contacto</a></li>
        <li><a href="Products/Product-IndexU.php" title="Productos">Productos</a></li>
        <li><a href="Sales/SaleU.php" title="Ventas">Ventas</a></li>
        <li><a href="AdminUsuario.php" title="Panel Admin">Panel Usuario</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../Usuarios/ProfileU.php?Id=<?php echo $_SESSION['ID']; ?>" title="<?php echo "$name"; ?>"><img src="img/profile.png"> <?php echo "$name"; ?></a></a></li>
        <li><a href="../Log-Off.php" title="Cerrar Sesión">Cerrar Sesión</a></li>
      </ul>
    </div>
  </nav>
</header>
 <div class="container">
	<div class="contacto">
		<div class="col-md-6">
			<div class="col-md-6 col-centered">
				<h1 class="panel-title">Contacto Refaccionaria</h1>
				<img src="img/logo2.jpg" alt="Logo" class="img-circle" width="120">
				<address>
					<b>Administrador:</b> Aida Perez Beltran <br>
					<b>Email: </b> <a href="mailto:aidaperez_86@hotmail.com?subject=Contacto" alt="email me">aidaperez_86@hotmail.com</a><br>
					<b>Telefono:</b> 229-902-87-52 <br>
					<b>Dirección:</b> Calle 16 de Septiembre e Iturbide, Huixcolotla,Tierra Blanca.

				</address>
			</div>
			
		</div>
		<div class="col-md-6">
			<div class="col-md-6 col-centered">
			<h1 class="panel-title">Desarrollo</h1>
				<img src="img/logo1.jpg" alt="Logo" class="img-circle" width="120">
				<address>
					<b>Administrador:</b> Simon Contreras de Jesus <br>
					<b>Email: </b> <a href="mailto:filosofo_26@hotmail.com?subject=feedback" "email me">filosofo_26@hotmail.com</a><br>
					<b>Telefono:</b> 271-115-18-70<br>
					<b>Dirección:</b> Cordoba,Veracruz
				</address>
			</div>

		</div>
	</div>

</div>