<?php

	header("Content-type: text/html; charset=utf-8");
	include 'Conn.php';
	
	@$Tab_Name = $_POST['Tab_Name'];
	@$Cont = $_POST['Cont'];	
	@$Tab_Name = $_GET['Tab_Name'];
	@$Cont = urldecode($_GET['Cont']);	
	
	// $Tab_Name = "admin";
	// $Cont = iconv("UTF-8","GBK"," where id = 2");
	$result = array();
	
	$Tab_Name = 't_'.$Tab_Name;
	$Sqicomm = "delete from ".$Tab_Name.$Cont;
	$rs = mysqli_query($conn,$Sqicomm);
	
	if($rs){
		$result = array('type' => true);
	}else{
		$result = array('type' => false);
	}
	
	echo json_encode($result);

?>