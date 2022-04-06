<?php
	header("Content-type: text/html; charset=utf-8");
	include 'Conn.php';
	
	
	$atr =$_POST['Data'];
	$Tab_Name = $_POST['Tab_Name'];
	$ii  = $_POST['len'];
	$Cont  = $_POST['Cont'];
	
	///// 测试代码  //////
	// $atr = array(
	// 	"m1"=>"123",
	// 	"m2"=>"1231",
	// 	"m3"=>"123123"
	// );
	// $Tab_Name = "b_sbb";
	// $ii  = 3;
	// $Cont  = " where sbId = '1622745496589'";
	// print_r($atr);
	//////////////////////
	
	$a="update ".$Tab_Name." set ";
	
	$b=",";
	$c="";
	$QSqicomm="select column_name as Name,data_type,collation_name as collation from information_schema.columns where table_name = '$Tab_Name'";
	
	


	for($i=0;$i<$ii;$i++){
		$rsj = mysqli_query($conn,$QSqicomm);
		
		while($rowj = mysqli_fetch_array($rsj)){
			if(array_key_exists($rowj['Name'],$atr)){
				print_r($rowj['Name']);
				if($i==$ii-1){
				  	$c .=$rowj['Name']." = "."'".$atr[$rowj['Name']]."'";
				}else{
					$c .= $rowj['Name']." = "."'".$atr[$rowj['Name']]."'".$b;
					$ii--;
				}
			}
		}
	}
	
    $Sqlcomm = $a. substr($c,0,strlen($c)) .$Cont;

	$rs = mysqli_query($conn,$Sqlcomm);
	if($rs){
		$send = array('type' => true);
		echo json_encode($send);
	}
	else{
		$send = array('type' => false);
		echo json_encode($send);
		echo $Sqlcomm;
	}
?>