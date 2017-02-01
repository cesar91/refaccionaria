<?php 
require('config.php');

//$db=new mysqli($config['host'],$config['Username'],$config['Password'],$config['Database']);
try {
	$db=new PDO('mysql:host=localhost;dbname=dbstore',$config['UserName'],$config['Password']);
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
	echo 'Error: '.$e->getMessage();

}


 ?>