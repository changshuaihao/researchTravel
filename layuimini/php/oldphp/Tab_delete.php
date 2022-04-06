<?php
	header("Content-type: json/html; charset=utf-8");
	include 'Conn.php';
	
	$Tab_Name = $_POST['Tab_Name'];
	$Cont = $_POST['Cont'];
	$result = array();
	
	$Sqicomm = "delete from ".$Tab_Name.$Cont;
	echo $Sqicomm;

	$rs = mysqli_query($conn,$Sqicomm);

	if($rs){
		$result = array('type' => true);
	}else{
		$result = array('type' => false);
	}
	
	echo json_encode($result);
	
?>