<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php 
date_default_timezone_set('Asia/Bangkok');
//เช็คค่า
if(empty($_REQUEST['id'])){echo"<script>history.back();</script>";exit;}
$id=base64_decode($_REQUEST['id']);
//รับค่า

if(empty($_REQUEST['post_id'])){echo"<script>history.back();</script>";exit;}
$post_id=base64_decode($_REQUEST['post_id']);


$detail = mysql_escape_string($_REQUEST['detail']);


include("../../server/connect.php");

//อัพเดท
$sql="UPDATE webboard_reply SET detail='$detail', last_update=now() WHERE id=$id";
mysql_query($sql)or die(mysql_error());

$id_sent = $id;
$post_id = ($post_id);
echo"<script>$error;window.location='../../../Take_Over_Lease_Detail-$post_id#answer_$id_sent';</script>";
?>
</body>
</html>