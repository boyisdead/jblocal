<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
include('../../server/connect.php');
require '../../../mailchimp-mandrill/src/Mandrill.php';

$arr1 = array("status"=>1001, "msg"=>"Send Email successful! Please check link in your email");
$arr2 = array('status' =>1002, "msg" => "Wrong email address or account not yet registered.");
$arr3 = array('status' =>1003, "msg" => "Sorry! Your Email not found.");

$arr4 = array('status' =>1004, "msg" => "Your email address sign in with social.");

$arr5 = array('status' =>1005, "msg" => "Wrong email address or password not yet.");


$email=$_REQUEST['email'];





if (!empty($email)) {

	$sql="SELECT COUNT(*) FROM candidate_profile WHERE email = '".$email."' ";
	$result=mysql_query($sql)or die(mysql_error());
	$row=mysql_fetch_assoc($result);

				if($row['COUNT(*)']!=0){


$sqlset="SELECT * FROM candidate_profile WHERE email = '".$email."' ";
$resultset=mysql_query($sqlset)or die(mysql_error());
$rowset=mysql_fetch_assoc($resultset);


	$token = $rowset['overall_experience'];					








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
                                                            <td height='34' valign='middle' align='center' class='center-stack'><a href='#'><img src='http://www.jbhired.com/img/logo_jbmonster3.png' height='38' alt='Your password ' data-pin-nopin='true'></a></td>
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
                                                                                        <td class='font_fix' style='font-size:16px; mso-line-height-rule:exactly; line-height:20px; color:#555555; font-weight:bold; font-family: 'Montserrat', sans-serif;' align='center'><strong style='font-size:20px; text-transform:uppercase;'>JB Monster</strong> <br>
                                                                                       
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td height='20' style='line-height:20px; '></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style='font-size:14px; mso-line-height-rule:exactly; line-height:18px; color:#95a5a6; font-weight:normal; font-family: Arial, Helvetica, sans-serif;' align='center'>
                                                                                         
                                                                                        
                                                                                       
                                                                                        Your password reset link is: <a href='http://www.jbhired.com/Newpassword?token=$token'>http://jbhired.com/Newpassword?token=$token</a><br>

                                                                                    

                                                                                      
                                                                                        <br>Jbhired admin
                                                                                       


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
        'subject' => 'JBhired verify email',
        'from_email' => 'contact@jbmonster.com',
        'from_name' => 'Password Reset',
        'to' => array(
            array(
                'email' => $email,
                'name' => $username,
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
							

							


							echo  json_encode($arr1);






				}else{


							echo  json_encode($arr3);
						

				}


}else{
	
			echo  json_encode($arr3);
		
}

?>
