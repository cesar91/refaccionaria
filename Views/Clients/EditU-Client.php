<?php 
session_start();
require_once('../../Model/ClientCrud.php');

if($_SESSION['tipo'] != "1" || !isset($_SESSION['tipo']))
      {
          header('Location: ../Log-In.php');
      }
      $title="Clientes";
      $name=$_SESSION['Nombre'];
      $closing="log-off.php";
      $id=$_GET['Id'];

    $ReadClient=ClientCrud::Read($id);
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
    <div class="col-md-7 col-centered">
        <div class="panel panel-primary">
            <div class="panel-heading">
             <h1 class="panel-title text-center">Cliente : <?php echo $ReadClient["Mail"];?></h1>
            </div>
           <div class="panel-body">
                <div class="col-centered" id="newform">
 	              <form action="../../Controller/EditU-ClientController.php" method="POST">
                      <input type="text" name="id" value="<?php echo $ReadClient['Id'];?>"  hidden>
 	              <div class="col-md-6">
 		                 <div class="form-group">
 			                <input type="text" name="name"  value="<?php echo $ReadClient["Nombre"]?>" class="form-control">
 		                 </div>
 		                 <div class="form-group">
                             <textarea class="form-control" name="address"><?php echo $ReadClient["Direccion"];?></textarea>
 		                 </div>
 	              </div>
                  <div class="col-md-6">
	                   <div class="form-group">
 		                 <input type="tel" name="phone"  value="<?php echo $ReadClient['Telefono'];?>" class="form-control" readonly>
 	                   </div>
 	                   <div class="form-group">
 		                 <input type="email" name="email"  value="<?php echo $ReadClient['Mail'];?>" class="form-control">
 	                   </div>
 	              </div>        
                </div>
            </div>
            <div class="panel-footer">
                <div class="col-md-7 col-centered">
 		                 <input type="submit"  value="Actualizar Cliente" class="btn btn-success">
 		                 <a href="Client-IndexU.php" title="Lista de Clientes" class="btn btn-default">Lista de Clientes</a>
                </div>
 	        </div>
 	              </form>
            
        </div>
 </div>

</div> 