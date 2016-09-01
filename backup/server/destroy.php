<?php
session_start();

$arr = array('status' => true);

if (exst($_GET['destroy']) != null) {
	session_destroy();
	if ($_GET['callback'] != null) {
		echo  $_GET['callback']."(".json_encode($arr).")";
	} else {
		echo  json_encode($arr);
	}
}