<?php
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php

if(!isset($_REQUEST['id'])){echo"<script>alert('Error Data');history.back();</script>";exit;}
if(!isset($_REQUEST['name'])){echo"<script>alert('Please insert name');history.back();</script>";exit;}
if(!isset($_REQUEST['country'])){echo"<script>alert('Please insert country');history.back();</script>";exit;}
if(!isset($_REQUEST['email'])){echo"<script>alert('Please insert email');history.back();</script>";exit;}

//เชื่อมต่อฐานข้อมูล
include('connect.php'); 
//เพิ่มลงฐานข้อมูล


require '../../mailchimp-mandrill/src/Mandrill.php';



$name=$_REQUEST['name'];
$id=$_REQUEST['id'];
$userid=$_REQUEST['userid'];
$country=$_REQUEST['country'];

$email=$_REQUEST['email'];

$phone=$_REQUEST['phone'];
if($phone==""){$phone="-";}

$massage=$_REQUEST['massage'];
if($massage==""){$massage="-";}

$dropbox=$_REQUEST['dropbox'];

$reason=$_REQUEST['reason'];


$titlenoti = "Job refer update";
$detail = "You have an update job refer from JBhired please check your Dashboard on this link";
$link = "http://m.jbhired.com/dashboard.html";


$token = bin2hex(openssl_random_pseudo_bytes(16));
$token1 = "http://www.jbhired.com/refer_friend.php?token=".$token;

//$sql="INSERT INTO refer_email(user_id, job_id, links, create_date, refer_email, refer_name, refer_key, refer_phone) VALUES($item[userid], $item[jobid], \"$token1\", now(), '$item[email]', '$item[name]', \"$token\", '$item[phone]')";
//mysql_query($sql)or die(mysql_error());

