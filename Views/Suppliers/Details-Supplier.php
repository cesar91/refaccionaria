<?php 
session_start();
require_once('../../Model/SupplierCrud.php');

if($_SESSION['tipo'] != "2" || !isset($_SESSION['tipo']))
      {
          header('Location: ../Log-In.php');
      }
      $title="Detalles";
      $name=$_SESSION['Nombre'];
      $closing="log-off.php";
      $id=$_GET['Id'];
      $result=SupplierCrud::Read($id);

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
  <div class="col-md-6 col-centered">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h1 class="panel-title text-center">
          Detalles de <?php echo $result['Nombre']; ?>
        </h1>
      </div>
      <div class="panel-body">
        <table class="table table-striped table-hover table-condensed table-bordered">
          <tr>
             <td>Nombre</td>
             <td><?php echo $result['Nombre']; ?></td>
          </tr>
          <tr>
             <td>Direccion</td>
             <td><?php echo $result['Direccion']; ?></td>
          </tr>
          <tr>
             <td>Telefono</td>
             <td><?php echo $result['Telefono']; ?></td>
          </tr>
          <tr>
             <td>Empresa</td>
             <td><?php echo $result['Compania']; ?></td>
          </tr>
          <tr>
             <td>Correo Electrónico</td>
             <td><?php echo $result['Correo']; ?></td>
          </tr>
          <tr>
             <td><a href="Edit-Supplier.php?Id=<?php echo $result["Id"]?>" title="Modificar" class="btn btn-warning">Actualizar</a></td>
             <td><a href="Supplier-Index.php" title="Regresar" class="btn btn-primary">Lista de Proveedores</a></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
</body>
</html>