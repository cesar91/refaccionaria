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
   				 <a href="Task-index.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    			<strong>¡Cuidado!</strong>  No se ha podido realizar su proceso.
  				</div>';


          }
          else{
          	    echo '<div class="alert alert-success">
   				 <a href="Task-index.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    			<strong>¡Correcto!</strong> Se ha completado el proceso con exito.
  				</div>';
          }
      }
 ?>
<div class="container">
    <div class="col-md-5 col-centered">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h1 class="panel-title text-center">
                    Buscar Tarea
                </h1>
            </div>
            <div class="panel-body">
                <a href="#newform" title="Agregar tarea" class="btn">Tarea Nueva</a> |
                <a href="Task-Index.php" title="Lista de  Tarea" class="btn">Lista de Tareas</a>
                <form action="Task-Index.php" method="get">
                    <input type="text" name="data" placeholder="Buscar Por Usuario" class="form-control">
            </div>
            <div class="panel-footer">
                    <input type="submit" name="submit" value="Buscar" class="btn btn-default">
                    <a href="Task-Index.php" title="Todos las Tareas">Todos las Tareas</a>
                </form>
            </div>
        </div>        
    </div>
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
                        <th>Finalizado</th>
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
                        <td><a href="Edit-Task.php?Id=<?php echo $value['TaskId']; ?>" title="Editar" class="btn btn-default"><i class="glyphicon glyphicon-edit"></i></a></td>
                        <td><a href="Details-Task.php?Id=<?php echo $value['TaskId']; ?>" title="Detalles" class="btn btn-default"><i class="glyphicon glyphicon-file"></i></a></td>
                        <td><a href="../../Controller/Delete-TaskController.php?Id=<?php echo $value['TaskId']; ?>" title="Eliminar" class="btn btn-default"><i class="glyphicon glyphicon-trash"></i></a></td>
                    </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-centered" id="newform">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h1 class="panel-title">Nueva Tarea</h1>
            </div>
            <div class="panel-body">
                <form action="../../Controller/Add-TaskController.php" method="POST">
                <div class="col-md-6">
                    <div class="form-group">
                          <input type="text" name="title"  placeholder="Titulo de la Tarea" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" name="description"  placeholder="Descripcion Detalladamente" class="form-control">       
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <select name="userid" class="form-control">
                        <?php 
                            $users=UserCrud::Index();
                          foreach ($users as $Id => $user): ?>
                                        <option value="<?php echo $user['Id'] ?>"><?php echo $user['Nombre'] ?></option>
                        <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                    <input type="submit"  value="Asignar Tarea" class="btn btn-success">
                    <a href="#list" title="Lista de Tareas" class="btn">Tareas</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
