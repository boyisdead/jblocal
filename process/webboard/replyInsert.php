<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
if($_REQUEST['id']==""){echo"<script>history.back();</script>";exit;}
$id=base64_decode($_REQUEST['id']);
$detail = mysql_escape_string($_REQUEST['detail']);
$user_id=$_REQUEST['user_id'];



include("../../server/connect.php");




$sql="INSERT INTO webboard_reply(post_id, detail, user_id, insert_date, last_update) VALUES($id, '$detail', '$user_id', now(), now())";
mysql_query($sql)or die(mysql_error());
$reply_id=mysql_insert_id();
$id_sent = base64_encode($id);

echo"<script>$error;window.location='../../../Take_Over_Lease_Detail-$id_sent#answer_$reply_id';</script>";
?>
</body>
</html>