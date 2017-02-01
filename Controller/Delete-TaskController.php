<?php 
require_once('../Model/TaskCrud.php');
$id=$_GET['Id'];

$result=TaskCrud::Delete($id);

if (!$result) {
header("Location: ../Views/Tasks/Task-Index.php?Estado=false");

}
else{
header("Location: ../Views/Tasks/Task-Index.php?Estado=true");
	}
 ?>