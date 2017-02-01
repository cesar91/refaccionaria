<?php 
session_start();
require_once('../../Model/SupplierCrud.php');

if($_SESSION['tipo'] != "2" || !isset($_SESSION['tipo']))
      {
          header('Location: ../Log-In.php');
      }
      $title="Proveedores";
      $name=$_SESSION['Nombre'];
      $closing="log-off.php";

      $result=SupplierCrud::Index();

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
<?php  if(isset($_GET['Estado']))
      {
          if($_GET['Estado'] == 'false')
          {

            echo '<div class="alert alert-warning">
   				 <a href="Supplier-Index.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    			<strong>¡Cuidado!</strong>  No se ha podido realizar su proceso.
  				</div>';


          }
          else{
          	    echo '<div class="alert alert-success">
   				 <a href="Supplier-Index.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    			<strong>¡Correcto!</strong> Se ha completado el proceso con exito.
  				</div>';
          }
      }
      if (isset($_GET['EstadoA'])) {
      	if ($_GET['EstadoA']=='false') {
     	 echo '<div class="alert alert-warning">
   				 <a href="Supplier-Index.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    			<strong>¡Cuidado!</strong> No se ha podido Eliminar posiblemente por que tenga productos o datos vinculados.
  				</div>';

     }
      }
     
 ?>
<div class="container">
  <div class="col-md-5">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h1 class="panel-title text-center">Nuevo Proveedor</h1>
      </div>
      <div class="panel-body">
        <form action="../../Controller/Add-SupplierController.php" method="POST">
          <div class="form-group">
            <label for="name" class="label-form">Nombre:</label>
            <input type="text" name="name" placeholder="Nombre del Contacto" class="form-control">
          </div>
          <div class="form-group">
            <label for="address" class="label-form">Dirección:</label>
            <textarea name="address" class="form-control" placeholder="Escriba aqui su Direccion Correctamente"></textarea>
          </div>
          <div class="form-group">
            <label for="phone" class="label-form">Telefono:</label>
            <input type="tel" name="phone" placeholder="123-456-789-0" class="form-control">
          </div>
          <div class="form-group">
            <label for="company" class="label-form">Empresa:</label>
            <input type="tel" name="company" placeholder="Nombre de la Empresa" class="form-control">
          </div>
          <div class="form-group">
            <label for="email" class="label-form">Email:</label>
            <input type="email" name="email" placeholder="Contacto@mail.com" class="form-control">
          </div>
          <div class="form-group">
            <input type="submit" value="Nuevo Proveedor" class="btn btn-success">
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-7">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h1 class="panel-title text-center">Proveedores</h1>
      </div>
      <div class="panel-body">
        <table class="table table-bordered table-hover table-condensed table-striped">
          <tr>
            <th>Contacto</th>
            <th>Telefono</th>
            <th>Compañia</th>
            <th>Correo </th>
            <th colspan="3" class="text-center">Acción</th>
          </tr>
          <?php foreach ($result as $data => $list): ?>
           <tr>
            <td><?php echo $list["Nombre"]; ?></td>
            <td><?php echo $list["Telefono"]; ?></td>
            <td><?php echo $list["Compania"] ?></td>
            <td><?php echo $list["Correo"] ?></td>
            <td><a href="Edit-Supplier.php?Id=<?php echo $list["Id"]?>" title="Modificar" class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i></a></td>
            <td><a href="Details-Supplier.php?Id=<?php echo $list["Id"]?>" title="Detalle" class="btn btn-primary"><i class="glyphicon glyphicon-file"></i></a></td>
            <td><a href="../../Controller/Delete-SupplierController.php?Id=<?php echo $list["Id"]?>" title="Modificar" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a></td>
          </tr>
           <?php endforeach ?>
      </table>
      </div>
    </div>
  </div>
</div>
</body>
</html>

 