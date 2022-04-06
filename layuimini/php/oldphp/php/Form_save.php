<?php
	header("Content-type: json/html; charset=utf-8");
	include 'Conn.php';
	
	$atr = $_POST['atr'];
	$Tab_Name = $_POST['Tab_Name'];
	$ii  = $_POST['len'];
	
	
	$ContNmae = $atr[0]['name'];
	$ContValu = $atr[0]['value'];
	$SqlDelte = "Delete from ".$Tab_Name." Where ".$ContNmae." = '".$ContValu."'";

	mysqli_query($conn,$SqlDelte);
	// echo $SqlDelte."\n";	
	
	
	$a="insert into ".$Tab_Name."(";
	$Val="values(";
	$SqlVar = "";
	$SqlValue = "";	
	$b=",";
	$c="',";
	for($i=0;$i<$ii;$i++){
		$name  = '`'.$atr[$i]['name'].'`';		//数组下标
		$value = $atr[$i]['value']; 	//数组内容
		// echo $name."===>".$value."<br>";
	
		$a .= $name.$b;
		$Val .= "'".$value.$c;
	}
	$SqlVar = substr($a,0,strlen($a)-1).")";
	$SqlValue = substr($Val,0,strlen($Val)-1).")";
	$Sqlcomm = $SqlVar . $SqlValue;
	echo $Sqlcomm;	
	mysqli_query($conn,$Sqlcomm);
	// echo "OK";

?>