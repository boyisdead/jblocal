<?php
session_start();
include('../../server/connect.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/backProcess.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>
<body>

<!-- InstanceBeginEditable name="EditRegion" -->
<?php
//รับค่า


if($_REQUEST['id']==""){echo"<script>alert('Please insert title name');history.back();</script>";exit;}
$id=$_REQUEST['id'];

if($_REQUEST['name']==""){echo"<script>alert('Please insert title name');history.back();</script>";exit;}

$name=$_REQUEST['name'];

if($_REQUEST['email']==""){echo"<script>alert('Please insert email');history.back();</script>";exit;}
$email=$_REQUEST['email'];


$fname=$_REQUEST['fname'];
if($fname==""){$fname="-";}

$lname=$_REQUEST['lname'];
if($lname==""){$lname="-";}

$telephone=$_REQUEST['telephone'];
if($telephone==""){$telephone="-";}

$gender=$_REQUEST['gender'];
if($gender==""){$gender="-";}

$birthday=$_REQUEST['birthday'];
if($birthday==""){$birthday="0000-00-00";}

$facebook=$_REQUEST['facebook'];
if($facebook==""){$facebook="-";}

$twitter=$_REQUEST['twitter'];
if($twitter==""){$twitter="-";}

$blog=$_REQUEST['blog'];
if($blog==""){$blog="-";}

$linkedin=$_REQUEST['linkedin'];
if($linkedin==""){$linkedin="-";}



$Address=$_REQUEST['Address'];
if($Address==""){$Address="-";}

$city=$_REQUEST['city'];
if($city==""){$city="-";}

$country=$_REQUEST['country'];
if($country==""){$country="-";}

$postal_code=$_REQUEST['postal_code'];
if($postal_code==""){$postal_code="-";}










//เปลี่ยนชื่อภาพ

//เชื่อมต่อฐานข้อมูล
include("../../server/connect.php");






//ถ้าไม่แก้ไขรูปภาพ
if($_FILES['Job_Description']['name']==""){
  //อัพเดทข้อมูล 

  $sql="UPDATE candidate_profile SET email=\"$email\", name=\"$name\", phone=\"$telephone\", city=\"$city\", location=\"$Address\", country=\"$country\", postal_code=\"$postal_code\", google=\"$blog\", linkedin_profile_url=\"$linkedin\", facebook=\"$facebook\", twitter=\"$twitter\", fname=\"$fname\", lname=\"$lname\", gender=\"$gender\", birthday=\"$birthday\", update_date=now() WHERE oauth_uid='$id'";
  mysql_query($sql)or die(mysql_error());  



  echo"<script>window.location='../../../user-profile.php';</script>";exit;
}




//ถ้าแก้ไขรูปภาพ
if($_FILES['Job_Description']['name']!=""){

echo "5555555555";

  /*
  $sqlDelete="SELECT * FROM job_post WHERE id=$id";
  $resultDelete=mysql_query($sqlDelete)or die(mysql_error());
  $rowDelete=mysql_fetch_assoc($resultDelete);
  unlink("../../pdf/".$rowDelete['file_name']);
  //เปลี่ยนชื่อภาพ
  $image=time().'-'.$_FILES['Job_Description']['name'];
  //อัพโหลดรูปภาพ

  if(move_uploaded_file($_FILES['Job_Description']['tmp_name'],"../../pdf/".$image)){

    $error="";
  }
  //ถ้าอัพโหลดไม่ได้
  else{
  $error="alert('เกิดการผิดพลาดในการอัพโหลดไฟล์ภาพ กรุณาทำการอัพโหลดใหม่');";
  }
  //อัพเดทตารางสินค้า
  $sql="UPDATE job_post SET title=\"$Title\", department=$Department, country=\"$Country\", city=\"$City\", address=\"$Address\", description=\"$Description\", salary=$Min_Salary, max_salary=$Max_Salary, status=$status, status2=$status2, file_name='$image', refer_bonus=$Bonus, icon='$randomElement', job_level=$job_leval, last_update=now() WHERE id=$id";
  mysql_query($sql)or die(mysql_error());  

*/
//echo"<script>window.location='../../../user-profile.php';</script>";exit;
}









  echo"<script>window.location='../../../user-profile.php';</script>";exit;
?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>