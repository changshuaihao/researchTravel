<?php
	header("Content-type: text/html; charset=utf-8");
	include 'conn.php';
	date_default_timezone_set('PRC');
	error_reporting(0);
	
	$Tab_Name = $_POST['Tab_Name'];
	$Cont = iconv('UTF-8',"GBK",$_POST['Cont']);
	$Data = $_POST['Data'];	

	
	$Sqicomm="Select * FROM ".$Tab_Name.$Cont;
	$rsi = mysqli_query($conn,$Sqicomm);
	
//	$QSqicomm="Select Name,collation FROM SysColumns Where id=Object_Id('$Tab_Name')";
	$QSqicomm="select column_name as Name,data_type,collation_name as collation from information_schema.columns where table_name = '$Tab_Name'";
	
	$arr = array();
	$result = array();
	$send = array();
	
	while($rowi = mysqli_fetch_array($rsi)){
		$rsj = mysqli_query($conn,$QSqicomm);	
		while($rowj = mysqli_fetch_array($rsj)){
			if($rowj['collation']==null){
				$arr[$rowj['Name']]  = $rowi[$rowj['Name']];
			}else{
				$arr[$rowj['Name']]  = iconv('GBK', 'UTF-8', $rowi[$rowj['Name']]);
			}
		}
		array_push($result, $arr);			
	}
	
	$Sqicomm="delete from ".$Tab_Name.$Cont;
	$rs = mysqli_query($conn,$Sqicomm);
	
	$SqlVar = "";
	$SqlValue = "";	
	if($rs){
		for($i=0;$i<count($result);$i++){
			$rsj = mysqli_query($conn,$QSqicomm);	
			while($rowj = mysqli_fetch_array($rsj)){	
				if(array_key_exists($rowj['Name'],$Data)){
					if($rowj['collation']==null){
						if($rowj['data_type']=='date' || $rowj['data_type']=='datetime'){
							$SqlVar .= $rowj['Name'].",";
							$SqlValue .= "'".iconv('UTF-8','GBK', $Data[$rowj['Name']])."',";
						}else{
							$SqlVar .= $rowj['Name'].",";
							$SqlValue .= iconv('UTF-8','GBK', $Data[$rowj['Name']]).",";
						}
					}else{
						$SqlVar .= $rowj['Name'].",";
						$SqlValue .= "'".iconv('UTF-8','GBK', $Data[$rowj['Name']])."',";
					}
				}else{
					if($rowj['collation']==null){
						if($rowj['data_type']=='date' || $rowj['data_type']=='datetime'){
							if($result[$i][$rowj['Name']]!=NULL){
								$date = $result[$i][$rowj['Name']];
								$SqlVar .= $rowj['Name'].",";
								$SqlValue .= "'".mb_substr($date->date,0,10,'GBK')."',";
							}
						}else{
							if($result[$i][$rowj['Name']]!=NULL){
								$SqlVar .= $rowj['Name'].",";
								$SqlValue .= iconv('UTF-8','GBK',  $result[$i][$rowj['Name']]).",";
							}
						}
					}else{
						if($result[$i][$rowj['Name']]!=NULL){
							$SqlVar .= $rowj['Name'].",";
							$SqlValue .= "'".iconv('UTF-8','GBK',  $result[$i][$rowj['Name']])."',";
						}
					}
				}
			}
		$SqlVar = substr($SqlVar,0,strlen($SqlVar)-1);
		$Sqicomm = "insert into $Tab_Name(".$SqlVar.")";
		$SqlValue = " values(".substr($SqlValue,0,strlen($SqlValue)-1).")";
			
		$Sqlstrings = $Sqicomm.$SqlValue;
		$rs2=mysqli_query($conn,$Sqlstrings);
		if($rsi && $rs && $rs2){
			mysqli_commit($conn);
			$send = array('type' => true);
			echo json_encode($send);
		}
		else{
			mysqli_rollback($conn);
			$send = array('type' => false);
			echo json_encode($send);
			echo $Sqlstrings;
		}
			
		}
	}else{
		$send = array('type' => false);
		echo json_encode($send);
	}

?>