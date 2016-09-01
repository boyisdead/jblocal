<?php
session_start();
if(isset($_SESSION['ssUsername'])){$username=$_SESSION['ssUsername'];}
else if(!isset($_SESSION['ssUsername'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='../index.php';</script>";exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php

$email=$_REQUEST['email'];
$cart=&$_SESSION['cart']; 




  //อัพเดทจำนวนและราคา

  //ลบ
unset($_SESSION['cart'][$email]);

//กลับไปที่ตะกร้าสิยค้า
//if($error==""){header("location:../ตะกร้าสินค้า.html");return;}

echo"<script>document.location=document.referrer;</script>";
?>
</body>
</html>