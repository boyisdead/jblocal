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
//รับค่า
$id=$_REQUEST['id'];

if($_REQUEST['subject']==""){echo"<script>alert('Please insert title name');history.back();</script>";exit;}

if($_REQUEST['detail']==""){echo"<script>alert('Please select Department');history.back();</script>";exit;}




$subject=$_REQUEST['subject'];




$detail = mysql_escape_string($_REQUEST['detail']);
if($detail==""){$detail="-";}



$jobid=array(); 
$jobid=$_REQUEST['jobid'];
//เปลี่ยนชื่อภาพ

//เชื่อมต่อฐานข้อมูล
include("../../server/connect.php");







  $sql="UPDATE compose SET subject=\"$subject\", detail=\"$detail\", last_update=now() WHERE id=$id";
  mysql_query($sql)or die(mysql_error());  

for($i=0;$i<count($jobid);$i++){
  if($jobid[$i]!=""){
  
  $product_image=$jobid[$i];
    
      $sqlImage="INSERT INTO job_compose(compose_id, job_id, insert_date) VALUES($id, $product_image, now())";
      mysql_query($sqlImage)or die(mysql_error());
 
  }
}


  echo"<script>window.location='../../edit_compose.php?id=$id';</script>";exit;






 
?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>