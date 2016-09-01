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
		<title>OFFSHORE PRODUCT</title>
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
											<h2 class="h2 mt-none mb-sm text-dark text-weight-bold">OFFSHORE</h2>
											
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
												
												<th id="cell-item" style="width:3%"   class="text-weight-semibold" >#</th>
												
												<th id="cell-item"  class="text-weight-semibold">ชื่อลูกค้า</th>
												<th id="cell-desc"   class="text-weight-semibold">ชื่อสินค้า</th>
											<th id="cell-desc" style="width:11%"   class="text-weight-semibold">ชื่อบริษัท</th>
											<th id="cell-desc"  style="width:13%" class="text-weight-semibold">เลขกรมธรรม์</th>
											<th id="cell-desc" style="width:14%"  class="text-weight-semibold">เบี้ยที่จ่ายล่าสุด</th>
											

												<th id="cell-desc" style="width:10%"  class="text-right text-weight-semibold">วันที่ดิวเบี้ย</th>
											</tr>
										</thead>
										<tbody style="font-size:10px;">
<?php
$sql="SELECT * FROM product_aboard WHERE member_id = $iduser ORDER BY product_aboard.id ASC ";
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


$time1 = strtotime($row['pa_pay_date']);
$my_formats = date("d/m/Y", $time1);

?>
<tr>
	<td><?=$i+1?></td>
	<td><?=$cus_perface?><?=$row3['cus_name']?> <?=$row3['cus_lastname']?></td>
											<td><?=$row['product']?></td>
											<td><?=$row['company']?></td>
											
											<td><?=$row['policy_no']?>
												<td><?=number_format($row['pa_type'])?>
	                            			</td>
											<td style="font-size:9px;"><div class="post-date">
			                                  
			                                    <span class="year"><?=$my_formats?></span>
			                               		 </div>
	                            			</td>
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