<?php
session_start();
include('server/connect.php');
if(isset($_SESSION['ssUsername'])){$username=$_SESSION['ssUsername'];}
else if(!isset($_SESSION['ssUsername'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}



$sql1="SELECT * FROM user WHERE username = '$username'";
$result1=mysql_query($sql1)or die(mysql_error());
$row1=mysql_fetch_assoc($result1);
$iduser = $row1['id'];





?>

<!doctype html>
<html class="fixed">
	<head>
		<!-- Basic -->
		<meta charset="UTF-8">
		<title>ค้นหา</title>
		<meta name="keywords" content="ค้นหา" />
		<meta name="description" content="ค้นหา">
		

		<!-- Mobile Metas -->
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
				<!-- Set Up the App Icon -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/img/ios/h/touch-icon-ipad-retina.png" />
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/img/ios/h/apple-touch-icon.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/img/ios/m/apple-touch-icon.png">
		<link rel="apple-touch-icon-precomposed" href="assets/img/ios/l/apple-touch-icon-precomposed.png">
		<link rel="icon" href="assets/images/ico/icon.png" type="image/gif" sizes="48x48">

		<!-- Load It Like A Native App -->
		<meta name="apple-touch-fullscreen" content="yes">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">


		<!-- Customize the Startup Screen -->
		<link rel="apple-touch-startup-image" href="assets/img/ios/l/apple-touch-startup-image-320x460.png"media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 1)">
		<link rel="apple-touch-startup-image" href="assets/img/ios/h/apple-touch-startup-image-640x920.png" media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 2)">
		<link rel="apple-touch-startup-image" href="assets/img/ios/h/apple-touch-startup-image-640x1096.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)">
		<link rel="apple-touch-startup-image" href="assets/img/ios/l/apple-touch-startup-image-768x1004.png" media="(device-width: 768px) and (device-height: 1024px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 1)">
		<link rel="apple-touch-startup-image" href="assets/img/ios/l/apple-touch-startup-image-748x1024.png" media="(device-width: 768px) and (device-height: 1024px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 1)">
		<link rel="apple-touch-startup-image" href="assets/img/ios/h/apple-touch-startup-image-1536x2008.png" media="(device-width: 768px) and (device-height: 1024px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2)">
		<link rel="apple-touch-startup-image" href="assets/img/ios/h/apple-touch-startup-image-1496x2048.png" media="(device-width: 768px) and (device-height: 1024px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 2)">


		<!-- Web Fonts  -->
		

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
		<link rel="stylesheet" href="assets/vendor/pnotify/pnotify.custom.css">
		<link rel="stylesheet" href="assets/vendor/select2/select2.css">

		<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
		
		<link rel="stylesheet" href="assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css">
		<link rel="stylesheet" href="assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.css" />
		

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme1.css" />
		<link rel="stylesheet" href="assets/style.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.js"></script>
		<style type="text/css">
		.hidden {
			display: none;
			}
			.hide {
  display: none !important;
}
			ul.option-e {
left: 240px; 
top:20px;
 min-width: 120px;
 }
@media (max-width: 767px) {
	ul.option-e {
left: 240px; 
top:20px;
 min-width: 120px;

}
}
@media (max-width: 479px) {
		ul.option-e {
left: 50px; 
top:20px;
 min-width: 120px;
 font-size: 12px;

}
}
		</style>

	</head>
	<body class="loading-overlay-showing" data-loading-overlay>
		<span class="loading-overlay dark"> 
    		<span class="loader white"></span> 
		</span>
		<section class="body">

			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="Dashboard" class="logo">
						<img src="assets/images/logo.png?m=<?php echo filemtime('logo.png'); ?>" height="38"  />
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
			
					
			
					

			
					
			
					<span class="separator"></span>
			
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="avatar/<?=$row1['Image']?>" width="35" height="35" alt="<?=$row['username']?>" class="img-circle" data-lock-picture="avatar/<?=$row['Image']?>" />
							</figure>
							<div class="profile-info" data-lock-name="<?=$row['username']?>" data-lock-email="<?=$rowme['email']?>">
								<span class="name"><?=$_SESSION['ssUsername']?> <?=$row1['Last_Name']?></span>
								<span class="role"><?=$row1['position']?></span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="profile" onclick="clicksound.playclip()"><i class="fa fa-user"></i> My Profile</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="pages-lock-screen" data-lock-screen="true" onclick="clicksound.playclip()"><i class="fa fa-lock"></i> Lock Screen</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="server/logout.php?id=<?=$row['id']?>" onclick="clicksound.playclip()"><i class="fa fa-power-off"></i> Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">
				
					<div class="sidebar-header">
						<div class="sidebar-title">
							Navigation
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>
				
					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">
									<li>
										<a href="Dashboard" onclick="clicksound.playclip()">
											<i class="fa fa-bullseye" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
									</li>
									<li>
										<a href="customer" onclick="clicksound.playclip()">
											<i class="fa fa-street-view" aria-hidden="true"></i>
											<span>Customer</span>
										</a>
									</li>
									<li>
										<a href="mutual-fund" onclick="clicksound.playclip()">
											<i class="fa fa-tasks" aria-hidden="true"></i>
											<span>Mutual Fund</span>
										</a>
									</li>
									<li>
										<a href="private-fund" onclick="clicksound.playclip()">
											<i class="fa fa-bar-chart " aria-hidden="true"></i>
											<span>Private Fund</span>
										</a>
									</li>
									<li>
										<a href="product-service" onclick="clicksound.playclip()">
											<i class="fa fa-globe " aria-hidden="true"></i>
											<span>Product ตปท.</span>
										</a>
									</li>
									
									<li>
										<a href="insurance">
											<i class="fa fa-bed" aria-hidden="true"></i>
											<span>ประกันชีวิต</span>
										</a>
									</li>
									<li>
										<a href="insurance_al" onclick="clicksound.playclip()">
											<i class="fa fa-ambulance" aria-hidden="true"></i>
											<span>ประกันวินาศภัย</span>
										</a>
									</li>
									<li>
										<a href="data-shared" onclick="clicksound.playclip()">
											<i class="fa fa-users" aria-hidden="true"></i>
											<span>Date Shared</span>
										</a>
									</li>
									<li class="nav-expanded nav-active">
										<a href="searchdate" onclick="clicksound.playclip()">
											<i class="fa fa-search" aria-hidden="true"></i>
											<span>Search Data</span>
										</a>
									</li>
									<li>
										<a href="searchdate_guest" onclick="clicksound.playclip()">
											<i class="fa fa-search" aria-hidden="true"></i>
											<span>Search Data Guest</span>
										</a>
									</li>
									

									
								</ul>
							</nav>
				
							
				
							<hr class="separator" />
				
							
						</div>
				
					</div>
				
				</aside>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Search Data</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="Dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Search Data</span></li>
								
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right" onclick="clicksound.playclip()"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					
					<div class="row">
							<div class="col-xs-12">























