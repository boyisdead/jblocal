<?php
session_start();
header('Content-type: text/html; charset=utf-8');
require_once 'connect.php';

$id=$_REQUEST['id'];

$Hotels = array();




					



     $Hotels[] = array("name"=>"JB Monster", "location_latitude"=>"1.2813843", "location_longitude"=>"103.8509133", "map_image_url"=>"http://www.jbmonster.com/img/cbk.jpg", "name_point"=>"Hong Leong Bldg",
     	"description_point"=>"16 Raffles Quay Singapore 048581");











$data = array("Hotels"=>$Hotels);

	echo  json_encode($data);


?>


