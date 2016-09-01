<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
include('../../server/connect.php');


$arr1 = array("status"=>1001, "msg"=>"Change successful! Youcan login now.");
$arr2 = array('status' =>1002, "msg" => "Wrong Your Token invalid.");
$arr3 = array('status' =>1003, "msg" => "Wrong Your new password or Token Enpty.");

$arr4 = array('status' =>1004, "msg" => "Your email address sign in with social.");

$arr5 = array('status' =>1005, "msg" => "Wrong email address or password not yet.");


$password=$_REQUEST['newpassword'];

$token=$_REQUEST['token'];

$password2 = md5($password);



if (!empty($password) and !empty($token)) {

	$sql="SELECT COUNT(*) FROM candidate_profile WHERE overall_experience = '".$token."' ";
	$result=mysql_query($sql)or die(mysql_error());
	$row=mysql_fetch_assoc($result);

				if($row['COUNT(*)']!=0){



							
$sql="UPDATE candidate_profile SET password='$password2', update_date=now() WHERE overall_experience='$token'";
mysql_query($sql)or die(mysql_error());





			

							


							echo  json_encode($arr1);






				}else{


							echo  json_encode($arr2);
						

				}


}else{
	
			echo  json_encode($arr3);
		
}

?>
