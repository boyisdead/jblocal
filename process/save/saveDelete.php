<?php
session_start();
//เช็คค่า

if($_REQUEST['id']==""){echo"<script>alert('Please insert job id');history.back();</script>";exit;}
$id=$_REQUEST['id'];

include("../../server/connect.php");




$sql="DELETE FROM save WHERE id=$id";
mysql_query($sql)or die(mysql_error());



$arr1 = array('status' =>1001, "msg" => "Delete Job Success.");

    if ($_GET['callback'] != null) {
    echo  $_GET['callback']."(".json_encode($arr1).")";
    } else {
    echo  json_encode($arr1);
    }



?>

