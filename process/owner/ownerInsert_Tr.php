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



 



$adid=$_REQUEST['adid'];
$jobid=$_REQUEST['jobid'];

if($_REQUEST['jobid']==0){echo"<script>alert('Please insert Job ID');history.back();</script>";exit;}

include("../../server/connect.php");



$sql="SELECT * FROM job_owner WHERE jobid=$jobid AND user_id=$id";
$result=mysql_query($sql)or die(mysql_error());
$num=mysql_num_rows($result);

if($num==0){




//ถ้าไม่แก้ไขรูปภาพ
if($_FILES['Job_Description']['name']==""){
  //อัพเดทข้อมูล 

  $sql="INSERT INTO job_owner(jobid, user_id, ad_id, insert_date, last_update) 
VALUES($jobid, $id, $adid, now(), now())";
mysql_query($sql)or die(mysql_error());

  $id=base64_encode($id);
  echo"<script>window.location='../../owner_Tracker.php?id=$id';</script>";exit;
}




//ถ้าแก้ไขรูปภาพ
if($_FILES['Job_Description']['name']!=""){

  $sql="INSERT INTO job_owner(jobid, user_id, ad_id, insert_date, last_update) 
VALUES($jobid, $id, $adid, now(), now())";
mysql_query($sql)or die(mysql_error());

$image=time().'-'.$_FILES['Job_Description']['name'];

$sql="UPDATE userDB2 SET file_cv='$image', update_cv=now() WHERE id=$id";
  mysql_query($sql)or die(mysql_error()); 


  $id=base64_encode($id);
  echo"<script>window.location='../../owner_Tracker.php?id=$id';</script>";exit;
}


}else{



echo"<script>alert('Job Duplicate for cadidate!');history.back();</script>";exit;




$id=base64_encode($id);
  echo"<script>window.location='../../owner_Tracker.php?id=$id';</script>";exit;

}

?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>