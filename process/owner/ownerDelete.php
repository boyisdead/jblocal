<?php
session_start();
header('Content-type: text/plain; charset=utf-8');
if(isset($_SESSION['ssUsername2'])){$username=$_SESSION['ssUsername2'];}
else if(!isset($_SESSION['ssUsername2'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}




//รับค่า
include('../../server/connect.php');


if($_REQUEST['id']==""){

$newURL="http://www.jbmonster.com/admin/owner.php";
header('Location: '.$newURL);

}


if($_REQUEST['owner']==""){

$newURL="http://www.jbmonster.com/admin/owner.php";
header('Location: '.$newURL);

}

$id=base64_decode($_REQUEST['id']);
$Owner=$_REQUEST['owner'];

$sql="SELECT * FROM userDB2 WHERE id=$id AND owner1 = $Owner";
$result=mysql_query($sql)or die(mysql_error());
$num=mysql_num_rows($result);
if($num!=0){


//ลบ
//หาภาพหลัก
$sql="SELECT * FROM userDB2 WHERE id=$id AND owner1 = $Owner";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_assoc($result);
//ลบภาพสินค้าในโฟลเดอร์

unlink("../../pdf/".$row['file_cv']);


//ลบข้อมูลสินค้า
$sql="DELETE FROM userDB2 WHERE id=$id AND owner1 = $Owner";
mysql_query($sql)or die(mysql_error());
//หาภาพประกอบ
}else{

$newURL="http://www.jbmonster.com/admin/owner.php";
header('Location: '.$newURL);

}


$newURL="http://www.jbmonster.com/admin/owner.php";
header('Location: '.$newURL);
?>
