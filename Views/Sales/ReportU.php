<?php 
require_once('../../Model/ProductCrud.php');
require_once('../../Model/Item_TempModel.php');
require_once('../../Model/ClientCrud.php');
require_once('../../Model/OrderSaleModel.php');
session_start();
if($_SESSION['tipo'] != "1" || !isset($_SESSION['tipo']))
      {
          header('Location: ../Log-In.php');
      }
      $title="Reporte";
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

 <div class="container">
 	<div class="col-md-8 col-centered">
 		<div class="panel panel-primary">
 			<div class="panel-heading">
 				<h1 class="panel-title">Reportes</h1>

 			</div>
 			<div class="panel-body">
 				<form action="ReportU.php" method="post">
 				<div class="col-md-4"> 			
 					<label for="date" class="form-label">Fecha Inicio</label>
 					<input type="date" name="dateb"   class="form-control">
 				</div>
 				 <div class="col-md-4"> 			
 					<label></label>
 					<input type="submit" name="submit"   class="form-control btn btn-default">
 				</div>
 				</form>
 			</div>
 		</div>
 		<hr>
		
 		<div class="panel panel-primary">
 			<div class="panel-heading"><h2 class="panel-title text-center">Reportes</h2></div>
			<div class="panel-body">
 				<table class="table table-striped table-condensed table-hover table-bordered table-success">
 					<thead>
 						  	<tr>
 								<th>Cajero</th>
 								<th>Fecha</th>
 								<th>Codigo</th>
 								<th>Nombre</th>
 								<th>Cantidad</th>
 								<th>Precio Unitario</th>
 								<th>Total</th>
 							</tr>
 					</thead>
 					 					
 					<tbody>
 						<?php 
 						if(isset($_POST['submit'])){
 							$datebegin=$_POST['dateb'];
 							
 							$result=OrderSaleModel::SearchReportU($datebegin);
 						}

 						?>
 						<?php if ($result>0)
 						$total=0;
 							foreach ($result as $key => $value): ?>
 							<tr>
 							<td class="text-center"><?php echo $value['cajero']; ?></td>
 							<td class="text-center"><?php echo $value['orderFecha']; ?></td>
 							<td class="text-center"><?php echo $value['Code']; ?></td>
 							<td class="text-center"><?php echo $value['ProductName']; ?></td>
 							<td class="text-center"><?php echo $value['Quantity']; ?></td>
 							<td class="text-center"><?php echo "$".$value['UnitPrice']; ?></td>
 							<td class="text-center"><?php echo "$".$value['Total']; ?></td>
 							</tr>
 							<?php $total+=$value['Total']; ?>
 						<?php endforeach ?>
 							<tr>
 								<td colspan="6">Total</td>
 								<td><?php echo "$"."$total"; ?></td>
 							</tr>
 					</tbody>
 				</table>
 				</div>
 			
 		</div>

 	</div>
 </div>