<?php
$action=$_REQUEST['action'];
switch ($action) {
    case "1":
        if($_REQUEST['typePay']==""){echo"<script>alert('ยังไม่ได้เลือกประเภทสินค้า');history.back();</script>";exit;}
        $companyName3=$_REQUEST['companyName3'];
		$type3=$_REQUEST['type3'];
		$companyName2=$_REQUEST['companyName2'];
		$type2=$_REQUEST['type2'];
		$companyName1=$_REQUEST['companyName1'];
		$type1=$_REQUEST['type1'];
		$type_search=$_REQUEST['typePay'];
		$startDate=$_REQUEST['startDate'];

		
		if($startDate==""){$startDate="0000-01-01";}
		$endDate=$_REQUEST['endDate'];
		if($endDate==""){$endDate="0000-12-31";}


		
		$startDate = strtotime($startDate);
		$endDate = strtotime($endDate);
		$startDate=date("m-d", $startDate);    // where EmployeeId = 1 and Date between '2011/02/25' and '2011/02/27'
		$endDate=date("m-d", $endDate);

		?>

<!-- //////////////////////////  Start  /////////////////////////////////// -->


<?php 
	if(($type_search == 3) && ($companyName3 != "") && ($type3 != "")){
?>		
<section class="panel">
	<header class="panel-heading">
		<div class="panel-actions">
			<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
		</div>
		<h2 class="panel-title">ค้นหาวันที่ดิวเบี้ย ประกันวินาศภัย</h2>
	</header>
		<div class="panel-body">
			<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
									<thead>
										<tr>
											<th>ชื่อลูกค้า</th>
											<th>บริษัท</th>
											<th>ชื่อสินค้า</th>
											<th>เลขที่กรมธรรม์</th>
											<th>จำนวนเบี้ย</th> 
											<th>วันที่ดิวเบี้ย</th>
											<th style="width:10%">Action</th>
										</tr>
									</thead>
									<tbody>
<?php

//เลือกข้อมูล
//$sql="SELECT * FROM customer WHERE customer_id = 6 ORDER BY id DESC ";
$sql="SELECT * FROM insurance_al WHERE inal_nameCompany = '$companyName3' AND inal_type = '$type3' AND member_id = $iduser AND (DATE_FORMAT(inal_deal,'%m-%d') BETWEEN '$startDate' AND '$endDate') ORDER BY id ASC ";
$result=mysql_query($sql)or die(mysql_error());
for($i=0;$row=mysql_fetch_assoc($result);$i++){ 

?>
<tr class="gradeX">
<?php
$time = strtotime($row['inal_deal']);
    $my_format = date("Y", $time);
    $my_format1 = date("F", $time);
    $my_format2 = date("d", $time);
    $cus_cus_type = $row['cus_type'];


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
?>
											
											<td><?=$cus_perface?><?=$row3['cus_name']?> <?=$row3['cus_lastname']?></td>
											<td><?=$row['inal_nameCompany']?></td>
											<td><?=$row['inal_type']?></td>
											<td><?=$row['inal_no']?></td>
											<td class="actions"><?=number_format($row['inal_moneyPay'])?></td> 
											<td><?=$my_format2?> <?=$startDate?> <?=$endDate?></td>
											<td class="actions" style="font-size:15px;">
												<a href="cus_profile-<?=$row['customer_id']?>" onclick="clicksound.playclip()" style="font-size: 16px;" class="on-default "><i class="fa fa-play-circle"></i></a>
											</td>
  </tr>
<?php
}
?>	
									</tbody>
								</table>
							</div>
						</section>
<?php
} else if(($type_search == 3) && ($companyName3 != "")){
?>
<section class="panel">
	<header class="panel-heading">
		<div class="panel-actions">
			<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
		</div>
		<h2 class="panel-title">ค้นหาวันที่ดิวเบี้ย ประกันวินาศภัย</h2>
	</header>
		<div class="panel-body">
			<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
									<thead>
										<tr>
											<th>ชื่อลูกค้า</th>
											<th>บริษัท</th>
											<th>ชื่อสินค้า</th>
											<th>เลขที่กรมธรรม์</th>
											<th>จำนวนเบี้ย</th> 
											<th>วันที่ดิวเบี้ย</th>
											<th style="width:10%">Action</th>
										</tr>
									</thead>
									<tbody>
<?php

//เลือกข้อมูล
//$sql="SELECT * FROM customer WHERE customer_id = 6 ORDER BY id DESC ";
$sql="SELECT * FROM insurance_al WHERE inal_nameCompany = '$companyName3' AND member_id = $iduser AND (DATE_FORMAT(inal_deal,'%m-%d') BETWEEN '$startDate' AND '$endDate') ORDER BY id ASC ";
$result=mysql_query($sql)or die(mysql_error());
for($i=0;$row=mysql_fetch_assoc($result);$i++){ 

?>
<tr class="gradeX">
<?php
$time = strtotime($row['inal_deal']);
    $my_format = date("Y", $time);
    $my_format1 = date("F", $time);
    $my_format2 = date("d", $time);
    $cus_cus_type = $row['cus_type'];


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
?>
											
											<td><?=$cus_perface?><?=$row3['cus_name']?> <?=$row3['cus_lastname']?></td>
											<td><?=$row['inal_nameCompany']?></td>
											<td><?=$row['inal_type']?></td>
											<td><?=$row['inal_no']?></td>
											<td class="actions"><?=number_format($row['inal_moneyPay'])?></td> 
											<td><?=$my_format2?> <?=$my_format1?> <?=$my_format?></td>
											<td class="actions" style="font-size:15px;">
												<a href="cus_profile-<?=$row['customer_id']?>" onclick="clicksound.playclip()" style="font-size: 16px;" class="on-default "><i class="fa fa-play-circle"></i></a>
											</td>
  </tr>
<?php
}
?>	
									</tbody>
								</table>
							</div>
						</section>

<?php
} else if(($type_search == 3) && ($type3 != "")){
?>
<section class="panel">
	<header class="panel-heading">
		<div class="panel-actions">
			<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
		</div>
		<h2 class="panel-title">ค้นหาวันที่ดิวเบี้ย ประกันวินาศภัย</h2>
	</header>
		<div class="panel-body">
			<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
									<thead>
										<tr>
											<th>ชื่อลูกค้า</th>
											<th>บริษัท</th>
											<th>ชื่อสินค้า</th>
											<th>เลขที่กรมธรรม์</th>
											<th>จำนวนเบี้ย</th> 
											<th>วันที่ดิวเบี้ย</th>
											<th style="width:10%">Action</th>
										</tr>
									</thead>
									<tbody>
<?php

//เลือกข้อมูล
//$sql="SELECT * FROM customer WHERE customer_id = 6 ORDER BY id DESC ";
$sql="SELECT * FROM insurance_al WHERE inal_type = '$type3' AND member_id = $iduser AND (DATE_FORMAT(inal_deal,'%m-%d') BETWEEN '$startDate' AND '$endDate') ORDER BY id ASC ";
$result=mysql_query($sql)or die(mysql_error());
for($i=0;$row=mysql_fetch_assoc($result);$i++){ 

?>
<tr class="gradeX">
<?php
$time = strtotime($row['inal_deal']);
    $my_format = date("Y", $time);
    $my_format1 = date("F", $time);
    $my_format2 = date("d", $time);
    $cus_cus_type = $row['cus_type'];


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
?>
											
											<td><?=$cus_perface?><?=$row3['cus_name']?> <?=$row3['cus_lastname']?></td>
											<td><?=$row['inal_nameCompany']?></td>
											<td><?=$row['inal_type']?></td>
											<td><?=$row['inal_no']?></td>
											<td class="actions"><?=number_format($row['inal_moneyPay'])?></td> 
											<td><?=$my_format2?> <?=$my_format1?> <?=$my_format?></td>
											<td class="actions" style="font-size:15px;">
												<a href="cus_profile-<?=$row['customer_id']?>" onclick="clicksound.playclip()" style="font-size: 16px;" class="on-default "><i class="fa fa-play-circle"></i></a>
											</td>
  </tr>
<?php
}
?>	
									</tbody>
								</table>
							</div>
						</section>
<?php
} else if(($type_search == 3) && ($type3 == "") && ($companyName3 == "")){
?>

<section class="panel">
	<header class="panel-heading">
		<div class="panel-actions">
			<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
		</div>
		<h2 class="panel-title">ค้นหาวันที่ดิวเบี้ย ประกันวินาศภัย</h2>
	</header>
		<div class="panel-body">
			<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
									<thead>
										<tr>
											<th>ชื่อลูกค้า</th>
											<th>บริษัท</th>
											<th>ชื่อสินค้า</th>
											<th>เลขที่กรมธรรม์</th>
											<th>จำนวนเบี้ย</th> 
											<th>วันที่ดิวเบี้ย</th>
											<th style="width:10%">Action</th>
										</tr>
									</thead>
									<tbody>
<?php

//เลือกข้อมูล
//$sql="SELECT * FROM customer WHERE customer_id = 6 ORDER BY id DESC ";
$sql="SELECT * FROM insurance_al WHERE member_id = $iduser AND (DATE_FORMAT(inal_deal,'%m-%d') BETWEEN '$startDate' AND '$endDate') ORDER BY id ASC ";
$result=mysql_query($sql)or die(mysql_error());
for($i=0;$row=mysql_fetch_assoc($result);$i++){ 

?>
<tr class="gradeX">
<?php
$time = strtotime($row['inal_deal']);
    $my_format = date("Y", $time);
    $my_format1 = date("F", $time);
    $my_format2 = date("d", $time);
    $cus_cus_type = $row['cus_type'];


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
?>
											
											<td><?=$cus_perface?><?=$row3['cus_name']?> <?=$row3['cus_lastname']?></td>
											<td><?=$row['inal_nameCompany']?></td>
											<td><?=$row['inal_type']?></td>
											<td><?=$row['inal_no']?></td>
											<td class="actions"><?=number_format($row['inal_moneyPay'])?></td> 
											<td><?=$my_format2?> <?=$my_format1?> <?=$my_format?></td>
											<td class="actions" style="font-size:15px;">
												<a href="cus_profile-<?=$row['customer_id']?>" onclick="clicksound.playclip()" style="font-size: 16px;" class="on-default "><i class="fa fa-play-circle"></i></a>
											</td>
  </tr>
<?php
}
?>	
									</tbody>
								</table>
							</div>
						</section>

<?php	
} else if(($type_search == 2) && ($companyName2 != "") && ($type2 != "")){
?>		
<section class="panel">
	<header class="panel-heading">
		<div class="panel-actions">
			<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
		</div>
		<h2 class="panel-title">ค้นหาวันที่ดิวเบี้ย ประกันชีวิต</h2>
	</header>
		<div class="panel-body">
			<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
									<thead>
										<tr>
											<th>ชื่อลูกค้า</th>
											<th>บริษัท</th>
											<th>แบบประกัน</th>
											<th>เลขที่กรมธรรม์</th>
											<th>จำนวนเบี้ย</th> 
											<th>วันที่ดิวเบี้ย</th>
											<th style="width:10%">Action</th>
										</tr>
									</thead>
									<tbody>
<?php

//เลือกข้อมูล
//$sql="SELECT * FROM customer WHERE customer_id = 6 ORDER BY id DESC ";
$sql="SELECT * FROM insurance WHERE ins_nameCompany = '$companyName2' AND ins_nameType = '$type2' AND member_id = $iduser AND (DATE_FORMAT(ins_deal,'%m-%d') BETWEEN '$startDate' AND '$endDate') ORDER BY id ASC ";
$result=mysql_query($sql)or die(mysql_error());
for($i=0;$row=mysql_fetch_assoc($result);$i++){ 

?>
<tr class="gradeX">
<?php
$time = strtotime($row['ins_deal']);
    $my_format = date("Y", $time);
    $my_format1 = date("F", $time);
    $my_format2 = date("d", $time);
    $cus_cus_type = $row['cus_type'];


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
?>
											
											<td><?=$cus_perface?><?=$row3['cus_name']?> <?=$row3['cus_lastname']?></td>
											<td><?=$row['ins_nameCompany']?></td>
											<td><?=$row['ins_nameType']?></td>
											<td><?=$row['ins_no']?></td>
											<td class="actions"><?=number_format($row['ins_moneyPay'])?></td> 
											<td><?=$my_format2?> <?=$my_format1?> <?=$my_format?></td>
											<td class="actions" style="font-size:15px;">
												<a href="cus_profile-<?=$row['customer_id']?>" onclick="clicksound.playclip()" style="font-size: 16px;" class="on-default "><i class="fa fa-play-circle"></i></a>
											</td>
  </tr>
<?php
}
?>	
									</tbody>
								</table>
							</div>
						</section>
<?php
} else if(($type_search == 2) && ($companyName2 != "") ){
?>		
<section class="panel">
	<header class="panel-heading">
		<div class="panel-actions">
			<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
		</div>
		<h2 class="panel-title">ค้นหาวันที่ดิวเบี้ย ประกันชีวิต</h2>
	</header>
		<div class="panel-body">
			<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
									<thead>
										<tr>
											<th>ชื่อลูกค้า</th>
											<th>บริษัท</th>
											<th>แบบประกัน</th>
											<th>เลขที่กรมธรรม์</th>
											<th>จำนวนเบี้ย</th> 
											<th>วันที่ดิวเบี้ย</th>
											<th style="width:10%">Action</th>
										</tr>
									</thead>
									<tbody>
<?php

//เลือกข้อมูล
//$sql="SELECT * FROM customer WHERE customer_id = 6 ORDER BY id DESC ";
$sql="SELECT * FROM insurance WHERE ins_nameCompany = '$companyName2' AND member_id = $iduser AND (DATE_FORMAT(ins_deal,'%m-%d') BETWEEN '$startDate' AND '$endDate') ORDER BY id ASC ";
$result=mysql_query($sql)or die(mysql_error());
for($i=0;$row=mysql_fetch_assoc($result);$i++){ 

?>
<tr class="gradeX">
<?php
$time = strtotime($row['ins_deal']);
    $my_format = date("Y", $time);
    $my_format1 = date("F", $time);
    $my_format2 = date("d", $time);
    $cus_cus_type = $row['cus_type'];


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
?>
											
											<td><?=$cus_perface?><?=$row3['cus_name']?> <?=$row3['cus_lastname']?></td>
											<td><?=$row['ins_nameCompany']?></td>
											<td><?=$row['ins_nameType']?></td>
											<td><?=$row['ins_no']?></td>
											<td class="actions"><?=number_format($row['ins_moneyPay'])?></td> 
											<td><?=$my_format2?> <?=$my_format1?> <?=$my_format?></td>
											<td class="actions" style="font-size:15px;">
												<a href="cus_profile-<?=$row['customer_id']?>" onclick="clicksound.playclip()" style="font-size: 16px;" class="on-default "><i class="fa fa-play-circle"></i></a>
											</td>
  </tr>
<?php
}
?>	
									</tbody>
								</table>
							</div>
						</section>
<?php
} else if(($type_search == 2) ){
?>		
<section class="panel">
	<header class="panel-heading">
		<div class="panel-actions">
			<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
		</div>
		<h2 class="panel-title">ค้นหาวันที่ดิวเบี้ย ประกันชีวิต</h2>
	</header>
		<div class="panel-body">
			<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
									<thead>
										<tr>
											<th>ชื่อลูกค้า</th>
											<th>บริษัท</th>
											<th>แบบประกัน</th>
											<th>เลขที่กรมธรรม์</th>
											<th>จำนวนเบี้ย</th> 
											<th>วันที่ดิวเบี้ย</th>
											<th style="width:10%">Action</th>
										</tr>
									</thead>
									<tbody>
<?php

//เลือกข้อมูล
//$sql="SELECT * FROM customer WHERE customer_id = 6 ORDER BY id DESC ";
$sql="SELECT * FROM insurance WHERE member_id = $iduser AND (DATE_FORMAT(ins_deal,'%m-%d') BETWEEN '$startDate' AND '$endDate') ORDER BY id ASC ";
$result=mysql_query($sql)or die(mysql_error());
for($i=0;$row=mysql_fetch_assoc($result);$i++){ 

?>
<tr class="gradeX">
<?php
$time = strtotime($row['ins_deal']);
    $my_format = date("Y", $time);
    $my_format1 = date("F", $time);
    $my_format2 = date("d", $time);
    $cus_cus_type = $row['cus_type'];


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
?>
											
											<td><?=$cus_perface?><?=$row3['cus_name']?> <?=$row3['cus_lastname']?></td>
											<td><?=$row['ins_nameCompany']?></td>
											<td><?=$row['ins_nameType']?></td>
											<td><?=$row['ins_no']?></td>
											<td class="actions"><?=number_format($row['ins_moneyPay'])?></td> 
											<td><?=$my_format2?> <?=$my_format1?> <?=$my_format?></td>
											<td class="actions" style="font-size:15px;">
												<a href="cus_profile-<?=$row['customer_id']?>" onclick="clicksound.playclip()" style="font-size: 16px;" class="on-default "><i class="fa fa-play-circle"></i></a>
											</td>
  </tr>
<?php
}
?>	
									</tbody>
								</table>
							</div>
						</section>
<?php
} else if(($type_search == 1) && ($companyName1 != "") && ($type1 != "")){
?>		
<section class="panel">
	<header class="panel-heading">
		<div class="panel-actions">
			<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
		</div>
		<h2 class="panel-title">ค้นหาวันที่ดิวเบี้ย OFFSHORE PRODUCT</h2>
	</header>
		<div class="panel-body">
			<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
									<thead>
										<tr>
											<th>ชื่อลูกค้า</th>
											<th>บริษัท</th>
											<th>แบบประกัน</th>
											<th>เลขที่กรมธรรม์</th>
											<th>จำนวนเบี้ย</th> 
											<th>วันที่ดิวเบี้ย</th>
											<th style="width:10%">Action</th>
										</tr>
									</thead>
									<tbody>
<?php

//เลือกข้อมูล
//$sql="SELECT * FROM customer WHERE customer_id = 6 ORDER BY id DESC ";
$sql="SELECT * FROM product_aboard WHERE company = '$companyName1' AND product = '$type1' AND member_id = $iduser AND (DATE_FORMAT(pa_pay_date,'%m-%d') BETWEEN '$startDate' AND '$endDate') ORDER BY id ASC ";
$result=mysql_query($sql)or die(mysql_error());
for($i=0;$row=mysql_fetch_assoc($result);$i++){ 

?>
<tr class="gradeX">
<?php
$time = strtotime($row['pa_pay_date']);
    $my_format = date("Y", $time);
    $my_format1 = date("F", $time);
    $my_format2 = date("d", $time);
    $cus_cus_type = $row['cus_type'];


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
?>
											
											<td><?=$cus_perface?><?=$row3['cus_name']?> <?=$row3['cus_lastname']?></td>
											<td><?=$row['company']?></td>
											<td><?=$row['product']?></td>
											<td><?=$row['policy_no']?></td>
											<td class="actions"><?=number_format($row['pa_type'])?></td> 
											<td><?=$my_format2?> <?=$my_format1?> <?=$my_format?></td>
											<td class="actions" style="font-size:15px;">
												<a href="cus_profile-<?=$row['customer_id']?>" onclick="clicksound.playclip()" style="font-size: 16px;" class="on-default "><i class="fa fa-play-circle"></i></a>
											</td>
  </tr>
<?php
}
?>	
									</tbody>
								</table>
							</div>
						</section>
<?php
} else if(($type_search == 1) && ($companyName1 != "") ){
?>		
<section class="panel">
	<header class="panel-heading">
		<div class="panel-actions">
			<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
		</div>
		<h2 class="panel-title">ค้นหาวันที่ดิวเบี้ย OFFSHORE PRODUCT</h2>
	</header>
		<div class="panel-body">
			<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
									<thead>
										<tr>
											<th>ชื่อลูกค้า</th>
											<th>บริษัท</th>
											<th>แบบประกัน</th>
											<th>เลขที่กรมธรรม์</th>
											<th>จำนวนเบี้ย</th> 
											<th>วันที่ดิวเบี้ย</th>
											<th style="width:10%">Action</th>
										</tr>
									</thead>
									<tbody>
<?php

//เลือกข้อมูล
//$sql="SELECT * FROM customer WHERE customer_id = 6 ORDER BY id DESC ";
$sql="SELECT * FROM product_aboard WHERE company = '$companyName1' AND member_id = $iduser AND (DATE_FORMAT(pa_pay_date,'%m-%d') BETWEEN '$startDate' AND '$endDate') ORDER BY id ASC ";
$result=mysql_query($sql)or die(mysql_error());
for($i=0;$row=mysql_fetch_assoc($result);$i++){ 

?>
<tr class="gradeX">
<?php
$time = strtotime($row['pa_pay_date']);
    $my_format = date("Y", $time);
    $my_format1 = date("F", $time);
    $my_format2 = date("d", $time);
    $cus_cus_type = $row['cus_type'];


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
?>
											
											<td><?=$cus_perface?><?=$row3['cus_name']?> <?=$row3['cus_lastname']?></td>
											<td><?=$row['company']?></td>
											<td><?=$row['product']?></td>
											<td><?=$row['policy_no']?></td>
											<td class="actions"><?=number_format($row['pa_type'])?></td> 
											<td><?=$my_format2?> <?=$my_format1?> <?=$my_format?></td>
											<td class="actions" style="font-size:15px;">
												<a href="cus_profile-<?=$row['customer_id']?>" onclick="clicksound.playclip()" style="font-size: 16px;" class="on-default "><i class="fa fa-play-circle"></i></a>
											</td>
  </tr>
<?php
}
?>	
									</tbody>
								</table>
							</div>
						</section>
<?php
} else if(($type_search == 1)  ){
?>		
<section class="panel">
	<header class="panel-heading">
		<div class="panel-actions">
			<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
		</div>
		<h2 class="panel-title">ค้นหาวันที่ดิวเบี้ย OFFSHORE PRODUCT</h2>
	</header>
		<div class="panel-body">
			<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
									<thead>
										<tr>
											<th>ชื่อลูกค้า</th>
											<th>บริษัท</th>
											<th>แบบประกัน</th>
											<th>เลขที่กรมธรรม์</th>
											<th>จำนวนเบี้ย</th> 
											<th>วันที่ดิวเบี้ย</th>
											<th style="width:10%">Action</th>
										</tr>
									</thead>
									<tbody>
<?php

//เลือกข้อมูล
//$sql="SELECT * FROM customer WHERE customer_id = 6 ORDER BY id DESC ";
$sql="SELECT * FROM product_aboard WHERE member_id = $iduser AND (DATE_FORMAT(pa_pay_date,'%m-%d') BETWEEN '$startDate' AND '$endDate') ORDER BY id ASC ";
$result=mysql_query($sql)or die(mysql_error());
for($i=0;$row=mysql_fetch_assoc($result);$i++){ 

?>
<tr class="gradeX">
<?php
$time = strtotime($row['pa_pay_date']);
    $my_format = date("Y", $time);
    $my_format1 = date("F", $time);
    $my_format2 = date("d", $time);
    $cus_cus_type = $row['cus_type'];


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
?>
											
											<td><?=$cus_perface?><?=$row3['cus_name']?> <?=$row3['cus_lastname']?></td>
											<td><?=$row['company']?></td>
											<td><?=$row['product']?></td>
											<td><?=$row['policy_no']?></td>
											<td class="actions"><?=number_format($row['pa_type'])?></td> 
											<td><?=$my_format2?> <?=$my_format1?> <?=$my_format?></td>
											<td class="actions" style="font-size:15px;">
												<a href="cus_profile-<?=$row['customer_id']?>" onclick="clicksound.playclip()" style="font-size: 16px;" class="on-default "><i class="fa fa-play-circle"></i></a>
											</td>
  </tr>
<?php
}
?>	
									</tbody>
								</table>
							</div>
						</section>
<?php
} else {
	echo " ";
}
?>


						

<!-- //////////////////////////  End  /////////////////////////////////// -->









		<?php
        break;
    case "2":
     





		$startDate2=$_REQUEST['startDate2'];
		if($startDate2==""){$startDate2="0000-01-01";}
		$endDate2=$_REQUEST['endDate2'];
		if($endDate2==""){$endDate2="0000-12-31";}
		$startDate2 = strtotime($startDate2);
		$endDate2 = strtotime($endDate2);
		$startDate2=date("m-d", $startDate2);    // where EmployeeId = 1 and Date between '2011/02/25' and '2011/02/27'
	    $endDate2=date("m-d", $endDate2);

$my_formaty = date("Y");

$oldstart=$_REQUEST['oldstart'];
if($oldstart==""){$oldstart="1";}

$oldend=$_REQUEST['oldend'];
if($oldend==""){$oldend="120";}

$sex=$_REQUEST['sex'];

if($sex!="")
	{
		$sex1 = "AND (cus_sex = ".$sex.")";
	} else {
		$sex1 = " ";
	}

$carrier=$_REQUEST['carrier'];

if($carrier!="")
	{
		$carrier1 = "AND (cus_carrier = '".$carrier."')";
	} else {
		$carrier1 = " ";
	}

		?>


		<section class="panel">
	<header class="panel-heading">
		<div class="panel-actions">
			<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
		</div>
		<h2 class="panel-title">ค้นหาลูกค้า</h2>
	</header>
		<div class="panel-body">
			<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
									<thead>
										<tr>
											
											<th>ชื่อลูกค้า</th>
											<th>ขนาดลูกค้า</th>
											<th>สถานะสมรส</th>
											<th>อายุ</th>
											<th>เพศ</th>
											<th>อาชีพ</th>
											<th style="width:10%">Action</th>
										</tr>
									</thead>
									<tbody>
<?php
//เลือกข้อมูล
//$sql="SELECT * FROM customer WHERE customer_id = 6 ORDER BY id DESC ";
	
$sql="SELECT * FROM customer WHERE (DATE_FORMAT(cus_birthday,'%m-%d') BETWEEN '$startDate2' AND '$endDate2') AND (member_id= $iduser) AND (($my_formaty-(DATE_FORMAT(cus_birthday,'%Y'))) BETWEEN '$oldstart' AND '$oldend') $sex1 $carrier1 ORDER BY id DESC ";
//echo $sql;
$result=mysql_query($sql)or die(mysql_error());
for($i=0;$row=mysql_fetch_assoc($result);$i++){ 

?>
<tr class="gradeX">
<?php



    $my_formaty = date("Y");


$time = strtotime($row['cus_birthday']);
    $my_format = date("Y", $time);
    $my_format1 = date("F", $time);
    $my_format2 = date("d", $time);
    $cus_cus_type = $row['cus_type'];

switch ($cus_cus_type) {
    case "1":
        $cus_cus_type = "การเงินทั้งระบบ";
        break;
    case "2":
        $cus_cus_type = "วางแผนเฉพาะประกัน";
        break;
    case "3":
        $cus_cus_type = "วางแผนเฉพาะการลงทุน";
        break;        
    default:
        $cus_cus_type = "อื่นๆ";
}	

        $cus_perface = $row['cus_perface'];

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

$cus_status = $row['cus_status'];

switch ($cus_status) {
    case "1":
        $cus_status = "Single";
        break;
    case "2":
        $cus_status = "Marriage";
        break;
     case "3":
        $cus_status = "Marriage Legally";
        break;          
    default:
        $cus_status = "Single Parents";
}	

$cus_sex = $row['cus_sex'];

switch ($cus_sex) {
    case "1":
        $cus_sex = "ชาย";
        break;
    case "2":
        $cus_sex = "หญิง";
        break;      
    default:
        $cus_sex = "อื่นๆ";
}	
?>
										
											<td><?=$cus_perface?><?=$row['cus_name']?> <?=$row['cus_lastname']?></td>
											<td><?=$row['cus_size']?></td>
											<td><?=$cus_status?></td>
											<td><?=($my_formaty)-($my_format)?></td>
											
											<td><?=$cus_sex?></td>
											<td><?=$row['cus_carrier']?></td>
											<td class="actions" style="font-size:15px;">
												<a href="cus_profile-<?=$row['id']?>" onclick="clicksound.playclip()" style="font-size: 16px;" class="on-default "><i class="fa fa-play-circle"></i></a>
											</td>
  </tr>
<?php
}
?>	
									</tbody>
								</table>
							</div>
						</section>


		<?php
        break;
    case "3":
    	$oldstart=$_REQUEST['oldstart'];
		$oldend=$_REQUEST['oldend'];
		$sex=$_REQUEST['sex'];
		$carrier=$_REQUEST['carrier'];

		
?>
		<section class="panel">
	<header class="panel-heading">
		<div class="panel-actions">
			<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
		</div>
		<h2 class="panel-title">ค้นหากลุ่มประเภทลูกค้า อายุ, เพศ, อาชีพ</h2>
	</header>
		<div class="panel-body">
			<table class="table table-striped mb-none" id="datatable-editable">
									<thead>
										<tr>
											<th>ID</th>
											<th>ชื่อลูกค้า</th>
											<th>ประเภทลูกค้า</th>
											<th>ค้นหา</th>
											<th style="width:10%">Action</th>
										</tr>
									</thead>
									<tbody>


<?php




       if($oldstart!="" && $oldend!="" && $sex=="" && $carrier==""){
       	$sql="SELECT * FROM customer WHERE (DATE_FORMAT(NOW(),'%Y')-DATE_FORMAT(cus_birthday,'%Y')) BETWEEN $oldstart AND $oldend AND (member_id= $iduser)  ORDER BY id DESC ";
       } else if($oldstart=="" && $oldend=="" && $sex!="" && $carrier==""){
       	$sql="SELECT * FROM customer WHERE cus_sex = $sex ORDER BY id DESC ";
       } else if($oldstart=="" && $oldend=="" && $sex=="" && $carrier!=""){
       $sql="SELECT * FROM customer WHERE (cus_carrier LIKE '%$carrier%')  ORDER BY id DESC ";
       } else if($oldstart!="" && $oldend!="" && $sex!="" && $carrier==""){
       $sql="SELECT * FROM customer WHERE ((DATE_FORMAT(NOW(),'%Y')-DATE_FORMAT(cus_birthday,'%Y')) BETWEEN $oldstart AND $oldend) AND (cus_sex = $sex) AND (member_id= $iduser)  ORDER BY id DESC ";
       } else if($oldstart!="" && $oldend!="" && $sex=="" && $carrier!=""){
       	$sql="SELECT * FROM customer WHERE ((DATE_FORMAT(NOW(),'%Y')-DATE_FORMAT(cus_birthday,'%Y')) BETWEEN $oldstart AND $oldend) AND (cus_carrier LIKE '%$carrier%') AND (member_id= $iduser)  ORDER BY id DESC ";
       } else if($oldstart=="" && $oldend=="" && $sex!="" && $carrier!=""){
       	$sql="SELECT * FROM customer WHERE (cus_sex = $sex) AND (cus_carrier LIKE '%$carrier%')  ORDER BY id DESC ";
       } else if($oldstart!="" && $oldend!="" && $sex!="" && $carrier!=""){
       	$sql="SELECT * FROM customer WHERE ((DATE_FORMAT(NOW(),'%Y')-DATE_FORMAT(cus_birthday,'%Y')) BETWEEN $oldstart AND $oldend) AND (cus_carrier LIKE '%$carrier%') AND (cus_sex = $sex) AND (member_id= $iduser)  ORDER BY id DESC ";
       } else {
       		echo"<script>alert('ท่านใส่ข้อมูลไม่ครบนะครับ');window.location='searchdate';</script>";exit;
       }


$result=mysql_query($sql)or die(mysql_error());
for($i=0;$row=mysql_fetch_assoc($result);$i++){ 

?>

<tr class="gradeX">
<?php
$time = strtotime($row['cus_birthday']);
    $my_format = date("Y", $time);
    $my_format1 = date("F", $time);
    $my_format2 = date("d", $time);
    $cus_cus_type = $row['cus_type'];

switch ($cus_cus_type) {
    case "1":
        $cus_cus_type = "การเงินทั้งระบบ";
        break;
    case "2":
        $cus_cus_type = "วางแผนเฉพาะประกัน";
        break;
    case "3":
        $cus_cus_type = "วางแผนเฉพาะการลงทุน";
        break;        
    default:
        $cus_cus_type = "อื่นๆ";
}	

        $cus_perface = $row['cus_perface'];

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
        $cus_sex = $row['cus_sex'];

switch ($cus_sex) {
    case "1":
        $cus_sex = "ชาย";
        break;
    case "2":
        $cus_sex = "หญิง";
        break;      
    default:
        $cus_sex = "อื่นๆ";
}	


?>
											<td><?=$row['customer_id']?></td>
											<td><?=$cus_perface?><?=$row['cus_name']?> <?=$row['cus_lastname']?></td>
											<td><?=$cus_cus_type?></td>
											<td>
<?php
if($oldstart!="" && $oldend!="" && $sex=="" && $carrier==""){
       	echo "ค้นหาลูกค้าอายุระหว่าง".$oldstart." ถึง ".$oldend;
       } else if($oldstart=="" && $oldend=="" && $sex!="" && $carrier==""){
       	echo "ค้นหาลูกค้าเพศ : ".$cus_sex;
       } else if($oldstart=="" && $oldend=="" && $sex=="" && $carrier!=""){
       	echo "ค้นหาลูกค้าอาชีพ : ".$row['cus_carrier'];
       } else if($oldstart!="" && $oldend!="" && $sex!="" && $carrier==""){
       	echo "อายุระหว่าง".$oldstart." ถึง ".$oldend." เพศ : ".$cus_sex;
       } else if($oldstart!="" && $oldend!="" && $sex=="" && $carrier!=""){
       	echo "อายุระหว่าง".$oldstart." ถึง ".$oldend." อาชีพ ".$row['cus_carrier'];
       } else if($oldstart=="" && $oldend=="" && $sex!="" && $carrier!=""){
       echo "ค้นหาลูกค้าเพศ : ".$cus_sex." ที่มีอาชีพ : ".$row['cus_carrier'];;
       } else if($oldstart!="" && $oldend!="" && $sex!="" && $carrier!=""){
       	echo "ลูกค้าอายุระหว่าง".$oldstart." ถึง ".$oldend." เพศ : ".$cus_sex." อาชีพ ".$row['cus_carrier'];
       } else {
       			echo "test8";
       }

?>
											</td>
											<td class="actions" style="font-size:15px;">
												<a href="cus_profile-<?=$row['id']?>" onclick="clicksound.playclip()" style="font-size: 16px;" class="on-default "><i class="fa fa-play-circle"></i></a>
											</td>
  </tr>
<?php
}
?>	
									</tbody>
								</table>
							</div>
						</section>


		<?php
        break;
        case "4":
        if($_REQUEST['companyName']==""){echo"<script>alert('ยังไม่ใส่ข้อมูลบริษัทประกัน');history.back();</script>";exit;}
	
		$companyName=$_REQUEST['companyName'];
		
		?>


		<section class="panel">
	<header class="panel-heading">
		<div class="panel-actions">
			<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
		</div>
		<h2 class="panel-title">ค้นหากลุ่มประกันชีวิต</h2>
	</header>
		<div class="panel-body">
			<table class="table table-striped mb-none" id="datatable-editable">
									<thead>
										<tr>
											<th>ID</th>
											<th>ชื่อลูกค้า</th>
											<th>ประเภทลูกค้า</th>
											<th>ค้นหาลูกค้าของ <?=$companyName?> </th>
											<th style="width:10%">Action</th>
										</tr>
									</thead>
									<tbody>
<?php
//เลือกข้อมูล
//$sql="SELECT * FROM customer WHERE customer_id = 6 ORDER BY id DESC ";
	
$sql="SELECT customer.id AS customer_id, customer.cus_perface AS customer_cus_perface, customer.cus_name AS cus_name, customer.cus_lastname AS cus_lastname, customer.cus_types AS cus_type, insurance.ins_nameCompany AS ins_nameCompany FROM customer RIGHT JOIN insurance ON insurance.customer_id=customer.id WHERE (insurance.ins_nameCompany = '$companyName') AND (customer.member_id= $iduser) ORDER BY insurance.id DESC ";
$result=mysql_query($sql)or die(mysql_error());
for($i=0;$row=mysql_fetch_assoc($result);$i++){ 

?>
<tr class="gradeX">
<?php

    $cus_cus_type = $row['cus_type'];

switch ($cus_cus_type) {
    case "1":
        $cus_cus_type = "การเงินทั้งระบบ";
        break;
    case "2":
        $cus_cus_type = "วางแผนเฉพาะประกัน";
        break;
    case "3":
        $cus_cus_type = "วางแผนเฉพาะการลงทุน";
        break;        
    default:
        $cus_cus_type = "อื่นๆ";
}	

        $cus_perface = $row['cus_perface'];

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
											<td><?=$row['customer_id']?></td>
											<td><?=$cus_perface?><?=$row['cus_name']?> <?=$row['cus_lastname']?></td>
											<td><?=$row['cus_type']?></td>
											<td><?=$row['ins_nameCompany']?></td>
											<td class="actions" style="font-size:15px;">
												<a href="cus_profile-<?=$row['customer_id']?>" onclick="clicksound.playclip()" style="font-size: 16px;" class="on-default "><i class="fa fa-play-circle"></i></a>
											</td>
  </tr>
<?php
}
?>	
									</tbody>
								</table>
							</div>
						</section>


		<?php
        break; 
    case "5":
        if($_REQUEST['type']==""){echo"<script>alert('ยังไม่ใส่ข้อมูลประเภทของประกัน');history.back();</script>";exit;}
	
		$type=$_REQUEST['type'];
		
		?>


		<section class="panel">
	<header class="panel-heading">
		<div class="panel-actions">
			<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
		</div>
		<h2 class="panel-title">ค้นหากลุ่มประกันวินาศภัย</h2>
	</header>
		<div class="panel-body">
			<table class="table table-striped mb-none" id="datatable-editable">
									<thead>
										<tr>
											<th>ID</th>
											<th>ชื่อลูกค้า</th>
											<th>ประเภทลูกค้า</th>
											<th>ค้นหาลูกค้าของ <?=$type?> </th>
											<th style="width:10%">Action</th>
										</tr>
									</thead>
									<tbody>
<?php
//เลือกข้อมูล
//$sql="SELECT * FROM customer WHERE customer_id = 6 ORDER BY id DESC ";
	
$sql="SELECT customer.id AS customer_id, customer.cus_perface AS customer_cus_perface, customer.cus_name AS cus_name, customer.cus_lastname AS cus_lastname, customer.cus_types AS cus_type, insurance_al.inal_type AS inal_type FROM customer RIGHT JOIN insurance_al ON insurance_al.customer_id=customer.id WHERE (insurance_al.inal_type = '$type') AND (customer.member_id= $iduser) ORDER BY insurance_al.id DESC ";
$result=mysql_query($sql)or die(mysql_error());
for($i=0;$row=mysql_fetch_assoc($result);$i++){ 

?>
<tr class="gradeX">
<?php

    $cus_cus_type = $row['cus_type'];

switch ($cus_cus_type) {
    case "1":
        $cus_cus_type = "การเงินทั้งระบบ";
        break;
    case "2":
        $cus_cus_type = "วางแผนเฉพาะประกัน";
        break;
    case "3":
        $cus_cus_type = "วางแผนเฉพาะการลงทุน";
        break;        
    default:
        $cus_cus_type = "อื่นๆ";
}	

        $cus_perface = $row['cus_perface'];

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
											<td><?=$row['customer_id']?></td>
											<td><?=$cus_perface?><?=$row['cus_name']?> <?=$row['cus_lastname']?></td>
											<td><?=$row['cus_type']?></td>
											<td><?=$row['inal_type']?></td>
											<td class="actions" style="font-size:15px;">
												<a href="cus_profile-<?=$row['customer_id']?>" onclick="clicksound.playclip()" style="font-size: 16px;" class="on-default "><i class="fa fa-play-circle"></i></a>
											</td>
  </tr>
<?php
}
?>	
									</tbody>
								</table>
							</div>
						</section>


		<?php
        break; 
    case "6":
        if($_REQUEST['product']==""){echo"<script>alert('ยังไม่ใส่ข้อมูลชื่อสินค้า');history.back();</script>";exit;}
	
		$product=$_REQUEST['product'];
		
		?>


		<section class="panel">
	<header class="panel-heading">
		<div class="panel-actions">
			<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
		</div>
		<h2 class="panel-title">ค้นหากลุ่มสินค้าต่างประเทศ</h2>
	</header>
		<div class="panel-body">
			<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
									<thead>
										<tr>
											<th>ID</th>
											<th>ชื่อลูกค้า</th>
											<th>ประเภทลูกค้า</th>
											<th>ค้นหาสินค้าต่างประเทศ <?=$product?> </th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
<?php
//เลือกข้อมูล
//$sql="SELECT * FROM customer WHERE customer_id = 6 ORDER BY id DESC ";
	
$sql="SELECT customer.id AS customer_id, customer.cus_perface AS customer_cus_perface, customer.cus_name AS cus_name, customer.cus_lastname AS cus_lastname, customer.cus_types AS cus_type, product_aboard.product AS product FROM customer RIGHT JOIN product_aboard ON product_aboard.customer_id=customer.id WHERE (product_aboard.product = '$product') AND (customer.member_id= $iduser) ORDER BY product_aboard.id DESC ";
$result=mysql_query($sql)or die(mysql_error());
for($i=0;$row=mysql_fetch_assoc($result);$i++){ 

?>
<tr class="gradeX">
<?php

    $cus_cus_type = $row['cus_type'];

switch ($cus_cus_type) {
    case "1":
        $cus_cus_type = "การเงินทั้งระบบ";
        break;
    case "2":
        $cus_cus_type = "วางแผนเฉพาะประกัน";
        break;
    case "3":
        $cus_cus_type = "วางแผนเฉพาะการลงทุน";
        break;        
    default:
        $cus_cus_type = "อื่นๆ";
}	

        $cus_perface = $row['cus_perface'];

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
											<td><?=$row['customer_id']?></td>
											<td><?=$cus_perface?><?=$row['cus_name']?> <?=$row['cus_lastname']?></td>
											<td><?=$row['cus_type']?></td>
											<td><?=$row['product']?></td>
											<td class="actions">
												<a href="c-<?=$row['customer_id']?>" onclick="clicksound.playclip()" class="on-default "><i class="fa fa-play-circle"></i></a>
											</td>
  </tr>
<?php
}
?>	
									</tbody>
								</table>
							</div>
						</section>


		<?php
        break;               
    default:
        echo"<script>alert('ท่านใส่ข้อมูลไม่ครบ');window.location='searchdate';</script>";exit;
}	
?>



















































								<section class="panel form-wizard" id="w4">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
											
										</div>
						
										<h2 class="panel-title">Search Data</h2>
									</header>
									<div class="panel-body">
										
						
										
			<form class="form-horizontal" novalidate="novalidate" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" name="product" >		
											<div class="tab-content">
												<div id="w4-account" class="tab-pane active">
