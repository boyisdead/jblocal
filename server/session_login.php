<?php
session_start();
ob_start();
require_once '../include/mysql.inc.php';


$arr1 = array("status"=>1001, "msg"=>"Sign in successful.");
$arr2 = array('status' =>1002, "msg" => "Wrong email address or account not yet registered.");
$arr3 = array('status' =>1003, "msg" => "Wrong email address or password Enpty.");

$arr4 = array('status' =>1004, "msg" => "Your email address sign in with social.");

$arr5 = array('status' =>1005, "msg" => "Wrong email address or password not yet.");

$arr6 = array('status' =>1006, "msg" => "Please verify your email address in mailbox.");


$email=$_REQUEST['email'];
$password=$_REQUEST['pwd'];




if (!empty($email) and !empty($password)) {
	$mysql = new MySQL_Connection();
    $mysql->query("SET NAMES utf8");



	$query = $mysql->queryResult("SELECT id, name, email, oauth_provider, password, verify FROM candidate_profile WHERE email = %s ",
			array(
		        $email, // แทนที่ %s ตัวที่ 1
		            // แทนที่ %s ตัวที่ 2
	    	)
    	);
					if ($query->numRows > 0) {
						$r = $query->fetch();
				
						
				     
								if($r['oauth_provider'] == "email"){





											if($r['verify'] == 1){




									        if( ($r['email'] == $email) AND ($r['password'] == md5($password)) ){

									        	$_SESSION['ssId'] = session_id();
												$_SESSION['ssUserId'] = $r['id'];
												$_SESSION['ssUsername'] = $r['name'];
											
											
												session_write_close();
										

												if ($_GET['callback'] != null) {
													echo  $_GET['callback']."(".json_encode($arr1).")";
												} else {
													echo  json_encode($arr1);
												}

									        }else{

									        	if ($_GET['callback'] != null) {
														echo  $_GET['callback']."(".json_encode($arr5).")";
													} else {
														echo  json_encode($arr5);
													}

									        }





									    }else{


									    	if ($_GET['callback'] != null) {
														echo  $_GET['callback']."(".json_encode($arr6).")";
													} else {
														echo  json_encode($arr6);
													}


									    }










								}else{

									if ($_GET['callback'] != null) {
										echo  $_GET['callback']."(".json_encode($arr4).")";
									} else {
										echo  json_encode($arr4);
									}


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