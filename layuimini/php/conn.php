<?php
header("Content-type: text/html; charset=utf-8");
$conn = @mysqli_connect("localhost","root","123456") or die('数据库连接失败！请确认用户名或密码输入是否正确。');//连接数据库   
mysqli_select_db($conn,"yanxue");//选择数据库   
// mysqli_query($conn,"set names GBK",);
mysqli_set_charset($conn,'utf8');

// if($conn){
// 	echo "连接成功";
//  }else{
// 	echo "连接失败";
//  }
 
 ?>