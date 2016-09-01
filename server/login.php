<?php 
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
//เช็คค่า
if($_REQUEST['Mail']==NULL || $_REQUEST['password']==NULL){echo"<script>alert('ยังไม่กรอกชื่อผู้ใช้หรือรหัสผ่าน');history.back();</script>";exit();}
//รับค่า
$Mail=$_REQUEST['Mail'];
$password=$_REQUEST['password'];
$action=$_REQUEST['action'];
include('connect.php');
//ตรวจสอบชื่อผู้ใช้และรหัสผ่าน
$sqlLogin="SELECT * FROM tb_facebook WHERE Mail='$Mail'";
$resultLogin=mysql_query($sqlLogin)or die(mysql_error());
$rowLogin=mysql_fetch_array($resultLogin);
$username_id=$rowLogin['id'];
if(!$rowLogin){
  echo"<script>alert('Email already exists!');history.back();</script>";exit();
}
else if($rowLogin['password']!= $password){
  echo"<script>alert('Password not equal');history.back();</script>";exit();
}
//เซสชัน
$_SESSION['ssUsername']=$rowLogin['NAME'];
if($action != NULL){	
echo"<script>window.location='../../Add_Your_Properties';</script>";
} else {
	echo"<script>history.back();</script>";exit();
}
?>
</body>
</html>