<!--
				<input name="id" type="hidden" id="id" value="<?=$customer_id?>"/>													
				<input name="meid" type="hidden" id="id" value="<?=$iduser?>"/>
				<input name="action" type="hidden" id="id" value="newaction"/>

-->				





                <div class="col-md-12">
                   
           
            <div class="col-md-4">


            	    <div class="checkbox">
            	    	<label class="radio-inline">
						  <input type="radio" name="action" id="inlineRadio1" value="1"> ค้นหาดิวเบี้ย 
						</label>

					  
					</div>

            	<br>
                    
                </div>


                <div class="col-md-4">
                	<div style="padding:10px;" class="form-group">
                        <label for="dealDate" class=" control-label">ตั้งแต่วันที่</label>
                    
                            <div class="input-group date">
                                <input id="dealDate" name="startDate" class="form-control" type="text">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </div>
                    
                    </div>
                </div>


                <div class="col-md-4">
                	<div style="padding:10px;" class="form-group">
                        <label for="dealDate" class=" control-label">จนถึงวันที่</label>
                      
                            <div class="input-group date">
                                <input id="dealDate" name="endDate" class="form-control" type="text">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </div>
                     
                    </div>
                </div>


                <div class="col-md-4">
                	
                   

                    <div style="padding:10px;" class="form-group">
                        <label for="typePay" class="control-label">ประเภทของสินค้า</label>
                       
                            <select name="typePay" id="typePay" class="form-control">
                                <option value="">-- โปรดเลือก --</option>
                                <option value="1">OFFSHORE PRODUCT</option>
                                <option value="2">ประกันชีวิต</option>
                                <option value="3">ประกันวินาศภัย</option>
                                
                            </select>
                    
                    </div>

                   
            	
                
