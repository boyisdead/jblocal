<?php
session_start();

include('connect.php'); 

if(isset($_SESSION['ssUsername'])){$username=$_SESSION['ssUsername'];}
else if(!isset($_SESSION['ssUsername'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='../index.php';</script>";exit;}
//รับค่า
$userid=$_REQUEST['userid'];
$email=$_REQUEST['email'];
$jobid=$_REQUEST['jobid'];

$name=$_REQUEST['name'];
$phone=$_REQUEST['phone'];
//เช็คค่า       
if($email=="" || $userid=="" || $jobid==""){
	$arrf = array('status' =>1002, "msg" => "!You can not input friend email.");
	echo  json_encode($arrf);
}
if($email!="" || $userid!="" || $jobid!=""){



$sqlch="SELECT * FROM refer_email WHERE job_id=$jobid AND refer_email='$email'";
$resultch=mysql_query($sqlch)or die(mysql_error());
$num=mysql_num_rows($resultch);
if($num!=0){
	$arrf = array('status' =>1003, "msg" => "Your Email duplicate in stock.");
	echo  json_encode($arrf);
}





if($num==0){	

if(!isset($_SESSION['cart'])){$_SESSION['cart']=array();}

$_SESSION['cart'][$email]=array('jobid'=>$jobid, 'email'=>$email, 'userid'=>$userid, 'name'=>$name, 'phone'=>$phone);
$arrf = array('status' =>1001, "msg" => "Add email your friend succes.");
echo  json_encode($arrf);


}


}

?>
