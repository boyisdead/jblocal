<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
ob_start();
require_once '../include/mysql.inc.php';


$arr1 = array("status"=>1001, "msg"=>"Sign up successful.");
$arr2 = array('status' =>1002, "msg" => "Wrong email address or account not yet registered.");
$arr3 = array('status' =>1003, "msg" => "Wrong email address or password Enpty.");

$arr4 = array('status' =>1004, "msg" => "Your email address sign in with social.");

$arr5 = array('status' =>1005, "msg" => "Wrong email address or password not yet.");

$username=$_REQUEST['username'];
$email=$_REQUEST['email'];
$password=$_REQUEST['password'];
$password2 md5($password);
$avatar="http://www.jbhired.com/admin/cusimage/1461117550-j8ee95bhf68789dffihdh.jpg";


if (!empty($email) and !empty($password) and !empty($username)) {
	$mysql = new MySQL_Connection();
    $mysql->query("SET NAMES utf8");



	$query = $mysql->queryResult("SELECT * FROM candidate_profile WHERE email = %s ",
			array(
		        $email, // แทนที่ %s ตัวที่ 1
		            // แทนที่ %s ตัวที่ 2
	    	)
    	);

	echo $query->numRows;
					if ($query->numRows == 0) {
						$r = $query->fetch();
				
						
				     
						$mysql->query("INSERT INTO candidate_profile (file_name, email, name, create_date, oauth_provider, password) 
								VALUES (\"$avatar\", '$email', '$username', now(), 'email', '$password2' )");

							
							

									        /*

									        	$_SESSION['ssId'] = session_id();
												$_SESSION['ssUserId'] = $r['id'];
												$_SESSION['ssUsername'] = $r['name'];
											
											
												session_write_close();
										
											*/
											




						if ($_GET['callback'] != null) {
							echo  $_GET['callback']."(".json_encode($arr1).")";
						} else {
							echo  json_encode($arr1);
						}



								
							





					}
					else {
						if ($_GET['callback'] != null) {
							echo  $_GET['callback']."(".json_encode($arr2).")";
						} else {
							echo  json_encode($arr2);
						}
					}

					$mysql->close();


} else {
	
		if ($_GET['callback'] != null) {
			echo  $_GET['callback']."(".json_encode($arr3).")";
		} else {
			echo  json_encode($arr3);
		}
	
}
?>