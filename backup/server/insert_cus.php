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
if(isset($_SESSION['ssUsername'])){$username=$_SESSION['ssUsername'];}
else if(!isset($_SESSION['ssUsername'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}
?>
<?php
//รับค่า
$id=$_REQUEST['id'];

$meid=$_REQUEST['meid'];

$type=$_REQUEST['type'];
if($type==""){$type="ไม่ระบุ";}

$perface=$_REQUEST['perface'];
if($perface==""){$perface="คุณ";}

$cus_name=$_REQUEST['name'];
if($cus_name==""){$cus_name="ไม่ระบุ";}

$cus_lastname=$_REQUEST['lastname'];
if($cus_lastname==""){$cus_lastname="ไม่ระบุ";}

$nameOld=$_REQUEST['nameOld'];
if($nameOld==""){$nameOld="ไม่ระบุ";}

$nameEng=$_REQUEST['nameEng'];
if($nameEng==""){$nameEng="ไม่ระบุ";}

$nickname=$_REQUEST['nickname'];
if($nickname==""){$nickname="ไม่ระบุ";}

$birthday=$_REQUEST['birthday'];
if($birthday==""){$birthday="0000-00-00";}

////////////////////////////////////////////////////////////////////////////////

$status=$_REQUEST['status'];
if($status==""){$status="5";}

$sex=$_REQUEST['sex'];
if($sex==""){$sex="3";}


$typecard=$_REQUEST['typecard'];
if($typecard==""){$typecard="ไม่ระบุ";}

$idcard=$_REQUEST['idcard'];
if($idcard==""){$idcard="ไม่ระบุ";}

$child=$_REQUEST['child'];
if($child==""){$child=0;}

$carrier=$_REQUEST['carrier'];
if($carrier==""){$carrier="ไม่ระบุ";}

$addressOriginal=$_REQUEST['addressOriginal'];
if($addressOriginal==""){$addressOriginal="ไม่ระบุ";}

$address=$_REQUEST['address'];
if($address==""){$address="ไม่ระบุ";}

$phone=$_REQUEST['phone'];
if($phone==""){$phone="ไม่ระบุ";}

$email=$_REQUEST['email'];
if($email==""){$email="ไม่ระบุ";}

$disease=$_REQUEST['disease'];
if($disease==""){$disease="ไม่ระบุ";}

$size=$_REQUEST['size'];
if($size==""){$size="ไม่ระบุ";}

$banknumber=$_REQUEST['banknumber'];
if($banknumber==""){$banknumber="ไม่ระบุ";}

$remark=$_REQUEST['remark'];
if($remark==""){$remark="ไม่ระบุ";}

$origin=$_REQUEST['origin'];
if($origin==""){$origin="ไม่ระบุ";}

//////////////////////////////////////////////////////////////////

$cus_tex=$_REQUEST['tex'];
if($cus_tex==""){$cus_tex=0;}

$cus_texCount=$_REQUEST['texcount'];
if($cus_texCount==""){$cus_texCount=0;}

$cus_RDlogin=$_REQUEST['RDlogin'];
if($cus_RDlogin==""){$cus_RDlogin="ไม่ระบุ";}

$cus_RDpwd=$_REQUEST['RDpassword'];
if($cus_RDpwd==""){$cus_RDpwd="ไม่ระบุ";}

$cus_TSDlogin=$_REQUEST['TSDlogin'];
if($cus_TSDlogin==""){$cus_TSDlogin="ไม่ระบุ";}

$cus_TSDpwd=$_REQUEST['TSDpassword'];
if($cus_TSDpwd==""){$cus_TSDpwd="ไม่ระบุ";}

$cus_texRemark=$_REQUEST['texRemark'];
if($cus_texRemark==""){$cus_texRemark="ไม่ระบุ";}











//เชื่อมต่อฐานข้อมูล
include('connect.php');

//ถ้าไม่แก้ไขรูปภาพ
if($_FILES['image']['name']==""){
  //อัพเดทข้อมูล
$image = "default-avatar.png";

  $sql="INSERT INTO customer(cus_perface, image, cus_name, cus_lastname, cus_nameOld, nameEng, cus_nickname, cus_types, cus_birthday, cus_idcard, typecard, cus_status, cus_sex, cus_address, cus_addressOri, cus_child, cus_carrier, cus_tel, cus_email, cus_disease, cus_bankNo, cus_size, cus_origin, cus_remark, cus_tex, cus_texCount, cus_RDlogin, cus_RDpwd, cus_TSDlogin, cus_TSDpwd, cus_texRemark, member_id, insert_date, last_update) 
  VALUES($perface, '$image', \"$cus_name\", \"$cus_lastname\", \"$nameOld\", \"$nameEng\", \"$nickname\", \"$type\", \"$birthday\", '$idcard', \"$typecard\", $status, $sex, '$address', '$addressOriginal', $child, '$carrier', '$phone', '$email', '$disease', '$banknumber', '$size', '$origin', '$remark', $cus_tex, $cus_texCount, '$cus_RDlogin', '$cus_RDpwd', '$cus_TSDlogin', '$cus_TSDpwd', '$cus_texRemark', $meid, now(), now())";
mysql_query($sql)or die(mysql_error());
//คืนค่าไอดี
$product_id=mysql_insert_id();




for($i=0;$i<count($_FILES['product_image']['name']);$i++){
    if($_FILES['product_image']['name'][$i]!=""){
    $product_image=time().'-'.$_FILES['product_image']['name'][$i];
      if(move_uploaded_file($_FILES['product_image']['tmp_name'][$i],"../cusimage/".$product_image)){
        $sqlImage="INSERT INTO cus_image(product_id, image, insert_date) VALUES($product_id, '$product_image', now())";
        mysql_query($sqlImage)or die(mysql_error());
    }
    }
  } 

  
  echo"<script>window.location='../cus_profile-$product_id';</script>";exit;
}



function resize_crop_image($max_width, $max_height, $source_file, $dst_dir, $quality = 80){
    $imgsize = getimagesize($source_file);
    $width = $imgsize[0];
    $height = $imgsize[1];
    $mime = $imgsize['mime'];
 
    switch($mime){
        case 'image/gif':
            $image_create = "imagecreatefromgif";
            $image = "imagegif";
            break;
 
        case 'image/png':
            $image_create = "imagecreatefrompng";
            $image = "imagepng";
            $quality = 7;
            break;
 
        case 'image/jpeg':
            $image_create = "imagecreatefromjpeg";
            $image = "imagejpeg";
            $quality = 80;
            break;
 
        default:
            return false;
            break;
    }
     
    $dst_img = imagecreatetruecolor($max_width, $max_height);
    $src_img = $image_create($source_file);
     
    $width_new = $height * $max_width / $max_height;
    $height_new = $width * $max_height / $max_width;
    //if the new width is greater than the actual width of the image, then the height is too large and the rest cut off, or vice versa
    if($width_new > $width){
        //cut point by height
        $h_point = (($height - $height_new) / 2);
        //copy image
        imagecopyresampled($dst_img, $src_img, 0, 0, 0, $h_point, $max_width, $max_height, $width, $height_new);
    }else{
        //cut point by width
        $w_point = (($width - $width_new) / 2);
        imagecopyresampled($dst_img, $src_img, 0, 0, $w_point, 0, $max_width, $max_height, $width_new, $height);
    }
     
    $image($dst_img, $dst_dir, $quality);
 
    if($dst_img)imagedestroy($dst_img);
    if($src_img)imagedestroy($src_img);
}






//ถ้าแก้ไขรูปภาพ
if($_FILES['image']['name']!=""){
  //ลบภาพเก่า

  //เปลี่ยนชื่อภาพ
  $image=time().'-'.$_FILES['image']['name'];

  resize_crop_image(330, 330, $image, $image);
  //อัพโหลดรูปภาพ


if(move_uploaded_file($_FILES['image']['tmp_name'],"../cusimage/".$image)){
    resize_crop_image(330, 330, "../cusimage/".$image, "../cusimage/".$image);
    $error="";
  }
  //ถ้าอัพโหลดไม่ได้
  else{
  $error="alert('เกิดการผิดพลาดในการอัพโหลดไฟล์ภาพ กรุณาทำการอัพโหลดใหม่');";   
  }


    $sql="INSERT INTO customer(cus_perface, image, cus_name, cus_lastname, cus_nameOld, nameEng, cus_nickname, cus_types, cus_birthday, cus_idcard, typecard, cus_status, cus_sex, cus_address, cus_addressOri, cus_child, cus_carrier, cus_tel, cus_email, cus_disease, cus_bankNo, cus_size, cus_origin, cus_remark, cus_tex, cus_texCount, cus_RDlogin, cus_RDpwd, cus_TSDlogin, cus_TSDpwd, cus_texRemark, member_id, insert_date, last_update) 
  VALUES($perface, '$image', \"$cus_name\", \"$cus_lastname\", \"$nameOld\", \"$nameEng\", \"$nickname\", \"$type\", \"$birthday\", '$idcard', \"$typecard\", $status, $sex, '$address', '$addressOriginal', $child, '$carrier', '$phone', '$email', '$disease', '$banknumber', '$size', '$origin', '$remark', $cus_tex, $cus_texCount, '$cus_RDlogin', '$cus_RDpwd', '$cus_TSDlogin', '$cus_TSDpwd', '$cus_texRemark', $meid, now(), now())";
mysql_query($sql)or die(mysql_error());
//คืนค่าไอดี
$product_id=mysql_insert_id();





for($i=0;$i<count($_FILES['product_image']['name']);$i++){
    if($_FILES['product_image']['name'][$i]!=""){
    $product_image=time().'-'.$_FILES['product_image']['name'][$i];
      if(move_uploaded_file($_FILES['product_image']['tmp_name'][$i],"../cusimage/".$product_image)){
        $sqlImage="INSERT INTO cus_image(product_id, image, insert_date) VALUES($product_id, '$product_image', now())";
        mysql_query($sqlImage)or die(mysql_error());
    }
    }
  } 
  
  
}






echo"<script>window.location='../cus_profile-$product_id';</script>";exit;
?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>