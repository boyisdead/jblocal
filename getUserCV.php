<?php
	session_start();
	if($_REQUEST['userid']==""){echo"<script>alert('Please user id');history.back();</script>";exit;}
	$userid=$_REQUEST['userid'];
	include("server/connect.php");


	$sqlu="SELECT * FROM candidate_profile WHERE oauth_uid = '$userid'";
	$resultu=mysql_query($sqlu)or die(mysql_error());
	$num=mysql_num_rows($resultu);
	$rowu=mysql_fetch_assoc($resultu);

	if($num!=0){

		if(isset($rowu['cv']) && $rowu['cv'] != '' && $rowu['cv']!='-' && $rowu['cv'] != ' ') {

			$arr1 = array('status' =>1001, "msg" => "success apply for job.", "who" => $rowu['name']);

			if ($_GET['callback'] != null) {
			    echo  $_GET['callback']."(".json_encode($arr1).")";
			} else {
			    echo  json_encode($arr1);
			}

		} else {
			$arr2 = array('status' =>1002, "msg" => "can't find cv.", "who" => $rowu['name']);

		    if ($_GET['callback'] != null) {
			    echo  $_GET['callback']."(".json_encode($arr2).")";
		    } else {
			    echo  json_encode($arr2);
		    }

		}

	} else {


	    $arr3 = array('status' =>1003, "msg" => "user doesn't exist.", "who" => $rowu['name']);

	    if ($_GET['callback'] != null) {
	    echo  $_GET['callback']."(".json_encode($arr3).")";
	    } else {
	    echo  json_encode($arr3);
	    }

	}



?>