<br>

                </div>



                <div class="col-md-4">
                	
                   
					<div style="padding:10px;" class="typePay2 hide">
                    <div class="form-group">
                    	
                        <label for="company" class=" control-label">บริษัท OFFSHORE PRODUCT</label>
                       
                            <select name="companyName1" id="companyName1" class="form-control">
                    	<option value="">-- โปรดเลือก --</option>
														<?php
                        $sqlcus="SELECT * FROM product2 WHERE category_id = 4 ORDER BY id ASC ";
						$resultcus=mysql_query($sqlcus)or die(mysql_error());
						for($icus=0;$rowcus=mysql_fetch_assoc($resultcus);$icus++){ 
						?>
                   		<option value="<?=$rowcus['name']?>"><?=$rowcus['name']?></option>
                   		<?php
                   		}
                   		?>
                    </select>
                        
                         </div>
                    </div>


                    <div style="padding:10px;" class="typePay3 hide">
                    	<div class="form-group">
                    	
                        <label for="typePay2" class=" control-label">บริษัท ประกันชีวิต</label>
                     
                           <select name="companyName2" id="companyName2" class="form-control">
                                <option value="">-- โปรดเลือก --</option>
                                <?php
                        $sqlcus="SELECT * FROM product2 WHERE category_id = 6 ORDER BY id ASC ";
						$resultcus=mysql_query($sqlcus)or die(mysql_error());
						for($icus=0;$rowcus=mysql_fetch_assoc($resultcus);$icus++){ 
						?>
                   		<option value="<?=$rowcus['name']?>"><?=$rowcus['name']?></option>
                   		<?php
                   		}
                   		?>
                            </select>
                       
                         </div>
                    </div>



                    <div style="padding:10px;" class="typePay4 hide">
                    	<div class="form-group">
                    	
                        <label for="typePay2" class=" control-label">บริษัท ประกันวินาศภัย</label>
                     
                            <select name="companyName3" id="companyName3" class="form-control">
                                <option value="">-- โปรดเลือก --</option>
                                <?php
                        $sqlcus="SELECT * FROM product2 WHERE category_id = 8 ORDER BY id ASC ";
						$resultcus=mysql_query($sqlcus)or die(mysql_error());
						for($icus=0;$rowcus=mysql_fetch_assoc($resultcus);$icus++){ 
						?>
                   		<option value="<?=$rowcus['name']?>"><?=$rowcus['name']?></option>
                   		<?php
                   		}
                   		?>
                            </select>
                        
                         </div>
                    </div>

                   
            	
                
