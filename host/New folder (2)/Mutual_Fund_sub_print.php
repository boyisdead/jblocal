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



$sqlp="SELECT * FROM mutual_fund WHERE id = $action_id";
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
		<title>Mutual Fund</title>
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
											<h2 class="h2 mt-none mb-sm text-dark text-weight-bold">Mutual Fund</h2>
											
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

$sqlp="SELECT * FROM mutual_fund WHERE customer_id = $customer_id";
$resultp=mysql_query($sqlp)or die(mysql_error());
for($i=0;$rowp=mysql_fetch_assoc($resultp);$i++){ 


	$time = strtotime($rowp['pa_policy_date']);
    $my_format1 = date("d/m/Y", $time);


    $time2 = strtotime($rowp['endl_date_service']);
    $my_formata = date("d/m/Y", $time2);



        $time3 = strtotime($rowp['pa_pay_date']);
    $my_formatb = date("d/m/Y", $time3);


        $time4 = strtotime($rowp['last_money']);
    $my_formatc = date("d/m/Y", $time4);








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
												<td style="padding: 4px;">บลจ. / บล.</td>
												<td style="padding: 4px;"><?=$rowp['name']?></td>
											</tr>

											<tr>
												<td style="padding: 4px;">Login</td>
												<td style="padding: 4px;"><?=$rowp['phillip_login']?></td>
											</tr>

											<tr>
												<td style="padding: 4px;">Password</td>
												<td style="padding: 4px;"><?=$rowp['phillip_pwd']?></td>
											</tr>

											<tr>
												<td style="padding: 4px;">Goal LTF/Year</td>
												<td style="padding: 4px;"><?=number_format($rowp['mf_goal_ltf'])?></td>
											</tr>

											<tr>
												<td style="padding: 4px;">Done LTF</td>
												<td style="padding: 4px;"><?=number_format($rowp['mf_done_ltf'])?></td>
											</tr>

											<tr>
												<td style="padding: 4px;">Goal RMF/Year</td>
												<td style="padding: 4px;"><?=number_format($rowp['mf_goal_rmf'])?></td>
											</tr>

											<tr>
												<td style="padding: 4px;">Done RMF</td>
												<td style="padding: 4px;"><?=number_format($rowp['mf_done_rmf'])?></td>
											</tr>

											<tr>
												<td style="padding: 4px;">รายละเอียด Saving Plan </td>
												<td style="padding: 4px;"><?=$rowp['mf_saving_plan_detail']?></td>
											</tr>




											<tr>
												<td style="padding: 4px;">ใบเปิดบัญชีที่เซ็นต์แล้ว </td>
												<td style="padding: 4px;"><?=$rowp['mf_open_signature']?></td>
											</tr>

											<tr>
												<td style="padding: 4px;">บัญชีธนาคารที่ผูก </td>
												<td style="padding: 4px;"><?=$rowp['bankcus']?></td>
											</tr>

											<tr>
												<td style="padding: 4px;">จำนวนเงิน Prepaid คงเหลือ </td>
												<td style="padding: 4px;"><?=number_format($rowp['mf_money_bagged'])?></td>
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