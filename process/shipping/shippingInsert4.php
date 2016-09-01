<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/backProcess.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<body>
<?php
if($_REQUEST['id']==""){echo"<script>alert('Please insert job id');history.back();</script>";exit;}
$id=$_REQUEST['id'];

if($_REQUEST['user_id']==""){echo"<script>alert('Please user id');history.back();</script>";exit;}
$userid=$_REQUEST['user_id'];
include("../../server/connect.php");
require '../../../mailchimp-mandrill/src/Mandrill.php';


$comment = mysql_escape_string($_REQUEST['comment']);
if($comment==""){$comment="-";}

$sqlch="SELECT * FROM submit_job WHERE job_id=$id AND user_id='$userid'";
$resultch=mysql_query($sqlch)or die(mysql_error());
$num=mysql_num_rows($resultch);







if($num==0){


$sqlu="SELECT * FROM candidate_profile WHERE oauth_uid = '$userid'";
        $resultu=mysql_query($sqlu)or die(mysql_error());
        $rowu=mysql_fetch_assoc($resultu);

$name = $rowu['name'];
$email = $rowu['email'];

$user_ids = $rowu['id'];







$sql="SELECT * FROM job_post WHERE id=$id";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_array($result);



$sql1="SELECT * FROM job_level WHERE id=$row[job_level]";
$result1=mysql_query($sql1)or die(mysql_error());
$row1=mysql_fetch_array($result1);


$sql2="SELECT * FROM category WHERE id=$row[department]";
$result2=mysql_query($sql2)or die(mysql_error());
$row2=mysql_fetch_array($result2);



$title = $row['title'];

$titlenoti = "Job apply update";
$detail = "You have an update job apply from JBhired please check your Dashboard on this link";
$link = "http://m.jbhired.com/dashboard.html";


$sql="INSERT INTO submit_job(name, email, job_id, user_id, job_title, create_date, last_update) VALUES(\"$name\", \"$email\", $id,  \"$userid\", \"$title\", now(), now())";
mysql_query($sql)or die(mysql_error());
$joobapply=mysql_insert_id();


$sql="INSERT INTO noti(title, detail, user_id, link, insert_date) VALUES('$titlenoti', '$detail', $user_ids, '$link', now())";
mysql_query($sql)or die(mysql_error());


if($row[salary] == 0 && $row[max_salary] == 0)
    $salaryRate = "Negotiable";
else
    $salaryRate = number_format($row[salary])." - ".number_format($row[max_salary])." ".$row[currency];


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
                                                            <td height='34' valign='middle' align='center' class='center-stack'><a href='http://www.jbhired.com'><img src='http://www.jbhired.com/img/logo_jbmonster2.png' height='38' alt='Digital, Technology and ecommerce jobs in Asia' data-pin-nopin='true'></a></td>
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
                                                                                        Sorry!, I think you are right for this position. </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td height='20' style='line-height:20px; '></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style='font-size:14px; mso-line-height-rule:exactly; line-height:18px; color:#95a5a6; font-weight:normal; font-family: Arial, Helvetica, sans-serif;' align='center'>
                                                                                         
                                                                                        
                                                                                        <img src='$rowu[file_name]' height='100'  data-pin-nopin='true'><br>
                                                                                        $rowu[name] & $rowu[email]<br>
                                                                                        Phone : $rowu[phone]<br>
                                                                                        $comment.<br>
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
                                                                                        <td style='font-size:13px; mso-line-height-rule:exactly; line-height:16px; color:#333; font-weight:normal; font-family: Arial, Helvetica, sans-serif;'>Salary: $salaryRate</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style='font-size:13px; mso-line-height-rule:exactly; line-height:16px; color:#333; font-weight:normal; font-family: Arial, Helvetica, sans-serif;'>Location: $row[country], $row[city]</td>
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
                                                                                        <td class='font_fix' style='font-family: Montserrat, sans-serif; font-size:28px;mso-line-height-rule:exactly; line-height:28px; font-weight:bold; color:#ffffff;text-decoration:none !important;' align='center'>
                                                                                            contact@jbmonster.com
                                                                                        </td>
                                                                                    </tr>                                                                                                                                                       
                                                                                    <tr>
                                                                                        <td class='font_fix' style='font-size:12px; font-family: 'Montserrat', sans-serif; line-height:14px; color:#ffffff; font-weight:bold; padding-top:5px' align='center'>
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
                                                                        <strong>Copyright © 2015 Jbhired</strong><br></td>
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
        'subject' => 'Job Apply JB Hired',
        'from_email' => $email,
        'from_name' => $name,
        'to' => array(
            array(
                'email' => 'contact@jbmonster.com',
                'name' => 'JB Monster',
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








try {
    $mandrill = new Mandrill('K0WnG4r5ZF-IDpWUhbWnfg');
    $message = array(
        'html' => $message1,
        'text' => 'Example text content',
        'subject' => 'Your Job Recommendation at JB Hired',
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

$id=base64_encode($joobapply);
echo"<script>$error;window.location='../../job-ap-detail.php?id=$id';</script>";













}else{

echo"<script>alert('Wrong Duplicate Job Apply.');history.back();</script>";exit;
   

}



?>
</body>
</html>