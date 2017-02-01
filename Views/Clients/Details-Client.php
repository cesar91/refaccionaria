<?php 
session_start();
require_once('../../Model/ClientCrud.php');

if($_SESSION['tipo'] != "2" || !isset($_SESSION['tipo']))
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
        <div class="col-md-8 col-centered">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1 class="panel-title text-center">Detalles de <?php echo $ReadClient['Nombre'];?> </h1>
                </div>
                <div class="panel-body">
                    <div class="table-responsive col-md-8 col-centered">
                        <table class="table table-hover table-bordered table-condensed table-striped">
                            <tr>
                                <td>Nombre</td>
                                <td><?php echo $ReadClient['Nombre'];?></td>
                            </tr>
                            <tr>
                                <td>Dirección</td>
                                <td><?php echo $ReadClient['Direccion'];?></td>
                            </tr>
                            <tr>
                                <td>Teléfono</td>
                                <td><?php echo $ReadClient['Telefono'];?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?php echo $ReadClient['Mail'];?></td>
                            </tr>
                            <tr>
                                <td class="text-center"><a href="Edit-Client.php?Id=<?php echo $ReadClient['Id'];?>" class="btn btn-warning">Actualizar</a></td>
                                <td class="text-center"><a  href="Client-Index.php" class="btn btn-default">Lista de Clientes</a></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            
        </div> 
    </div>