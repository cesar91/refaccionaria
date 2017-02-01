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
      if (isset($_GET['data'])) {
      	$result=TaskCrud::Search($data=$_GET['data']);
      }
      else{
      	$result=TaskCrud::Index();
      }
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
<?php  if(isset($_GET['Estado']))
      {
          if($_GET['Estado'] == 'false')
          {

            echo '<div class="alert alert-warning">
   				 <a href="Task-IndexU.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    			<strong>¡Cuidado!</strong>  No se ha podido realizar su proceso.
  				</div>';


          }
          else{
          	    echo '<div class="alert alert-success">
   				 <a href="Task-IndexU.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    			<strong>¡Correcto!</strong> Se ha completado el proceso con exito.
  				</div>';
          }
      }
 ?>
<div class="container">
    <div class="col-md-8 col-centered" id="list">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h1 class="panel-title text-center">
                 Tareas
                </h1>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-condensed table-hover ">
                    <tr>
                        <th>Usuario</th>
                        <th>Tarea</th>
                        <th>Estado</th>
                        <th colspan="3">Acción</th>
                    </tr>
                    <?php foreach ($result as $key => $value): ?>
                    <tr>
                        <td><?php echo $value['UserName']; ?></td>
                        <td><?php echo $value['Nombre']; ?></td>
                        <td><?php if ($value['Cumplio']==1) {
                        echo"Pendiente";
                        }
                        else{echo"Finalizado";} ?></td>
                        <td><a href="Edit-TaskU.php?Id=<?php echo $value['TaskId']; ?>" title="Editar" class="btn btn-default"><i class="glyphicon glyphicon-edit"></i></a></td>
                        <td><a href="Details-TaskU.php?Id=<?php echo $value['TaskId']; ?>" title="Detalles" class="btn btn-default"><i class="glyphicon glyphicon-file"></i></a></td>
                    </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    </div>
    
</div>
</body>
</html>
