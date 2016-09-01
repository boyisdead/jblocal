<?php
session_start();
if(isset($_SESSION['ssUsername'])){$username=$_SESSION['ssUsername'];}
else if(!isset($_SESSION['ssUsername'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}
require_once 'connect.php';


$id=$_REQUEST['id'];

$meid=$_REQUEST['meid'];

$todo=$_REQUEST['todo'];
if($todo==""){$todo="ไม่มีข้อมูล";}

$subport=$_REQUEST['subport'];
if($subport==""){$subport="ไม่มีข้อมูล";}

$startday=$_REQUEST['startday'];
if($startday==""){$startday="0000-00-00";}

$endday=$_REQUEST['endday'];
if($endday==""){$endday="0000-00-00";}

$timer=$_REQUEST['timer'];
if($timer==""){$timer="00:00";}


$action=$_REQUEST['action'];


$Status=$_REQUEST['Status'];


if($Status==1){
$color = "fc-event-success";
} else if($Status==2){
$color = "fc-event-primary";
} else {
$color = "fc-event-danger";
}







switch ($action) {
    case "newaction":
          $sql="INSERT INTO actionplan(toda, subport, startday, timer, endday, statuss, color, member_id, insert_date, last_update) 
		  VALUES('$todo', '$subport', '$startday', '$timer', '$endday', '$Status', '$color',  $meid, now(), now())";
		  mysql_query($sql)or die(mysql_error());
        break;
    case "delaction":
          $sql="DELETE FROM actionplan WHERE id=$id";
		  $result=mysql_query($sql)or die(mysql_error());
        break; 
    case "updateaction":
          $sqlOption="UPDATE actionplan SET toda='$todo', subport='$subport', startday='$startday', timer='$timer', endday='$endday', statuss='$Status', color='$color', last_update=now() WHERE id=$id";
		  mysql_query($sqlOption)or die(mysql_error());
        break;        
    default:
        echo"<script>document.location=document.referrer;</script>";
}











  
echo"<script>document.location=document.referrer;</script>";


?>