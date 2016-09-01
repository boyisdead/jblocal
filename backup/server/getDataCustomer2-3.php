<?php
session_start();
header('Content-type: text/html; charset=utf-8');
require_once 'connect.php';

$id=$_REQUEST['id'];
/*


$startdate=strtotime("jan");

$total[] = 0;


	for($i5=0;$i5<12;$i5++){

$mount	=	date("M",$startdate);

$mount3	=	date("m",$startdate);


$sql5="SELECT * FROM customer GROUP BY FORMAT(cus_birthday,'m')";
	$result5=mysql_query($sql5)or die(mysql_error());
	for($j=0;$row5=mysql_fetch_assoc($result5);$j++){


		$startdate22=strtotime($row5[cus_birthday]);

 $mount2 = date("m",$startdate22);

  $mount9 = date("n",$startdate22);

if($mount2 == "09"){

$total[$mount9] += 1;

} else {

	$total[$mount9] += 0;
}





}
$data[$i5] = array("y"=>$mount, "a"=>$total[$i5] );

$startdate = strtotime("+1 month", $startdate);

	}




*/
	$a1 = 0; $a2 = 0; $a3 = 0; $a4 = 0; $a5 = 0; $a6 = 0; $a7 = 0; $a8 = 0; $a9 = 0; $a10 = 0; $a11 = 0; $a12 = 0;
	$b1 = 0; $b2 = 0; $b3 = 0; $b4 = 0; $b5 = 0; $b6 = 0; $b7 = 0; $b8 = 0; $b9 = 0; $b10 = 0; $b11 = 0; $b12 = 0;
$my_formaty = date("Y");
//((DATE_FORMAT(ins_deal,'%Y'))=$my_formaty)

$sql5="SELECT * FROM insurance_al WHERE member_id= $id AND ((DATE_FORMAT(inal_startDate,'%Y'))=$my_formaty) ";
	$result5=mysql_query($sql5)or die(mysql_error());
	for($j=0;$row5=mysql_fetch_assoc($result5);$j++){

$startdate22=strtotime($row5[inal_deal]);
$mount2 = date("m",$startdate22);

if($mount2=='01'){
$a1 += $row5[inal_moneyPay];
} else if ($mount2=='02'){
$a2 += $row5[inal_moneyPay];
	} else if ($mount2=='03'){
$a3 += $row5[inal_moneyPay];
	} else if ($mount2=='04'){
$a4 += $row5[inal_moneyPay];
	} else if ($mount2=='05'){
$a5 += $row5[inal_moneyPay];
	} else if ($mount2=='06'){
$a6 += $row5[inal_moneyPay];
	} else if ($mount2=='07'){
$a7 += $row5[inal_moneyPay];
	} else if ($mount2=='08'){
$a8 += $row5[inal_moneyPay];
	} else if ($mount2=='09'){
$a9 += $row5[inal_moneyPay];
	} else if ($mount2=='10'){
$a10 += $row5[inal_moneyPay];
	} else if ($mount2=='11'){
$a11 += $row5[inal_moneyPay];
	} else if ($mount2=='12'){
$a12 += $row5[inal_moneyPay];
	} else {

	}


}


$sql4="SELECT * FROM insurance_al WHERE member_id= $id AND ((DATE_FORMAT(inal_startDate,'%Y'))!=$my_formaty) ";
	$result4=mysql_query($sql4)or die(mysql_error());
	for($i=0;$row4=mysql_fetch_assoc($result4);$i++){

$startdate11=strtotime($row4[inal_deal]);
$mount3 = date("m",$startdate11);

if($mount3=='01'){
$b1 += $row4[inal_moneyPay];
} else if ($mount3=='02'){
$b2 += $row4[inal_moneyPay];
	} else if ($mount3=='03'){
$b3 += $row4[inal_moneyPay];
	} else if ($mount3=='04'){
$b4 += $row4[inal_moneyPay];
	} else if ($mount3=='05'){
$b5 += $row4[inal_moneyPay];
	} else if ($mount3=='06'){
$b6 += $row4[inal_moneyPay];
	} else if ($mount3=='07'){
$b7 += $row4[inal_moneyPay];
	} else if ($mount3=='08'){
$b8 += $row4[inal_moneyPay];
	} else if ($mount3=='09'){
$b9 += $row4[inal_moneyPay];
	} else if ($mount3=='10'){
$b10 += $row4[inal_moneyPay];
	} else if ($mount3=='11'){
$b11 += $row4[inal_moneyPay];
	} else if ($mount3=='12'){
$b12 += $row4[inal_moneyPay];
	} else {

	}


}


$data[0] = array("y"=>"Jan", "a"=>$a1, "b"=>$b1 );
$data[1] = array("y"=>"Feb", "a"=>$a2, "b"=>$b2 );
$data[2] = array("y"=>"Mar", "a"=>$a3, "b"=>$b3 );
$data[3] = array("y"=>"Apr", "a"=>$a4, "b"=>$b4 );
$data[4] = array("y"=>"May", "a"=>$a5, "b"=>$b5 );
$data[5] = array("y"=>"Jun", "a"=>$a6, "b"=>$b6 );
$data[6] = array("y"=>"Jul", "a"=>$a7, "b"=>$b7 );
$data[7] = array("y"=>"Aug", "a"=>$a8, "b"=>$b8 );
$data[8] = array("y"=>"Sep", "a"=>$a9, "b"=>$b9 );
$data[9] = array("y"=>"Oct", "a"=>$a10, "b"=>$b10 );
$data[10] = array("y"=>"Nov", "a"=>$a11, "b"=>$b11 );
$data[11] = array("y"=>"Dec", "a"=>$a12, "b"=>$b12 );







	echo  json_encode($data);


?>


