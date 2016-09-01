<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
session_start();

if(isset($_SESSION['ssUsername2'])){$username=$_SESSION['ssUsername2'];}
else if(!isset($_SESSION['ssUsername2'])){echo"<script>alert('please login');window.location='../../../';</script>";exit;}

date_default_timezone_set('Asia/Bangkok');
if($_REQUEST['subject']==""||$_REQUEST['detail']==""){echo"<script>alert('ยังกรอกข้อมูลไม่ครบ');history.back();</script>";exit;}


$subject= mysql_escape_string($_REQUEST['subject']);
$detail = mysql_escape_string($_REQUEST['detail']);
$email=$_REQUEST['category_id'];
$username=$_REQUEST['id'];


include("../../server/connect.php");




function resize_crop_image($max_width, $max_height, $source_file, $dst_dir, $quality = 60){
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


if($_FILES['image']['name']==""){


$sql="INSERT INTO webboard_post(subject, detail, email, username, insert_date, last_update) VALUES('$subject', '$detail', '$email', '$username', now(), now())";
mysql_query($sql)or die(mysql_error());
$id=(mysql_insert_id());
echo"<script>window.location='../../blog.php';</script>";
} 


if($_FILES['image']['name']!="") {


	$image=time().'-'.$_FILES['image']['name'];
  //อัพโหลดรูปภาพ

  if(move_uploaded_file($_FILES['image']['tmp_name'],"../../blog_image/".$image)){
    resize_crop_image(600, 315, "../../blog_image/".$image, "../../blog_image/".$image);
    $error="";
  }
  //ถ้าอัพโหลดไม่ได้
  else{
  $error="alert('เกิดการผิดพลาดในการอัพโหลดไฟล์ภาพ กรุณาทำการอัพโหลดใหม่');";
  }


$sql="INSERT INTO webboard_post(subject, detail, image, email, username, insert_date, last_update) VALUES('$subject', '$detail', '$image', '$email', '$username', now(), now())";
mysql_query($sql)or die(mysql_error());
$id=(mysql_insert_id());
echo"<script>window.location='../../blog.php';</script>";

}
?>
</body>
</html>