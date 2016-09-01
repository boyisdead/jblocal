<?php
session_start();
include('server/connect.php');
if(isset($_SESSION['ssUsername'])){$username=$_SESSION['ssUsername'];}
else if(!isset($_SESSION['ssUsername'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}

$customer_id = $_REQUEST['cus_id'];

$sql1="SELECT * FROM user WHERE username = '$username'";
$result1=mysql_query($sql1)or die(mysql_error());
$row1=mysql_fetch_assoc($result1);
$iduser = $row1['id'];


$sql="SELECT * FROM customer WHERE id = '$customer_id' ";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_assoc($result);




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


$cus_tex = $row['cus_tex'];

switch ($cus_tex) {
    case "1":
        $cus_tex = "ยื่น";
        break;      
    default:
        $cus_tex = "ไม่ยื่น";
}	



$cus_texCount = $row['cus_texCount'];

switch ($cus_texCount) {
    case "1":
        $cus_texCount = "ยื่นปีละครั้ง";
        break;  
    case "2":
        $cus_texCount = "ยื่นปีละ 2 ครั้ง";
        break;         
    default:
        $cus_texCount = "ไม่ระบุ";
}	


?>

<!doctype html>
<html class="fixed">
	<head>
		<!-- Basic -->
		<meta charset="UTF-8">
		<title><?=$row['cus_name']?> <?=$row['cus_lastname']?></title>
		<meta name="keywords" content="<?=$row['cus_name']?> <?=$row['cus_lastname']?>" />
		<meta name="description" content="<?=$row['cus_name']?> <?=$row['cus_lastname']?>">
		

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
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
		<link rel="stylesheet" href="assets/vendor/select2/select2.css">
		<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css">
		

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
									<a role="menuitem" tabindex="-1" href="pages-lock-screen" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
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
									<li >
										<a href="Dashboard" onclick="clicksound.playclip()">
											<i class="fa fa-bullseye" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
									</li>
									<li class="nav-expanded nav-active">
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
									<li >
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
						<h2>Customer Profile</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="Dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Customer Profile</span></li>
								
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right" onclick="clicksound.playclip()"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					
					<div class="row">
						<div class="col-md-4 col-lg-3">

							<section class="panel">
								<div class="panel-body">
									<a href="cus_profile-<?=$row['id']?>">
									<div class="thumb-info mb-md">
										<img src="cusimage/<?=$row['image']?>" class="rounded img-responsive" alt="<?=$row['username']?>">
										<div class="thumb-info-title">
											<span class="thumb-info-inner"><?=$row['cus_name']?> </span>
											<span class="thumb-info-type">Customer</span>
										</div>
									</div></a>

									<div class="widget-toggle-expand mb-md">
										<div class="widget-header">
											<h6><?=$cus_perface?><?=$row['cus_name']?> <?=$row['cus_lastname']?></h6>
											<div class="widget-toggle">+</div>
										</div>
										
										<div class="widget-content-expanded">
											
											<i class="fa fa-phone"></i>  : <?=$row['cus_tel']?></li><br>
											<i class="fa fa-envelope"></i>  : <?=$row['cus_email']?></li><br>
											<i class="fa fa-venus-mars"></i>  : <?=$cus_sex?></li><br>
											<i class="fa fa-heart-o "></i> Status : <?=$cus_status?></li><br>
											<i class="fa fa-birthday-cake"></i> :  <?=$row['cus_birthday']?></li><br>
											<i class="fa fa-credit-card"></i> :  <?=$row['cus_idcard']?></li>
										</div>
									</div>

									<hr class="dotted short">

									<h6 class="text-muted">Remark</h6>
									<p><?=$row['cus_remark']?></p>
									<div class="clearfix">
										
									</div>

									<hr class="dotted short">

									

								</div>
							</section>


							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										
									</div>

									<h2 class="panel-title">
										<span class="label label-primary label-sm text-normal va-middle mr-sm"><?=$numAll?></span>
										<span class="va-middle">Friends</span>
									</h2>
								</header>
								<div class="panel-body">
									<div class="content">
										<ul class="simple-user-list">

											<?php
											$sql6="SELECT * FROM relationcus WHERE cud_id = $customer_id ";
											$result6=mysql_query($sql6)or die(mysql_error());
											for($i=0;$row6=mysql_fetch_assoc($result6);$i++){ 

												$sql4="SELECT * FROM customer WHERE id = $row6[relation_id] ";
											$result4=mysql_query($sql4)or die(mysql_error());
											$row4=mysql_fetch_assoc($result4);

											?>
											
											<li>
												<figure class="image rounded">
													<a href="cus_profile-<?=$row4['id']?>" target="_blank"><img src="cusimage/<?=$row4['image']?>" width="35" height="35" class="img-circle"></a>
												</figure>
												<span class="title"><a href="cus_profile-<?=$row4['id']?>" target="_blank"><?=$row4['cus_name']?> <?=$row4['cus_lastname']?></a></span>
												<span class="message truncate"><?=$row6['relation_do']?></span>
												<a href="#modalAnim<?=$row6['id']?>" class="modal-with-zoom-anim" style="font-size: 15px;" ><i class="fa fa-trash-o"></i></a>
												<div id="modalAnim<?=$row6['id']?>" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Are you sure?</h2>
											</header>
											<div class="panel-body">
												<div class="modal-wrapper">
													<div class="modal-icon">
														<i class="fa fa-question-circle"></i>
													</div>
													<div class="modal-text">
														<p>Are you sure that you want to delete this Relation ?</p>
													</div>
												</div>
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														
														<a class="btn btn-primary " onclick="clicksound.playclip()" href="server/relation.php?id=<?=$row6['id']?>&action=delrelation">Confirm</a>
														<button class="btn btn-default modal-dismiss">Cancel</button>
													</div>
												</div>
											</footer>
										</section>
									</div>
											</li>
											
											<?php } ?>


											<?php
											$sql7="SELECT * FROM relationcus WHERE  relation_id = $customer_id";
											$result7=mysql_query($sql7)or die(mysql_error());
											for($i=0;$row7=mysql_fetch_assoc($result7);$i++){ 

												$sql8="SELECT * FROM customer WHERE id = $row7[cud_id] ";
											$result8=mysql_query($sql8)or die(mysql_error());
											$row8=mysql_fetch_assoc($result8);
											?>
											
											<li>
												<figure class="image rounded">
													<a href="cus_profile-<?=$row8['id']?>" onclick="clicksound.playclip()" target="_blank"><img src="cusimage/<?=$row8['image']?>" width="35" height="35" class="img-circle"></a>
												</figure>
												<span class="title"><a href="cus_profile-<?=$row8['id']?>" target="_blank"><?=$row8['cus_name']?> <?=$row8['cus_lastname']?></a></span>
												<span class="message truncate"><?=$row7['relation_do']?></span>
												<a href="#modalAnim<?=$row7['id']?>" onclick="clicksound.playclip()" class="modal-with-zoom-anim" style="font-size: 15px;" ><i class="fa fa-trash-o"></i></a>
												<div id="modalAnim<?=$row7['id']?>" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Are you sure?</h2>
											</header>
											<div class="panel-body">
												<div class="modal-wrapper">
													<div class="modal-icon">
														<i class="fa fa-question-circle"></i>
													</div>
													<div class="modal-text">
														<p>Are you sure that you want to delete this Relation ?</p>
													</div>
												</div>
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														
														<a class="btn btn-primary " onclick="clicksound.playclip()" href="server/relation.php?id=<?=$row7['id']?>&action=delrelation">Confirm</a>
														<button class="btn btn-default modal-dismiss">Cancel</button>
													</div>
												</div>
											</footer>
										</section>
									</div>
											</li>
											
											<?php } ?>

											
										</ul>
										<hr class="dotted short">
										
									</div>
								</div>
								
							</section>


							<a href="print_customer" class="btn btn-primary btn-lg btn-block">Print</a>

							

						</div>
						<div class="col-md-8 col-lg-6">
							<div class="tabs tabs-primary">
								<ul class="nav nav-tabs tabs-primary">
								
									<li class="active">
										<a href="#edit" data-toggle="tab" aria-expanded="true">Info</a>
									</li>
									<li class="">
										<a href="#pass" data-toggle="tab" aria-expanded="false">Edit customer info</a>
									</li>
									<li class="">
										<a href="#relation" data-toggle="tab" aria-expanded="false">Relation</a>
									</li>
									<li class="">
										<a href="#mapp" data-toggle="tab" aria-expanded="false">Map</a>
									</li>
									<li class="">
										<a href="#file" data-toggle="tab" aria-expanded="false">File</a>
									</li>
								</ul>
								<div class="tab-content">
									







									
									<div id="edit" class="tab-pane active">

									
											<h4 class="mb-xlg text-primary">Personal Information</h4>
											
											<fieldset>
												<div class="form-group">
													<label class="col-md-4 control-label" ><b>ลูกค้าประเภท :</b></label>
													<div class="col-md-7">
														<label class="" ><?=$row['cus_types']?></label>
													</div>
												</div>


												<div class="form-group">
							                        <label for="nameEng" class="col-sm-4 control-label">ชื่อ - นามสกุล (ภาษาอังกฤษ)</label>
							                        <div class="col-sm-7">
							                            <label class="" ><?=$row['nameEng']?></label>
							                        </div>
							                    </div>


												<div class="form-group">
													<label class="col-md-4 control-label" ><b>ชื่อเล่น :</b></label>
													<div class="col-md-7">
														<label class="" ><?=$row['cus_nickname']?></label>
													</div>
												</div>




												<div class="form-group">
													<label class="col-md-4 control-label" ><b>ที่อยู่ปัจจุบัน :</b></label>
													<div class="col-md-7">
														<label class="" ><?=$row['cus_address']?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" ><b>ตามทะเบียนบ้าน :</b></label>
													<div class="col-md-7">
														<label class="" ><?=$row['cus_addressOri']?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" ><b>ชนิดของบัตร :</b></label>
													<div class="col-md-7">
														<label class="control-label" ><?=$row['typecard']?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" ><b>เลขบัญชีธนาคาร :</b></label>
													<div class="col-md-7">
														<label class="control-label" ><?=$row['cus_bankNo']?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" for="profileLastName"><b>โรคประจำตัว :</b></label>
													<div class="col-md-7">
														<label class="control-label" ><?=$row['cus_disease']?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" for="profileLastName"><b>ขนาดของลูกค้า :</b></label>
													<div class="col-md-7">
														<label class="control-label" ><?=$row['cus_size']?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" for="profileAddress"><b>จำนวนผู้ที่อยู่ในอุปการะ</b></label>
													<div class="col-md-7">
														<label class="control-label" ><?=$row['cus_child']?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" for="profileAddress"><b>อาชีพ :</b></label>
													<div class="col-md-7">
														<label class="control-label" ><?=$row['cus_carrier']?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" for="profileAddress"><b>ที่มาของลูกค้า :</b></label>
													<div class="col-md-7">
														<label class="control-label" ><?=$row['cus_origin']?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" for="profileFirstName"><b>บริการยื่นภาษี :</b></label>
													<div class="col-md-7">
														<label class="control-label" ><?=$cus_tex?></label>
													</div>
												</div>
												


											</fieldset>
											<hr class="dotted tall">
											<h4 class="mb-xlg text-primary">About Tax</h4>
											<fieldset >

												
												<div class="form-group">
													<label class="col-md-4 control-label" for="profileFirstName"><b>การยื่นภาษี :</b></label>
													<div class="col-md-7">
														<label class="control-label" ><?=$cus_texCount?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" for="profileLastName"><b>RD Username :</b></label>
													<div class="col-md-7">
														<label class="control-label" ><?=$row['cus_RDlogin']?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" for="profileLastName"><b>RD Password :</b></label>
													<div class="col-md-7">
														<label class="control-label" ><?=$row['cus_RDpwd']?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" for="profileLastName"><b>TSD Username :</b></label>
													<div class="col-md-7">
														<label class="control-label" ><?=$row['cus_TSDlogin']?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" for="profileLastName"><b>TSD Username :</b></label>
													<div class="col-md-7">
														<label class="control-label" ><?=$row['cus_TSDpwd']?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" for="profileLastName"><b>หมายเหตุ :</b></label>
													<div class="col-md-7">
														<label class="control-label" ><?=$row['cus_texRemark']?></label>
													</div>
												</div>
												
											</fieldset>



											
											
											
											<div class="panel-footer">
												<div class="row">
													<div class="col-md-9 col-md-offset-9">
														
														
													</div>
												</div>
											</div>

									

									</div>


									<div id="pass" class="tab-pane">

									
											<form class="form-horizontal" action="server/cusUpdate.php" method="post" enctype="multipart/form-data" name="product" >
											<h4 class="mb-xlg">Personal Information</h4>
											
											<fieldset>
												<div class="form-group">
													<label class="col-md-3 control-label" >ประเภท :</label>
													<div class="col-md-8">
														<input name="id" type="hidden" id="id" value="<?=$row['id']?>"/>
														<input name="meid" type="hidden" id="id" value="<?=$iduser?>"/>
														<select name="type" id="type" class="form-control">
							                                <option value="<?=$row['cus_types']?>"><?=$row['cus_types']?></option>
							                                <?php
                        $sqlcus="SELECT * FROM product2 WHERE category_id = 10 ORDER BY id ASC ";
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
												<div class="form-group">
													<label class="col-md-3 control-label" >คำนำหน้าชื่อ :</label>
													<div class="col-md-8">
														<select name="perface" id="perface" class="form-control">
							                                <option value="<?=$row['cus_perface']?>"><?=$cus_perface?></option>
							                                <option value="1">ด.ช.</option>
							                                <option value="2">ด.ญ.</option>
							                                <option value="3">นาย</option>
							                                <option value="4">นางสาว</option>
							                                <option value="5">นาง</option>
							                            </select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" >ชื่อ :</label>
													<div class="col-md-8">
														<input type="text" name="name" class="form-control" value="<?=$row['cus_name']?>" >
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" >นามสกุล :</label>
													<div class="col-md-8">
														<input type="text" name="lastname" class="form-control" value="<?=$row['cus_lastname']?>"  >
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" >ชื่อ (เดิม) :</label>
													<div class="col-md-8">
														<input type="text" name="nameOld" class="form-control" value="<?=$row['cus_nameOld']?>"  >
													</div>
												</div>
												<div class="form-group">
							                        <label for="nameEng" class="col-sm-3 control-label">ชื่อ - นามสกุล (ภาษาอังกฤษ)</label>
							                        <div class="col-sm-8">
							                            <input type="text" name="nameEng" id="nameEng" value="<?=$row['nameEng']?>"  class="form-control">
							                        </div>
							                    </div>
												<div class="form-group">
													<label class="col-md-3 control-label" >ชื่อเล่น :</label>
													<div class="col-md-8">
														<input type="text" name="nickname" class="form-control" value="<?=$row['cus_nickname']?>"  >
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" >วันเกิด :</label>
													<div class="col-md-8">

													<div class="input-group date">
						                                <input id="birthday" name="birthday" value="<?=$row['cus_birthday']?>" class="form-control" type="text">
						                                <span class="input-group-addon">
						                                    <i class="fa fa-calendar"></i>
						                                </span>
						                            </div>
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" >สถานภาพ :</label>
													<div class="col-md-8">
														<select name="status" id="status" class="form-control">
							                                <option value="<?=$row['cus_status']?>"><?=$cus_status?></option>
							                                <option value="1">Single</option>
							                                <option value="2">Marriage</option>
							                                <option value="3">Marriage Legally</option>
							                                <option value="4">Single Parents</option>
							                            </select>
													</div>
												</div>


												<div class="form-group">
													<label class="col-md-3 control-label" >เพศ :</label>
													<div class="col-md-8">
														<select name="sex" id="sex" class="form-control">
							                                <option value="<?=$row['cus_sex']?>"><?=$cus_sex?></option>
							                                <option value="1">ชาย</option>
							                                <option value="2">หญิง</option>
							                                <option value="3">ไม่ระบุ</option>
							                            </select>
													</div>
												</div>

												

												<div class="form-group">
													<label class="col-md-3 control-label" >ชนิดของบัตร :</label>
													<div class="col-md-8">
														<select name="typecard" id="typecard" class="form-control">
							                                <option value="<?=$row['typecard']?>"><?=$row['typecard']?></option>
							                                <option value="บัตรประจำตัวประชาชน">บัตรประจำตัวประชาชน</option>
							                                <option value="ใบขับขี่">ใบขับขี่</option>
							                                <option value="พาสปอร์ต">พาสปอร์ต</option>
							                                <option value="สูติบัตร">สูติบัตร</option>
							                            </select>
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" >หมายเลขบัตร :</label>
													<div class="col-md-8">
														<input type="text" name="idcard" class="form-control" value="<?=$row['cus_idcard']?>"  >
													</div>
												</div>


												<div class="form-group">
													<label class="col-md-3 control-label" >จำนวนผู้ที่อยู่การอุปการะ :</label>
													<div class="col-md-8">
														<input type="text" name="child" class="form-control" value="<?=$row['cus_child']?>"  >
													</div>
												</div>


												<div class="form-group">
													<label class="col-md-3 control-label" for="profileAddress">Avatar Picture</label>
													<div class="col-md-8">
														<input type="file" name="image" class="form-control" id="profileAddress" >
													</div>
												</div>


												<div class="form-group">
							                        <label class="col-sm-3 control-label">รูปลายเซ็น</label>
							                        <div class="col-sm-8">
							                        <label for="exampleInputFile">File input</label>
							                        <input type="file" name="product_image[]" accept="image/*" class="form-control" >
							                       
							               	
							                        <span id="product_image"></span>
							                        <br>
							                        <button type="button" class="btn btn-primary" onClick="JavaScript:product_imageCreateElement();">
							                        <i class="fa fa-plus-circle"></i> Add images</button>
							                      </div>
							                  	</div>
												


											</fieldset>
											<hr class="dotted tall">
											<h4 class="mb-xlg">About Customer</h4>
											<fieldset>

												
												<div class="form-group">
													<label class="col-md-3 control-label" >อาชีพ :</label>
													<div class="col-md-8">
														<select name="carrier" id="carrier" class="form-control">
							                                

							                                <option value="<?=$row['cus_carrier']?>"><?=$row['cus_carrier']?></option>
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

												<div class="form-group">
													<label class="col-md-3 control-label" >ที่อยู่ตามทะเบียนบ้าน :</label>
													<div class="col-md-8">
														<textarea class="form-control" name="addressOriginal" rows="2"><?=$row['cus_addressOri']?></textarea>
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" >ที่อยู่ที่ติดต่อได้ :</label>
													<div class="col-md-8">
														<textarea class="form-control" name="address" rows="2"><?=$row['cus_address']?></textarea>
													</div>
												</div>


												<div class="form-group">
													<label class="col-md-3 control-label" >เบอร์โทรศัพท์ :</label>
													<div class="col-md-8">
														<input type="text" name="phone" class="form-control" value="<?=$row['cus_tel']?>"  >
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" >อีเมล์ :</label>
													<div class="col-md-8">
														<input type="text" name="email" class="form-control" value="<?=$row['cus_email']?>"  >
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" >โรคประจำตัว :</label>
													<div class="col-md-8">
														<input type="text" name="disease" class="form-control" value="<?=$row['cus_disease']?>"  >
													</div>
												</div>


												<div class="form-group">
													<label class="col-md-3 control-label" >ที่มาขอลูกค้า :</label>
													<div class="col-md-8">
														<input type="text" name="origin" class="form-control" value="<?=$row['cus_origin']?>"  >
													</div>
												</div>


												<div class="form-group">
													<label class="col-md-3 control-label" >ขนาดของลูกค้า :</label>
													<div class="col-md-8">
														<select name="size" id="size" class="form-control">
							                                <option value="<?=$row['cus_size']?>"><?=$row['cus_size']?></option>
							                                <option value="A">A</option>
							                                <option value="AA">AA</option>
							                                <option value="AAA">AAA</option>
							                                <option value="*A">*A</option>
							                                <option value="*AA">*AA</option>
							                                <option value="*AAA">*AAA</option>
							                            </select>
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" >เลขบัญชีธนาคาร :</label>
													<div class="col-md-8">
														<input type="text" name="banknumber" class="form-control" value="<?=$row['cus_bankNo']?>"  >
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName"><b>ยื่นภาษี :</b></label>
													<div class="col-md-8">
														<select name="tex" id="tex" class="form-control">
							                                <option value="<?=$row['cus_tex']?>"><?=$cus_tex?></option>
							                                <option value="1">ยื่น</option>
							                                <option value="0">ไม่ยื่น</option>
							                            </select>
														
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" >หมายเหตุ :</label>
													<div class="col-md-8">
														<textarea class="form-control" name="remark" rows="2"><?=$row['cus_remark']?></textarea>
													</div>
												</div>
												
											</fieldset>



											<hr class="dotted tall">
											<h4 class="mb-xlg">About Tax</h4>
											<fieldset  >
												
												<div class="form-group">
													<label class="col-md-4 control-label" for="profileFirstName"><b>การยื่นภาษี :</b></label>
													<div class="col-md-7">
														<select name="texcount" id="texcount" class="form-control">
						                                    <option value="<?=$row['cus_texCount']?>"><?=$cus_texCount?></option>
						                                    <option value="1">ยื่นปีละครั้ง</option>
						                                    <option value="2">ยื่นปีละ 2 ครั้ง</option>
						                                </select>
														
														
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" for="profileLastName"><b>RD Username :</b></label>
													<div class="col-md-7">
														
														<input type="text" name="cus_RDlogin" class="form-control" value="<?=$row['cus_RDlogin']?>"  >
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" for="profileLastName"><b>RD Password :</b></label>
													<div class="col-md-7">
														
														<input type="text" name="cus_RDpwd" class="form-control" value="<?=$row['cus_RDpwd']?>"  >
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" for="profileLastName"><b>TSD Username :</b></label>
													<div class="col-md-7">
														
														<input type="text" name="cus_TSDlogin" class="form-control" value="<?=$row['cus_TSDlogin']?>"  >
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" for="profileLastName"><b>TSD Password :</b></label>
													<div class="col-md-7">
														
														<input type="text" name="cus_TSDpwd" class="form-control" value="<?=$row['cus_TSDpwd']?>"  >
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" for="profileLastName"><b>หมายเหตุ :</b></label>
													<div class="col-md-7">
														
														<textarea class="form-control" name="cus_texRemark" rows="2"><?=$row['cus_texRemark']?></textarea>
													</div>
												</div>
												
											</fieldset>
											
											<div class="panel-footer">
												<div class="row">
													<div class="col-md-9 col-md-offset-3">
														<button type="submit" class="btn btn-primary">Submit</button>
														<button type="reset" class="btn btn-default">Reset</button>
													</div>
												</div>
											</div>

										</form>

									</div>

									<div id="relation" class="tab-pane">
										<form class="form-horizontal" action="server/relation.php" method="post" enctype="multipart/form-data" name="product" >
											<input name="meid" type="hidden" id="id" value="<?=$iduser?>"/>
											<input name="action" type="hidden" id="id" value="addrelation"/>
											<input name="maincus" type="hidden" id="id" value="<?=$customer_id?>"/>

											
										<h4 class="mb-xlg">สร้างความสัมพันธ์ของลูกค้า</h4>
											<fieldset  >
												
												
												<div class="form-group">
													<label class="col-md-4 control-label" for="profileLastName"><b>Customer :</b></label>
													<div class="col-md-7">
														
				<select data-plugin-selecttwo name="cusID" id="cusID " class="form-control " required="">
                        <option value="">-- โปรดเลือก --</option>
                        <?php
                        $sqlcus="SELECT * FROM customer WHERE member_id = $iduser AND id != $customer_id ORDER BY customer.cus_name DESC ";
						$resultcus=mysql_query($sqlcus)or die(mysql_error());
						for($icus=0;$rowcus=mysql_fetch_assoc($resultcus);$icus++){ 
						?>
                   		<option value="<?=$rowcus['id']?>"><?=$rowcus['cus_name']?> <?=$rowcus['cus_lastname']?></option>
                   		<?php
                   		}
                   		?>
                </select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" for="profileLastName"><b>ความสัมพันธ์ :</b></label>
													<div class="col-md-7">
														
				<select name="relation" id="relation " class="form-control " required="">
                        <option value="">-- โปรดเลือก --</option>
                        <option value="พ่อ">พ่อ</option>
                        <option value="แม่">แม่</option>
                        <option value="ลูก">ลูก</option>
                        <option value="พี่น้อง">พี่น้อง</option>
                        <option value="สามี">สามี</option>
                        <option value="ภรรยา">ภรรยา</option>
                        <option value="ลุง">ลุง</option>
                        <option value="ป้า">ป้า</option>
                        <option value="น้า">น้า</option>
                        <option value="อา">อา</option>
                        <option value="หลาน">หลาน</option>
                        <option value="เพื่อน">เพื่อน</option>
                        <option value="ญาติ">ญาติ</option>
                </select>
													</div>
												</div>
												
												
											</fieldset>

											<div class="panel-footer">
												<div class="row">
													<div class="col-md-9 col-md-offset-3">
														<button type="submit" onclick="clicksound.playclip()" class="btn btn-primary">Submit</button>
														<button type="reset" class="btn btn-default">Reset</button>
													</div>
												</div>
											</div>
												</form>
									</div>




									<div id="mapp" class="tab-pane">
										<form class="form-horizontal" action="server/super.php" method="post" enctype="multipart/form-data" name="product" >
											<input name="meid" type="hidden" id="id" value="<?=$iduser?>"/>
											<input name="action" type="hidden" id="id" value="addmap"/>
											<input name="customer_id" type="hidden" id="id" value="<?=$customer_id?>"/>

											
										<h4 class="mb-xlg">สร้างแผนที่ของลูกค้า</h4>
											<fieldset  >
												
												
											
												<div class="form-group">
													<label class="col-md-4 control-label" for="profileLastName"><b>Lat :</b></label>
													<div class="col-md-7">
														
														<input type="text" name="lat_map" class="form-control" value="<?=$row['lat_map']?>"  >
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" for="profileLastName"><b>Lng :</b></label>
													<div class="col-md-7">
														
														<input type="text" name="lng_map" class="form-control" value="<?=$row['lng_map']?>"  >
													</div>
												</div>
												
												
											</fieldset>

											<div class="panel-footer">
												<div class="row">
													<div class="col-md-9 col-md-offset-3">
														<button type="submit" onclick="clicksound.playclip()" class="btn btn-primary">Submit</button>
														<button type="reset" class="btn btn-default">Reset</button>
													</div>
												</div>
											</div>
												</form>
									</div>







<div id="file" class="tab-pane">
										<h4 class="mb-md">Update Files</h4>

										<section class="simple-compose-box mb-xlg">
											<form class="form-horizontal" action="server/insertpost.php" method="post" enctype="multipart/form-data" name="product" >
												<textarea name="message-text" data-plugin-textarea-autosize="" placeholder="What's on your mind?" rows="1" style="overflow: hidden; word-wrap: break-word; resize: none; height: 37px;"></textarea>
												<input name="customer_id" type="hidden" id="id" value="<?=$customer_id?>"/>
												<input name="member_id" type="hidden" id="id" value="<?=$iduser?>"/>
												<input name="action" type="hidden" id="id" value="insertpost"/>
											<div class="compose-box-footer">
												<ul class="compose-toolbar">
													<li>
														<input type="file" name="postimage" class="filestyle" data-input="false">
													</li>
													
												</ul>
												<ul class="compose-btn">
													<li>
														
														<button type="submit" class="btn btn-primary btn-xs" style="padding:3px 4px; margin-top:5px;">post</button>
													</li>
												</ul>
											</div>
											</form>
										</section>

										<h4 class="mb-xlg">Timeline</h4>

										<div class="timeline timeline-simple mt-xlg mb-md">
											<div class="tm-body">
												
												<ol class="tm-items" id="post-items">
													<?php
													
											$sql3="SELECT * FROM post WHERE userpost = $iduser AND userpostto = $customer_id ORDER BY insert_date DESC ";
											$result3=mysql_query($sql3)or die(mysql_error());

											for($i=0;$row3=mysql_fetch_assoc($result3);$i++){ 
												$time = strtotime($row3['insert_date']);
												$my_format = date("d/m/Y , g:i a", $time);
											?>
													<li class="post-item">
														<div class="tm-box">
															

												<a data-toggle="dropdown" aria-haspopup="true" ><i style="font-size:18px;" class="fa fa-sort-desc pull-right"></i></a>
															
															
															
														

																<ul class="dropdown-menu option-e" style="" role="menu" aria-labelledby="dLabel">
                <li role="presentation"><a role="menuitem" class="mb-xs mt-xs mr-xs modal-with-zoom-anim"  href="#modalAnim2<?=$row3['id']?>"><i class="fa fa-wrench"></i> Edit</a></li>
                <li role="presentation"><a role="menuitem" class="mb-xs mt-xs mr-xs modal-with-zoom-anim" href="#modalAnim<?=$row3['id']?>"><i class="fa fa-trash-o"></i> Delete</a></li>
             
                
              </ul>
             
										<div id="modalAnim<?=$row3['id']?>" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
												
										<section class="panel">
											<form class="form-horizontal" action="server/insertpost.php" method="post" enctype="multipart/form-data" name="product" >
											<header class="panel-heading">
												<h2 class="panel-title">Are you sure?</h2>
											</header>
											<div class="panel-body">
												<div class="modal-wrapper">
													<div class="modal-icon">
														<i class="fa fa-question-circle"></i>
													</div>
													<input name="customer_id" type="hidden" id="id" value="<?=$customer_id?>"/>
												<input name="member_id" type="hidden" id="id" value="<?=$iduser?>"/>
												<input name="action" type="hidden" id="id" value="delpost"/>
												<input name="id" type="hidden" id="id" value="<?=$row3['id']?>"/>
													<div class="modal-text">
														<p>Are you sure that you want to delete this Post?</p>
													</div>
												</div>
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														
														<button type="submit" class="btn btn-primary">Confirm </a>
														<button class="btn btn-default modal-dismiss"> Cancel</button>
													</div>
												</div>
											</footer>
											</form>
										</section>
									</div>


									<div id="modalAnim2<?=$row3['id']?>" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
										<form id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate" action="server/insertpost.php" method="post" enctype="multipart/form-data">
										<input name="customer_id" type="hidden" id="id" value="<?=$customer_id?>"/>
										<input name="member_id" type="hidden" id="id" value="<?=$iduser?>"/>
										<input name="action" type="hidden" id="id" value="uppost"/>
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Edit your post ?</h2>
											</header>
											<div class="panel-body">
												
													<div class="form-group">
											
														<div class="col-sm-12">
															<input name="id" type="hidden" id="id" value="<?=$row3['id']?>"/>
															<textarea rows="2" name="message-text" class="form-control" ><?=$row3['posttext']?></textarea>
														</div>
													</div>
												
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button type="submit" class="btn btn-primary ">Confirm</button>
														<button class="btn btn-default modal-dismiss">Cancel</button>
													</div>
												</div>
											</footer>
											
										</section>
										</form>
									</div>
								


									<figure class="profile-picture pull-left" style="margin-left:-15px; margin-right:5px; margin-top:5px;">
								<a href="#"><img src="avatar/<?=$row1['Image']?>" width="35" height="35" alt="<?=$row1['username']?>" class="img-circle" data-lock-picture="avatar/<?=$row1['Image']?>" /></a>
							</figure>


              												<p class="text-muted mb-none"><i class="fa fa-clock-o"></i>  <?=$my_format?>. 
																

															</p>
															

															<p><a href="#"><b><?=$row1['First_Name']?> <?=$row1['Last_Name']?></b> </a>: <?=$row3['posttext']?><br>

																<?php
																if($row3['postimage'] != "")
																{
																	?>


																<a href="pdf/<?=$row3['postimage']?>" target="_blank" ><i class="fa fa-file-pdf-o" style="font-size:18px;"></i> <?=$row3['postimage']?></a>

															



																
															<?php	}   ?>
															</p>
														</div>
													</li>
													<?php } ?>
													
												</ol>
											</div>
										</div>
									</div>


















								</div>
							</div>


							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
										<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
									</div>

									<h2 class="panel-title">แผนที่บ้านลูกค้า</h2>
								</header>
								<div class="panel-body">
									<div id="gmap-basic-marker" style="height: 500px; width: 100%;"></div>
								</div>
							</section>
						




						</div>
						<div class="col-md-12 col-lg-3">

							<h4 class="mb-md">Products and service</h4>
							<section class="panel">
											

							<?php

							$sqlMF="SELECT * from mutual_fund WHERE customer_id=$customer_id ORDER BY id ASC ";
							$resultMF=mysql_query($sqlMF)or die(mysql_error());
							$rowMF=mysql_fetch_assoc($resultMF);
							$numMF=mysql_num_rows($resultMF);
						
							?>
									<div class="panel-body bg-primary" style="margin-bottom:10px;">
										<div class="widget-summary widget-summary-sm">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-primary">
													<i class="fa fa-life-ring"></i>
												</div>
											</div>
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="title">Mutual Fund <a href="Add_Mutual_fund2-<?=$customer_id?>" style="float:right; color:#fff; font-size:18px"><i class="fa fa-plus-circle"></i></a></h4>
													<div class="info">
														<strong class="amount"><?=$numMF?></strong>
														<span class="text-primary " >
															<?php
															if($numMF != 0){
															?>
															<a href="cus_mutual_fund-<?=$customer_id?>-<?=$rowMF['id']?>-1" style="font-size:13px;" class="textl">(view all)</a>
															<?php
														}
															?>
														</span>
													</div>
												</div>
												<div class="summary-footer">
															<a class="text-uppercase">(view all)</a>
														</div>
											</div>
										</div>
									</div>
							<?php

							$sqlPF="SELECT * from private_fund WHERE customer_id=$customer_id ORDER BY id ASC";
							$resultPF=mysql_query($sqlPF)or die(mysql_error());
							$rowPF=mysql_fetch_assoc($resultPF);
							$numPF=mysql_num_rows($resultPF);
						
							?>		

									<div class="panel-body bg-secondary" style="margin-bottom:10px;">
										<div class="widget-summary widget-summary-sm">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-primary">
													<i class="fa fa-cube"></i>
												</div>
											</div>
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="title">Private Fund <a href="Add_Private_fund2-<?=$customer_id?>" style="float:right; color:#fff; font-size:18px"><i class="fa fa-plus-circle"></i></a></h4>
													<div class="info">
														<strong class="amount"><?=$numPF?></strong>
														<span class="text-primary " >
															<?php
															if($numPF != 0){
															?>
															<a href="cus_private_fund-<?=$customer_id?>-<?=$rowPF['id']?>-1" style="font-size:13px;" class="textl">(view all)</a>
														<?php
														}
															?></span>
													</div>
												</div>
												<div class="summary-footer">
															<a class="text-uppercase">(view all)</a>
														</div>
											</div>
										</div>
									</div>


							<?php

							$sqlAB="SELECT * from product_aboard WHERE customer_id=$customer_id ORDER BY id ASC";
							$resultAB=mysql_query($sqlAB)or die(mysql_error());
							$rowAB=mysql_fetch_assoc($resultAB);
							$numAB=mysql_num_rows($resultAB);
							
							?>	
							

									<div class="panel-body bg-tertiary" style="margin-bottom:10px;">
										<div class="widget-summary widget-summary-sm">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-primary">
													<i class="fa fa-globe"></i>
												</div>
											</div>
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="title">Product ตปท. <a href="Add_Product_service2-<?=$customer_id?>" style="float:right; color:#fff; font-size:18px"><i class="fa fa-plus-circle"></i></a></h4>
													<div class="info">
														<strong class="amount"><?=$numAB?></strong>
														<span class="text-primary " >
															<?php
															if($numAB != 0){
															?><a href="cus_product_service-<?=$customer_id?>-<?=$rowAB['id']?>-1" style="font-size:13px;" class="textl">(view all)</a>
														<?php
														}
															?></span>
													</div>
												</div>
												<div class="summary-footer">
															<a class="text-uppercase">(view all)</a>
														</div>
											</div>
										</div>
									</div>


							<?php

							$sqlIN="SELECT * from insurance WHERE customer_id=$customer_id ORDER BY id ASC";
							$resultIN=mysql_query($sqlIN)or die(mysql_error());
							$rowIN=mysql_fetch_assoc($resultIN);
							$numIN=mysql_num_rows($resultIN);
						
							?>	
					
									<div class="panel-body bg-info" style="margin-bottom:10px;">
										<div class="widget-summary widget-summary-sm">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-primary">
													<i class="fa fa-bed"></i>
												</div>
											</div>
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="title">ประกันภัยชีวิต <a href="Add_insurance2-<?=$customer_id?>" style="float:right; color:#fff; font-size:18px"><i class="fa fa-plus-circle"></i></a></h4>
													<div class="info">
														<strong class="amount"><?=$numIN?></strong>
														<span class="text-primary " >
															<?php
															if($numIN != 0){
															?><a href="cus_insurance-<?=$customer_id?>-<?=$rowIN['id']?>-1" style="font-size:13px;" class="textl">(view all)</a>
														<?php
														}
															?></span>
													</div>
												</div>
												<div class="summary-footer">
															<a class="text-uppercase">(view all)</a>
														</div>
											</div>
										</div>
									</div>


							<?php

							$sqlAL="SELECT * from insurance_al WHERE customer_id=$customer_id ";
							$resultAL=mysql_query($sqlAL)or die(mysql_error());
							$rowAL=mysql_fetch_assoc($resultAL);
							$numAL=mysql_num_rows($resultAL);
					
							?>


									<div class="panel-body bg-warning" style="margin-bottom:10px;">
										<div class="widget-summary widget-summary-sm">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-primary">
													<i class="fa fa-heartbeat"></i>
												</div>
											</div>
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="title">ประกันวินาศภัย <a href="Add_insurance_al2-<?=$customer_id?>" style="float:right; color:#fff; font-size:18px"><i class="fa fa-plus-circle"></i></a></h4>
													<div class="info">
														<strong class="amount"><?=$numAL?></strong>
														<span class="text-primary " >
															<?php
															if($numAL != 0){
															?><a href="cus_insurance_al-<?=$customer_id?><?=$rowAL['id']?>-1" style="font-size:13px;" class="textl">(view all)</a>
														<?php
														}
															?></span>
													</div>
												</div>
												<div class="summary-footer">
															<a class="text-uppercase">(view all)</a>
														</div>
											</div>
										</div>
									</div>

<!-- /////////////////////// ACTIONPLAN ///////////////////////////////////////////// -->


									<?php

							$sqlAC="SELECT * from actionplan WHERE customer_id=$customer_id ";
							$resultAC=mysql_query($sqlAC)or die(mysql_error());
							$rowAC=mysql_fetch_assoc($resultAC);
							$numAC=mysql_num_rows($resultAC);
					
							?>


									<div class="panel-body bg-quartenary" style="margin-bottom:10px;">
										<div class="widget-summary widget-summary-sm">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-primary">
													<i class="fa fa-paper-plane"></i>
												</div>
											</div>
											
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="title" style="color:#fff">Action Plan <a href="Action-plan-<?=$customer_id?>" style="float:right; color:#fff; font-size:18px"><i class="fa fa-plus-circle"></i></a></h4>
													<div class="info">
														<strong class="amount"><?=$numAC?></strong>
														<span class="text-primary " >
															<?php
															if($numAC != 0){
															?><a href="Action-plan-<?=$customer_id?>" style="font-size:13px;" onclick="clicksound.playclip()" class="textl">(view all)</a>
														<?php
														}
															?></span>
													</div>
												</div>
												<div class="summary-footer">
															<a class="text-uppercase">(view all)</a>
														</div>
											</div>


										</div>
									</div>








									<a href="other_service-<?=$customer_id?>" >	
									<div class="panel-body " style="margin-bottom:10px;">
										<div class="widget-summary widget-summary-sm">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-primary">
													<i class="fa fa-coffee"></i>
												</div>
											</div>
											
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="text-primary " style="color:#fff">บริการอื่นๆ <a href="other_service-<?=$customer_id?>" style="float:right; color:#0088cc; font-size:18px"><i class="fa fa-plus-circle"></i></a></h4>
													<div class="info">
														
														<span class="text-primary " >
														บริการอื่นๆ	(view all)
															</span>
													</div>
												</div>
												<div class="summary-footer">
															<a class="text-uppercase">(view all)</a>
														</div>
											</div>


										</div>
									</div> </a>

<!-- /////////////////////// ACTIONPLAN ///////////////////////////////////////////// -->


							</section>

							
							<h4 class="mb-md">Customer signature</h4>
							<?php
							$sqlImage="SELECT * from cus_image WHERE product_id=$customer_id ORDER BY id ";
							$resultImage=mysql_query($sqlImage)or die(mysql_error());
							$numImage=mysql_num_rows($resultImage);
							?>



							<section class="media-gallery">
						<div class="content-with-menu-container">
							
							
							
								
								<div class=" mg-files" data-sort-destination="" data-sort-id="media-gallery">
									<?php
								if($numImage>0){
								  for($i=1;$i<=$numImage;$i++){$rowImage=mysql_fetch_assoc($resultImage);
								  	$time = strtotime($rowImage['insert_date']);
									$my_format = date("d/m/Y", $time);
								?>
										<div class="thumbnail">
											<div class="thumb-preview">
												<a class="thumb-image" href="cusimage/<?=$rowImage['image']?>">
													<img src="cusimage/<?=$rowImage['image']?>" class="img-responsive" alt="Project">
												</a>
												<div class="mg-thumb-options">
													<div class="mg-zoom"><i class="fa fa-search"></i></div>
													<div class="mg-toolbar">
														
														
													</div>
												</div>
											</div>
											<h5 class="mg-title text-weight-semibold">ลายเซ็นลูกค้า</h5>
											<div class="mg-description">
												



												<small class="pull-right text-muted" style="font-size:13px;"><a class="mb-xs mt-xs mr-xs modal-with-zoom-anim" onclick="clicksound.playclip()" href="#modalAnim<?=$rowImage['id']?>"><i class="fa fa-trash-o"></i> Delete</a></small>
											</div>
										</div>

										<div id="modalAnim<?=$rowImage['id']?>" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Are you sure?</h2>
											</header>
											<div class="panel-body">
												<div class="modal-wrapper">
													<div class="modal-icon">
														<i class="fa fa-question-circle"></i>
													</div>
													<div class="modal-text">
														<p>Are you sure that you want to delete this Picture ?</p>
													</div>
												</div>
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														
														<a class="btn btn-primary " onclick="clicksound.playclip()" href="server/productImageDelete.php?id=<?=base64_encode($rowImage['id'])?>">Confirm</a>
														<button class="btn btn-default modal-dismiss">Cancel</button>
													</div>
												</div>
											</footer>
										</section>
									</div>

<?php
										}
									}
								?>



								</div>
						
						</div>
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


		<!-- Specific Page Vendor -->		
		<script src="http://maps.google.com/maps/api/js?sensor=false"></script>		
		<script src="assets/vendor/gmaps/gmaps.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>

		<!-- Analytics to Track Preview Website -->		
		<!-- Examples -->
	

		<script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>
		<script src="assets/javascripts/ui-elements/examples.modals.js"></script>
		<script src="assets/javascripts/pages/examples.mediagallery.js"></script>
		
		<script src="assets/javascripts/ui-elements/examples.loading.overlay.js"></script>

		<script>(function(a,b,c){if(c in b&&b[c]){var d,e=a.location,f=/^(a|html)$/i;a.addEventListener("click",function(a){d=a.target;while(!f.test(d.nodeName))d=d.parentNode;"href"in d&&(d.href.indexOf("http")||~d.href.indexOf(e.host))&&(a.preventDefault(),e.href=d.href)},!1)}})(document,window.navigator,"standalone")</script>   
		

<script>
 $(document).ready(function() {
       

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






	

	

	var initBasicWithMarkers = function() {
		var map = new GMaps({
			div: '#gmap-basic-marker',
			lat: "<?=$row['lat_map']?>",
			lng: "<?=$row['lng_map']?>",
			markers: [{
				lat: "<?=$row['lat_map']?>",
				lng: "<?=$row['lng_map']?>",
				infoWindow: {
					content: '<p>Basic</p>'
				}
			}]
		});

		map.addMarker({
			lat: "<?=$row['lat_map']?>",
			lng: "<?=$row['lng_map']?>",
			infoWindow: {
				content: '<p>Example</p>'
			}
		});
	};

	
	

	// auto initialize
	$(function() {

		
		initBasicWithMarkers();
	
	

	});




</script>


		


	</body>
</html>