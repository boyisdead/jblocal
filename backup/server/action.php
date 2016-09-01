<?php
session_start();
if(isset($_SESSION['ssUsername'])){$username=$_SESSION['ssUsername'];}
else if(!isset($_SESSION['ssUsername'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}
require_once 'connect.php';


$id=$_REQUEST['id'];

$meid=$_REQUEST['meid'];

$todo=$_REQUEST['todo'];
if($todo==""){$todo="ไม่มีข้อมูล";}

$detail_action=$_REQUEST['detail_action'];
if($detail_action==""){$detail_action="ไม่มีข้อมูล";}

$subport=$_REQUEST['subport'];
if($subport==""){$subport="ไม่มีข้อมูล";}

$startday=$_REQUEST['startday'];
if($startday==""){$startday="0000-00-00";}

$endday=$_REQUEST['endday'];
if($endday==""){$endday="0000-00-00";}

$timer=$_REQUEST['timer'];
if($timer==""){$timer="00:00";}


$action=$_REQUEST['action'];

$statuss=$_REQUEST['statuss'];
if($statuss==""){$statuss=0;}


$money=$_REQUEST['money'];
if($money==""){$money=0;}

$money1=$_REQUEST['money1'];
if($money1==""){$money1=0;}

$balance=$_REQUEST['balance'];
if($balance==""){$balance=0;}

$sumyear=$_REQUEST['sumyear'];
if($sumyear==""){$sumyear=0;}

$syear=$_REQUEST['syear'];
if($syear==""){$syear=0;}

$remind=$_REQUEST['remind'];
if($remind==""){$remind="ไม่มีข้อมูล";}

$remark=$_REQUEST['remark'];
if($remark==""){$remark="ไม่มีข้อมูล";}



switch ($action) {
    case "newaction":
          $sql="INSERT INTO actionplan(toda, subport, startday, timer, endday, remark, statuss, customer_id, member_id, insert_date, last_update) 
       VALUES(\"$todo\", \"$subport\", '$startday', '$timer', '$endday', \"$remark\", $statuss, $id, $meid, now(), now())";
      mysql_query($sql)or die(mysql_error());
      //คืนค่าไอดี
      $product_id=mysql_insert_id();
      $sql="INSERT INTO subaction1(action_id, moneyy, money1, balance, sumyear, syear, remind, insert_date, last_update, detail_action) 
       VALUES($product_id, $money, $money1, $balance, $sumyear, $syear, \"$remind\", now(), now(), \"$detail_action\")";
      mysql_query($sql)or die(mysql_error());
      echo"<script>window.location='../detail_actionplan-$product_id-$id';</script>";exit;
        break;
    case "delaction":
          $sql="DELETE FROM actionplan WHERE id=$id";
      $result=mysql_query($sql)or die(mysql_error());
        break;
    case "delsubaction":
          $sql="DELETE FROM subaction1 WHERE id=$id";
      $result=mysql_query($sql)or die(mysql_error());
        break;    
    case "addaction":
          $sql="INSERT INTO subaction1(action_id, moneyy, money1, balance, sumyear, syear, remind, insert_date, last_update, detail_action) 
       VALUES($id, $money, $money1, $balance, $sumyear, $syear, \"$remind\", now(), now(), \"$detail_action\")";
      mysql_query($sql)or die(mysql_error());
        break;      
    case "updateaction":
          $sqlOption="UPDATE actionplan SET toda='$todo', detail_action='$detail_action', subport='$subport', startday='$startday', timer='$timer', endday='$endday', moneyy=$money, money1=$money1, balance=$balance, sumyear=$sumyear, syear=$syear, remind='$remind', remark='$remark', statuss=$statuss, last_update=now() WHERE id=$id";
      mysql_query($sqlOption)or die(mysql_error());
        break;
    case "update_supaction":
          $sqlOption="UPDATE subaction1 SET detail_action='$detail_action', moneyy=$money, money1=$money1, balance=$balance, sumyear=$sumyear, syear=$syear, remind='$remind', last_update=now() WHERE id=$id";
      mysql_query($sqlOption)or die(mysql_error());
        break;             
    default:
        echo"<script>document.location=document.referrer;</script>";
}











  
echo"<script>document.location=document.referrer;</script>";


?>