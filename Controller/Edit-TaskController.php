<?php 
require_once('../Model/TaskCrud.php');

$id=$_POST['id'];
$title=$_POST['title'];
$description=$_POST['description'];
$finish=$_POST['finish'];
$userid=$_POST['userid'];

$result=TaskCrud::Edit($id,$title,$description,$finish,$userid);
if (!$result) {
	header("Location: ../Views/Tasks/Task-Index.php?Estado=false");
}
else{
header("Location: ../Views/Tasks/Task-Index.php?Estado=true");
}



 ?>