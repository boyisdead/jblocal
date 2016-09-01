<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
session_start();
if($_REQUEST['subject']==""||$_REQUEST['detail']==""){echo"<script>alert('ยังกรอกข้อมูลไม่ครบ');history.back();</script>";exit;}

if($_SESSION['captcha']['code'] != $_REQUEST['captcha']){echo"<script>alert('คุณใส่รหัสตัวอักษรไม่ถูกต้องกรุณากรอกใหม่');history.back();</script>";exit;}

$subject= mysql_escape_string($_REQUEST['subject']);
$detail = mysql_escape_string($_REQUEST['detail']);
$email=$_REQUEST['category_id'];
$username=$_REQUEST['id'];


include("../../server/connect.php");



$sql="INSERT INTO webboard_post(subject, detail, email, username, insert_date, last_update) VALUES('$subject', '$detail', '$email', '$username', now(), now())";
mysql_query($sql)or die(mysql_error());
$id=base64_encode(mysql_insert_id());
echo"<script>window.location='../../../Take_Over_Lease_Detail-$id';</script>";
?>
</body>
</html>