<?php
session_start();
require_once '../include/connect.php';
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

$id=$_REQUEST['id'];
$perface=$_REQUEST['perface'];
$name=$_REQUEST['name'];
$lastname=$_REQUEST['lastname'];

$nameOld=$_REQUEST['nameOld'];
$nickname=$_REQUEST['nickname'];
$idcard=$_REQUEST['idcard'];
$status=$_REQUEST['status'];

$sex=$_REQUEST['sex'];
$birthday=$_REQUEST['birthday'];
$address=$_REQUEST['address'];
$addressOriginal=$_REQUEST['addressOriginal'];
$phone=$_REQUEST['phone'];

$email=$_REQUEST['email'];
$disease=$_REQUEST['disease'];
$type=$_REQUEST['type'];
$banknumber=$_REQUEST['banknumber'];
$size=$_REQUEST['size'];
$remark=$_REQUEST['remark'];
$tex=$_REQUEST['tex'];
$texcount=$_REQUEST['texcount'];
$RDlogin=$_REQUEST['RDlogin'];

$RDpassword=$_REQUEST['RDpassword'];
$TSDlogin=$_REQUEST['TSDlogin'];
$TSDpassword=$_REQUEST['TSDpassword'];
$texRemark=$_REQUEST['texRemark'];
$child=$_REQUEST['child'];
$carrier=$_REQUEST['carrier'];
$origin=$_REQUEST['origin'];
$image=time().'-'.$_FILES['Userphoto']['name'];