<br>

                </div>

                 <div class="col-md-4">
                	
                   
                 	<div style="padding:10px;" class="typePay2-2 hide">
                    <div class="form-group">
                <label for="type1" class=" control-label">ชื่อสินค้า</label>
            
                    <select name="type1" id="type1" class="form-control">
                    	<option value="">-- โปรดเลือก --</option>
                       <?php
                        $sqlcus="SELECT * FROM product2 WHERE category_id = 3 ORDER BY id ASC ";
						$resultcus=mysql_query($sqlcus)or die(mysql_error());
						for($icus=0;$rowcus=mysql_fetch_assoc($resultcus);$icus++){ 
						?>
                   		<option value="<?=$rowcus['name']?>"><?=$rowcus['name']?></option>
                   		<?php
                   		}
                   		?>
                    </select>
                
            </div>
                    </div>



                    <div style="padding:10px;" class="typePay3-3 hide">
                    <div class="form-group">
                        <label for="type2" class=" control-label">แบบประกัน</label>
                       
                         
                            <select name="type2" id="type2" class="form-control">
                                <option value="">-- โปรดเลือก --</option>
                                <?php
                        $sqlcus="SELECT * FROM product2 WHERE category_id = 14 ORDER BY id ASC ";
						$resultcus=mysql_query($sqlcus)or die(mysql_error());
						for($icus=0;$rowcus=mysql_fetch_assoc($resultcus);$icus++){ 
						?>
                   		<option value="<?=$rowcus['name']?>"><?=$rowcus['name']?></option>
                   		<?php
                   		}
                   		?>
                            </select>
                      
                    </div>
                    </div>





                    <div style="padding:10px;" class="typePay4-4 hide">
                    <div class="form-group">
                        <label for="type" class=" control-label">ประเภทของประกัน</label>
                    
                            <select name="type3" id="type3" class="form-control">
                                <option value="">-- โปรดเลือก --</option>
                                <?php
                        $sqlcus="SELECT * FROM product2 WHERE category_id = 9 ORDER BY id ASC ";
						$resultcus=mysql_query($sqlcus)or die(mysql_error());
						for($icus=0;$rowcus=mysql_fetch_assoc($resultcus);$icus++){ 
						?>
                   		<option value="<?=$rowcus['name']?>"><?=$rowcus['name']?></option>
                   		<?php
                   		}
                   		?>
                            </select>
                  
                    </div>
                    </div>

                   
            	
                
