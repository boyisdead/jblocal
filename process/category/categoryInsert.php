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

$icon=$_REQUEST['icon'];




function resize_crop_image($max_width, $max_height, $source_file, $dst_dir, $quality = 100){
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
            $quality = 100;
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

$sql="SELECT * FROM category WHERE name=\"$category\"";
$result=mysql_query($sql)or die(mysql_error());
$num=mysql_num_rows($result);
if($num!=0){
	echo"<script>alert('ชื่อหมวดหมู่ซ้ำ');history.back();</script>";exit;
} else {
$sql="INSERT INTO category(name, insert_date, last_update) VALUES(\"$category\", now(), now())";
mysql_query($sql)or die(mysql_error());

echo"<script>$error;history.back();</script>";
}

}


if($_FILES['image']['name']!=""){

$image=time().'-'.$_FILES['image']['name'];
//ค่าซ้ำ
$sql="SELECT * FROM category WHERE name=\"$category\"";
$result=mysql_query($sql)or die(mysql_error());
$num=mysql_num_rows($result);
if($num!=0){
	echo"<script>alert('ชื่อหมวดหมู่ซ้ำ');history.back();</script>";exit;
} else {
$sql="INSERT INTO category(name, image, insert_date, last_update) VALUES(\"$category\", '$image', now(), now())";
mysql_query($sql)or die(mysql_error());

if(move_uploaded_file($_FILES['image']['tmp_name'],"../../cusimage/".$image)){
 // resize_crop_image(100, 100, "../../cusimage/".$image, "../../cusimage/".$image);
  $error="";
}
echo"<script>$error;history.back();</script>";
     }
}


?>
</body>
</html>