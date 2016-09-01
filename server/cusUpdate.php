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


$name=$_REQUEST['name'];
if($name==""){$name="-";}

$email=$_REQUEST['email'];
if($email==""){$email="-";}

$phone=$_REQUEST['phone'];
if($phone==""){$phone="-";}

$country=$_REQUEST['country'];
if($country==""){$country="-";}

$website=$_REQUEST['website'];
if($website==""){$website="-";}



////////////////////////////////////////////////////////////////////////////////

$blog=$_REQUEST['blog'];
if($blog==""){$blog="-";}

$linkedin_profile_url=$_REQUEST['linkedin_profile_url'];
if($linkedin_profile_url==""){$linkedin_profile_url="-";}

$facebook=$_REQUEST['facebook'];
if($facebook==""){$facebook="-";}

$twitter=$_REQUEST['twitter'];
if($twitter==""){$twitter="-";}

$google=$_REQUEST['google'];
if($google==""){$google="-";}












//เชื่อมต่อฐานข้อมูล
include('connect.php');

//ถ้าไม่แก้ไขรูปภาพ
if($_FILES['image']['name']==""){
  //อัพเดทข้อมูล
  $sql="UPDATE candidate_profile SET email=\"$email\", name=\"$name\", phone=\"$phone\", country=\"$country\", google=\"$google\", website=\"$website\", blog=\"$blog\", linkedin_profile_url='$linkedin_profile_url', facebook=\"$facebook\", twitter=$twitter, update_date=now() WHERE id=$id";
  mysql_query($sql)or die(mysql_error());  


  $posttext = " Change Personal Information Data  <a href='candidate_profile-".$id."' >".$name."</a>";

$sql="INSERT INTO post(posttext, userpost, userpostto, insert_date, last_update) 
VALUES(\"$posttext\", \"$meid\", \"$meid\", now(), now())";
mysql_query($sql)or die(mysql_error());



  
  echo"<script>window.location='../candidate_profile.php?cus_id=$id';</script>";exit;
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

/*
  $sqlDelete="SELECT * FROM customer WHERE id=$id";
  $resultDelete=mysql_query($sqlDelete)or die(mysql_error());
  $rowDelete=mysql_fetch_array($resultDelete);
  unlink("../cusimage/".$rowDelete['image']);
  //เปลี่ยนชื่อภาพ

*/

  $image=time().'-'.$_FILES['image']['name'];


  $sql="UPDATE candidate_profile SET file_name='$image', email=\"$email\", name=\"$name\", phone=\"$phone\", country=\"$country\", google=\"$google\", website=\"$website\", blog=\"$blog\", linkedin_profile_url='$linkedin_profile_url', facebook=\"$facebook\", twitter=\"$twitter\", update_date=now() WHERE id=$id";
  mysql_query($sql)or die(mysql_error());  


if(move_uploaded_file($_FILES['image']['tmp_name'],"../avatar/".$image)){
    resize_crop_image(250, 250, "../avatar/".$image, "../avatar/".$image);
    $error="";
  }
  //ถ้าอัพโหลดไม่ได้
  else{
  $error="alert('เกิดการผิดพลาดในการอัพโหลดไฟล์ภาพ กรุณาทำการอัพโหลดใหม่');";   
  }








  $posttext = " Change Personal Information Data  <a href='candidate_profile-".$id."' >".$name."</a>";

$sql="INSERT INTO post(posttext, userpost, userpostto, insert_date, last_update) 
VALUES(\"$posttext\", \"$meid\", \"$meid\", now(), now())";
mysql_query($sql)or die(mysql_error());


  
  
}






echo"<script>window.location='../candidate_profile.php?cus_id=$id';</script>";exit;
?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>