<br>

                </div>





                </div>

<legend class="section"></legend>


<div class="col-md-12">
                   
           
            <div class="col-md-12">


            	    <div class="checkbox">
            	    	<label class="radio-inline">
						  <input type="radio" name="action" id="inlineRadio1" value="2"> ค้นหาลูกค้า
						</label>

					  
					</div>

            	<br>
                    
                </div>








<div class="col-md-12">           

<div class="col-md-4">
	<div style="padding:10px;" class="form-group">
                        <label for="dealDate" class="control-label">อายุ</label>
                       
                            
                    </div>
</div>
                <div  class="col-md-4">
                	
                   

                     <div style="padding:10px;" class="form-group">
                        <label for="oldstart" class=" control-label">ตั้งแต่</label>
                    
                            <input type="text" name="oldstart" id="oldstart" class="form-control">
                       
                    </div>

                    
            	
                


                </div>


 <div class="col-md-4">

<div style="padding:10px;" class="form-group">
                        <label for="oldend" class="control-label">ถึง</label>
                      
                            <input type="text" name="oldend" id="oldend" class="form-control">
                     
                       
                    </div>


</div>
</div>


























      <div class="col-md-12">           

<div class="col-md-4">
	<div style="padding:10px;" class="form-group">
                        <label for="dealDate" class="control-label">วันเกิด</label>
                       
                            
                    </div>
