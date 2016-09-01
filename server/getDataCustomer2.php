<?php
session_start();
header('Content-type: text/html; charset=utf-8');
require_once 'connect.php';

$id=$_REQUEST['id'];

$Hotels = array();

$sql5="SELECT * FROM product WHERE category_id = $id ORDER BY id DESC";
	$result5=mysql_query($sql5)or die(mysql_error());
	for($i5=0;$row5=mysql_fetch_assoc($result5);$i5++){


					



     $Hotels[] = array("name"=>$row5['name'], "location_latitude"=>$row5['lat'], "location_longitude"=>$row5['lng'], "map_image_url"=>"admin/cusimage/".$row5['image'], "name_point"=>$row5['name'],
     	"description_point"=>$row5['shortdetail'], "url_point"=>"asset-".$row5['id'],);









	}

$data = array("Hotels"=>$Hotels);

	echo  json_encode($data);


?>


