<?php 
require_once('../Model/TaskCrud.php');

$title=$_POST['title'];
$description=$_POST['description'];
$userid=$_POST['userid'];

$consulta=TaskCrud::Create($title,$description,$userid);
if (!$consulta) {
	header("Location: ../Views/Tasks/Task-Index.php?Estado=false");
}
else{
	header("Location: ../Views/Tasks/Task-Index.php?Estado=true");
}

 ?>