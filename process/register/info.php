<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
include('../../server/connect.php');

$arr1 = array("status"=>1001, "msg"=>"Sign up successful.");
$arr2 = array('status' =>1002, "msg" => "Wrong email address or account not yet registered.");
$arr3 = array('status' =>1003, "msg" => "Wrong email address or password Enpty.");

$arr4 = array('status' =>1004, "msg" => "Your email address sign in with social.");

$arr5 = array('status' =>1005, "msg" => "Wrong email address or password not yet.");


			echo  json_encode($arr3);
		

?>