</div>
                <div  class="col-md-4">
                	
                   

                     <div style="padding:10px;" class="form-group">
                        <label for="dealDate" class="control-label">ตั้งแต่วันที่</label>
                       
                            <div class="input-group date">
                                <input id="dealDate" name="startDate2" class="form-control" type="text">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                           
                        </div>
                    </div>

                    
            	
                


                </div>


 <div class="col-md-4">

<div style="padding:10px;" class="form-group">
                        <label for="dealDate" class="control-label">จนถึงวันที่</label>
                     
                            <div class="input-group date">
                                <input id="dealDate" name="endDate2" class="form-control" type="text">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </div>
                       
                    </div>


</div>
</div>



<div class="col-md-12">           

<div class="col-md-4">
	


</div>
                <div  class="col-md-4">
                	
                   

                     <div style="padding:10px;" class="form-group">
                        <label for="oldstart" class=" control-label">เพศ</label>
                    
                           <select name="sex" id="sex" class="form-control">
                                <option value="">-- โปรดเลือก --</option>
                                <option value="1">ชาย</option>
                                <option value="2">หญิง</option>
                                <option value="3">ไม่ระบุ</option>
                            </select>
                       
                    </div>

                    
            	
                


                </div>


 <div class="col-md-4">

<div style="padding:10px;" class="form-group">
                        <label for="oldend" class="control-label">อาชีพ</label>
                      
                            <select name="carrier" id="carrier" class="form-control">
							                                

							                                <option value="">--เลือกอาชีพ--</option>
							                                <?php
									                        $sqlcus="SELECT * FROM product2 WHERE category_id = 11 ORDER BY id ASC ";
															$resultcus=mysql_query($sqlcus)or die(mysql_error());
															for($icus=0;$rowcus=mysql_fetch_assoc($resultcus);$icus++){ 
															?>
									                   		<option value="<?=$rowcus['name']?>"><?=$rowcus['name']?></option>
									                   		<?php
									                   		}
									                   		?>
							                            </select>
                     
                       
                    </div>


