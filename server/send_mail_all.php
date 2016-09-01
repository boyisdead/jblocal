<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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

if(!isset($_REQUEST['subject'])){echo"<script>alert('Error Data');history.back();</script>";exit;}
$subject=$_REQUEST['subject'];


//เชื่อมต่อฐานข้อมูล
include('connect.php'); 
//เพิ่มลงฐานข้อมูล


require '../../mailchimp-mandrill/src/Mandrill.php';


$sqlcom="SELECT * FROM compose WHERE id = $subject ";
$resultcom=mysql_query($sqlcom)or die(mysql_error());
$rowcom=mysql_fetch_assoc($resultcom);



$sqlcc="SELECT * FROM candidate_profile WHERE email != '' ";
$resultcc=mysql_query($sqlcc)or die(mysql_error());


$sql="INSERT INTO Subscribers(compose_id, insert_date) VALUES( $subject, now())";
mysql_query($sql)or die(mysql_error());

for($i=0;$rowcc=mysql_fetch_assoc($resultcc);$i++){ 



$message1="
<table border='0' cellpadding='0' cellspacing='0' width='100%' style='border-collapse:collapse!important'>
    <tbody><tr>
        <td bgcolor='#2D3D4F'>
            <div style='color:#fefefe;font-family:Helvetica,Arial,sans-serif;font-size:1px;line-height:1px;max-height:0px;max-width:0px;overflow:hidden'>jbmonster</div>
            <div align='center' style='padding:0px 15px'>
                <table border='0' cellpadding='0' cellspacing='0' width='500' style='border-collapse:collapse!important'>
                    
                    <tbody><tr>
                        <td style='padding:20px 0px 30px'>
                            <table border='0' cellpadding='0' cellspacing='0' width='100%' style='border-collapse:collapse!important'>
                                <tbody><tr>
                                    <td bgcolor='#2D3D4F' width='100' align='left'>
                                        <a href='http://www.jbmonster.com/' target='_blank'>
                                            <img alt='jbmonster' src='http://www.jbmonster.com/img/Blue-Monster.png' height='42'
                                             style='border:0;color:#ffffff;display:block;font-family:Helvetica,Arial,sans-serif;font-size:16px;min-height:auto;line-height:100%;outline:none;text-decoration:none'>
                                        </a>
                                    </td>
                                    <td bgcolor='#2D3D4F' width='400' align='right'>
                                        <table border='0' cellpadding='0' cellspacing='0' style='border-collapse:collapse!important'>
                                            <tbody><tr>
                                                <td align='right' style='color:#dce2e8;font-family:Arial,sans-serif;font-size:14px;padding:0 0 5px;text-decoration:none'>
                                                <span style='color:#dce2e8;text-decoration:none'>Trending this week<br>See all jobs on 
                                                <a style='color:#dce2e8;text-decoration:none' href='http://www.jbmonster.com/' target='_blank'>JBmonster.com</a></span></td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table>
            </div>
        </td>
    </tr>
</tbody></table>
<table border='0' cellpadding='0' cellspacing='0' width='100%' style='border-collapse:collapse!important'>
    <tbody><tr>
        <td bgcolor='#F5F7FA' align='center' style='padding:70px 15px'>
            <table border='0' cellpadding='0' cellspacing='0' width='500' style='border-collapse:collapse!important'>
                <tbody><tr>
                    <td>
                        <table width='100%' border='0' cellspacing='0' cellpadding='0' style='border-collapse:collapse!important'>
                            <tbody><tr>
                                <td align='center' style='color:#333333;font-family:Helvetica,Arial,sans-serif;font-size:25px'>$rowcom[subject]</td>
                            </tr>
                            <tr>
                                <td align='center' style='color:#333333;font-family:Helvetica,Arial,sans-serif;font-size:14px'>$rowcom[detail]</td>
                            </tr>
                           
                        </tbody></table>
                    </td>
                </tr>
                <tr>
                    <td>
                        
                        <table cellspacing='0' cellpadding='0' border='0' width='100%' style='border-collapse:collapse!important'>
                            <tbody><tr>
                                <td valign='top' style='padding:0'>";


$sqlc="SELECT * FROM job_compose WHERE compose_id = $subject";
                        $resultc=mysql_query($sqlc)or die(mysql_error());
                        for($i=0;$rowc=mysql_fetch_assoc($resultc);$i++){ 

                       $sql="SELECT * FROM job_post WHERE id=$rowc[job_id]";
                        $result=mysql_query($sql)or die(mysql_error());
                        $row=mysql_fetch_array($result);

                        $sql1="SELECT * FROM job_level WHERE id=$row[job_level]";
                        $result1=mysql_query($sql1)or die(mysql_error());
                        $row1=mysql_fetch_array($result1);


                        $sql2="SELECT * FROM category WHERE id=$row[department]";
                        $result2=mysql_query($sql2)or die(mysql_error());
                        $row2=mysql_fetch_array($result2);


                                    $message1.="
                                    <table cellpadding='0' cellspacing='0' border='0' width='47%' align='left' style='border-collapse:collapse!important'>
                                        <tbody><tr>
                                            <td style='padding:20px 0 40px'>
                                                <table cellpadding='0' cellspacing='0' border='0' width='100%' style='border-collapse:collapse!important'>
                                                    <tbody><tr>
                                                        <td align='center' bgcolor='#F5F7FA' valign='middle'><a href='#' target='_blank'>
                                                        <img src='http://www.jbmonster.com/admin/icon/$row[icon]' width='100' height='100' style='border:0;border-radius:10px;color:#666666;display:block;font-family:Helvetica,arial,sans-serif;font-size:13px;min-height:100px;line-height:100%;outline:none;text-decoration:none;width:100px' alt='$row[title]'></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td align='center' style='color:#333333;font-family:Arial,sans-serif;font-size:20px;padding:15px 0 0' bgcolor='#F5F7FA'>$row[title]</td>
                                                    </tr>
                                                    <tr>
                                                        <td align='center' style='color:#666666;font-family:Arial,sans-serif;font-size:14px;line-height:20px;padding:5px 0 0' bgcolor='#F5F7FA'>
                                                            <span>$row2[name] - $row[country]</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td align='center' style='color:#666666;font-family:Arial,sans-serif;font-size:14px;line-height:20px;padding:5px 0 0' bgcolor='#F5F7FA'>
                                                            <span>Refer bonus - $row[refer_bonus]</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td align='center' style='color:#666666;font-family:Arial,sans-serif;font-size:14px;line-height:20px;padding:5px 0 0' bgcolor='#F5F7FA'>
                                                            <a href='http://www.jbmonster.com/job-detail.php?id=$row[id]' style='color:#256f9c;text-decoration:none' target='_blank'>View Job </a></td>
                                                    </tr>
                                                </tbody></table>
                                            </td>
                                        </tr>
                                    </tbody></table>";


                 }                 




                                $message1.="</td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
          
          
            </tbody></table>
        </td>
    </tr>
</tbody></table>


<table border='0' cellpadding='0' cellspacing='0' width='100%' style='border-collapse:collapse!important'>
    <tbody><tr>
        <td bgcolor='#ffffff' align='center' style='padding:20px 0px'>
            
            <table width='500' border='0' cellspacing='0' cellpadding='0' align='center' style='border-collapse:collapse!important'>
                <tbody><tr>
                    <td align='center' style='color:#666666;font-family:Helvetica,Arial,sans-serif;font-size:12px;line-height:18px'>
                        <span style='color:#666666'>JB 16 Raffles Quay, 33-02 Hong Leong Building, Singapore, 048581 </span><br><a style='color:#666666;text-decoration:none' 
                        href='http://www.jbmonster.com/' target='_blank'>contact@jbmonster.com</a>
                    </td>
                </tr>
            </tbody></table>
        </td>
    </tr>
</tbody></table>
";


try {
    $mandrill = new Mandrill('zv7tZcTnxGXafj8KSq9-Vw');
    $message = array(
        'html' => $message1,
        'text' => 'Example text content',
        'subject' => $rowcom['subject'],
        'from_email' => 'contact@jbmonster.com',
        'from_name' => 'JB Monster',
        'to' => array(
            array(
                'email' => $rowcc['email'],
                'name' => $rowcc['name'],
                'type' => 'to'
            )
        ),
        'headers' => array('Reply-To' => $rowcc['email']),
        
       
        
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





header( "location: ../send_compose.php" );
 exit(0);

?>

</body>
</html>
