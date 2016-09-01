<?php
session_start();
?>

<?php
//เช็คล็อกอิน
if(isset($_SESSION['ssUsername2'])){$username=$_SESSION['ssUsername2'];}
		else if(!isset($_SESSION['ssUsername2'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}
?>

<?php 
//เช็คค่า
if($_REQUEST['username']==''||$_REQUEST['password']==''||$_REQUEST['confirm']==''){
  echo"<script> alert('ยังกรอกข้อมูลไม่ครบ');history.back();</script>";exit(); 
}
//รับค่า
$username=$_REQUEST['username'];
$password=$_REQUEST['password'];
$confirm=$_REQUEST['confirm'];
//เชื่อมต่อฐานข้อมูล 
include('../../server/connect.php');
//เช็คชื่อผู้ใช้
$sql="SELECT * FROM user WHERE username='$username'";
$result=mysql_query($sql)or die(mysql_error());
$num=mysql_num_rows($result);
if($num!=0){
	//echo"<script>alert('ชื่อผู้ใช้ซ้ำ');history.back();</script>";exit();
	$arrf = array('status' =>1003, "msg" => "Invalid Email address or Password");
	echo  json_encode($arrf);
}
//เช็ครหัสผ่าน
else if(($password!=$confirm)){
	$arrf = array('status' =>1002, "msg" => "Invalid Email address or Password");
	echo  json_encode($arrf);

} else if(preg_match('/[^A-Za-z0-9]/', $username)){

	$arrf = array('status' =>1004, "msg" => "Invalid Email address or Password");
	echo  json_encode($arrf);

}

else {

	$sql="INSERT INTO user(username, password, insert_date, last_update) VALUES('$username', '$password', now(), now())";
mysql_query($sql)or die(mysql_error());	

$arrf = array('status' =>1001, "msg" => "Invalid Email address or Password");
	echo  json_encode($arrf);

}
//เพิ่มข้อมูล	  
/* $sql="INSERT INTO user(username, password, insert_date, last_update) VALUES('$username', '$password', now(), now())";
mysql_query($sql)or die(mysql_error());	
echo"<script>document.location=document.referrer;</script>";
*/
?>
