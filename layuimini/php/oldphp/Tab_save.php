<?php
	header("Content-type: text/html; charset=utf-8");
	include 'Conn.php';
	
	@$Tab_Name = $_POST['Tab_Name'];
	@$Tab_data = $_POST['Tab_data'];
	@$Cont = iconv("UTF-8","GBK",$_POST['Cont']);
	

	$ii=count($Tab_data);
	$SqlVar = "";
	$SqlValue = "";	
	// $QTab_Name = 'qry_'.$Tab_Name;
	// echo $ii;
	$QTab_Name = $Tab_Name;
	$QSqicomm="select column_name from information_schema.columns where table_name='".$Tab_Name."'";
	// echo $QSqicomm;

	if($Cont != ''){
		$Sqicomm = "delete from ".$Tab_Name.$Cont;
		$rs = mysqli_query($conn,$Sqicomm);
	}
//=================================================== make Sql Command =======
	$rsj = mysqli_query($conn,$QSqicomm);	
	for($i=0;$i<$ii;$i++){
		$rsj = mysqli_query($conn,$QSqicomm);	
		while($rowj = mysqli_fetch_array($rsj,MYSQLI_ASSOC)){
			$SqlVar .= $rowj['column_name'].","; 			
			$SqlValue .= "'".$Tab_data[$i][$rowj['column_name']]."',";
		}
		$SqlVar = substr($SqlVar,0,strlen($SqlVar)-1);	
		$Sqicomm = "insert into ".$Tab_Name."(".$SqlVar.")";
		$SqlValue = "values(".substr($SqlValue,0,strlen($SqlValue)-1).")";
		
		$Sqlstrings = $Sqicomm.$SqlValue;
		echo $Sqlstrings;
		mysqli_query($conn,$Sqlstrings);
		$SqlVar = "";
		$SqlValue = "";
	}
//===========================================================================	
	
	
	
?>