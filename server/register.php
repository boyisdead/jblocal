<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
require_once 'connect.php';


$arrt1 = array("status"=>1001, "msg"=>"Username or Email already exists!");
$arrt2 = array("status"=>1002, "msg"=>"Thank you for joining.");
$arrf3 = array("status" =>1003, "msg" => $_POST['email']);
$arrf4 = array("status" =>1004, "msg" => "Password not equal.");



$username=$_POST['username'];
$email=$_POST['email'];

$password=$_POST['password'];
$confrim=$_POST['confrim'];



if (!empty($username) and !empty($email) and !empty($password) and !empty($confrim)) {
	


    if($password == $confrim){








$sqlset="SELECT * FROM tb_facebook WHERE NAME = '$username' OR Mail = '$email'";
$resultset=mysql_query($sqlset)or die(mysql_error());
$numImage=mysql_num_rows($resultset);







	
	if ($numImage == 0) {
		

		
		



		$sql="INSERT INTO tb_facebook (NAME, Mail, password, CREATE_DATE ) VALUES ('$username', '$email', '$password', now())";
		mysql_query($sql)or die(mysql_error());

 



		$_SESSION['ssUsername'] = $username;


	
if ($_GET['callback'] != null) {
			echo  $_GET['callback']."(".json_encode($arrt2).")";
		} else {
			echo  json_encode($arrt2);
		}




		
		








	} else {
		

		if ($_GET['callback'] != null) {
			echo  $_GET['callback']."(".json_encode($arrt1).")";
		} else {
			echo  json_encode($arrt1);
		}

			
		

	}







































    } else {




if ($_GET['callback'] != null) {
			echo  $_GET['callback']."(".json_encode($arrf4).")";
		} else {
			echo  json_encode($arrf4);
		}
    
		
		

    }


	
	$mysql->close();
} else {
	
		

		if ($_GET['callback'] != null) {
			echo  $_GET['callback']."(".json_encode($arrf3).")";
		} else {
			echo  json_encode($arrf3);
		}
	
	
			
		
	}

?>