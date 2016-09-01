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



$sqlp="SELECT * FROM actionplan WHERE id = $action_id";
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
		<title>Action Plan</title>
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
											<h2 class="h2 mt-none mb-sm text-dark text-weight-bold">Action Plan</h2>
											<h4 class="h4 m-none text-dark text-weight-bold">#<?=$rowp['toda']?></h4>
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
													Phone: +<?=$rowc['cus_tel']?>
							
													<br>
													<b>Things To Do :</b> <?=$rowp['toda']?>
													<br>
													<b>Remark :</b> <?=$rowp['remark']?>
													
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
												<p class="mb-none">

													<span class="text-dark">วันที่เริ่มงาน :</span>
													<span class="value"><?=$my_format2?>/<?=$my_format1?>/<?=$my_format?></span>
												</p>
												
												<p class="mb-none">

													<span class="text-dark">ผู้รับผิดชอบ:</span>
													<span class="value"><?=$rowp['subport']?></span>
												</p>
												
											</div>
										</div>
									</div>
								</div>

		
			<div class="table-responsive">
									<table class="table invoice-items">
										<thead>
											<tr class="h5 text-dark" style="font-size:11px;">
												<th >แหล่งเงินบริหาร</th>
												<th >ยอดเงิน</th>
												
												<th >Goal</th>
											<th >ยอดที่ขาด</th>

											<th >ปีที่ลง</th>
											<th >ลงแล้วกี่ปี</th>

												<th >วัน remind</th>
											</tr>
										</thead>
										<tbody style="font-size:10px;">

<?php
	$sum1 = 0;
	$sum2 = 0;
	$sum3 = 0;
$sqlp="SELECT * FROM subaction1 WHERE action_id = $action_id";
$resultp=mysql_query($sqlp)or die(mysql_error());
for($i=0;$rowp=mysql_fetch_assoc($resultp);$i++){ 
?>


											<tr>
												<td><?=$rowp['detail_action']?></td>
												<td><?=number_format($rowp['moneyy'])?></td>
												<td><?=number_format($rowp['money1'])?></td>
												<td><?=number_format($rowp['balance'])?></td>
												<td><?=$rowp['sumyear']?></td>
												<td><?=$rowp['syear']?></td>
												<td><?=$rowp['remind']?></td>
											</tr>
											
	<?php
	$sum1 += $rowp['moneyy'];
	$sum2 += $rowp['money1'];
	$sum3 += $rowp['balance']; 

}
?>









										</tbody>
									</table>
								</div>


								<div class="invoice-summary">
									<div class="row">
										<div class="col-sm-4 col-sm-offset-8">
											<table class="table h5 text-dark">
												<tbody>
													
													<tr class="h5">
														<td colspan="2">ยอดเงินรวม</td>
														<td class="text-left"><?=number_format($sum1)?></td>
													</tr>
													<tr class="h5">
														<td colspan="2">Goal Total</td>
														<td class="text-left"><?=number_format($sum2)?></td>
													</tr>
													<tr class="h5">
														<td colspan="2">ยอดที่ขาดรวม</td>
														<td class="text-left"><?=number_format($sum3)?></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
		
	
		</div>

		<script>
			window.print();
		</script>
	</body>
</html>