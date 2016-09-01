<?php
session_start();
if(isset($_SESSION['ssUsername2'])){$username=$_SESSION['ssUsername2'];}
else if(!isset($_SESSION['ssUsername2'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}

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
include('../../server/connect.php');

//รับค่า
$category=$_REQUEST['category'];
$id=base64_decode($_REQUEST['id']);
$icon=$_REQUEST['icon'];

if($_FILES['image']['name']==""){




$sql="UPDATE job_level SET name=\"$category\", last_update=now() WHERE id=$id";
mysql_query($sql)or die(mysql_error());


echo"<script>$error;history.back();</script>";


}


if($_FILES['image']['name']!=""){

$image=time().'-'.$_FILES['image']['name'];
//ค่าซ้ำ






	  $sqlDelete="SELECT * FROM job_level WHERE id=$id";
  $resultDelete=mysql_query($sqlDelete)or die(mysql_error());
  $rowDelete=mysql_fetch_array($resultDelete);
  unlink("../../cusimage/".$rowDelete['image']);

$sql="UPDATE job_level SET name=\"$category\", image='$image', last_update=now() WHERE id=$id";
mysql_query($sql)or die(mysql_error());

if(move_uploaded_file($_FILES['image']['tmp_name'],"../../cusimage/".$image)){
  $error="";
}
echo"<script>$error;history.back();</script>";
    
}


?>
</body>
</html>
