<?php
session_start();
if(isset($_SESSION['ssUsername'])){$username=$_SESSION['ssUsername'];}
else if(!isset($_SESSION['ssUsername'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}
require_once 'connect.php';


$id=$_REQUEST['id'];

$meid=$_REQUEST['meid'];
$maincus=$_REQUEST['maincus'];
$action=$_REQUEST['action'];
$cusID=$_REQUEST['cusID'];
$relation=$_REQUEST['relation'];






switch ($action) {
    case "addrelation":
          $sql="INSERT INTO relationcus(cud_id, relation_id, relation_do, member_id, insert_date, last_update) 
		  VALUES($maincus, $cusID, '$relation', $meid, now(), now())";
		  mysql_query($sql)or die(mysql_error());
        break;
    case "delrelation":
          $sql="DELETE FROM relationcus WHERE id=$id";
		  $result=mysql_query($sql)or die(mysql_error());
        break; 
    case "updaterelation":
          $sqlOption="UPDATE relationcus SET relation_id=$cusID, relation_do='$relation', last_update=now() WHERE id=$id";
		  mysql_query($sqlOption)or die(mysql_error());
        break;        
    default:
        echo"<script>document.location=document.referrer;</script>";
}











  
echo"<script>document.location=document.referrer;</script>";


?>