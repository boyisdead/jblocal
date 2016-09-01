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
<?php
//เช็คล็อกอิน
if(isset($_SESSION['ssUsername2'])){$username=$_SESSION['ssUsername2'];}
    else if(!isset($_SESSION['ssUsername2'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}
?>
<!-- InstanceBeginEditable name="EditRegion" -->
<?php
//รับค่า
$id=base64_decode($_REQUEST['id']);

if($_REQUEST['name']==""){echo"<script>alert('ยังไม่ใส่ชื่อสินค้า');history.back();</script>";exit;}

if($_REQUEST['For_Sale']==""){echo"<script>alert('ยังไม่ใส่ type Post For');history.back();</script>";exit;}

$category_id=$_REQUEST['category_id'];
$For_Sale=$_REQUEST['For_Sale'];


$name=$_REQUEST['name'];
if($name==""){$name="ไม่ระบุ";}




$Owner=$_REQUEST['Owner'];

$email=$_REQUEST['email'];

$tel=$_REQUEST['tel'];

$Additional=$_REQUEST['Additional'];


$Status=$_REQUEST['Status'];
if($Status==""){$Status=0;}

$startDate2=$_REQUEST['startDate2'];
if($startDate2==""){$startDate2="0000-00-00";}




$detail = mysql_escape_string($_REQUEST['detail']);
if($detail==""){$detail="ไม่ระบุ";}

$shortdetail=$_REQUEST['shortdetail'];
if($shortdetail==""){$shortdetail="ไม่ระบุ";}

$address=$_REQUEST['address'];
if($address==""){$address="ไม่ระบุ";}

$province_id=$_REQUEST['province_id'];
if($province_id==0){

  $sql1="SELECT * FROM product WHERE id=$id";
    $result1=mysql_query($sql1)or die(mysql_error());
    $row1=mysql_fetch_array($result1);
    $province_id = $row1['province_id'];
}

$amphur_id=$_REQUEST['amphur_id'];
if($amphur_id==0){ 

  $sql1="SELECT * FROM product WHERE id=$id";
    $result1=mysql_query($sql1)or die(mysql_error());
    $row1=mysql_fetch_array($result1);
    $amphur_id = $row1['amphur_id'];
  

}

$district_id=$_REQUEST['district_id'];
if($district_id==0){
  $sql1="SELECT * FROM product WHERE id=$id";
    $result1=mysql_query($sql1)or die(mysql_error());
    $row1=mysql_fetch_array($result1);
    $district_id = $row1['district_id'];
}

$lat=$_REQUEST['lat'];
if($lat==""){$lat=0;}

$lng=$_REQUEST['lng'];
if($lng==""){$lng=0;}

$Size=$_REQUEST['Size'];
if($Size==""){$Size=0;}


///////////////////////////// -- social -- ///////////////////////////////////////////////

$Floors=$_REQUEST['Floors'];
if($Floors==""){$Floors=0;}

$Bedrooms=$_REQUEST['Bedrooms'];
if($Bedrooms==""){$Bedrooms=0;}

$Bathrooms=$_REQUEST['Bathrooms'];
if($Bathrooms==""){$Bathrooms=0;}

$Living=$_REQUEST['Living'];
if($Living==""){$Living=0;}

$Maid=$_REQUEST['Maid'];
if($Maid==""){$Maid=0;}

$Parking=$_REQUEST['Parking'];
if($Parking==""){$Parking=0;}

$Price=$_REQUEST['Price'];
if($Price==""){$Price=0;}  

$Refer=$_REQUEST['Refer'];
if($Refer==""){$Refer=0;}

///////////////////////////// -- social -- ///////////////////////////////////////////////


$Cable=$_REQUEST['Cable'];
if($Cable==""){$Cable=0;}

$Wifi=$_REQUEST['Wifi'];
if($Wifi==""){$Wifi=0;}

$Poll=$_REQUEST['Poll'];
if($Poll==""){$Poll=0;}

$Breakfast=$_REQUEST['Breakfast'];
if($Breakfast==""){$Breakfast=0;}

$allowed=$_REQUEST['allowed'];
if($allowed==""){$allowed=0;}

$Accessibiliy=$_REQUEST['Accessibiliy'];
if($Accessibiliy==""){$Accessibiliy=0;}

$Parking2=$_REQUEST['Parking2'];
if($Parking2==""){$Parking2=0;}

///////////////////////////// -- social -- ///////////////////////////////////////////////


$rating=$_REQUEST['rating'];
if($rating==""){$rating=5;}


$BTS=$_REQUEST['BTS'];
if($BTS==""){$BTS="-";}

$MRT=$_REQUEST['MRT'];
if($MRT==""){$MRT="-";}



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






function resize_crop_images($max_width, $max_height, $source_file, $dst_dir, $quality = 80){
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











//เปลี่ยนชื่อภาพ

//เชื่อมต่อฐานข้อมูล
include("../../server/connect.php");






//ถ้าไม่แก้ไขรูปภาพ
if($_FILES['timeline']['name']=="" && $_FILES['image']['name']==""){
  //อัพเดทข้อมูล 

  $sql="UPDATE product SET category_id=$category_id, For_Sale=$For_Sale, name=\"$name\", detail=\"$detail\", shortdetail=\"$shortdetail\", address=\"$address\", province_id=$province_id, amphur_id=$amphur_id, district_id=$district_id, lat='$lat', lng='$lng', Size=$Size, Floors=$Floors, Bedrooms=$Bedrooms, Bathrooms=$Bathrooms, Living=$Living, Maid=$Maid, Parking=$Parking, Price=$Price, Cable=$Cable, Wifi=$Wifi, Poll=$Poll, Fitness=$Breakfast, allowed=$allowed, Accessibiliy=$Accessibiliy, Restaurant=$Parking2, rating=$rating, BTS='$BTS', MRT='$MRT', Refer=$Refer, Owner='$Owner', email='$email', tel='$tel', Additional='$Additional', Status=$Status, startDate2='$startDate2', last_update=now() WHERE id=$id";
  mysql_query($sql)or die(mysql_error());  


  //เพิ่มภาพประกอบ
  for($i=0;$i<count($_FILES['product_image']['name']);$i++){
    if($_FILES['product_image']['name'][$i]!=""){
	  $product_image=time().'-'.$_FILES['product_image']['name'][$i];
      if(move_uploaded_file($_FILES['product_image']['tmp_name'][$i],"../../cusimage/".$product_image)){
        resize_crop_images(750, 500, "../../cusimage/".$product_image, "../../cusimage/".$product_image);
        $sqlImage="INSERT INTO product_image(product_id, image, insert_date) VALUES($id, '$product_image', now())";
        mysql_query($sqlImage)or die(mysql_error());
	  }
    }
  } 
  echo"<script>window.location='../../edit_blogger.php?id=$_REQUEST[id]';</script>";exit;
}




//ถ้าแก้ไขรูปภาพ
if($_FILES['image']['name']!="" && $_FILES['timeline']['name']==""){
  //ลบภาพเก่า
  $sqlDelete="SELECT * FROM product WHERE id=$id";
  $resultDelete=mysql_query($sqlDelete)or die(mysql_error());
  $rowDelete=mysql_fetch_assoc($resultDelete);
  unlink("../../cusimage/".$rowDelete['image']);
  //เปลี่ยนชื่อภาพ
  $image=time().'-'.$_FILES['image']['name'];
  //อัพโหลดรูปภาพ

  if(move_uploaded_file($_FILES['image']['tmp_name'],"../../cusimage/".$image)){
    resize_crop_image(450, 300, "../../cusimage/".$image, "../../cusimage/".$image);
    $error="";
  }
  //ถ้าอัพโหลดไม่ได้
  else{
  $error="alert('เกิดการผิดพลาดในการอัพโหลดไฟล์ภาพ กรุณาทำการอัพโหลดใหม่');";
  }
  //อัพเดทตารางสินค้า
  $sql="UPDATE product SET category_id=$category_id, For_Sale=$For_Sale, name=\"$name\", detail=\"$detail\", shortdetail=\"$shortdetail\", address=\"$address\", province_id=$province_id, amphur_id=$amphur_id, district_id=$district_id, lat='$lat', lng='$lng', Size=$Size, Floors=$Floors, Bedrooms=$Bedrooms, Bathrooms=$Bathrooms, Living=$Living, Maid=$Maid, Parking=$Parking, Price=$Price, Cable=$Cable, Wifi=$Wifi, Poll=$Poll, Fitness=$Breakfast, allowed=$allowed, Accessibiliy=$Accessibiliy, Restaurant=$Parking2, image='$image', rating=$rating, BTS='$BTS', MRT='$MRT', Refer=$Refer, Owner='$Owner', email='$email', tel='$tel', Additional='$Additional', Status=$Status, startDate2='$startDate2', last_update=now() WHERE id=$id";
  mysql_query($sql)or die(mysql_error());  


  //เพิ่มภาพประกอบ
  for($i=0;$i<count($_FILES['product_image']['name']);$i++){
    if($_FILES['product_image']['name'][$i]!=""){
	  $product_image=time().'-'.$_FILES['product_image']['name'][$i];
      if(move_uploaded_file($_FILES['product_image']['tmp_name'][$i],"../../cusimage/".$product_image)){
        resize_crop_images(750, 500, "../../cusimage/".$product_image, "../../cusimage/".$product_image);
        $sqlImage="INSERT INTO product_image(product_id, image, insert_date) VALUES($id, '$product_image', now())";
        mysql_query($sqlImage)or die(mysql_error());
	  }
    }
  }  
}





//ถ้าแก้ไขรูปภาพ
if($_FILES['timeline']['name']!="" && $_FILES['image']['name']==""){
  //ลบภาพเก่า
  $sqlDelete="SELECT * FROM product WHERE id=$id";
  $resultDelete=mysql_query($sqlDelete)or die(mysql_error());
  $rowDelete=mysql_fetch_assoc($resultDelete);
  unlink("../../cusimage/".$rowDelete['timeline']);
  //เปลี่ยนชื่อภาพ
  $timeline=time().'-'.$_FILES['timeline']['name'];
  //อัพโหลดรูปภาพ

  if(move_uploaded_file($_FILES['timeline']['tmp_name'],"../../cusimage/".$timeline)){
    resize_crop_image(1400, 470, "../../cusimage/".$timeline, "../../cusimage/".$timeline);
    $error="";
  }
  //ถ้าอัพโหลดไม่ได้
  else{
  $error="alert('เกิดการผิดพลาดในการอัพโหลดไฟล์ภาพ กรุณาทำการอัพโหลดใหม่');";
  }
  //อัพเดทตารางสินค้า
  $sql="UPDATE product SET category_id=$category_id, For_Sale=$For_Sale, name=\"$name\", detail=\"$detail\", shortdetail=\"$shortdetail\", address=\"$address\", province_id=$province_id, amphur_id=$amphur_id, district_id=$district_id, lat='$lat', lng='$lng', Size=$Size, Floors=$Floors, Bedrooms=$Bedrooms, Bathrooms=$Bathrooms, Living=$Living, Maid=$Maid, Parking=$Parking, Price=$Price, Cable=$Cable, Wifi=$Wifi, Poll=$Poll, Fitness=$Breakfast, allowed=$allowed, Accessibiliy=$Accessibiliy, Restaurant=$Parking2, timeline='$timeline', rating=$rating, BTS='$BTS', MRT='$MRT', Refer=$Refer, Owner='$Owner', email='$email', tel='$tel', Additional='$Additional', Status=$Status, startDate2='$startDate2', last_update=now() WHERE id=$id";
  mysql_query($sql)or die(mysql_error());  


  //เพิ่มภาพประกอบ
  for($i=0;$i<count($_FILES['product_image']['name']);$i++){
    if($_FILES['product_image']['name'][$i]!=""){
    $product_image=time().'-'.$_FILES['product_image']['name'][$i];
      if(move_uploaded_file($_FILES['product_image']['tmp_name'][$i],"../../cusimage/".$product_image)){
        resize_crop_images(750, 500, "../../cusimage/".$product_image, "../../cusimage/".$product_image);
        $sqlImage="INSERT INTO product_image(product_id, image, insert_date) VALUES($id, '$product_image', now())";
        mysql_query($sqlImage)or die(mysql_error());
    }
    }
  }  
}








//ถ้าแก้ไขรูปภาพ
if($_FILES['image']['name']!="" && $_FILES['timeline']['name']!=""){
  //ลบภาพเก่า
  $sqlDelete="SELECT * FROM product WHERE id=$id";
  $resultDelete=mysql_query($sqlDelete)or die(mysql_error());
  $rowDelete=mysql_fetch_assoc($resultDelete);
  unlink("../../cusimage/".$rowDelete['timeline']);
  unlink("../../cusimage/".$rowDelete['image']);
  //เปลี่ยนชื่อภาพ
  $timeline=time().'-'.$_FILES['timeline']['name'];
  $image1=time().'-'.$_FILES['image']['name'];
  //อัพโหลดรูปภาพ
  if(move_uploaded_file($_FILES['timeline']['tmp_name'],"../../cusimage/".$timeline)){
    resize_crop_image(1400, 470, "../../cusimage/".$timeline, "../../cusimage/".$timeline);
    $error="";
  }
  //ถ้าอัพโหลดไม่ได้
  else{
  $error="alert('เกิดการผิดพลาดในการอัพโหลดไฟล์ภาพ กรุณาทำการอัพโหลดใหม่');";
  }

  if(move_uploaded_file($_FILES['image']['tmp_name'],"../../cusimage/".$image1)){
    resize_crop_image(450, 300, "../../cusimage/".$image, "../../cusimage/".$image);
    $error="";
  }
  //ถ้าอัพโหลดไม่ได้
  else{
  $error="alert('เกิดการผิดพลาดในการอัพโหลดไฟล์ภาพ กรุณาทำการอัพโหลดใหม่');";
  }

  //อัพเดทตารางสินค้า
 $sql="UPDATE product SET category_id=$category_id, For_Sale=$For_Sale, name=\"$name\", detail=\"$detail\", shortdetail=\"$shortdetail\", address=\"$address\", province_id=$province_id, amphur_id=$amphur_id, district_id=$district_id, lat='$lat', lng='$lng', Size=$Size, Floors=$Floors, Bedrooms=$Bedrooms, Bathrooms=$Bathrooms, Living=$Living, Maid=$Maid, Parking=$Parking, Price=$Price, Cable=$Cable, Wifi=$Wifi, Poll=$Poll, Fitness=$Breakfast, allowed=$allowed, Accessibiliy=$Accessibiliy, Restaurant=$Parking2, image='$image', timeline='$timeline', rating=$rating, BTS='$BTS', MRT='$MRT', Refer=$Refer, Owner='$Owner', email='$email', tel='$tel', Additional='$Additional', Status=$Status, startDate2='$startDate2', last_update=now() WHERE id=$id";
  mysql_query($sql)or die(mysql_error());  


  //เพิ่มภาพประกอบ
  for($i=0;$i<count($_FILES['product_image']['name']);$i++){
    if($_FILES['product_image']['name'][$i]!=""){
    $product_image=time().'-'.$_FILES['product_image']['name'][$i];
      if(move_uploaded_file($_FILES['product_image']['tmp_name'][$i],"../../cusimage/".$product_image)){
        resize_crop_images(750, 500, "../../cusimage/".$product_image, "../../cusimage/".$product_image);
        $sqlImage="INSERT INTO product_image(product_id, image, insert_date) VALUES($id, '$product_image', now())";
        mysql_query($sqlImage)or die(mysql_error());
    }
    }
  }  
}



echo"<script>$error;window.location='../../edit_blogger.php?id=$_REQUEST[id]';</script>";
?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>