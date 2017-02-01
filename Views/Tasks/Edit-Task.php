<?php 
session_start();
require_once('../../Model/TaskCrud.php');
require_once('../../Model/UserCrud.php');


if($_SESSION['tipo'] != "2" || !isset($_SESSION['tipo']))
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
<div class="container">

 <div class="col-md-8 col-centered" id="newform">

    <div class="panel panel-primary">
      <div class="panel-heading">
        <h1 class="panel-title">Editar </h1>
      </div>
    <div class="panel-body">
      <form action="../../Controller/Edit-TaskController.php" method="POST">
        <input type="text" name="id" value="<?php echo$ReadT['TaskId'] ?> " hidden>
        <div class="col-md-6">
          <div class="form-group">
            <input type="text" name="title"  value="<?php echo $ReadT['Nametask']; ?>" class="form-control">
          </div>
          <div class="form-group">
            <textarea name="description" class="form-control"><?php echo $ReadT['Description']; ?> </textarea>  
          </div>
        </div>
   
        <div class="col-md-6">
          <div class="form-group">
            <select name="finish" class="form-control" >
              <option value="<?php echo $ReadT['Cumplio']; ?>"><?php if ($ReadT['Cumplio']==1){echo "Pendiente";}else{echo "Finalizado";} ?></option>
              <option value="1">Pendiente</option>
              <option value="2">Finalizado</option>
            </select>
          </div>
          <div class="form-group">
            <select name="userid" class="form-control">
            <option value="<?php echo $ReadT['UserId'] ?>"><?php echo $ReadT['UserName']; ?></option>
            <?php 
                $users=UserCrud::Index();
                foreach ($users as $Id => $user): ?>
                <option value="<?php echo $user['Id'] ?>"><?php echo $user['Nombre'] ?></option>
                <?php endforeach ?>
            </select>
          </div>
        </div>
    
        <div class="panel-footer">
        <div class="col-md-6">
          <input type="submit"  value="Asignar Tarea" class="btn btn-success">
          <a href="Task-Index.php" title="Lista de Tareas" class="btn">Tareas</a>
        </div>
        </div>
      </form>
    </div>
    </div>
  </div>
</div>
