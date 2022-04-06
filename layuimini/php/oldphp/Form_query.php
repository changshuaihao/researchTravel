<?php
	header("Content-type: text/html; charset=utf-8");
	include 'Conn.php';
	
	@$Tab_Name = $_POST['Tab_Name'];
	@$cont = $_POST['cont'];
	@$Tab_Name = $_GET['Tab_Name'];
	@$cont = urldecode($_GET['cont']);
	// $Tab_Name = "itemlistd";
	// $Cont = iconv("UTF-8","GBK"," where category_id = 1");
	// $Tab_Name = "test";
	
	// $Tab_Name = "qry_".	$Tab_Name;
	$Sqicomm = "select * from ".$Tab_Name.$cont;

	$rsi = mysqli_query($conn,$Sqicomm);
	
	$Sqicomm="select column_name from information_schema.columns where table_name='".$Tab_Name."'";

	$arr = array();
	$result = array();
	$i = 0;
	$j = 0;

	while($rowi = mysqli_fetch_array($rsi,MYSQLI_ASSOC)){
		$rsj = mysqli_query($conn,$Sqicomm);	
		while($rowj = mysqli_fetch_array($rsj,MYSQLI_ASSOC)){
		$arr[$rowj['column_name']]  = iconv('GBK', 'UTF-8', $rowi[$rowj['column_name']]);
		
		}
	}
	echo json_encode($arr);
	
?>
