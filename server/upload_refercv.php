<?php
session_start();


//เชื่อมต่อฐานข้อมูล
include('connect.php');
//เพิ่มลงฐานข้อมูล


require '../../mailchimp-mandrill/src/Mandrill.php';


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

$ipaddress = get_client_ip();

if($ipaddress==""){echo"<script>alert('Data ip error');history.back();</script>";exit;}

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}


$ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents('http://freegeoip.net/json/'.$ip));

$country_user = $details->country_name;

//if($country_user==""){echo"<script>alert('Data country error');history.back();</script>";exit;}
// ต้องมีช่องให้กรอกประเทศ  // ประเทศของผู้ถูก refer != ประเทศผู้กรอกข้อมูล ดึงจากไอพีไม่ได้
// ถ้า get ip ไม่ได้ ซึ่งเกิดขึ้นได้บ่อย จะทำให้ล้มเหลว และแสดงurlของ admin/upload_refercv.php
?>

<!-- InstanceBeginEditable name="EditRegion" -->

<?php
// รับค่า
if($_REQUEST['name']==""){echo"<script>alert('Please insert you name');history.back();</script>";exit;}

if(empty($_FILES['file']['name']) && empty($_REQUEST['dropbox'])){echo"<script>alert('Please select file or dropbox file');history.back();</script>";exit;}

$file = strtolower($_FILES["file"]["name"]);
$sizefile = $_FILES["file"]["size"];
$type= strrchr($file,".");

if($sizefile>2048000)
{
echo"<script>alert('Size file over!');history.back();</script>";exit;
}


