<?php
session_start();
ob_start();

$id=$_REQUEST['id'];
setcookie('username11014','1',time()-3600, '/');
setcookie('password11014','1',time()-3600, '/');
setcookie('username','1',time()-3600, '/');
setcookie('strID','6',time()-3600*100, '/');

setcookie('strID', null, -1, '/');

setcookie("strID", "", time()-3600);

setcookie("strID",$id,time()-3600*12); // Expire 1 Hour

unset($_COOKIE['strID']);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
$username_id=$_REQUEST['id'];



include('../server/connect.php');

   



  


unset($_SESSION['ssUsername2']);
unset($_SESSION['ssFirst_Name']);
unset($_SESSION['ssPosition']);
echo"<script>window.location='../';</script>";



ob_end_flush();
?>

</body>
</html>