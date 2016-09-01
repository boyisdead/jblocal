<?php
session_start();
include('server/connect.php');
if(isset($_SESSION['ssUsername'])){$username=$_SESSION['ssUsername'];}
else if(!isset($_SESSION['ssUsername'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}

$customer_id = $_REQUEST['cus_id'];


$action_id = $_REQUEST['id'];

$num_col=1;
$num_row=1000;

$sql="SELECT COUNT(*) FROM user WHERE username !='$username' ";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_array($result);
$num=$row['COUNT(*)'];
$numAll=$num;

$sql="SELECT * FROM user WHERE username = '$username'";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_assoc($result);
$iduser = $row['id'];



$sqlp="SELECT * FROM insurance WHERE id = $action_id";
$resultp=mysql_query($sqlp)or die(mysql_error());
$rowp=mysql_fetch_assoc($resultp);


$time1 = strtotime($rowp['endday']);

    $my_formats = date("Y", $time1);
    $my_formats1 = date("m", $time1);
    $my_formats2 = date("d", $time1);
    $my_formats3 = date("F", $time1);
  

$time = strtotime($rowp['startday']);
    $my_format = date("Y", $time);
    $my_format1 = date("m", $time);
    $my_format2 = date("d", $time);
    $my_format3 = date("F", $time);


$sqlm="SELECT * FROM user WHERE id = $rowp[member_id]";
$resultm=mysql_query($sqlm)or die(mysql_error());
$rowm=mysql_fetch_assoc($resultm);


$sqlc="SELECT * FROM customer WHERE id = $rowp[customer_id]";
$resultc=mysql_query($sqlc)or die(mysql_error());
$rowc=mysql_fetch_assoc($resultc);


 $cus_perface = $rowc['cus_perface'];

switch ($cus_perface) {
    case "1":
        $cus_perface = "ด.ช.";
        break;
    case "2":
        $cus_perface = "ด.ญ.";
        break;
    case "3":
        $cus_perface = "นาย";
        break;
    case "4":
        $cus_perface = "นางสาว";
        break;     
    default:
        $cus_perface = "นาง";
}	

?>
<html>
	<head>
		<title>ประกันชีวิต</title>
		<!-- Web Fonts  -->
		<link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />

		<!-- Invoice Print Style -->
		<link rel="stylesheet" href="assets/stylesheets/invoice-print.css" />
		<link rel="stylesheet" href="assets/stylesheets/theme1.css" />
		<link rel="stylesheet" href="assets/style.css" />
		<style type="text/css">
		.table > tbody > tr > td, .table > tfoot > tr > td {
    padding: 6px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
}</style>
	</head>
	<body>
		<div class="invoice">
			<header class="clearfix">
									<div class="row">
										<div class="col-sm-6 mt-md">
											<h2 class="h2 mt-none mb-sm text-dark text-weight-bold">ประกันชีวิต</h2>
											
										</div>
										<div class="col-sm-6 text-right mt-md mb-md">
											<address class="ib mr-xlg" style="margin-top:8px;">
												Employee : <?=$rowm['First_Name']?> <?=$rowm['Last_Name']?>
												<br>
												<?=$rowm['email']?>
												<br>
												Phone: +<?=$rowm['tel']?>
												
											</address>
											<div class="ib">
												<img src="assets/img/ios/h/touch-icon-ipad-retina.png" height="70" alt="OKLER Themes" />
											</div>
										</div>
									</div>
								</header>
								<div class="bill-info">
									<div class="row">
										<div class="col-md-6">
											<div class="bill-to">
											
												<address>
													<?=$cus_perface?> <?=$rowc['cus_name']?> <?=$rowc['cus_lastname']?>
					
													<br>
													<b>Phone: </b> +<?=$rowc['cus_tel']?>
							
													<br>
													<b>Email:</b> <?=$rowc['cus_email']?>
													
													
												</address>
											</div>
										</div>
										<div class="col-md-6">
											<div class="bill-data text-right">
												<p class="mb-none">

													<span class="text-dark">พิมพ์วันที่:</span>
													<span class="value"><?php
																 date_default_timezone_set('Asia/Bangkok');
																echo date("d/m/Y");
																?></span>
												</p>
												
											</div>
										</div>
									</div>
								</div>




		<div class="row">


<?php

$sqlp="SELECT * FROM insurance WHERE customer_id = $customer_id";
$resultp=mysql_query($sqlp)or die(mysql_error());
for($i=0;$rowp=mysql_fetch_assoc($resultp);$i++){ 


	$time = strtotime($rowp['ins_confirmPay']);
    $my_formatf1 = date("d/m/Y", $time);


    $time2 = strtotime($rowp['ins_startDate']);
    $my_formatf2 = date("d/m/Y", $time2);



        $time3 = strtotime($rowp['endltDate']);
    $my_formatf3 = date("d/m/Y", $time3);


        $time4 = strtotime($rowp['ins_deal']);
    $my_formatf4 = date("d/m/Y", $time4);


$ins_typePay = $rowp['ins_typePay'];

switch ($ins_typePay) {
    case "1":
        $ins_typePay = "ราย 1 เดือน";
        break;
    case "2":
        $ins_typePay = "ราย 3 เดือน";
        break;
    case "3":
        $ins_typePay = "ราย 6 เดือน";
        break;
    case "4":
        $ins_typePay = "รายปี";
        break;              
    default:
        $ins_typePay = "ไม่ระบุ";
}	





?>




										<div class="col-md-6" style="width: 50%; float: left;">
			<div class="table-responsive">
									<table class="table ">
										<thead>
											<tr class="h5 text-dark" style="font-size:11px;">
												<th >หัวข้อ</th>
												<th >รายละเอียด</th>
												
											</tr>
										</thead>
										<tbody style="font-size:10px;">




											<tr>
												<td style="padding: 4px;">บริษัทประกัน</td>
												<td style="padding: 4px;"><?=$rowp['ins_nameCompany']?></td>
											</tr>

											<tr>
												<td style="padding: 4px;">เลขที่กรมธรรม์</td>
												<td style="padding: 4px;"><?=$rowp['ins_no']?></td>
											</tr>

											<tr>
												<td style="padding: 4px;">ประเภทของประกัน</td>
												<td style="padding: 4px;"><?=$rowp['ins_type']?> </td>
											</tr>

											<tr>
												<td style="padding: 4px;">Username Web Link</td>
												<td style="padding: 4px;"><?=$rowp['ins_login']?></td>
											</tr>

											<tr>
												<td style="padding: 4px;">Password Web Login</td>
												<td style="padding: 4px;"><?=$rowp['ins_nameType']?></td>
											</tr>

											<tr>
												<td style="padding: 4px;">แบบประกัน</td>
												<td style="padding: 4px;"><?=$rowp['ins_nameType']?></td>
											</tr>

											

											<tr>
												<td style="padding: 4px;">อนุสัญญาเพิ่มเติม </td>
												<td style="padding: 4px;"><?=$rowp['ins_more']?></td>
											</tr>





											<tr>
												<td style="padding: 4px;">จำนวนเบี้ยเริ่มต้น </td>
												<td style="padding: 4px;"><?=number_format($rowp['ins_startMoney2'])?></td>
											</tr>

											<tr>
												<td style="padding: 4px;">วันที่จ่ายเบี้ยครั้งล่าสุด </td>
												<td style="padding: 4px;"><?=$my_formatf1?></td>
											</tr>

											<tr>
												<td style="padding: 4px;">วันที่เริ่มทำสัญญา </td>
												<td style="padding: 4px;"><?=$my_formatf2?></td>
											</tr>




											<tr>
												<td style="padding: 4px;">วันที่ครบสัญญา </td>
												<td style="padding: 4px;"><?=$my_formatf3?></td>
											</tr>

											<tr>
												<td style="padding: 4px;">วันที่ดิวเบี้ย </td>
												<td style="padding: 4px;"><?=$my_formatf4?></td>
											</tr>


											<tr>
												<td style="padding: 4px;">จำนวนเบี้ยที่จ่ายล่าสุด </td>
												<td style="padding: 4px;"><?=number_format($rowp['ins_moneyPay'])?></td>
											</tr>



											<tr>
												<td style="padding: 4px;">ประเภทการจ่ายเงิน </td>
												<td style="padding: 4px;"><?=$ins_typePay?></td>
											</tr>



											<tr>
												<td style="padding: 4px;">รายละเอียดการจ่ายเบี้ย </td>
												<td style="padding: 4px;"><?=$rowp['detailMoney']?></td>
											</tr>

											<tr>
												<td style="padding: 4px;">รายละเอียดการรับเงิน </td>
												<td style="padding: 4px;"><?=$rowp['receiveMoney']?></td>
											</tr>



											<tr>
												<td style="padding: 4px;">ทุนประกันเริ่มต้น </td>
												<td style="padding: 4px;"><?=number_format($rowp['ins_startMoney'])?></td>
											</tr>


											<tr>
												<td style="padding: 4px;">ผู้รับผลประโยชน์ </td>
												<td style="padding: 4px;"><?=$rowp['ins_whoRec']?></td>
											</tr>






											<tr>
												<td style="padding: 4px;">Status </td>
												<td style="padding: 4px;"><?=$rowp['ins_status']?></td>
											</tr>

											<tr>
												<td style="padding: 4px;">ชื่อตัวแทนเจ้าของเคส </td>
												<td style="padding: 4px;"><?=$rowp['ins_ownerCode']?></td>
											</tr>

											<tr>
												<td style="padding: 4px;">หมายเหตุ </td>
												<td style="padding: 4px;"><?=$rowp['remark']?></td>
											</tr>




										</tbody>
									</table>
								</div>
</div>




	<?php
}
?>
</div>




					
	
		</div>

		<script>
			window.print();
		</script>
	</body>
</html>