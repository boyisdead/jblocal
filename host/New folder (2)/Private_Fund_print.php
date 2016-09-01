<?php
session_start();
include('server/connect.php');
if(isset($_SESSION['ssUsername'])){$username=$_SESSION['ssUsername'];}
else if(!isset($_SESSION['ssUsername'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}

$sql="SELECT * FROM user WHERE username = '$username'";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_assoc($result);
$iduser = $row['id'];


?>
<html>
	<head>
		<title>Private Fund</title>
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
											<h2 class="h2 mt-none mb-sm text-dark text-weight-bold">Private Fund</h2>
											
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

		
			<div class="table-responsive">
									<table class="table invoice-items">
										<thead>
											<tr class="h5 text-dark" style="font-size:11px;">
												<th>#</th>
											<th>ชื่อลูกค้า</th>
											<th>ชื่อบริษัทหลักทรัพย์</th>
											<th>หมายเลขบัญชี</th>
											
											<th>เงินที่เริ่มลงทุน</th>
											<th>วันที่เริ่มลงทุน</th>
											</tr>
										</thead>
										<tbody style="font-size:10px;">
<?php
$sql="SELECT * FROM private_fund WHERE member_id = $iduser ORDER BY private_fund.id ASC ";
$result=mysql_query($sql)or die(mysql_error());
for($i=0;$row=mysql_fetch_assoc($result);$i++){ 


$sql3="SELECT * FROM customer WHERE id = $row[customer_id]";
$result3=mysql_query($sql3)or die(mysql_error());
$row3=mysql_fetch_assoc($result3);
$cus_perface = $row3['cus_perface'];

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

$mf_saving_plan = $row['mf_saving_plan'];

switch ($mf_saving_plan) {
    case "0":
        $mf_saving_plan = "No";
        break;  
    case "1":
        $mf_saving_plan = "YES";
        break;         
    default:
        $mf_saving_plan = "ไม่ระบุ";
}	


$time1 = strtotime($row['start_date']);
$my_formats = date("d/m/Y", $time1);

?>
<tr>
	<td><?=$i+1?></td>
	<td><?=$cus_perface?><?=$row3['cus_name']?> <?=$row3['cus_lastname']?></td>
											<td><?=$row['private_broker']?></td>
											<td><?=$row['private_no']?></td>
											
											<td><?=number_format($row['start_money'])?></td>
											<td><?=$my_formats?></td>
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