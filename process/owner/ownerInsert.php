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
if(isset($_SESSION['ssUsername2'])){$username=$_SESSION['ssUsername2'];}
    else if(!isset($_SESSION['ssUsername2'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}
?>
<!-- InstanceBeginEditable name="EditRegion" -->
<?php
// รับค่า
if($_REQUEST['First_Name']==""){echo"<script>alert('Please insert title First_Name');history.back();</script>";exit;}

if($_REQUEST['Email']==""){echo"<script>alert('Please select Email');history.back();</script>";exit;}

if($_REQUEST['Owner']==""){echo"<script>alert('Data Error');history.back();</script>";exit;}

$First_Name=$_REQUEST['First_Name'];

$Last_Name=$_REQUEST['Last_Name'];
if($Last_Name==""){$Last_Name="-";}

$Email=$_REQUEST['Email'];



$Phone=$_REQUEST['Phone'];
if($Phone==""){$Phone="-";}


$Company=$_REQUEST['Company'];
if($Company==""){$Company="-";}



$Title= mysql_escape_string($_REQUEST['Title']);
if($Title==""){$Title="-";}

$Country=$_REQUEST['Country'];
if($Country==""){$Country="-";}


$Owner=$_REQUEST['Owner'];


$Age=$_REQUEST['Age'];
if($Age==""){$Age="0";}


$Industry= mysql_escape_string($_REQUEST['Industry']);
if($Industry==""){$Industry="-";}


$Class_1=$_REQUEST['Class_1'];
if($Class_1==""){$Class_1="-";}

$Class_2=$_REQUEST['Class_2'];
if($Class_2==""){$Class_2="-";}

$Class_3=$_REQUEST['Class_3'];
if($Class_3==""){$Class_3="-";}

$Class_3=$_REQUEST['Class_3'];
if($Class_3==""){$Class_3="-";}
//เปลี่ยนชื่อภาพ


$Yrs_Exp=$_REQUEST['Yrs_Exp'];
if($Yrs_Exp==""){$Yrs_Exp="0";}


$Salary=$_REQUEST['Salary'];
if($Salary==""){$Salary="0";}


$Language=$_REQUEST['Language'];
if($Language==""){$Language="-";}


include("../../server/connect.php");


if($_FILES['Job_Description']['name']!=""){

$image=time().'-'.$_FILES['Job_Description']['name'];
//เพิ่มข้อมูลสินค้า
$sql="INSERT INTO userDB2(First_Name, Last_Name,  Email, Company, Title, owner1, Phone, Age, Industry, Country, Class_1, Class_2, Class_3, Yrs_Exp, Salary, Language, file_cv, update_cv, insert_date, last_update) 
VALUES(\"$First_Name\",  \"$Last_Name\", \"$Email\", \"$Company\", \"$Title\", '$Owner', '$Phone', '$Age', '$Industry', '$Country', '$Class_1', '$Class_2', '$Class_3', '$Yrs_Exp', '$Salary', '$Language', '$image', now(), now(), now())";
mysql_query($sql)or die(mysql_error());
//คืนค่าไอดี
$product_id=mysql_insert_id();
//เพิ่มภาพหลัก



if(move_uploaded_file($_FILES['Job_Description']['tmp_name'],"../../pdf/".$image)){
  $error="";
}
//ถ้าอัพโหลดไม่ได้
else {
  $error="alert('เกิดการผิดพลาดในการอัพโหลดไฟล์ภาพ กรุณาทำการอัพโหลดใหม่')";
}

//กลับ
$id=base64_encode($product_id);
echo"<script>$error;window.location='../../owner_profile.php?id=$id';</script>";
}




if($_FILES['Job_Description']['name']==""){


$sql="INSERT INTO userDB2(First_Name, Last_Name,  Email, Company, Title, owner1, Phone, Age, Industry, Country, Class_1, Class_2, Class_3, Yrs_Exp, Salary, Language, update_cv, insert_date, last_update) 
VALUES(\"$First_Name\",  \"$Last_Name\", \"$Email\", \"$Company\", \"$Title\", '$Owner', '$Phone', '$Age', '$Industry', '$Country', '$Class_1', '$Class_2', '$Class_3', '$Yrs_Exp', '$Salary', '$Language', '0000-00-00', now(), now())";
mysql_query($sql)or die(mysql_error());
//คืนค่าไอดี
$product_id=mysql_insert_id();


//กลับ
$id=base64_encode($product_id);
echo"<script>$error;window.location='../../owner_profile.php?id=$id';</script>";
}




?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>