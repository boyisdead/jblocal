<?php
session_start();
include('server/connect.php');
if(isset($_SESSION['ssUsername'])){$username=$_SESSION['ssUsername'];}
else if(!isset($_SESSION['ssUsername'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}


$customer_id = $_REQUEST['id'];

$sql="SELECT * FROM user WHERE username = '$username'";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_assoc($result);
$iduser = $row['id'];


$sqlc="SELECT * FROM customer WHERE id = $customer_id";
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
											
										</div>
										<div class="col-sm-6 text-right mt-md mb-md">
											<address class="ib mr-xlg" style="margin-top:8px;">
												พิมพ์วันที่ : <?php
																 date_default_timezone_set('Asia/Bangkok');
																echo date("d/m/Y h:i:sa");
																?>
												
												<br>
												โดย : <?=$row['First_Name']?> <?=$row['Last_Name']?>
												
											</address>
											<div class="ib">
												<img src="assets/img/ios/h/touch-icon-ipad-retina.png" height="70" alt="OKLER Themes" />
											</div>
										</div>
									</div>
								</header>
								<div class="bill-info">
				<div class="row">
					<div class="col-md-12" style="width: 33.33333333%;     float: left;">
						<div class="bill-to">
											
												<address style="font-size:10px; margin-bottom: 1px;">
													<?=$cus_perface?> <?=$rowc['cus_name']?> <?=$rowc['cus_lastname']?>
													<br>
													<?=$rowc['nameEng']?>
													<br>
													<?=$rowc['cus_address']?>
							
													<br>
													<b>Tel : </b> <?=$rowc['cus_tel']?>
													<br>
													<b>Email : </b> <?=$rowc['cus_email']?>
													
													
												</address>
											</div>
					</div>
					
			
				</div>
			</div>

		
			<div class="table-responsive">
									<table class="table invoice-items">
										<thead>
											<tr class="h5 text-dark" style="font-size:11px;">
												<th>#</th>
											<th>สิ่งที่ต้องทำ</th>
											<th style="width:11%">วันที่เริ่มงาน</th>
											
											<th style="width:11%">สถานะงาน</th>
											<th>ผู้รับผิดชอบ</th>
											<th>หมายเหตุ</th>
											</tr>
										</thead>
										<tbody style="font-size:10px;">
<?php
$sql="SELECT * FROM actionplan WHERE customer_id = $customer_id ORDER BY actionplan.id ASC ";
$result=mysql_query($sql)or die(mysql_error());
for($i=0;$row=mysql_fetch_assoc($result);$i++){ 


 $statuss = $row['statuss'];

switch ($statuss) {
    case "1":
        $statuss = "<span class='label label-success'>Done</span>";
        $statuss1 = "Done";
        break;
    case "2":
        $statuss = "<span class='label label-primary'>On Process</span>";
        $statuss1 = "On Process";
        break;
    default:
        $statuss = "<span class='label label-danger'>Not started</span>";
        $statuss1 = "Not started";
}	



$time1 = strtotime($row['startday']);
$my_formats = date("d/m/Y", $time1);

?>
<tr>
	<td><?=$i+1?></td>
	<td><?=$row['toda']?></td>
											
											
											<td><?=$my_formats?></td>
								
											<td><?=$statuss1?> </td>
											<td><?=$row['subport']?></td>
											<td><?=$row['remark']?></td>
</tr>


<?php
}
?>












										</tbody>
									</table>
								</div>
		
	
		</div>

		<script>
			window.print();
		</script>
	</body>
</html>