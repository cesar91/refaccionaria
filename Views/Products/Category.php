<?php 
session_start();
 require_once('../../Model/CategoryCrud.php');
      if($_SESSION['tipo'] != "2" || !isset($_SESSION['tipo']))
      {
          header('Location: ../Log-In.php');
      }
    $title="Categoria";
    $name=$_SESSION['Nombre'];


 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title; ?></title>
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
<?php 
  if(isset($_GET['Estado']))
      {
          if($_GET['Estado'] == 'false')
          {

            echo '<div class="alert alert-warning">
           <a href="Category.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>¡Cuidado!</strong> Esta Categoria no se eliminó por que contiene productos agregados a ella.
          </div>';
          }
          else{
                echo '<div class="alert alert-success">
           <a href="Category.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>¡Correcto!</strong> Se ha completado el proceso con exito.
          </div>';
          }
      }
        if(isset($_GET['EstadoA']))
      {
          if($_GET['EstadoA'] == 'false')
          {

            echo '<div class="alert alert-warning">
           <a href="Category.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>¡Cuidado!</strong> Esta Categoria no se agrego debido a que probablemente ya existe.
          </div>';
          }
          
      }
 ?>

<div class="container">

<div class="col-md-7 col-centered">
  <div class="panel panel-primary">
      <div class="panel-heading">
          <h1 class="panel-title text-center"><i class="glyphicon glyphicon-th-list" hidden="true"></i> Categoría</h1>
      </div> 
      <div class="panel-body">
          <form action="../../Controller/AddCategory-Controller.php" method="POST">
          <div class="form-group">
            <input type="text" name="name" placeholder="Categoría" class="form-control">
          </div>
      </div>
      <div class="panel-footer">
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Agregar Categoria">
        </div>
          </form>
      </div>
  </div>
  <div class="panel panel-primary">
      <?php 
      $consulta=CategoryCrud::ListCategory();
      ?>
      <table class="table table-condensed table-hover table-striped table-bordered">
        <tr>
          <th class="text-center">Nombre</th>
          <th class="text-center">Accion</th>
        </tr>
            <?php 
            foreach ($consulta as $name=> $valor) :
            ?>
        <tr>
          <td class="text-center"><?php echo $valor["Nombre"];?></td>
          <td class="text-center"><a href="../../Controller/DeleteCategoryController.php?Id=<?php echo$valor["Id"]?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
        </tr>
        <?php
            endforeach?>
  </div>
</div>


    </table>
    </div>
  
   </div>
  </body>
 </html>
