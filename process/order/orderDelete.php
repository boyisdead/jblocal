<?
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
<?
//เช็คล็อกอิน
if(isset($_SESSION['username'])){$username=$_SESSION['username'];}
else if(!isset($_SESSION['username'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='../../../admin/index.php';</script>";exit;}
?>
<!-- InstanceBeginEditable name="EditRegion" -->
<?
//เช็คค่า
if($_REQUEST['id']==""){echo"<script>winndow.location='../../order.php';</script>";}
//รับค่า
$id=base64_decode($_REQUEST['id']);
$status=$_REQUEST['status'];
$keyword=$_REQUEST['keyword'];
$page=$_REQUEST['page'];
//เชื่อต่อฐานข้อมูล
include('../../../process/connect.php');
//ลบคำสั่งซื้อ
$sqlDeleteOrder="DELETE FROM `order` WHERE id=$id";
mysql_query($sqlDeleteOrder)or die(mysql_error());
//ลบรายละเอียดคำสั่งซื้อ
$sqlDeleteOrderDetail="DELETE FROM order_detail WHERE order_id=$id";
mysql_query($sqlDeleteOrderDetail)or die(mysql_error());
echo"<script>document.location=document.referrer;</script>";
?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>