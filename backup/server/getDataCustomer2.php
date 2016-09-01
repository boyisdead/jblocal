<?php
session_start();
header('Content-type: text/html; charset=utf-8');
require_once 'connect.php';

$id=$_REQUEST['id'];
$color[] = array();

$color[0] = "#0088cc";
$color[1] = "#2baab1";
$color[2] = "#5cb85c";
$color[3] = "#0088cc";
$color[4] = "#734ba9";
$color[5] = "#4cae4c";


$sql4="SELECT * FROM customer WHERE (cus_size != 'ไม่ระบุ') AND member_id= $id ";
	$result4=mysql_query($sql4)or die(mysql_error());
	$num=mysql_num_rows($result4);


$sql5="SELECT cus_size, COUNT(*) AS summ FROM customer WHERE (cus_size != 'ไม่ระบุ') AND member_id= $id GROUP BY cus_size";
	$result5=mysql_query($sql5)or die(mysql_error());
	for($i5=0;$row5=mysql_fetch_assoc($result5);$i5++){


					$total = number_format((($row5['summ']/$num)*100),2);



     $data1[$i5] = array(1, $total);







$data[] = array("label"=>($row5['cus_size'].' '.$row5['summ']), "data"=>$data1[$i5], "color"=>$color[$i5]);

	}



	echo  json_encode($data);


?>


