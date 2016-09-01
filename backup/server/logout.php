<?php
session_start();
ob_start();
setcookie('username11014','1',time()-3600, '/');
setcookie('password11014','1',time()-3600, '/');
setcookie('username','1',time()-3600, '/');



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

   



  


unset($_SESSION['ssUsername']);
unset($_SESSION['ssFirst_Name']);
unset($_SESSION['ssPosition']);
echo"<script>window.location='../index.php';</script>";



ob_end_flush();
?>

</body>
</html>