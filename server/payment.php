<?php
session_start();
if(isset($_SESSION['ssUsername'])){$username=$_SESSION['ssUsername'];}
else if(!isset($_SESSION['ssUsername'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='../index.php';</script>";exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php

if(!isset($_SESSION['cart'])){echo"<script>alert('Error Data');history.back();</script>";exit;}

$cart=$_SESSION['cart'];
//เชื่อมต่อฐานข้อมูล
include('connect.php'); 
//เพิ่มลงฐานข้อมูล


require '../../mailchimp-mandrill/src/Mandrill.php';

foreach($cart as $id=>$item){

$token = bin2hex(openssl_random_pseudo_bytes(16));
$token1 = "http://www.jbhired.com/refer_friend.php?token=".$token;

$sql="INSERT INTO refer_email(user_id, job_id, links, create_date, refer_email, refer_name, refer_key, refer_phone) VALUES($item[userid], $item[jobid], \"$token1\", now(), '$item[email]', '$item[name]', \"$token\", '$item[phone]')";
mysql_query($sql)or die(mysql_error());


$sql="SELECT * FROM job_post WHERE id=$item[jobid]";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_array($result);

$sql1="SELECT * FROM job_level WHERE id=$row[job_level]";
$result1=mysql_query($sql1)or die(mysql_error());
$row1=mysql_fetch_array($result1);


$sql2="SELECT * FROM category WHERE id=$row[department]";
$result2=mysql_query($sql2)or die(mysql_error());
$row2=mysql_fetch_array($result2);

$sql3="SELECT * FROM candidate_profile WHERE id=$item[userid]";
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
                                                            <td height='34' valign='middle' align='center' class='center-stack'><a href='#'><img src='http://www.jbhired.com/img/logo_jbmonster2.png' height='38' alt='Job refer JBmonster You have been refer as a match for job. Please click link and upload your CV to JB Monter' data-pin-nopin='true'></a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <!-- End Logo -->
                                        
                                                <!-- Start Social -->
                                                <table align='right' cellspacing='0' cellpadding='0' border='0' class='content-width-menu'>
                                                    <tbody>
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
                                                                                        <td class='font_fix' style='font-size:16px; mso-line-height-rule:exactly; line-height:20px; color:#555555; font-weight:bold; font-family: 'Montserrat', sans-serif;' align='center'><strong style='font-size:20px; text-transform:uppercase;'>JB Hired</strong> <br><span style=' color:#df4e66; font-weight:bold; font-size:20px'>JB Hired</span>
                                                                                        Helping your friends find the best new job</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td height='20' style='line-height:20px; '></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style='font-size:14px; mso-line-height-rule:exactly; line-height:18px; color:#95a5a6; font-weight:normal; font-family: Arial, Helvetica, sans-serif;' align='center'>
                                                                                         
                                                                                        
                                                                                        <img src='$row3[file_name]' height='100'  data-pin-nopin='true'><br>
                                                                                        $row3[name] & $row3[email]<br>
                                                                                        Phone : $row3[phone]<br>

                                                                                    

                                                                                        Message : You have been refer as a match for job. Please click link and upload your CV to JBHired.<br>
                                                                                       


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
                                                                                        <td class='font_fix' style='font-family: Montserrat, sans-serif; font-size:28px;mso-line-height-rule:exactly; line-height:28px; font-weight:bold; color:#ffffff;text-decoration:none !important;' align='center'>+66 02 6642278</td>
                                                                                    </tr>                                                                                                                                                       
                                                                                    <tr>
                                                                                        <td class='font_fix' style='font-size:12px; font-family: 'Montserrat', sans-serif; line-height:14px; color:#ffffff; font-weight:bold; padding-top:5px' align='center'>
                                                                                        <a href='#' style='color:#ffffff;text-decoration:none !important;'>contact@jbhired.com</a> - <a href='#'' style='color:#ffffff;text-decoration:none !important; '>www.jbhired.com</a></td>
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
        'subject' => 'Job refer jbhired',
        'from_email' => 'contact@jbmonster.com',
        'from_name' => 'Job referral jbhired',
        'to' => array(
            array(
                'email' => $item['email'],
                'name' => $item['name'],
                'type' => 'to'
            )
        ),
        'headers' => array('Reply-To' => $item['email']),
        
       
        
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
                                                            <td height='34' valign='middle' align='center' class='center-stack'><a href='#'><img src='http://www.jbhired.com/img/logo_jbmonster2.png' height='38' alt='Job refer jbhired You have been refer as a match for job. Please click link and upload your CV to JB Monter' data-pin-nopin='true'></a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <!-- End Logo -->
                                        
                                                <!-- Start Social -->
                                                <table align='right' cellspacing='0' cellpadding='0' border='0' class='content-width-menu'>
                                                    <tbody>
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
                                                                                        <td class='font_fix' style='font-size:16px; mso-line-height-rule:exactly; line-height:20px; color:#555555; font-weight:bold; font-family: 'Montserrat', sans-serif;' align='center'><strong style='font-size:20px; text-transform:uppercase;'>jbhired</strong> <br><span style=' color:#df4e66; font-weight:bold; font-size:20px'>jbhired</span>
                                                                                        Helping your friends find the best new job</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td height='20' style='line-height:20px; '></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style='font-size:14px; mso-line-height-rule:exactly; line-height:18px; color:#95a5a6; font-weight:normal; font-family: Arial, Helvetica, sans-serif;' align='center'>
                                                                                         
                                                                                        
                                                                                        You Refer Job to<br>
                                                                                        $item[name] & $item[email]<br>
                                                                                        Phone : $item[phone]<br>

                                                                                    

                                                                                        Message : You have been refer as a match for job. Please click link and upload your CV to jbhired.<br>
                                                                                       


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
                                                                                        <td class='font_fix' style='font-family: Montserrat, sans-serif; font-size:28px;mso-line-height-rule:exactly; line-height:28px; font-weight:bold; color:#ffffff;text-decoration:none !important;' align='center'>+66 02 6642278</td>
                                                                                    </tr>                                                                                                                                                       
                                                                                    <tr>
                                                                                        <td class='font_fix' style='font-size:12px; font-family: 'Montserrat', sans-serif; line-height:14px; color:#ffffff; font-weight:bold; padding-top:5px' align='center'>
                                                                                        <a href='#' style='color:#ffffff;text-decoration:none !important;'>contact@jbmonster.com</a> - <a href='#'' style='color:#ffffff;text-decoration:none !important; '>www.jbhired.com</a></td>
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
        'subject' => 'Job refer jbhired',
        'from_email' => 'contact@jbmonster.com',
        'from_name' => 'Job referral jbhired',
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








































}

unset($_SESSION['cart']);



header( "location: ../../user-job-refer.php" );
 exit(0);

?>

</body>
</html>
