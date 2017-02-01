<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>Iniciar Sesión</title>


    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">
    

      <form action="../Controller/LoginController.php" method="POST" class="form-signin">
        <h2 class="form-signin-heading">Iniciar Sesión</h2>
        <label for="inputEmail" class="sr-only">Usuario</label>
        <input id="inputEmail" name="email" class="form-control" placeholder="Usuario" required="" autofocus="" type="text">
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input id="inputPassword" name="password" class="form-control" placeholder="Contraseña" required="" type="password">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar Sesión</button>
      </form>

    </div> 

</body></html>