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

<!-- InstanceBeginEditable name="EditRegion" -->
<?php
// รับค่า
if($_REQUEST['name']==""){echo"<script>alert('Please insert you name');history.back();</script>";exit;}

if($_FILES['file']['name']=="" && $_REQUEST['dropbox']==""){echo"<script>alert('Please select file or dropbox file');history.back();</script>";exit;}

$name=$_REQUEST['name'];
$user_id=$_REQUEST['user_id'];

$dropbox=$_REQUEST['dropbox'];


$Seniority=$_REQUEST['country'];
if($Seniority==""){$Seniority="-";}


$email=$_REQUEST['email'];
if($email==""){$email="-";}

$tel=$_REQUEST['tel'];
if($tel==""){$tel="-";}

$position=$_REQUEST['position'];
if($position==""){$position="-";}









//เปลี่ยนชื่อภาพ


include("../../server/connect.php");


if(!empty($_FILES['file']['name']) && !empty($dropbox)){

$image=time().'-'.$_FILES['file']['name'];
//เพิ่มข้อมูลสินค้า
$sql="INSERT INTO rockstar_upload(name, userid, seniority, function, email, tel, file, dropbox, insert_date) 
VALUES(\"$name\", $user_id, '$Seniority', '$position', '$email', '$tel', '$image', '$dropbox', now() )";
mysql_query($sql)or die(mysql_error());
//คืนค่าไอดี
$product_id=mysql_insert_id();
//เพิ่มภาพหลัก



if(move_uploaded_file($_FILES['file']['tmp_name'],"../../upload/".$image)){
  $error="";
}
//ถ้าอัพโหลดไม่ได้
else {
  $error="alert('เกิดการผิดพลาดในการอัพโหลดไฟล์ภาพ กรุณาทำการอัพโหลดใหม่')";
  echo"<script>$error;window.location='../../../bad.html';</script>";
}

//กลับ
$id=base64_encode($product_id);
echo"<script>$error;window.location='../../../success.html';</script>";
}













if(!empty($_FILES['file']['name']) && empty($dropbox)){

$image=time().'-'.$_FILES['file']['name'];
//เพิ่มข้อมูลสินค้า
$sql="INSERT INTO rockstar_upload(name, userid, seniority, function, email, tel, file, insert_date) 
VALUES(\"$name\", $user_id, '$Seniority', '$position', '$email', '$tel', '$image', now() )";
mysql_query($sql)or die(mysql_error());
//คืนค่าไอดี
$product_id=mysql_insert_id();
//เพิ่มภาพหลัก



if(move_uploaded_file($_FILES['file']['tmp_name'],"../../upload/".$image)){
  $error="";
}
//ถ้าอัพโหลดไม่ได้
else {
  $error="alert('เกิดการผิดพลาดในการอัพโหลดไฟล์ภาพ กรุณาทำการอัพโหลดใหม่')";
  echo"<script>$error;window.location='../../../bad.html';</script>";
}

//กลับ
$id=base64_encode($product_id);
echo"<script>$error;window.location='../../../success.html';</script>";
}








if(empty($_FILES['file']['name']) && !empty($dropbox)){

$image=time().'-'.$_FILES['file']['name'];
//เพิ่มข้อมูลสินค้า
$sql="INSERT INTO rockstar_upload(name, userid, seniority, function, email, tel, dropbox, insert_date) 
VALUES(\"$name\", $user_id, '$Seniority', '$position', '$email', '$tel', '$dropbox', now() )";
mysql_query($sql)or die(mysql_error());
//คืนค่าไอดี
$product_id=mysql_insert_id();
//เพิ่มภาพหลัก


//กลับ
$id=base64_encode($product_id);
echo"<script>$error;window.location='../../../success.html';</script>";
}














?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>