<?php
//	此模块为自动识别查询模块只需给出表名及查询条件作为传递参数
//	表名前面+ Qry_为查询视图名，这样可以在视图中选定该查询界面
//	对应的字段以避免多余字段的传输。
	// $Tab_Name = "order_purchase_requ";
	// $Cont = " where BILL_NO = 'QUE20200514002'";

	header("Content-type: text/html; charset=utf-8");
	include 'Conn.php';
	date_default_timezone_set('PRC');
	
	// if($_POST['Tab_Name']){
	// 	@$Tab_Name = $_POST['Tab_Name'];
	// 	@$Cont =iconv("GBK","UTF-8",$_POST['Cont']);
	// 	// @$Cont =$_POST['Cont'];
	// }
	if($_GET['Tab_Name']){
		@$Tab_Name = $_GET['Tab_Name'];
		// @$Cont =iconv("GBK","UTF-8",$_GET['Cont']);
		@$Cont =$_GET['Cont'];
	}
	// echo "Cont:".$Cont."</br>";
	$Sqicomm="select column_name from information_schema.columns where table_name='".$Tab_Name."'";
	$row = mysqli_query($conn,$Sqicomm);
	$rowj = mysqli_fetch_array($row,MYSQLI_ASSOC);
	// echo $rowj['column_name'];
	
	//分页处理
	if($_GET['limit']){
		$limit = $_GET['limit'];
		$page = ($_GET['page']-1) * $limit;
		$Cont .= " order by ".$rowj['column_name']." limit {$page},{$limit}";
	}
	// $Tab_Name = "easypai_login";
	// $Cont="";
	// $Cont = urlencode("%2520where%2520name%2520like%2520%27%2525%25E9%25B2%259C%25E6%259E%25A3%2525%27");
	// $Cont = iconv("GBK","UTF-8","%2520where%2520name%2520like%2520%27%2525%25E9%25B2%259C%25E6%259E%25A3%2525%27");
	// echo urldecode($Tab_Name);
	// echo urldecode($Cont);

	// $Tab_Name = 'qry_'.$Tab_Name;
	$Sqicomm="Select * FROM ".$Tab_Name.$Cont;
	// echo $Sqicomm;
	$rsi = mysqli_query($conn,$Sqicomm);
	// if (!$rsi) {	
	//     printf("Error: %s\n", mysqli_error($conn));	
	//     exit();	
	// }

	$Sqicomm="select column_name from information_schema.columns where table_name='".$Tab_Name."'";
	
	$arr = array();
	$result = array();
	$i = 0;
	$j = 0;

	while($rowi = mysqli_fetch_array($rsi,MYSQLI_ASSOC)){
		$rsj = mysqli_query($conn,$Sqicomm);
		while($rowj = mysqli_fetch_array($rsj,MYSQLI_ASSOC)){	
			$arr[$rowj['column_name']]  = $rowi[$rowj['column_name']];
		}
		array_push($result, $arr);			
	}
		echo json_encode($result);
?>