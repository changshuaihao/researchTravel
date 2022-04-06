<?php
	header("Content-type: text/html; charset=utf-8");
	include 'Conn.php';
	
	$Cont = $_POST['Cont'];
	// $Cont = "QUE";
	
	if($Cont==''){return;}

	$arr = array();	
	$Sqicomm = "call getbillno('$Cont',@BILL_NOP)";
	$rsi = mysql_query($Sqicomm,$conn);
	
	$rowi = mysql_fetch_array($rsi);
	$arr['BILL_NOP'] = $rowi['BILL_NOP'];
	echo json_encode($arr);
	
?>