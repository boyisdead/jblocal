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
<?php
//เช็คล็อกอิน
if(isset($_SESSION['ssUsername2'])){$username=$_SESSION['ssUsername2'];}
    else if(!isset($_SESSION['ssUsername2'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}
?>
<!-- InstanceBeginEditable name="EditRegion" -->
<?php

$id=base64_decode($_REQUEST['id']);



//รับค่า
if($_REQUEST['First_Name']==""){echo"<script>alert('Please insert title First_Name');history.back();</script>";exit;}

if($_REQUEST['Email']==""){echo"<script>alert('Please select Email');history.back();</script>";exit;}

if($_REQUEST['Owner']==""){echo"<script>alert('Data Error');history.back();</script>";exit;}

$Owner=$_REQUEST['Owner'];

$sql="SELECT * FROM userDB2 WHERE id=$id AND owner1 = $Owner";
$result=mysql_query($sql)or die(mysql_error());
$num=mysql_num_rows($result);
if($num!=0){


 



$First_Name=$_REQUEST['First_Name'];

$Last_Name=$_REQUEST['Last_Name'];
if($Last_Name==""){$Last_Name="-";}

$Email=$_REQUEST['Email'];



$Phone=$_REQUEST['Phone'];
if($Phone==""){$Phone="-";}


$Company=$_REQUEST['Company'];
if($Company==""){$Company="-";}



$Title= mysql_escape_string($_REQUEST['Title']);
if($Title==""){$Title="-";}

$Country=$_REQUEST['Country'];
if($Country==""){$Country="-";}





$Age=$_REQUEST['Age'];
if($Age==""){$Age="0";}


$Industry= mysql_escape_string($_REQUEST['Industry']);
if($Industry==""){$Industry="-";}


$Class_1=$_REQUEST['Class_1'];
if($Class_1==""){$Class_1="-";}

$Class_2=$_REQUEST['Class_2'];
if($Class_2==""){$Class_2="-";}

$Class_3=$_REQUEST['Class_3'];
if($Class_3==""){$Class_3="-";}

$Class_3=$_REQUEST['Class_3'];
if($Class_3==""){$Class_3="-";}
//เปลี่ยนชื่อภาพ


$Yrs_Exp=$_REQUEST['Yrs_Exp'];
if($Yrs_Exp==""){$Yrs_Exp="0";}


$Salary=$_REQUEST['Salary'];
if($Salary==""){$Salary="0";}


$Language=$_REQUEST['Language'];
if($Language==""){$Language="-";}

//เปลี่ยนชื่อภาพ

//เชื่อมต่อฐานข้อมูล
include("../../server/connect.php");






//ถ้าไม่แก้ไขรูปภาพ
if($_FILES['Job_Description']['name']==""){
  //อัพเดทข้อมูล 

  $sql="UPDATE userDB2 SET First_Name=\"$First_Name\", Last_Name=\"$Last_Name\", Email=\"$Email\", Company=\"$Company\",
  Title=\"$Title\", Phone=\"$Phone\", Age=\"$Age\", Industry=\"$Industry\", Country=\"$Country\", Class_1=\"$Class_1\",
  Class_2=\"$Class_2\", Class_3=\"$Class_3\", Yrs_Exp=\"$Yrs_Exp\", Salary=\"$Salary\", Language=\"$Language\", last_update=now() WHERE id=$id";
  mysql_query($sql)or die(mysql_error());  



  $id=base64_encode($id);
  echo"<script>window.location='../../owner_profile.php?id=$id';</script>";exit;
}




//ถ้าแก้ไขรูปภาพ
if($_FILES['Job_Description']['name']!=""){
  //ลบภาพเก่า
  $sqlDelete="SELECT * FROM userDB2 WHERE id=$id";
  $resultDelete=mysql_query($sqlDelete)or die(mysql_error());
  $rowDelete=mysql_fetch_assoc($resultDelete);
  unlink("../../pdf/".$rowDelete['file_cv']);
  //เปลี่ยนชื่อภาพ
  $image=time().'-'.$_FILES['Job_Description']['name'];
  //อัพโหลดรูปภาพ

  if(move_uploaded_file($_FILES['Job_Description']['tmp_name'],"../../pdf/".$image)){

    $error="";
  }
  //ถ้าอัพโหลดไม่ได้
  else{
  $error="alert('เกิดการผิดพลาดในการอัพโหลดไฟล์ภาพ กรุณาทำการอัพโหลดใหม่');";
  }
  //อัพเดทตารางสินค้า
    $sql="UPDATE userDB2 SET First_Name=\"$First_Name\", Last_Name=\"$Last_Name\", Email=\"$Email\", Company=\"$Company\",
  Title=\"$Title\", Phone=\"$Phone\", Age=\"$Age\", Industry=\"$Industry\", Country=\"$Country\", Class_1=\"$Class_1\",
  Class_2=\"$Class_2\", Class_3=\"$Class_3\", Yrs_Exp=\"$Yrs_Exp\", Salary=\"$Salary\", Language=\"$Language\", file_cv='$image', update_cv=now(), last_update=now() WHERE id=$id";
  mysql_query($sql)or die(mysql_error());  


  $id=base64_encode($id);
  echo"<script>window.location='../../owner_profile.php?id=$id';</script>";exit;
}




 }else{



$id=base64_encode($id);
  echo"<script>window.location='../../owner_profile.php?id=$id';</script>";exit;

  }



$id=base64_encode($id);
  echo"<script>window.location='../../owner_profile.php?id=$id';</script>";exit;
?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>