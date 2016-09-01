<?php
session_start();
if(isset($_SESSION['ssUsername2'])){$username=$_SESSION['ssUsername2'];}
else if(!isset($_SESSION['ssUsername2'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/backProcess.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>
<body>

<?php

	function debug_to_console( $data ) {

	    if ( is_array( $data ) )
	        $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
	    else
	        $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

	    echo $output;
	}

	if($_REQUEST['name']==""){echo"<script>alert('Candidate name is required');history.back();</script>";exit;}
	if($_REQUEST['email']==""){echo"<script>alert('Candidate email is required');history.back();</script>";exit;}

	include('../../server/connect.php');
	$id=$_REQUEST['id'];

	$name=$_REQUEST['name'];
	if($name==""){$name="-";}
	$email=$_REQUEST['email'];
	if($email==""){$email="-";}
	$tel=$_REQUEST['tel'];
	if($tel==""){$tel="-";}
	$location=$_REQUEST['location'];
	if($location==""){$location="-";}
	$position=$_REQUEST['position'];
	if($position==""){$position="-";}
	$country_user=$_REQUEST['country_user'];
	if($country_user==""){$country_user="-";}


	$sql="UPDATE refer_cv SET name=\"$name\",email=\"$email\",tel=\"$tel\",location=\"$location\",position=\"$position\",country_user=\"$country_user\" WHERE id=$id";

	debug_to_console($sql);
	mysql_query($sql)or die(mysql_error());


	echo"<script>$error;history.back();</script>";

?>
</body>
</html>