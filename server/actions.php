<?php
session_start();
if(isset($_SESSION['ssUsername'])){$username=$_SESSION['ssUsername'];}
else if(!isset($_SESSION['ssUsername'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}
require_once 'connect.php';

?>
<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
<head>
<meta charset="utf-8"></head>
<body>
<?php


$id=$_REQUEST['id'];
$action=$_REQUEST['action'];

/////// comment  ////////

$comment= mysql_real_escape_string($_REQUEST['comment']);

$rating=$_REQUEST['rating'];
$name=$_REQUEST['name'];
$user_id=$_REQUEST['user_id'];

/////// comment  ////////

switch ($action) {
    case "postcomment":
          $sql="INSERT INTO webboard_reply(post_id, detail, user_id, username, rating, insert_date, last_update) 
       VALUES($id, \"$comment\", $user_id, '$name', $rating, now(), now())";
      mysql_query($sql)or die(mysql_error());
  
     
      
      echo"<script>window.location='../../asset-$id';</script>";exit;
        break;
        case "editcomment":
          
      $sqlOption="UPDATE webboard_reply SET detail=\"$comment\", rating=$rating, last_update=now() WHERE id=$id";
      mysql_query($sqlOption)or die(mysql_error());

     
      
      echo"<script>document.location=document.referrer;</script>";
        break;  
        case "delcomment":
          
      $sql="DELETE FROM webboard_reply WHERE id=$id";
      $result=mysql_query($sql)or die(mysql_error());

     
      
      echo"<script>document.location=document.referrer;</script>";
        break;         
    default:
        echo"<script>document.location=document.referrer;</script>";
}

  
echo"<script>document.location=document.referrer;</script>";

?>

 </body>
 </html> 

