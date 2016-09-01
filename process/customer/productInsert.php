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

<!-- InstanceBeginEditable name="EditRegion" -->
<?php
// รับค่า
if($_FILES['image']['name']==""){echo"<script>alert('ยังไม่เลือกรูปภาพ');history.back();</script>";exit;}
if($_REQUEST['name']==""){echo"<script>alert('ยังไม่ใส่ชื่อสินค้า');history.back();</script>";exit;}

if($_REQUEST['iduser']==""){echo"<script>alert('iduser Invalid');history.back();</script>";exit;}

if($_REQUEST['For_Sale']==""){echo"<script>alert('ยังไม่ใส่ type Post For');history.back();</script>";exit;}

$category_id=$_REQUEST['category_id'];

$iduser=$_REQUEST['iduser'];


$sql5="SELECT * FROM users WHERE oauth_uid = '$iduser'";
        $result5=mysql_query($sql5)or die(mysql_error());
        $row5=mysql_fetch_assoc($result5);
        $iduser = $row5['oauth_uid'];
        $Mail = $row5['Mail'];
        $tel = $row5['tel'];

$your_email_contact=$_REQUEST['your_email_contact'];

$your_phone_contact=$_REQUEST['your_phone_contact'];


if($Mail==""||$tel==""){

$sql="UPDATE users SET Mail='$your_email_contact', tel='$your_phone_contact' WHERE oauth_uid = $iduser";
mysql_query($sql)or die(mysql_error());


}










$For_Sale=$_REQUEST['For_Sale'];

$name=$_REQUEST['name'];
if($name==""){$name="ไม่ระบุ";}

$detail = mysql_escape_string($_REQUEST['detail']);
if($detail==""){$detail="ไม่ระบุ";}

$shortdetail=mysql_escape_string($_REQUEST['shortdetail']);
if($shortdetail==""){$shortdetail="ไม่ระบุ";}

$address=$_REQUEST['address'];
if($address==""){$address="ไม่ระบุ";}

$province_id=$_REQUEST['province_id'];
if($province_id==""){$province_id=0;}

$amphur_id=$_REQUEST['amphur_id'];
if($amphur_id==""){$amphur_id=0;}

$district_id=$_REQUEST['district_id'];
if($district_id==""){$district_id=0;}

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

$BTS=$_REQUEST['BTS'];
if($BTS==""){$BTS="-";}

$MRT=$_REQUEST['MRT'];
if($MRT==""){$MRT="-";}


//เปลี่ยนชื่อภาพ
$image=time().'-'.$_FILES['image']['name'];





$rating=$_REQUEST['rating'];
if($rating==""){$rating=5;}




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












include("../../server/connect.php");


$new_id =mysql_result(mysql_query("Select Max(substr(id,-4))+1 as MaxID from  product2"),0,"MaxID");//เลือกเอาค่า id ที่มากที่สุดในฐานข้อมูลและบวก 1 เข้าไปด้วยเลย
            if($new_id==''){ // ถ้าได้เป็นค่าว่าง หรือ null ก็แสดงว่ายังไม่มีข้อมูลในฐานข้อมูล
                $std_id="S0001";
            }else{
                $std_id="S".sprintf("%04d",$new_id);//ถ้าไม่ใช่ค่าว่าง
            }





//เพิ่มข้อมูลสินค้า
$sql="INSERT INTO product2(id, category_id, For_Sale, name, detail, shortdetail, address, province_id, amphur_id, district_id, lat, lng, Size, Floors, Bedrooms, Bathrooms, Living, Maid, Parking, Price, Cable, Wifi, Poll, Fitness, allowed, Accessibiliy, Restaurant, image, rating, BTS, MRT, Refer, Owner, insert_date, last_update) 
VALUES('$std_id', $category_id, $For_Sale, \"$name\", \"$detail\", \"$shortdetail\", \"$address\", $province_id, $amphur_id, $district_id, '$lat', '$lng', $Size, $Floors, $Bedrooms, $Bathrooms, $Living, $Maid, $Parking, $Price, $Cable, $Wifi, $Poll, $Breakfast, $allowed, $Accessibiliy, $Parking2, '$image', $rating, '$BTS', '$MRT', $Refer, '$iduser', now(), now())";
mysql_query($sql)or die(mysql_error());
//คืนค่าไอดี
$product_id=mysql_insert_id();
//เพิ่มภาพหลัก

resize_crop_image(450, 300, $image, $image);

if(move_uploaded_file($_FILES['image']['tmp_name'],"../../cusimage/".$image)){
  resize_crop_image(450, 300, "../../cusimage/".$image, "../../cusimage/".$image);
  $error="";
}
//ถ้าอัพโหลดไม่ได้
else {
  $error="alert('เกิดการผิดพลาดในการอัพโหลดไฟล์ภาพ กรุณาทำการอัพโหลดใหม่')";
}


//เพิ่มภาพประกอบ
for($i=0;$i<count($_FILES['product_image']['name']);$i++){
  if($_FILES['product_image']['name'][$i]!=""){
	$product_image=time().'-'.$_FILES['product_image']['name'][$i];
    if(move_uploaded_file($_FILES['product_image']['tmp_name'][$i],"../../cusimage/".$product_image)){
      resize_crop_images(750, 500, "../../cusimage/".$product_image, "../../cusimage/".$product_image);
      $sqlImage="INSERT INTO product_image2(product_id, image, insert_date) VALUES('$std_id', '$product_image', now())";
      mysql_query($sqlImage)or die(mysql_error());
	}
  }
}

//กลับ
$id=base64_encode($product_id);
echo"<script>$error;window.location='../../../user-profile-$iduser';</script>";
?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>