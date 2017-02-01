<?php 

session_start();
require_once('../Model/TaskCrud.php');

if($_SESSION['tipo'] != "1" || !isset($_SESSION['tipo']))
      {
          header('Location: Log-In.php');
      }
      $title="Panel | Usuario";
      $name=$_SESSION['Nombre'];
      $closing="log-off.php";
      $idUser=$_SESSION['ID'];
      $tareas=TaskCrud::Taskbyuser($idUser);

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
				<li><a href="Contacto.php" title="Contacto">Contacto</a></li>
				<li><a href="Products/Product-IndexU.php" title="Productos">Productos</a></li>
				<li><a href="Sales/SaleU.php" title="Ventas">Ventas</a></li>
				<li><a href="AdminUsuario.php" title="Panel Usuario">Panel Usuario</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="Usuarios/ProfileU.php?Id=<?php echo $_SESSION['ID']; ?>" title="<?php echo "$name"; ?>"><img src="img/profile.png"> <?php echo "$name"; ?></a></li>
				<li><a href="Log-Off.php" title="Cerrar Sesión">Cerrar Sesión</a></li>
			</ul>
		</div>
	</nav>
</header>
<div class="col-md-8">
 	<div class="panel panel-primary">
 		<div class="panel-heading">
 			<h1 class="panel-title text-center">Administrador</h1>
 		</div>
 		<div class="panel-body">
 			<div class="row">
 				<h5 class="text-center">Productos</h5>
 				<a href="Products/Product-IndexU.php" title="Lista de Producto">
 					<div class="col-md-2 text-center ">
 						<img src="img/productlist.png" alt="Lista">
 						<p class="text-center">Lista de Producto</p>
 					</div>
 				</a>
 				<a href="Products/Add-ProductU.php" title="Nuevo Producto">
 					<div class="col-md-2 text-center ">
 						<img src="img/productadd.png" alt="Nuevo"> 
 						<p class="text-center">Nuevo Producto</p> 
 					</div>
 				</a>
 				<a href="Products/CategoryU.php" title="Categoría">
 					<div class="col-md-2 text-center ">
 						<img src="img/category.png" alt="categoria"> 
 						<p class="text-center">Categoría</p> 
 					</div>
 				</a>
 				<a href="Suppliers/Supplier-IndexU.php" title="Proveedores">
 					<div class="col-md-2 text-center ">
 						<img src="img/supplier.png" alt="proveedores"> 
 						<p class="text-center">Proveedores</p>
 					</div>
 				</a>
 			</div>
 		

 			<div class="row">
 				<h5 class="text-center">Usuarios</h5>
 				<a href="Usuarios/ProfileU.php?Id=<?php echo $_SESSION['ID']; ?>" title="Perfil">
 					<div class="col-md-2 text-center ">
 						<img src="img/profile2.png" alt="Lista"> 
 						<p class="text-center">Perfil</p> 
 					</div>
 				</a>
 			</div>
 			<div class="row">
 				<h5 class="text-center">Ventas</h5>
 				 	<a href="Sales/SaleU.php" title="Caja">
 				 		<div class="col-md-2 text-center ">
 				 			<img src="img/boxshop.png" alt="Lista"> 
 				 			<p class="text-center">Caja</p> </div></a>
 					<a href="Sales/InventoryU.php" title="Inventario">
 						<div class="col-md-2 text-center ">
 							<img src="img/inventory.png"> 
 								<p class="text-center">Inventario</p> 
 						</div>
 					</a>	
 			</div>
 			<div class="row">
 				<h5 class="text-center">Tareas</h5>
 				<a href="Tasks/Task-IndexU.php" title="Tarea">
 					<div class="col-md-2 text-center">
 						<img src="img/task.png" alt="Tareas">
 						<p class="text-center">Tareas</p> 
 					</div>
 				</a>
 				<a href="Clients/Client-IndexU.php" title="Clientes">
 					<div class="col-md-2 text-center">
 						<img src="img/clients.png">
 						<p class="text-center">Clientes</p>
 					</div>
 				</a>
 				<a href="Sales/ReportU.php" title="Reportes">
 					<div class="col-md-2 text-center ">
 						<img src="img/report.png" alt="Lista"> 
 						<p class="text-center">Reportes</p> 
 					</div>
 				</a>		
 			</div>
 		</div>
 	</div>
 </div>
 <div class="col-md-4">
 	<div class="panel panel-primary">
 		<div class="panel-heading">
 			<h1 class="panel-title text-center">Tareas</h1>
 		</div>
 		<div class="panel-body">
 			<div class="table-responsive">

	 			<table class="table table-responsive table-condesed table-hover table-striped table-bordered ">
	 			<caption class="text-center">Ultimas 5 Tareas</caption>
	 					<tr>
	 						<th>Nombre</th>
	 						<th>Tarea</th>
	 						<th>Estado</th>
	 					</tr>
	 					<?php foreach ($tareas as $id => $tsk): ?>
	 					<tr>
	 						<td class="tfont"><?php echo $tsk["UserName"]; ?></td>
	 						<td class="tfont"><?php echo $tsk["Nametask"]; ?></td>
	 						<td class="tfont">
	 						<?php 
	 							if ($tsk['Cumplio']==1)
	 							{
 									echo"Pendiente";
 								}else{echo"Finalizado";} ?></td>
	 					</tr>	
	 					<?php endforeach ?>
	 					

	 			</table>
				
 			</div>
 	</div>
 	</div>
 </div>

	
	
</div>

</body>
</html>