if(($type==".jpg")||($type==".jpeg")||($type==".gif")||($type==".png")||($type==".doc")||($type==".docx")||($type==".pdf")||($type==".tif")||($type==".tiff"))
{



$name=$_REQUEST['name'];
$user_id=$_REQUEST['refer'];

$dropbox=$_REQUEST['dropbox'];


$company=$_REQUEST['company'];
if($company==""){$company="-";}


$email=$_REQUEST['email'];
if($email==""){$email="-";}

$tel=$_REQUEST['tel'];
if($tel==""){$tel="-";}

$position=$_REQUEST['position'];
if($position==""){$position="-";}


$country=$_REQUEST['country'];
if($country==""){$country="-";}




$sql5="SELECT * FROM candidate_profile WHERE id = $user_id ";
        $result5=mysql_query($sql5)or die(mysql_error());
        $row5=mysql_fetch_assoc($result5);


$meemail = $row5['email'];
$mename = $row5['name'];
//เปลี่ยนชื่อภาพ


include("connect.php");


if(!empty($_FILES['file']['name']) && !empty($dropbox)){

$image=time().'-'.$_FILES['file']['name'];
//เพิ่มข้อมูลสินค้า
$sql="INSERT INTO refer_cv(ipaddress, country_user, name, user_id, location, position, email, tel, file, dropbox, insert_date)
VALUES('$ipaddress', '$country', \"$name\", $user_id, '$company', '$position', '$email', '$tel', '$image', '$dropbox', now() )";
mysql_query($sql)or die(mysql_error());
//คืนค่าไอดี
$product_id=mysql_insert_id();
//เพิ่มภาพหลัก



if(move_uploaded_file($_FILES['file']['tmp_name'],"../upload/".$image)){
  $error="";
}
//ถ้าอัพโหลดไม่ได้
else {
  $error="alert('เกิดการผิดพลาดในการอัพโหลดไฟล์ภาพ กรุณาทำการอัพโหลดใหม่')";

}
sendemail($name,$meemail,$mename);
//กลับ
$id=base64_encode($product_id);
echo"<script>$error;window.location='../../../refer_success.php';</script>";
}













if(!empty($_FILES['file']['name']) && empty($dropbox)){

$image=time().'-'.$_FILES['file']['name'];
//เพิ่มข้อมูลสินค้า
$sql="INSERT INTO refer_cv(ipaddress, country_user, name, user_id, location, position, email, tel, file, insert_date)
VALUES('$ipaddress', '$country', \"$name\", $user_id, '$company', '$position', '$email', '$tel', '$image', now() )";
mysql_query($sql)or die(mysql_error());
//คืนค่าไอดี
$product_id=mysql_insert_id();
//เพิ่มภาพหลัก



if(move_uploaded_file($_FILES['file']['tmp_name'],"../upload/".$image)){
  $error="";
}
//ถ้าอัพโหลดไม่ได้
else {
  $error="alert('เกิดการผิดพลาดในการอัพโหลดไฟล์ภาพ กรุณาทำการอัพโหลดใหม่')";

}
sendemail($name,$meemail,$mename);
//กลับ
$id=base64_encode($product_id);
echo"<script>$error;window.location='../../../refer_success.php';</script>";
}








if(empty($_FILES['file']['name']) && !empty($dropbox)){

$image=time().'-'.$_FILES['file']['name'];
//เพิ่มข้อมูลสินค้า
$sql="INSERT INTO refer_cv(ipaddress, country_user, name, user_id, location, position, email, tel, dropbox, insert_date)
VALUES('$ipaddress', '$country', \"$name\", $user_id, '$company', '$position', '$email', '$tel', '$dropbox', now() )";
mysql_query($sql)or die(mysql_error());
//คืนค่าไอดี
$product_id=mysql_insert_id();
//เพิ่มภาพหลัก

sendemail($name,$meemail,$mename);
//กลับ
$id=base64_encode($product_id);
echo"<script>$error;window.location='../../../refer_success.php';</script>";
}


}else{
    echo"<script>alert('Please select file (Gif, Jpg, Pdf, Doc, Docx, Tiff)!');history.back();</script>";exit;
}

function sendemail($name,$meemail,$mename){





$message1="

<table id='body-table' align='center' width='100%' bgcolor='#e6e5e7' cellspacing='0' cellpadding='0' border='0' style='table-layout:fixed;'>
    <tbody>
        <tr>
            <td valign='top' bgcolor='#e8e8e8' align='center'>
                <table width='600' bgcolor='#ffffff' align='center' cellspacing='0' cellpadding='0' border='0' class='mobile-width'>
                    <tbody>
                        <tr>
                            <td valign='top' bgcolor='#ffffff' align='center'>
                                <!-- Start Space -->
                                <table width='100%' cellspacing='0' cellpadding='0' border='0' class='full-width'>
                                    <tbody>
                                        <tr>
                                            <td height='26'>&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- Section 1 Starts / Logo social ================  -->
                                <table width='550' align='center' cellspacing='0' cellpadding='0' border='0' class='content-width-menu'>
                                    <tbody>
                                        <tr>
                                            <td height='25' valign='middle' align='left'>
                                                <!-- Start Logo -->
                                                <table width='160' align='left' cellspacing='0' cellpadding='0' border='0' class='full-width'>
                                                    <tbody>
                                                        <tr>
                                                            <td height='34' valign='middle' align='center' class='center-stack'>
                                                                <a href='#'><img src='http://www.jbhired.com/img/logo_jbmonster2.png' height='38' alt='Job Apply jbhired, JB Hired Helping your friends find the best new job' data-pin-nopin='true'></a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <!-- End Logo -->
                                                <!-- Start Social -->
                                                <table align='right' cellspacing='0' cellpadding='0' border='0' class='content-width-menu'>
                                                    <tbody>
                                                        <tr>
                                                            <td height='34' valign='bottom' align='right' class='center'>
                                                                <a style='text-decoration: none; border:0;' href='https://www.facebook.com/jbhired'><img src='http://www.sirispace.com/img/fb_bt.jpg' width='27' height='27' alt='Facebook'></a>
                                                                &nbsp;
                                                                <a style='text-decoration: none; border:0' href='https://www.linkedin.com/company/jb-hired'><img src='http://www.jbhired.com/img/linkedin-logo.jpg' width='27' height='27' alt='linkedin'></a>

                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <!-- End Social -->
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- Section 1 End / Logo social =========================-->
                                <!-- Start Space====================== -->
                                <table width='100%' cellspacing='0' cellpadding='0' border='0' class='full-width'>
                                    <tbody>
                                        <tr>
                                            <td height='25'>&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- End Space==================== -->
                                <!-- Section img principale ==============-->
                                <table bgcolor='#ffffff' width='100%' cellspacing='0 ' cellpadding='0 ' border='0 ' class='full-width '>
                                    <tbody>
                                        <tr>
                                            <td valign='top ' align='left '>
                                                <a href='#'><img src='http://www.jbhired.com/img/bg_head.jpg' class='emailImage' alt='Main banner' border='0' width='600' height='320'></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- Section img principale=============== -->
                                <!-- Section presentazione=============== -->
                                <table width='600' align='center' cellspacing='0' cellpadding='0' border='0' class='mobile-width'>
                                    <tbody>
                                        <tr>
                                            <td align='center'>
                                                <!-- Start Block Content -->
                                                <table width='550' align='center' cellspacing='0' cellpadding='0' border='0' class='content-width'>
                                                    <tbody>
                                                        <tr>
                                                            <td align='center'>
                                                                <!-- Start Column 1 -->
                                                                <table width='100%' align='center' cellspacing='0' cellpadding='0' border='0' class='full-width'>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td height='30'>&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align='center'><img src='http://www.jbhired.com/img/icon_app_jb.png' height='78' data-pin-nopin='true'></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td height='10' style='font-size:10px; mso-line-height-rule:exactly; line-height:10px;'>&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class='font_fix' style='font-size:16px; mso-line-height-rule:exactly; line-height:20px; color:#555555; font-weight:bold; font-family: ' Montserrat ', sans-serif;' align='center'><strong style='font-size:20px; text-transform:uppercase;'>JB Hired</strong>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td height='20' style='line-height:20px; '></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style='font-size:14px; mso-line-height-rule:exactly; line-height:18px; color:#95a5a6; font-weight:normal; font-family: Arial, Helvetica, sans-serif;' align='center'>
                                                                                <h3>Your friend, $name, has sent infomation to you.</h3>
                                                                                <p>Please review the information. Now! <a href='http://www.jbhired.com/refer_links.php' target='_blank'>Refer Link process bar</a>
                                                                                    <p>
                                                                        </tr>
                                                                        <tr>
                                                                            <td height='30'>&nbsp;</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <!-- End Column 1 -->
                                                                </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <!-- End Block Content -->
                                                </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- End Section presentazione ==================-->
                                <!-- Start blocchi ======================= -->
                                <!-- End blocchi ====================== -->
                                <!-- Start prodotti in evidenza ===================-->
                                <!-- End prodotti in evidenza ================== -->
                                <!-- Start footer ================= -->
                                <table width='600' bgcolor='#3d6ef1' align='center' cellspacing='0' cellpadding='0' border='0' class='mobile-width'>
                                    <tbody>
                                        <tr>
                                            <td align='center'>
                                                <!-- Start Block Content -->
                                                <table width='550' align='center' cellspacing='0' cellpadding='0' border='0' class='content-width'>
                                                    <tbody>
                                                        <tr>
                                                            <td valign='top' align='center'>
                                                                <!-- Start Column 1 -->
                                                                <table align='center' cellspacing='0' cellpadding='0' border='0' class='full-width' width='100%'>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td height='50 '>&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class='font_fix ' style='font-size:14px; height:20px; color:#ffffff; font-weight:normal; font-family: Montserrat, sans-serif; ' align='center '>Contact Us</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class='font_fix ' style='font-family: Montserrat, sans-serif; font-size:28px;mso-line-height-rule:exactly; line-height:28px; font-weight:bold; color:#ffffff;text-decoration:none !important; ' align='center '>contact@jbhired.com</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class='font_fix ' style='font-size:12px; font-family: ' Montserrat ', sans-serif; line-height:14px; color:#ffffff; font-weight:bold; padding-top:5px ' align='center '>
                                                                                <a href='#' style='color:#ffffff;text-decoration:none !important; '>www.jbhired.com</a>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <!-- End Column 1 -->
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <!-- End Block Content -->
                                                <!-- Section img footer -->
                                                <table bgcolor='#3d6ef1' width='100%' cellspacing='0' cellpadding='0' border='0' class='full-width'>
                                                    <tbody>
                                                        <tr>
                                                            <td valign='bottom' align='left' height='71'><img src='http://www.jbhired.com/img/bg_footer.jpg' class='emailImage' alt='Main banner' border='0' width='600' height='71' data-pin-nopin='true'></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <!-- Section img footer  -->
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- End footer ==================-->
                                <!-- Start second footer ============ -->
                                <table width='600' bgcolor='#464646' align='center' cellspacing='0' cellpadding='0' border='0' class='mobile-width'>
                                    <tbody>
                                        <tr>
                                            <td align='center'>
                                                <!-- Start Space -->
                                                <table width='550' align='center' cellspacing='0' cellpadding='0' border='0' class='content-width'>
                                                    <tbody>
                                                        <tr>
                                                            <td align='center' valign='middle' style='font-family: Arial, Helvetica, sans-serif;font-size:11px; font-weight:normal; color:#cccccc; padding-top:10px; padding-bottom:10px'>
                                                                <strong>Copyright © 2015 jbhired</strong>
                                                                <br>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <!-- End Space -->
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- End Second footer =========== -->
                                </td>
                        </tr>
                    </tbody>
                </table>
                <!-- End main table white containe -->
                </td>
        </tr>
    </tbody>
</table>
";


try {
    $mandrill = new Mandrill('K0WnG4r5ZF-IDpWUhbWnfg');
    $message = array(
        'html' => $message1,
        'text' => 'Example text content',
        'subject' => 'Contact us JBhired',
        'from_email' => 'contact@jbmonster.com',
        'from_name' => 'JBHired',
        'to' => array(
            array(
                'email' => $meemail,
                'name' => $mename,
                'type' => 'to'
            )
        ),
        'headers' => array('Reply-To' => 'contact@jbmonster.com'),



    );
    $async = false;
    $result = $mandrill->messages->send($message, $async);
    //print_r($result);
    /*
    Array
    (
        [0] => Array
            (
                [email] => recipient.email@example.com
                [status] => sent
                [reject_reason] => hard-bounce
                [_id] => abc123abc123abc123abc123abc123
            )

    )
    */
} catch(Mandrill_Error $e) {
    // Mandrill errors are thrown as exceptions
    echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
    // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
    throw $e;
}







}









?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
