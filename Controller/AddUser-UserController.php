<?php 
require_once('../Model/UserCrud.php');
$name=$_POST["name"];
$email=$_POST["email"];
$username=$_POST["username"];
$password=$_POST["password"];



 $consulta=UserCrud::Create($name,$email,$username,$password);
 var_dump($consulta);
 if ($consulta!=true) {
 	header("Location: ../Views/Usuarios/User-Index.php?Estado=false");
 }
 else{
 	header("Location: ../Views/Usuarios/User-Index.php?Estado=true");
 }


 ?>