<?php
include_once('../Model/ClientCrud.php');

$id=$_GET['Id'];

$DeleteCliente=ClientCrud::Delete($id);

if(!$DeleteCliente)
{
    header("Location: ../Views/Clients/Client-Index.php?Estado=false");
}
else{
    header("Location: ../Views/Clients/Client-Index.php?Estado=true");
}
?>