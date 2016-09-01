<?php
session_start();
//เช็คค่า

if($_REQUEST['id']==""){echo"<script>alert('Please insert job id');history.back();</script>";exit;}
$id=$_REQUEST['id'];

if($_REQUEST['userid']==""){echo"<script>alert('Please user id');history.back();</script>";exit;}
$userid=$_REQUEST['userid'];
include("../../server/connect.php");
require '../../../mailchimp-mandrill/src/Mandrill.php';


$sqlch="SELECT * FROM save WHERE job_id=$id AND user_id='$userid'";
$resultch=mysql_query($sqlch)or die(mysql_error());
$num=mysql_num_rows($resultch);






if($num==0){





$sql="INSERT INTO save(user_id, job_id, insert_date) VALUES('$userid', $id, now())";
mysql_query($sql)or die(mysql_error());



$arr1 = array('status' =>1001, "msg" => "Save Job Success.");

    if ($_GET['callback'] != null) {
    echo  $_GET['callback']."(".json_encode($arr1).")";
    } else {
    echo  json_encode($arr1);
    }




} else {



$arr2 = array('status' =>1002, "msg" => "Duplicate Save Job.");

    if ($_GET['callback'] != null) {
    echo  $_GET['callback']."(".json_encode($arr2).")";
    } else {
    echo  json_encode($arr2);
    }



}



?>
