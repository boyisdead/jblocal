<?php
session_start();
include('../../server/connect.php');
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
//รับค่า



if($_REQUEST['id']==""){echo"<script>alert('Please insert title name');history.back();</script>";exit;}
$id=$_REQUEST['id'];





//เปลี่ยนชื่อภาพ

//เชื่อมต่อฐานข้อมูล
include("../../server/connect.php");


  $sqlDelete="SELECT * FROM candidate_profile WHERE oauth_uid='$id'";
  $resultDelete=mysql_query($sqlDelete)or die(mysql_error());
  $rowDelete=mysql_fetch_assoc($resultDelete);


  unlink("../../cv/".$rowDelete['cv']);

$image=time().'-'.$_FILES['cv']['name'];

if(move_uploaded_file($_FILES['cv']['tmp_name'],"../../cv/".$image)){

    $error="";
  }
  //ถ้าอัพโหลดไม่ได้
  else{
  $error="alert('เกิดการผิดพลาดในการอัพโหลดไฟล์ภาพ กรุณาทำการอัพโหลดใหม่');";   
  }


  $sql="UPDATE candidate_profile SET cv='$image',  update_date=now() WHERE oauth_uid='$id'";
  mysql_query($sql)or die(mysql_error());  



  echo"<script>window.location='../../../user-profile.php';</script>";exit;




?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>