if($reason == 2){

$sql="INSERT INTO refer_email(user_id, job_id, job_title, links, create_date, refer_email, refer_name, refer_key, refer_phone, refer_body) 
VALUES($userid, $id, '$country', \"$token1\", now(), '$email', '$name', \"$token\", '$phone', \"$massage\")";
mysql_query($sql)or die(mysql_error());


$sql="INSERT INTO noti(title, detail, user_id, link, insert_date) VALUES('$titlenoti', '$detail', $userid, '$link', now())";
mysql_query($sql)or die(mysql_error());

}else if($reason == 1){




if($_FILES['file']['name']!=""){
$image=time().'-'.$_FILES['file']['name'];


$sql="INSERT INTO refer_email(user_id, job_id, job_title, links, create_date, refer_email, refer_name, refer_key, refer_phone, refer_cv) 
VALUES($userid, $id, '$country', \"$token1\", now(), '$email', '$name', \"$token\", '$phone', '$image')";
mysql_query($sql)or die(mysql_error());


$sql="INSERT INTO noti(title, detail, user_id, link, insert_date) VALUES('$titlenoti', '$detail', $userid, '$link', now())";
mysql_query($sql)or die(mysql_error());


if(move_uploaded_file($_FILES['file']['tmp_name'],"../cv/".$image)){
  $error="";
}
//ถ้าอัพโหลดไม่ได้
else {
  $error="alert('เกิดการผิดพลาดในการอัพโหลดไฟล์ภาพ กรุณาทำการอัพโหลดใหม่')";
}


}else if($dropbox != ""){

    $sql="INSERT INTO refer_email(user_id, job_id, job_title, links, create_date, refer_email, refer_name, refer_key, refer_phone, refer_cv) 
VALUES($userid, $id, '$country', \"$token1\", now(), '$email', '$name', \"$token\", '$phone', '$dropbox')";
mysql_query($sql)or die(mysql_error());

$sql="INSERT INTO noti(title, detail, user_id, link, insert_date) VALUES('$titlenoti', '$detail', $userid, '$link', now())";
mysql_query($sql)or die(mysql_error());

}else{


$sql="INSERT INTO refer_email(user_id, job_id, job_title, links, create_date, refer_email, refer_name, refer_key, refer_phone) 
VALUES($userid, $id, '$country', \"$token1\", now(), '$email', '$name', \"$token\", '$phone')";
mysql_query($sql)or die(mysql_error());

$sql="INSERT INTO noti(title, detail, user_id, link, insert_date) VALUES('$titlenoti', '$detail', $userid, '$link', now())";
mysql_query($sql)or die(mysql_error());

}






}else{

$sql="INSERT INTO refer_email(user_id, job_id, job_title, links, create_date, refer_email, refer_name, refer_key, refer_phone) 
VALUES($userid, $id, '$country', \"$token1\", now(), '$email', '$name', \"$token\", '$phone')";
mysql_query($sql)or die(mysql_error());


$sql="INSERT INTO noti(title, detail, user_id, link, insert_date) VALUES('$titlenoti', '$detail', $userid, '$link', now())";
mysql_query($sql)or die(mysql_error());

}




$sql="SELECT * FROM job_post WHERE id=$id";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_array($result);

$sql1="SELECT * FROM job_level WHERE id=$row[job_level]";
$result1=mysql_query($sql1)or die(mysql_error());
$row1=mysql_fetch_array($result1);


$sql2="SELECT * FROM category WHERE id=$row[department]";
$result2=mysql_query($sql2)or die(mysql_error());
$row2=mysql_fetch_array($result2);

$sql3="SELECT * FROM candidate_profile WHERE id=$userid";
$result3=mysql_query($sql3)or die(mysql_error());
$row3=mysql_fetch_array($result3);








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
                                                            <td height='34' valign='middle' align='center' class='center-stack'><a href='http://www.jbhired.com/'>
                                                            <img src='http://www.jbhired.com/img/logo_jbmonster3.png' height='38' alt='Asia s #1 Digital Digital Job Network' data-pin-nopin='true'></a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <!-- End Logo -->
                                        
                                                <!-- Start Social -->
                                                <table align='right' cellspacing='0' cellpadding='0' border='0' class='content-width-menu'>
                                                    <tbody>
                                                    <tr>
                                                            <td height='34' valign='bottom' align='right' class='center'>
                                                               Follow Us                                                  
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td height='34' valign='bottom' align='right' class='center'>
                                                                <a style='text-decoration: none; border:0;' href='#'><img src='http://www.sirispace.com/img/fb_bt.jpg' width='27' height='27' alt='Facebook'></a>
                                                            &nbsp;
                                                                <a style='text-decoration: none; border:0' href='#'><img src='http://www.jbhired.com/img/linkedin-logo.jpg' width='27' height='27' alt='linkedin'></a>
                                                            &nbsp;
                                                                <a style='text-decoration: none; border:0' href='#'><img src='http://www.sirispace.com/img/twitter_bt.jpg' width='27' height='27' alt='Youtube'></a>                                                    
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
                              <table bgcolor='#ffffff' width='100%'' cellspacing='0' cellpadding='0' border='0' class='full-width'>
                                                <tbody>
                                                    <tr>
                                                        <td valign='top' align='left'><a href='#''><img src='http://www.jbhired.com/img/bg_head.jpg' class='emailImage' alt='Main banner' border='0' width='600' height='320'></a></td>
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
                                                                                        <td align='center'><img src='http://www.jbhired.com/img/icon_app_jb.png' height='78'  data-pin-nopin='true'></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td height='10' style='font-size:10px; mso-line-height-rule:exactly; line-height:10px;'>&nbsp;</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class='font_fix' style='font-size:16px; mso-line-height-rule:exactly; line-height:20px; color:#555555; font-weight:bold; font-family: 'Montserrat', sans-serif;' align='center'>
                                                                                        Thank you for your application through JB HIRED</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td height='20' style='line-height:20px; '></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style='font-size:14px; mso-line-height-rule:exactly; line-height:18px; color:#95a5a6; font-weight:normal; font-family: Arial, Helvetica, sans-serif;' align='center'>
                                                                                         
                                                                                        
                                                                                        <img src='$row3[file_name]' height='100'  data-pin-nopin='true'><br>
                                                                                        $row3[name] & $row3[email]<br>
                                                                                        Phone : $row3[phone]<br>

                                                                                    
                                                                                         Message : $massage <br>
                                                                                       Next steps will be:  JBHIRED team will contact you to discuss further.<br> Please click link and upload your CV for this job.
                                                                                       


                                                                                    </tr>
                                                                                    <tr>
                                                                                    <td align='center'>
                                                                                            <table cellspacing='0' cellpadding='0' border='0' align='center'>
                                                                                                <tbody>
                                                                                                    <tr>

                                                                                        <td align='center' style='border-radius:3px; color:#ffffff; display:block; font-family: Arial, Helvetica, sans-serif; font-size:12px; line-height:12px; text-align:center; text-decoration:none; padding-top: 10px; padding-bottom: 10px; width:110px; -webkit-text-size-adjust:none; background-color:#4cae4c'>
                                                                                                        <a style='color:#ffffff;font-family: Arial, Helvetica, sans-serif; font-size:12px; text-decoration:none !important' href='$token1'>Upload CV</a>
                                                                                            </td> 

                                                                                            </tr>
                                                                                                </tbody>
                                                                                            </table>         
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td height='20' style='font-size:20px; mso-line-height-rule:exactly; line-height:20px;'>&nbsp;</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align='center'>
                                                                                            <table cellspacing='0' cellpadding='0' border='0' align='center'>
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td align='center' style='border-radius:3px; color:#ffffff; display:block; font-family: Arial, Helvetica, sans-serif; font-size:12px; line-height:12px; text-align:center; text-decoration:none; padding-top: 10px; padding-bottom: 10px; width:110px; -webkit-text-size-adjust:none; background-color:#51bce6'>
                                                                                                        <a style='color:#ffffff;font-family: Arial, Helvetica, sans-serif; font-size:12px; text-decoration:none !important' href='http://www.jbhired.com/'>Go to website</a></td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>                                                
                                                                                        </td>
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
                                            </table><!-- End Section presentazione ==================-->
                                            
                                            <!-- Start blocchi ======================= -->
                                            <!-- End blocchi ====================== -->
                              
                               <!-- Start prodotti in evidenza ===================-->
                                            <!-- End prodotti in evidenza ================== -->
                              
                               <!-- Start nuovi prodotti ====================== -->
                              <table width='600' align='center' cellspacing='0' cellpadding='0' border='0' class='mobile-width' bgcolor='#ffffff'>
                                                    <tbody>
                                                        <tr>
                                                            <td align='center'> 
                                                            
                                                                <!-- Start Space -->
                                                                <table width='100%' cellspacing='0' cellpadding='0' border='0' class='full-width'>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class='font_fix' align='center' bgcolor='#e45166' style='color:#ffffff;font-weight:bold; font-family: Montserrat, sans-serif; font-size:18px; text-transform:uppercase; padding-top:10px; padding-bottom:10px'>- Job Detail -</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>    
                                                                <!-- End Space -->
                                                                
                                                                <table width='550' align='center' cellspacing='0' cellpadding='0' border='0' class='content-width' bgcolor='#ffffff'>
                                                                <tbody>
                                                                <tr>
                                                                <td align='left'>
                                                                            
                                                            <!-- Start prodotto =========-->
                                                            <table width='550' bgcolor='#ffffff' align='center' cellspacing='0' cellpadding='0' border='0' class='content-width' style='border-bottom:1px solid #ddd;'>
                                                                <tbody>
                                                                    <!-- Start Space -->
                                                                    <tr>
                                                                        <td height='30'>&nbsp;</td>
                                                                    </tr>
                                                                    <!-- End Space -->
                                                                    <tr>
                                                                        <td align='left'>
                                                                            <!-- Start Column 1 -->
                                                                            <table width='110' align='left' cellspacing='0' cellpadding='0' border='0'>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td bgcolor='#FFFFFF' height='110' align='center' valign='middle' style='border:1px solid #ddd;''><a href='#''><img src='http://www.jbhired.com/admin/icon/$row[icon]' width='104' height='106'  data-pin-nopin='true'></a></td>
                                                                                    </tr>                                                                               
                                                                                    
                                                                                </tbody>
                                                                            </table>                                                                        
                                                                            <!-- End Column 1 -->
                                                                            
                                                                            <!-- Start Space -->
                                                                            <table align='left' cellspacing='0' width='15' cellpadding='0' border='0' class='full-width'>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td width='15' height='25' style='font-size: 15px; line-height: 15px;'>&nbsp;                                                       
                                                                                        
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <!-- End Space -->
                                                                            
                                                                            <!-- Start Column 1 -->
                                                                            <table width='415' align='left' cellspacing='0' cellpadding='0' border='0' class='full-width'>
                                                                                <tbody>                                                                             
                                                                                    <tr>
                                                                                        <td align='left' class='font_fix' style='font-size:16px; color:#2c3e50; font-weight:bold; font-family: 'Montserrat', sans-serif; line-height:18px'>
                                                                                        <a href='#' style='color:#2c3e50; text-decoration:none !important'>$row[title]</a>, JOB ID: $row[id]</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td height='26' align='left'><img src='http://www.sirispace.com/img/green_line.jpg' width='30'  ></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style='font-size:13px; mso-line-height-rule:exactly; line-height:16px; color:#333; font-weight:normal; font-family: Arial, Helvetica, sans-serif;'>Level: $row1[name]</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style='font-size:13px; mso-line-height-rule:exactly; line-height:16px; color:#333; font-weight:normal; font-family: Arial, Helvetica, sans-serif;'>Department: $row2[name]</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style='font-size:13px; mso-line-height-rule:exactly; line-height:16px; color:#333; font-weight:normal; font-family: Arial, Helvetica, sans-serif;'>Salary: $row[salary] - $row[max_salary] THB</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style='font-size:13px; mso-line-height-rule:exactly; line-height:16px; color:#333; font-weight:normal; font-family: Arial, Helvetica, sans-serif;'>Location: $row[country], $row[city]</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style='font-size:13px; mso-line-height-rule:exactly; line-height:16px; color:#333; font-weight:normal; font-family: Arial, Helvetica, sans-serif;'>

                                                                                        $row[description]</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td height='20' style='font-size:20px; line-height:20px;'>&nbsp;</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align='left'>
                                                                                            <table align='left' cellspacing='0' cellpadding='0' border='0'>
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td align='left' style='border-radius:3px; color:#ffffff; display:block; font-family: Arial, Helvetica, sans-serif; font-size:12px; line-height:12px; text-align:center; text-decoration:none; padding-top: 10px; padding-bottom: 10px; width:90px; -webkit-text-size-adjust:none; background-color:#51bce6'>
                                                                                                        <a style='color:#ffffff;font-family: Arial, Helvetica, sans-serif; font-size:12px; text-decoration:none !important; ' href='http://www.jbhired.com/job-detail.php?id=$row[id]'>Read more</a></td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    <!-- Start Space -->
                                                                    <tr>
                                                                        <td height='30'>&nbsp;</td>
                                                                    </tr>
                                                                    <!-- End Space -->
                                                                </tbody>
                                                            </table><!-- End prodotto =========== -->
                                                            
                                                            <!-- Start prodotto ============ -->
                                                            <!-- End prodotto ==================== -->
                            
                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                              </table><!-- End nuovi prodotti -->
                              
                              
                               <!-- Start offerte =============== -->
                              <!-- End offerte ======================= -->
                              
                              <!-- Start blog posts ================== -->
                               <!-- End blog posts ================= -->    
                                                
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
                                                                            <table align='center' cellspacing='0' cellpadding='0' border='0' class='full-width' width='100%''>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td height='50'>&nbsp;</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class='font_fix' style='font-size:14px; height:20px; color:#ffffff; font-weight:normal; font-family: Montserrat, sans-serif;' align='center'>Contact Us</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class='font_fix' style='font-family: Montserrat, sans-serif; font-size:28px;mso-line-height-rule:exactly; line-height:28px; font-weight:bold; color:#ffffff;text-decoration:none !important;' align='center'>contact@jbhired.com</td>
                                                                                    </tr>                                                                                                                                                       
                                                                                    <tr>
                                                                                        <td class='font_fix' style='font-size:12px; font-family: 'Montserrat', sans-serif; line-height:14px; color:#ffffff; font-weight:bold; padding-top:5px' align='center'>
                                                                                        <a href='#'' style='color:#ffffff;text-decoration:none !important; '>www.jbhired.com</a></td>
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
                                                </table> <!-- End footer ==================-->
                                                
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
                                                                        <strong>Copyright © 2015 jbhired</strong><br></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <!-- End Space -->
                                                      </td>
                                                  </tr>
                                              </tbody>
                              </table><!-- End Second footer =========== -->
                            
            </td>
        </tr>
    </tbody>
</table><!-- End main table white containe -->
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
        'subject' => 'Your Job Application at JBHIRED',
        'from_email' => 'contact@jbmonster.com',
        'from_name' => 'JB HIRED',
        'to' => array(
            array(
                'email' => $email,
                'name' => $name,
                'type' => 'to'
            )
        ),
        'headers' => array('Reply-To' => $email),
        
       
        
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

































$message2="
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
                                                            <a href='#'>
                                                            <img src='http://www.jbhired.com/img/logo_jbmonster3.png' height='35' alt='Asia s #1 Digital Digital Job Network ' data-pin-nopin='true'></a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <!-- End Logo -->
                                        
                                                <!-- Start Social -->
                                                <table align='right' cellspacing='0' cellpadding='0' border='0' class='content-width-menu'>
                                                    <tbody>
                                                    
                                                        <tr>
                                                            <td height='34' valign='bottom' align='right' class='center'>
                                                                <a style='text-decoration: none; border:0;' href='#'><img src='http://www.sirispace.com/img/fb_bt.jpg' width='27' height='27' alt=''></a>
                                                            &nbsp;
                                                                <a style='text-decoration: none; border:0' href='#'><img src='http://www.jbhired.com/img/linkedin-logo.jpg' width='27' height='27' alt=''></a>
                                                            &nbsp;
                                                                <a style='text-decoration: none; border:0' href='#'><img src='http://www.sirispace.com/img/twitter_bt.jpg' width='27' height='27' alt=''></a>                                                    
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
                              <table bgcolor='#ffffff' width='100%'' cellspacing='0' cellpadding='0' border='0' class='full-width'>
                                                <tbody>
                                                    <tr>
                                                        <td valign='top' align='left'><a href='#''><img src='http://www.jbhired.com/img/bg_head.jpg' class='emailImage' alt='' border='0' width='600' height='320'></a></td>
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
                                                                                        <td align='center'><img src='http://www.jbhired.com/img/icon_app_jb.png' height='78'  data-pin-nopin='true'></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td height='10' style='font-size:10px; mso-line-height-rule:exactly; line-height:10px;'>&nbsp;</td>
                                                                                    </tr>
                                                                                    
                                                                                    <tr>
                                                                                        <td height='20' style='line-height:20px; '></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style='font-size:14px; mso-line-height-rule:exactly; line-height:18px; color:#95a5a6; font-weight:normal; font-family: Arial, Helvetica, sans-serif;' align='center'>
                                                                                         
                                                                                        
                                                                                        You have been recommended for a job by<br>
                                                                                       Referral Name $name & $email<br>
                                                                                        Phone : $phone<br>

                                                                                    

                                                                                        Your friend thinks you are a great match for this job.<br> Please click link and upload your CV for this job.
                                                                                       


                                                                                    </tr>
                                                                                    <tr>
                                                                                    <td align='center'>
                                                                                            <table cellspacing='0' cellpadding='0' border='0' align='center'>
                                                                                                <tbody>
                                                                                                    <tr>

                                                                                        <td align='center' style='border-radius:3px; color:#ffffff; display:block; font-family: Arial, Helvetica, sans-serif; font-size:12px; line-height:12px; text-align:center; text-decoration:none; padding-top: 10px; padding-bottom: 10px; width:110px; -webkit-text-size-adjust:none; background-color:#4cae4c'>
                                                                                                        <a style='color:#ffffff;font-family: Arial, Helvetica, sans-serif; font-size:12px; text-decoration:none !important' href='$token1'>Upload CV</a>
                                                                                            </td> 

                                                                                            </tr>
                                                                                                </tbody>
                                                                                            </table>  
                                                                                            </td>       
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td height='20' style='font-size:20px; mso-line-height-rule:exactly; line-height:20px;'>&nbsp;</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align='center'>
                                                                                            <table cellspacing='0' cellpadding='0' border='0' align='center'>
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td align='center' style='border-radius:3px; color:#ffffff; display:block; font-family: Arial, Helvetica, sans-serif; font-size:12px; line-height:12px; text-align:center; text-decoration:none; padding-top: 10px; padding-bottom: 10px; width:110px; -webkit-text-size-adjust:none; background-color:#51bce6'>
                                                                                                        <a style='color:#ffffff;font-family: Arial, Helvetica, sans-serif; font-size:12px; text-decoration:none !important' href='http://www.jbhired.com/'>Go to website</a></td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>                                                
                                                                                        </td>
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
                                            </table><!-- End Section presentazione ==================-->
                                            
                                            <!-- Start blocchi ======================= -->
                                            <!-- End blocchi ====================== -->
                              
                               <!-- Start prodotti in evidenza ===================-->
                                            <!-- End prodotti in evidenza ================== -->
                              
                               <!-- Start nuovi prodotti ====================== -->
                              <table width='600' align='center' cellspacing='0' cellpadding='0' border='0' class='mobile-width' bgcolor='#ffffff'>
                                                    <tbody>
                                                        <tr>
                                                            <td align='center'> 
                                                            
                                                                <!-- Start Space -->
                                                                <table width='100%' cellspacing='0' cellpadding='0' border='0' class='full-width'>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class='font_fix' align='center' bgcolor='#e45166' style='color:#ffffff;font-weight:bold; font-family: Montserrat, sans-serif; font-size:18px; text-transform:uppercase; padding-top:10px; padding-bottom:10px'>- Job Detail -</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>    
                                                                <!-- End Space -->
                                                                
                                                                <table width='550' align='center' cellspacing='0' cellpadding='0' border='0' class='content-width' bgcolor='#ffffff'>
                                                                <tbody>
                                                                <tr>
                                                                <td align='left'>
                                                                            
                                                            <!-- Start prodotto =========-->
                                                            <table width='550' bgcolor='#ffffff' align='center' cellspacing='0' cellpadding='0' border='0' class='content-width' style='border-bottom:1px solid #ddd;'>
                                                                <tbody>
                                                                    <!-- Start Space -->
                                                                    <tr>
                                                                        <td height='30'>&nbsp;</td>
                                                                    </tr>
                                                                    <!-- End Space -->
                                                                    <tr>
                                                                        <td align='left'>
                                                                            <!-- Start Column 1 -->
                                                                            <table width='110' align='left' cellspacing='0' cellpadding='0' border='0'>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td bgcolor='#FFFFFF' height='110' align='center' valign='middle' style='border:1px solid #ddd;''><a href='#''><img src='http://www.jbhired.com/admin/icon/$row[icon]' width='104' height='106'  data-pin-nopin='true'></a></td>
                                                                                    </tr>                                                                               
                                                                                    
                                                                                </tbody>
                                                                            </table>                                                                        
                                                                            <!-- End Column 1 -->
                                                                            
                                                                            <!-- Start Space -->
                                                                            <table align='left' cellspacing='0' width='15' cellpadding='0' border='0' class='full-width'>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td width='15' height='25' style='font-size: 15px; line-height: 15px;'>&nbsp;                                                       
                                                                                        
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <!-- End Space -->
                                                                            
                                                                            <!-- Start Column 1 -->
                                                                            <table width='415' align='left' cellspacing='0' cellpadding='0' border='0' class='full-width'>
                                                                                <tbody>                                                                             
                                                                                    <tr>
                                                                                        <td align='left' class='font_fix' style='font-size:16px; color:#2c3e50; font-weight:bold; font-family: 'Montserrat', sans-serif; line-height:18px'>
                                                                                        <a href='#' style='color:#2c3e50; text-decoration:none !important'>$row[title]</a>, JOB ID: $row[id]</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td height='26' align='left'><img src='http://www.sirispace.com/img/green_line.jpg' width='30'  ></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style='font-size:13px; mso-line-height-rule:exactly; line-height:16px; color:#333; font-weight:normal; font-family: Arial, Helvetica, sans-serif;'>Level: $row1[name]</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style='font-size:13px; mso-line-height-rule:exactly; line-height:16px; color:#333; font-weight:normal; font-family: Arial, Helvetica, sans-serif;'>Department: $row2[name]</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style='font-size:13px; mso-line-height-rule:exactly; line-height:16px; color:#333; font-weight:normal; font-family: Arial, Helvetica, sans-serif;'>Salary: $row[salary] - $row[max_salary] THB</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style='font-size:13px; mso-line-height-rule:exactly; line-height:16px; color:#333; font-weight:normal; font-family: Arial, Helvetica, sans-serif;'>Location: $row[country], $row[city]</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style='font-size:13px; mso-line-height-rule:exactly; line-height:16px; color:#333; font-weight:normal; font-family: Arial, Helvetica, sans-serif;'>

                                                                                        $row[description]</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td height='20' style='font-size:20px; line-height:20px;'>&nbsp;</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align='left'>
                                                                                            <table align='left' cellspacing='0' cellpadding='0' border='0'>
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td align='left' style='border-radius:3px; color:#ffffff; display:block; font-family: Arial, Helvetica, sans-serif; font-size:12px; line-height:12px; text-align:center; text-decoration:none; padding-top: 10px; padding-bottom: 10px; width:90px; -webkit-text-size-adjust:none; background-color:#51bce6'>
                                                                                                        <a style='color:#ffffff;font-family: Arial, Helvetica, sans-serif; font-size:12px; text-decoration:none !important; ' href='http://www.jbhired.com/job-detail.php?id=$row[id]'>Read more</a></td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    <!-- Start Space -->
                                                                    <tr>
                                                                        <td height='30'>&nbsp;</td>
                                                                    </tr>
                                                                    <!-- End Space -->
                                                                </tbody>
                                                            </table><!-- End prodotto =========== -->
                                                            
                                                            <!-- Start prodotto ============ -->
                                                            <!-- End prodotto ==================== -->
                            
                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                              </table><!-- End nuovi prodotti -->
                              
                              
                               <!-- Start offerte =============== -->
                              <!-- End offerte ======================= -->
                              
                              <!-- Start blog posts ================== -->
                               <!-- End blog posts ================= -->    
                                                
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
                                                                            <table align='center' cellspacing='0' cellpadding='0' border='0' class='full-width' width='100%''>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td height='50'>&nbsp;</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class='font_fix' style='font-size:14px; height:20px; color:#ffffff; font-weight:normal; font-family: Montserrat, sans-serif;' align='center'>Contact Us</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class='font_fix' style='font-family: Montserrat, sans-serif; font-size:28px;mso-line-height-rule:exactly; line-height:28px; font-weight:bold; color:#ffffff;text-decoration:none !important;' align='center'>contact@jbhired.com</td>
                                                                                    </tr>                                                                                                                                                       
                                                                                    <tr>
                                                                                        <td class='font_fix' style='font-size:12px; font-family: 'Montserrat', sans-serif; line-height:14px; color:#ffffff; font-weight:bold; padding-top:5px' align='center'>
                                                                                        <a href='#'' style='color:#ffffff;text-decoration:none !important; '>www.jbhired.com</a></td>
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
                                                </table> <!-- End footer ==================-->
                                                
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
                                                                        <strong>Copyright © 2015 jbhired</strong><br></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <!-- End Space -->
                                                      </td>
                                                  </tr>
                                              </tbody>
                              </table><!-- End Second footer =========== -->
                            
            </td>
        </tr>
    </tbody>
</table><!-- End main table white containe -->
</td>
</tr>
</tbody>
</table>
";


try {
    $mandrill = new Mandrill('K0WnG4r5ZF-IDpWUhbWnfg');
    $message = array(
        'html' => $message2,
        'text' => 'Example text content',
         'subject' => 'Your Job Application at JBHIRED',
        'from_email' => 'contact@jbmonster.com',
        'from_name' => 'JB HIRED',
        'to' => array(
            array(
                'email' => $row3['email'],
                'name' => $row3['name'],
                'type' => 'to'
            )
        ),
        'headers' => array('Reply-To' => $row3['email']),
        
       
        
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














































header( "location: http://m.jbhired.com/success_refer.html?id=".$id."" );
 exit(0);

?>

</body>
</html>
