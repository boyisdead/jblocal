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
if(isset($_SESSION['ssUsername'])){$username=$_SESSION['ssUsername'];}
else if(!isset($_SESSION['ssUsername'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}
require_once 'connect.php';
?>
<!-- InstanceBeginEditable name="EditRegion" -->
<?php 
//เช็คค่า
//รับค่า
$id=$_REQUEST['id'];

$member_id=$_REQUEST['member_id'];

$customer_id=$_REQUEST['customer_id'];

$action=$_REQUEST['action'];

$message_text=$_REQUEST['message-text'];
if($message_text==""){$message_text="ไม่ได้ระบุ";}


//อัพเดท


switch ($action) {
    case "insertpost":
if($_FILES['postimage']['name']==""){

$sql="INSERT INTO post(posttext, userpost, userpostto, insert_date, last_update) 
VALUES(\"$message_text\", $member_id, $customer_id, now(), now())";
mysql_query($sql)or die(mysql_error());

echo"<script>document.location=document.referrer;</script>";
}
if($_FILES['postimage']['name']!=""){

	$image=time().'-'.$_FILES['postimage']['name'];
  //อัพโหลดรูปภาพ
  if(move_uploaded_file($_FILES['postimage']['tmp_name'],"../pdf/".$image)){
    $error="";
  }
  //ถ้าอัพโหลดไม่ได้
  else{
  $error="alert('เกิดการผิดพลาดในการอัพโหลดไฟล์ภาพ กรุณาทำการอัพโหลดใหม่');";
  }

  $sql="INSERT INTO post(posttext, postimage, userpost, userpostto, insert_date, last_update) 
VALUES(\"$message_text\", '$image', $member_id, $customer_id, now(), now())";
mysql_query($sql)or die(mysql_error());
echo"<script>document.location=document.referrer;</script>";
}
break;
case "uppost":
       $sqlOption="UPDATE post SET posttext=\"$message_text\", last_update=now() WHERE id=$id";
       mysql_query($sqlOption)or die(mysql_error());
        break;
 case "delpost":

$sql1="SELECT * FROM post WHERE id=$id";
$result1=mysql_query($sql1)or die(mysql_error());
$row1=mysql_fetch_array($result1);
//ลบภาพสินค้าในโฟลเดอร์
unlink("../pdf/".$row1['postimage']);



      $sql="DELETE FROM post WHERE id=$id";
      $result=mysql_query($sql)or die(mysql_error());

        break;       
      default:
        echo"<script>document.location=document.referrer;</script>";
        }
echo"<script>document.location=document.referrer;</script>";
?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>