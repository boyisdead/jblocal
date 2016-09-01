<?php
session_start();
header('Content-type: text/plain; charset=utf-8');
if(isset($_SESSION['ssUsername2'])){$username=$_SESSION['ssUsername2'];}
else if(!isset($_SESSION['ssUsername2'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}




//รับค่า
include('../../server/connect.php');
$id=base64_decode($_REQUEST['id']);
//ลบ
//หาภาพหลัก
$sql="SELECT * FROM product WHERE id=$id";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_assoc($result);
//ลบภาพสินค้าในโฟลเดอร์

unlink("../../cusimage/".$row['image']);
unlink("../../cusimage/".$row['status']);

//ลบข้อมูลสินค้า
$sql="DELETE FROM product WHERE id=$id";
mysql_query($sql)or die(mysql_error());
//หาภาพประกอบ
$sql="SELECT * FROM product_image WHERE product_id=$id";
$result=mysql_query($sql)or die(mysql_error());
$num=mysql_num_rows($result);
for($i=1;$i<=$num;$i++){
  $row=mysql_fetch_assoc($result);
  $image=$row['image'];
  //ลบในโฟลเดอร์
  unlink("../../cusimage/".$image);
  //ลบในฐานข้อมูล
  mysql_query("DELETE FROM product_image WHERE image='$image'")or die(mysql_error());
}

	$arrf = array('status' =>1051, "msg" => "ท่านได้ทำการลบร้านค้านี้แล้ว");
	echo  json_encode($arrf);
?>