if ($id == null) {


	if($_FILES['Userphoto']['name'] == ""){

	$image = "default-avatar.png";	
	$mysql->query("INSERT INTO customer (cus_perface, image, cus_name, cus_lastname, cus_nameOld, cus_nickname, cus_idcard, cus_status, cus_sex, cus_birthday, cus_address, cus_addressOri, cus_tel, cus_email, cus_disease, cus_type, cus_bankNo, cus_size, cus_remark, cus_tex, cus_texCount, cus_RDlogin, cus_RDpwd, cus_TSDlogin, cus_TSDpwd, cus_texRemark, cus_child, cus_carrier, cus_origin, member_id) VALUES (%n, %s, %s, %s, %s, %s, %n, %n, %n, %s, %s, %s, %s, %s, %s, %n, %s, %s, %s, %n, %n, %s, %s, %s, %s, %s, %n, %n, %s, %s)",
		array(
			$perface,
			$image,
			$name,
			$lastname,
			$nameOld,
			$nickname,
			$idcard,
			$status,
			$sex,
			$birthday,
			$address,
			$addressOriginal,
			$phone,
			$email,
			$disease,
			$type,
			$banknumber,
			$size,
			$remark,
			$tex,
			$texcount,
			$RDlogin,
			$RDpassword,
			$TSDlogin,
			$TSDpassword,
			$texRemark,
			$child,
			$carrier,
			$origin,
			1,
		)
	);



  






} else {

$image=time().'-'.$_FILES['Userphoto']['name'];
$sql = "INSERT INTO customer (cus_perface, image, cus_name, cus_lastname, cus_nameOld, cus_nickname, cus_idcard, cus_status, cus_sex, cus_birthday, cus_address, cus_addressOri, cus_tel, cus_email) VALUES ('$perface', '$image', '$name', '$lastname', '$nameOld', '$nickname', $idcard, '$status', $sex, '$birthday', '$address', '$addressOriginal', $phone, '$email')";
mysql_query($sql)or die(mysql_error());
$cus_id=mysql_insert_id($sql);
  resize_crop_image(200, 200, $image, $image);

  //อัพโหลดรูปภาพ
  if(move_uploaded_file($_FILES['Userphoto']['tmp_name'],"../uploads/".$image)){
    resize_crop_image(200, 200, "../uploads/".$image, "../uploads/".$image);
    $error="";
  }
  //ถ้าอัพโหลดไม่ได้
  else{
  $error="alert('เกิดการผิดพลาดในการอัพโหลดไฟล์ภาพ กรุณาทำการอัพโหลดใหม่');";   
  }

}
	

	





  for($i=0;$i<count($_FILES['product_image']['name']);$i++){
  if($_FILES['product_image']['name'][$i]!=""){
	$product_image=time().'-'.$_FILES['product_image']['name'][$i];
    if(move_uploaded_file($_FILES['product_image']['tmp_name'][$i],"../uploads/".$product_image)){
      $sqlImage="INSERT INTO cus_image(id_cus, image, insert_date) VALUES($cus_id, '$product_image', now())";
      mysql_query($sqlImage)or die(mysql_error());
	}
  }
}

	$url = '../customer.php?id='.$cus_id;
	header( "Location: $url" );
} else {


if($_FILES['Userphoto']['name'] == ""){

	$mysql->query("UPDATE customer SET cus_perface = %n, cus_name = %s, cus_lastname = %s, cus_nameOld = %s, cus_nickname = %s, cus_idcard = %n, cus_status = %n, cus_sex = %n, cus_birthday = %s, cus_address = %s, cus_addressOri = %s, cus_tel = %s, cus_email = %s, cus_disease = %s, cus_type = %n, cus_bankNo = %s, cus_size = %s, cus_remark = %s, cus_tex = %n, cus_texCount = %n, cus_RDlogin = %s, cus_RDpwd = %s, cus_TSDlogin = %s, cus_TSDpwd = %s, cus_texRemark = %s, cus_child = %n, cus_carrier = %s, cus_origin = %s where id = %n",
		array(
			$perface,
			$name,
			$lastname,
			$nameOld,
			$nickname,
			$idcard,
			$status,
			$sex,
			$birthday,
			$address,
			$addressOriginal,
			$phone,
			$email,
			$disease,
			$type,
			$banknumber,
			$size,
			$remark,
			$tex,
			$texcount,
			$RDlogin,
			$RDpassword,
			$TSDlogin,
			$TSDpassword,
			$texRemark,
			$child,
			$carrier,
			$origin,
			$id,
		)
	);
	$url = '../customer.php?id='.$id;
	header( "Location: $url" );
} else {
$image=time().'-'.$_FILES['Userphoto']['name'];
	$mysql->query("UPDATE customer SET cus_perface = %n, image = %s, cus_name = %s, cus_lastname = %s, cus_nameOld = %s, cus_nickname = %s, cus_idcard = %n, cus_status = %n, cus_sex = %n, cus_birthday = %s, cus_address = %s, cus_addressOri = %s, cus_tel = %s, cus_email = %s, cus_disease = %s, cus_type = %n, cus_bankNo = %s, cus_size = %s, cus_remark = %s, cus_tex = %n, cus_texCount = %n, cus_RDlogin = %s, cus_RDpwd = %s, cus_TSDlogin = %s, cus_TSDpwd = %s, cus_texRemark = %s, cus_child = %n, cus_carrier = %s, cus_origin = %s where id = %n",
		array(
			$perface,
			$image,
			$name,
			$lastname,
			$nameOld,
			$nickname,
			$idcard,
			$status,
			$sex,
			$birthday,
			$address,
			$addressOriginal,
			$phone,
			$email,
			$disease,
			$type,
			$banknumber,
			$size,
			$remark,
			$tex,
			$texcount,
			$RDlogin,
			$RDpassword,
			$TSDlogin,
			$TSDpassword,
			$texRemark,
			$child,
			$carrier,
			$origin,
			$id,
		)
	);


  resize_crop_image(200, 200, $image, $image);

  //อัพโหลดรูปภาพ
  if(move_uploaded_file($_FILES['Userphoto']['tmp_name'],"../uploads/".$image)){
    resize_crop_image(200, 200, "../uploads/".$image, "../uploads/".$image);
    $error="";
  }
  //ถ้าอัพโหลดไม่ได้
  else{
  $error="alert('เกิดการผิดพลาดในการอัพโหลดไฟล์ภาพ กรุณาทำการอัพโหลดใหม่');";   
  }




for($i=0;$i<count($_FILES['product_image']['name']);$i++){
    if($_FILES['product_image']['name'][$i]!=""){
	  $product_image=time().'-'.$_FILES['product_image']['name'][$i];
      if(move_uploaded_file($_FILES['product_image']['tmp_name'][$i],"../uploads/".$product_image)){


        $mysql->query("INSERT INTO cus_image(id_cus, image, insert_date) VALUES(%n, %s, %s)",
		array(
			$id,
			$product_image,
			now(),
			)
        	);
        




	  }
    }
  } 


	$url = '../customer.php?id='.$id;
	header( "Location: $url" );

}
}

if ($_GET['callback'] != null) {
	echo  $_GET['callback']."(".json_encode($arr).")";
} else {
	echo  json_encode($arr);
}

$mysql->close();
?>


</body>
</html>