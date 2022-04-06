<?php
	header("Content-type: text/html; charset=utf-8");
	include 'Conn.php';
	date_default_timezone_set('PRC');

	$Cont = $_POST['Cont'];
//	$Cont = "DECLARE @RESULT int EXEC @RESULT = Register csy1,123 select @RESULT";
	
	$Sqlcomm = $Cont;
	

	$rs = mysql_query($Sqlcomm,$conn);
	
	$rs1 = sqlsrv_fetch_array($rs);
//	var_dump($rs1[0]);

	if($rs1[0]===1){
		$result = array('type' => true);
	}else{
		$result = array('type' => false);
	}
	
	echo json_encode($result);
?>