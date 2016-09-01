<?php
session_start();
?>
<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
</head>
<body>

<?php
//รับค่า
$token=$_REQUEST['token'];

//เชื่อมต่อฐานข้อมูล
require_once 'connect.php';


//ถ้าแก้ไขรูปภาพ
if($_FILES['file']['name']!=""){



  $image=time().'-'.$_FILES['file']['name'];
  //อัพโหลดรูปภาพ
  if(move_uploaded_file($_FILES['file']['tmp_name'],"../cv/".$image)){
    $error="";
  }
  //ถ้าอัพโหลดไม่ได้
  else{
  $error="alert('เกิดการผิดพลาดในการอัพโหลดไฟล์ภาพ กรุณาทำการอัพโหลดใหม่');";
  }
  //อัพเดทตารางสินค้า
   $sql="UPDATE refer_email SET refer_cv='$image' WHERE refer_key='$token' ";
  mysql_query($sql)or die(mysql_error());

  
  
}


?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>