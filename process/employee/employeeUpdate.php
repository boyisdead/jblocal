<?php
session_start();
if(isset($_SESSION['ssUsername2'])){$username=$_SESSION['ssUsername2'];}
else if(!isset($_SESSION['ssUsername2'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/backProcess.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>
<body>
<?php
include('../../server/connect.php');

//รับค่า
$username=$_REQUEST['username'];
$id=base64_decode($_REQUEST['id']);
$password=$_REQUEST['password'];



$sql="UPDATE user SET username=\"$username\", password=\"$password\", last_update=now() WHERE id=$id";
mysql_query($sql)or die(mysql_error());


echo"<script>$error;history.back();</script>";



?>
</body>
</html>
