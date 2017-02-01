<?php 
 require_once ('Conn.php');
 class OrderSaleModel
 {
 	
 	function Create($date,$client)
 	{
 		global $db;
 		$sql="call CreateOrder('$date','$client')";
 		$result=$db->query($sql);
 		
 		if (!$result) {
 			return false;
 		}
 		else{

 			$sql2="SELECT * FROM orden ORDER BY Id DESC LIMIT 1 ";
 			$stmt=$db->query($sql2);
 			$rows=$stmt->fetch(); 
		return $rows;
 			 
		
 		}
 	}

 	function SearchReport($datebegin,$datefinal)
 	{
 		global $db;
 		$sql="call SearchOrderItem('$datebegin','$datefinal')";
 		$result=$db->query($sql);
 		$list=[];
 		$i=0;
 		if (!$result) {
 			return false;
 		}
 		else{
 			while ($rows=$result->fetch()) {
					$list[$i]=$rows;
					$i++;
				}
				return $list;
 		}
 	}
 	function SearchReportU($datebegin)
 	{
 		global $db;
 		$sql="call SearchOrderItemU('$datebegin')";
 		$result=$db->query($sql);
 		$list=[];
 		$i=0;
 		if (!$result) {
 			return false;
 		}
 		else{
 			while ($rows=$result->fetch()) {
					$list[$i]=$rows;
					$i++;
				}
				return $list;
 		}
 	}
 }

 ?>