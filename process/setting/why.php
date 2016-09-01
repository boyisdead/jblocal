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
//รับค่า

$shop_name=$_REQUEST['shop_name'];
if($shop_name==""){$shop_name="ไม่ระบุ";}

$website_name=$_REQUEST['website_name'];
if($website_name==""){$website_name="ไม่ระบุ";}

$title=$_REQUEST['title'];
if($title==""){$title="ไม่ระบุ";}

$description=$_REQUEST['description'];
if($description==""){$description="ไม่ระบุ";}

$google_analytics = mysql_escape_string($_POST['google_analytics']);
if($google_analytics==""){$google_analytics="ไม่ระบุ";}

$author=$_REQUEST['author'];
if($author==""){$author="ไม่ระบุ";}

$email=$_REQUEST['email'];
if($email==""){$email="ไม่ระบุ";}

$tel=$_REQUEST['tel'];
if($tel==""){$tel="ไม่ระบุ";}

$contact_us = mysql_escape_string($_POST['contact_us']);
if($contact_us==""){$contact_us="ไม่ระบุ";}


$facebook_fanpage=$_REQUEST['facebook_fanpage'];
if($facebook_fanpage==""){$facebook_fanpage="ไม่ระบุ";}

$twitter=$_REQUEST['twitter'];
if($twitter==""){$twitter="ไม่ระบุ";}

$google=$_REQUEST['google'];
if($google==""){$google="ไม่ระบุ";}

$instagram=$_REQUEST['instagram'];
if($instagram==""){$instagram="ไม่ระบุ";}

$pinterest=$_REQUEST['pinterest'];
if($pinterest==""){$pinterest="ไม่ระบุ";}


$vimeo=$_REQUEST['vimeo'];
if($vimeo==""){$vimeo="ไม่ระบุ";}

$youtube=$_REQUEST['youtube'];
if($youtube==""){$youtube="ไม่ระบุ";}

$linkedin=$_REQUEST['linkedin'];
if($linkedin==""){$linkedin="ไม่ระบุ";}


//เชื่อต่อฐานข้อมูล
include("../../server/connect.php");
//อัพเดทข้อมูล
$sql="UPDATE setting SET shop_name='$shop_name', website_name='$website_name', title='$title', description='$description', google_analytics='$google_analytics', author='$author', email='$email', tel='$tel', contact_us='$contact_us', facebook_fanpage='$facebook_fanpage', twitter='$twitter', google='$google', instagram='$instagram', pinterest='$pinterest', vimeo='$vimeo', youtube='$youtube', linkedin='$linkedin',last_update=now() ";
mysql_query($sql)or die(mysql_error());


echo"<script>document.location=document.referrer;</script>";


?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>