</div>
</div>





                </div>


                <legend class="section"></legend>
            <div class="text-center">
                <button type="submit" class="btn btn-info" onclick="clicksound.playclip()"><i class="fa fa-search"></i> ค้นหา</button>
                <button type="reset" class="btn btn-default" onclick="showhide('#show','#add');"><i class="fa fa-eraser"></i> ยกเลิก</button>
            </div>






												</div>


												
											
												





											</div>
										
									</div>
									

									</form>
								</section>




							</div>
						</div>






				
					


					<!-- end: page -->
				</section>








			</div>

			<aside id="sidebar-right" class="sidebar-right">
				<div class="nano">
					<div class="nano-content">
						<a href="#" class="mobile-close visible-xs">
							Collapse <i class="fa fa-chevron-right"></i>
						</a>
			
						<div class="sidebar-right-wrapper">
			
							<div class="sidebar-widget widget-calendar">
								<h6>Upcoming Tasks</h6>
								<div data-plugin-datepicker data-plugin-skin="dark" ></div>
			
								
							</div>
			
							<div class="sidebar-widget widget-friends">
								<h6>Friends</h6>
								<ul>
									<?php
								$sql1="SELECT * FROM user WHERE username NOT LIKE '%$username%'  ORDER BY id ASC LIMIT 0, 8";
											$result1=mysql_query($sql1)or die(mysql_error());
									for($i=0;$row2=mysql_fetch_assoc($result1);$i++){ 
											?>

									<li class="status-<?=$row2['status']?>">
										<figure class="profile-picture">
											<a href="friends.php?id=<?=$row2['id']?>&meid=<?=$iduser?>" target="_blank"><img src="avatar/<?=$row2['Image']?>" alt="<?=$row2['username']?>" style="width:35px; height:35px;" class="img-circle"></a>
										</figure>
										<div class="profile-info">
											<span class="name"><a href="friends.php?id=<?=$row2['id']?>&meid=<?=$iduser?>" target="_blank"><?=$row2['First_Name']?> <?=$row2['Last_Name']?></a></span>
											<span class="title">administrator.</span>
										</div>
									</li>

									<?php } ?>
									
								</ul>
							</div>
			
						</div>
					</div>
				</div>
			</aside>


			
		</section>






		<!-- Vendor -->
			<script src="assets/vendor/jquery/jquery.js"></script>	
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>		
		<script src="assets/vendor/jquery-cookie/jquery.cookie.js"></script>		
			
			<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>		
			<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>		
			<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker2.js"></script>	
				<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>	
					<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
<script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>

					<script src="assets/vendor/jquery-autosize/jquery.autosize.js"></script>
		
		<!-- Specific Page Vendor -->		<script src="assets/vendor/jquery-validation/jquery.validate.js"></script>
		<script src="assets/vendor/bootstrap-wizard/jquery.bootstrap.wizard.js"></script>
		<script src="assets/vendor/select2/select2.js"></script>
		<script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>		
		<script src="assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>		
		<script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		<script src="assets/vendor/fullcalendar/lib/moment.min.js"></script>
		<script src="assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
		<script src="assets/vendor/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>




		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>

		<!-- Analytics to Track Preview Website -->		
		<!-- Examples -->
		<script src="assets/javascripts/forms/examples.validation.js"></script>

		<script src="assets/javascripts/tables/examples.datatables.editable.js"></script>

		<script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>
		<script src="assets/javascripts/ui-elements/examples.modals.js"></script>
		<script src="assets/javascripts/forms/examples.wizard.js"></script>
		<script src="assets/vendor/pnotify/pnotify.custom.js"></script>
		<script src="assets/javascripts/ui-elements/examples.loading.overlay.js"></script>
	
		<script>(function(a,b,c){if(c in b&&b[c]){var d,e=a.location,f=/^(a|html)$/i;a.addEventListener("click",function(a){d=a.target;while(!f.test(d.nodeName))d=d.parentNode;"href"in d&&(d.href.indexOf("http")||~d.href.indexOf(e.host))&&(a.preventDefault(),e.href=d.href)},!1)}})(document,window.navigator,"standalone")</script>   
		




<script type="text/javascript">

var datatableInit = function() {
		var $table = $('#datatable-tabletools');

		$table.dataTable({
			sDom: "<'text-right mb-md'T>" + $.fn.dataTable.defaults.sDom,
			oTableTools: {
				sSwfPath: $table.data('swf-path'),
				aButtons: [
					{
						sExtends: 'print',
						sButtonText: 'Print',
						sInfo: 'Please press CTR+P to print or ESC to quit'
					}
				]
			}
		});

	};

	$(function() {
		datatableInit();
	});






    $(document).ready(function() {
       $('select#typePay').change(function() {
            var tex = $('select#typePay').val();

            if (tex == 1) {
                $(".typePay2").fadeIn().removeClass("hide");
                $(".typePay2-2").fadeIn().removeClass("hide");
                $(".typePay3").fadeIn().addClass("hide");
                $(".typePay3-3").fadeIn().addClass("hide");
                $(".typePay4").fadeIn().addClass("hide");
                $(".typePay4-4").fadeIn().addClass("hide");
            } else if(tex == 2) {
            	$(".typePay4").fadeIn().addClass("hide");
            	$(".typePay4-4").fadeIn().addClass("hide");
            	$(".typePay3").fadeIn().removeClass("hide");
            	$(".typePay3-3").fadeIn().removeClass("hide");
                $(".typePay2").fadeIn().addClass("hide");
                $(".typePay2-2").fadeIn().addClass("hide");
            } else if(tex == 3) {
            	$(".typePay4").fadeIn().removeClass("hide");
            	$(".typePay4-4").fadeIn().removeClass("hide");
            	$(".typePay3").fadeIn().addClass("hide");
            	$(".typePay3-3").fadeIn().addClass("hide");
                $(".typePay2").fadeIn().addClass("hide");
                $(".typePay2-2").fadeIn().addClass("hide");
            } else {
            $(".typePay2").fadeIn().addClass("hide");
            $(".typePay3").fadeIn().addClass("hide");
            $(".typePay4").fadeIn().addClass("hide");
            $(".typePay2-2").fadeIn().addClass("hide");
            $(".typePay3-3").fadeIn().addClass("hide");
            $(".typePay4-4").fadeIn().addClass("hide");
        }
        });

        $('.input-group.date').datepicker({
            format: "yyyy-mm-dd",
            weekStart: 0,
            todayBtn: "linked",
            autoclose: true,
            todayHighlight: true,
            toggleActive: true
        });
    });

function product_imageCreateElement(){
  var product_image=document.getElementById('product_image');
  var product_imageElement=document.createElement('input');
      product_imageElement.setAttribute('type',"file");
      product_imageElement.setAttribute('name',"product_image[]");
      product_imageElement.setAttribute('class',"form-control");
      product_image.appendChild(product_imageElement);     
}




</script>  



<script>

// Mouseover/ Click sound effect- by JavaScript Kit (www.javascriptkit.com)
// Visit JavaScript Kit at http://www.javascriptkit.com/ for full source code

//** Usage: Instantiate script by calling: var uniquevar=createsoundbite("soundfile1", "fallbackfile2", "fallebacksound3", etc)
//** Call: uniquevar.playclip() to play sound

var html5_audiotypes={ //define list of audio file extensions and their associated audio types. Add to it if your specified audio file isn't on this list:
	"mp3": "audio/mpeg",
	"mp4": "audio/mp4",
	"ogg": "audio/ogg",
	"wav": "audio/wav"
}

function createsoundbite(sound){
	var html5audio=document.createElement('audio')
	if (html5audio.canPlayType){ //check support for HTML5 audio
		for (var i=0; i<arguments.length; i++){
			var sourceel=document.createElement('source')
			sourceel.setAttribute('src', arguments[i])
			if (arguments[i].match(/\.(\w+)$/i))
				sourceel.setAttribute('type', html5_audiotypes[RegExp.$1])
			html5audio.appendChild(sourceel)
		}
		html5audio.load()
		html5audio.playclip=function(){
			html5audio.pause()
			html5audio.currentTime=0
			html5audio.play()
		}
		return html5audio
	}
	else{
		return {playclip:function(){throw new Error("Your browser doesn't support HTML5 audio unfortunately")}}
	}
}

//Initialize two sound clips with 1 fallback file each:

var mouseoversound=createsoundbite("whistle.ogg", "whistle.mp3")
var clicksound=createsoundbite("click.ogg", "http://www.javascriptkit.com/script/script2/click.mp3")

</script>

		


	</body>
</html>