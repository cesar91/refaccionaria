<?php
include_once ('../Model/ClientCrud.php');

$id=$_POST['id'];
$name=$_POST['name'];
$address=$_POST['address'];
$email=$_POST['email'];

$EditClient=ClientCrud::Edit($id,$name,$address,$email);

if(!$EditClient)
{
    header("Location: ../Views/Clients/Client-IndexU.php?Estado=false");
}
else{
    header("Location: ../Views/Clients/Client-IndexU.php?Estado=true");
}

?>