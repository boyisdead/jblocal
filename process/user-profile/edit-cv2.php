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

$idre=$_REQUEST['idre'];
if($_FILES['file']['name']=="" && $_REQUEST['dropbox']==""){echo"<script>alert('Please select file or dropbox file');history.back();</script>";exit;}


$dropbox=$_REQUEST['dropbox'];

include("../../server/connect.php");


if(!empty($_FILES['file']['name']) && !empty($dropbox)){


    $sqlDelete="SELECT * FROM candidate_profile WHERE oauth_uid='$id'";
  $resultDelete=mysql_query($sqlDelete)or die(mysql_error());
  $rowDelete=mysql_fetch_assoc($resultDelete);


  unlink("../../cv/".$rowDelete['cv']);

$image=time().'-'.$_FILES['file']['name'];

if(move_uploaded_file($_FILES['file']['tmp_name'],"../../cv/".$image)){

    $error="";
  }
  //ถ้าอัพโหลดไม่ได้
  else{
  $error="alert('เกิดการผิดพลาดในการอัพโหลดไฟล์ภาพ กรุณาทำการอัพโหลดใหม่');";   
  }


  $sql="UPDATE candidate_profile SET cv='$image', dropbox='$dropbox',  update_date=now() WHERE oauth_uid='$id'";
  mysql_query($sql)or die(mysql_error());  


  echo"<script>window.location='http://m.jbhired.com/Job_".$idre."';</script>";exit;

}







if(!empty($_FILES['file']['name']) && empty($dropbox)){


    $sqlDelete="SELECT * FROM candidate_profile WHERE oauth_uid='$id'";
  $resultDelete=mysql_query($sqlDelete)or die(mysql_error());
  $rowDelete=mysql_fetch_assoc($resultDelete);


  unlink("../../cv/".$rowDelete['cv']);

$image=time().'-'.$_FILES['file']['name'];

if(move_uploaded_file($_FILES['file']['tmp_name'],"../../cv/".$image)){

    $error="";
  }
  //ถ้าอัพโหลดไม่ได้
  else{
  $error="alert('เกิดการผิดพลาดในการอัพโหลดไฟล์ภาพ กรุณาทำการอัพโหลดใหม่');";   
  }


  $sql="UPDATE candidate_profile SET cv='$image',  update_date=now() WHERE oauth_uid='$id'";
  mysql_query($sql)or die(mysql_error());  


  echo"<script>window.location='http://m.jbhired.com/Job_".$idre."';</script>";exit;

}




if(empty($_FILES['file']['name']) && !empty($dropbox)){



  $sql="UPDATE candidate_profile SET dropbox='$dropbox',  update_date=now() WHERE oauth_uid='$id'";
  mysql_query($sql)or die(mysql_error());  


  echo"<script>window.location='http://m.jbhired.com/Job_".$idre."';</script>";exit;

}







?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>