<?php
session_start();
header('Content-type: text/plain; charset=utf-8');
if(isset($_SESSION['ssUsername2'])){$username=$_SESSION['ssUsername2'];}
else if(!isset($_SESSION['ssUsername2'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}




//รับค่า
include('../../server/connect.php');
$id=base64_decode($_REQUEST['id']);
//ลบ
$security=$_REQUEST['security'];

if($security == "0811007753"){

	$sql="DELETE FROM user WHERE id=$id";
mysql_query($sql)or die(mysql_error());

$newURL="http://www.jbmonster.com/admin/employee.php";

header('Location: '.$newURL);
}else{


$newURL="http://www.jbmonster.com/admin/employee.php";

header('Location: '.$newURL);

}



?>
