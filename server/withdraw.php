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
if(isset($_SESSION['ssUsername'])){$username=$_SESSION['ssUsername'];}
    else if(!isset($_SESSION['ssUsername'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='../../../index.php';</script>";exit;}
?>
<!-- InstanceBeginEditable name="EditRegion" -->
<?php
// รับค่า
if($_REQUEST['name']==""){echo"<script>alert('Please insert title name');history.back();</script>";exit;}

if($_REQUEST['b_account']==""){echo"<script>alert('Please select Bank ACT');history.back();</script>";exit;}

if($_REQUEST['b_name']==""){echo"<script>alert('Please select Bank Name');history.back();</script>";exit;}

if($_REQUEST['step']==""){echo"<script>alert('Data Error');history.back();</script>";exit;}

$id=base64_decode($_REQUEST['id']);
$userid=base64_decode($_REQUEST['userid']);



$step=base64_decode($_REQUEST['step']);

$name=$_REQUEST['name'];

$b_account=$_REQUEST['b_account'];

$b_name=$_REQUEST['b_name'];



//เปลี่ยนชื่อภาพ


include("connect.php");






if($id!=NULL AND $userid !=NULL){


$sqlj="SELECT * FROM refer_email WHERE user_id='$userid' AND id = $id";
$resultj=mysql_query($sqlj)or die(mysql_error());
$num=mysql_num_rows($resultj);
$rowj=mysql_fetch_assoc($resultj);
	if($num = 1){
	


				$sqlc="SELECT * FROM job_post WHERE id = $rowj[job_id]";
				$resultc=mysql_query($sqlc)or die(mysql_error());
				$rowc=mysql_fetch_assoc($resultc);

				if($step == 1){

				$amount=(($rowc['refer_bonus']*10)/100);	


				//เพิ่มข้อมูลสินค้า
				$sql="INSERT INTO withdraw(name, bank_act, 	bank_name, 	user_id, refer_id, amount, status, type, total, insert_date) 
				VALUES(\"$name\", '$b_account', '$b_name', '$userid', $id, $amount, 'Waiting', 'Withdrawal', $step, now())";
				mysql_query($sql)or die(mysql_error());
				//คืนค่าไอดี
				$product_id=mysql_insert_id();
				//เพิ่มภาพหลัก



				



				echo"<script>$error;window.location='../../withdraw.php';</script>";




				} else {

					$amount=(($rowc['refer_bonus']*90)/100);


				//เพิ่มข้อมูลสินค้า
				$sql="INSERT INTO withdraw(name, bank_act, 	bank_name, 	user_id, refer_id, amount, status, type, total, insert_date) 
				VALUES(\"$name\", '$b_account', '$b_name', '$userid', $id, $amount, 'Waiting', 'Withdrawal', $step, now())";
				mysql_query($sql)or die(mysql_error());
				//คืนค่าไอดี
				$product_id=mysql_insert_id();
				//เพิ่มภาพหลัก



				$sql="UPDATE refer_email SET status='Withdrawal', last_update=now() WHERE id=$id";
				mysql_query($sql)or die(mysql_error());



				echo"<script>$error;window.location='../../withdraw.php';</script>";





				}


	} else {

		echo"<script>alert('Data did not match');history.back();</script>";

	}




} else {

	echo"<script>alert('Data Error for userid or referid');history.back();</script>";
}




?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>