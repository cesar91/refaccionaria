<?php 
session_start();
require_once('../../Model/TaskCrud.php');



if($_SESSION['tipo'] != "1" || !isset($_SESSION['tipo']))
      {
          header('Location: ../Log-In.php');
      }
      $title="Tareas";
      $name=$_SESSION['Nombre'];
      $closing="log-off.php";
      $Id=$_GET['Id'];

      $ReadT=TaskCrud::ReadTask($Id);
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
        <h2 class="panel-title">Tarea Para <?php echo $ReadT['UserName'] ?></h2>
      </div>
      <div class="panel-body">
        <table class="table table-hover table-condensed table-striped table-bordered">
            <tr>
              <th>Titulo</th>
              <th><?php echo $ReadT['Nametask']; ?></th>
            </tr>
            <tr>
              <td>Descripción</td>
              <td><?php echo $ReadT['Description'] ?></td>
            </tr>
            <tr>
              <td>Estado</td>
              <td><?php if ($ReadT['Cumplio']==1){echo "Pendiente";}else{echo "Finalizado";} ?></td>
            </tr>
            <tr>
              <td>Encargado</td>
              <td><?php echo $ReadT['UserName'] ?></td>
            </tr>
            <tr>
              <td class="text-center"><a href="Edit-TaskU.php?Id=<?php echo $ReadT['TaskId']; ?>" title="Detalles" class="btn btn-warning">Editar</a></td>
              <td class="text-center"><a href="Task-IndexU.php" title="Lista de Tareas" class="btn btn-primary">Tareas</a></td>
            </tr>
        </table>
        
      </div>
    </div>
  </div>
</div>