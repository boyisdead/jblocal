<?php
session_start();
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
//เช็คล็อกอิน
if(isset($_SESSION['ssUsername2'])){$username=$_SESSION['ssUsername2'];}
else if(!isset($_SESSION['ssUsername2'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}
?>
<!-- InstanceBeginEditable name="EditRegion" -->
<?php 
//เช็คค่า
//รับค่า
$id=$_REQUEST['id'];
$message_text=$_REQUEST['message-text'];


//เชื่อมต่อฐานข้อมูล
require_once 'connect.php';
//อัพเดท

if($_FILES['postimage']['name']==""){

$sql="INSERT INTO post(posttext, userpost, userpostto, insert_date, last_update) 
VALUES(\"$message_text\", \"$id\", \"$id\", now(), now())";
mysql_query($sql)or die(mysql_error());

echo"<script>window.location='../index.php';</script>";
}
if($_FILES['postimage']['name']!=""){

	$image=time().'-'.$_FILES['postimage']['name'];
  //อัพโหลดรูปภาพ
  if(move_uploaded_file($_FILES['postimage']['tmp_name'],"../images/".$image)){
    $error="";
  }
  //ถ้าอัพโหลดไม่ได้
  else{
  $error="alert('เกิดการผิดพลาดในการอัพโหลดไฟล์ภาพ กรุณาทำการอัพโหลดใหม่');";
  }

  $sql="INSERT INTO post(posttext, postimage, userpost, userpostto, insert_date, last_update) 
VALUES(\"$message_text\", '$image', \"$id\", \"$id\", now(), now())";
mysql_query($sql)or die(mysql_error());

echo"<script>window.location='../index.php';</script>";



}


?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>