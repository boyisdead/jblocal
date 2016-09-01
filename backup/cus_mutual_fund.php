<?php
session_start();
include('server/connect.php');
if(isset($_SESSION['ssUsername'])){$username=$_SESSION['ssUsername'];}
else if(!isset($_SESSION['ssUsername'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}

$customer_id = $_REQUEST['cus_id'];

$id = $_REQUEST['id'];

$numid = $_REQUEST['num'];

$sql1="SELECT * FROM user WHERE username LIKE '%$username%'";
$result1=mysql_query($sql1)or die(mysql_error());
$row11=mysql_fetch_assoc($result1);
$iduser = $row11['id'];


$sql2="SELECT * FROM mutual_fund WHERE customer_id = '$customer_id' AND id = '$id' ";
$result2=mysql_query($sql2)or die(mysql_error());
$row2=mysql_fetch_assoc($result2);

	$sqlmutual="SELECT * FROM customer WHERE id = '$customer_id' ";
	$resultmutual=mysql_query($sqlmutual)or die(mysql_error());
	$row=mysql_fetch_assoc($resultmutual);


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



$mf_saving_plan = $row2['mf_saving_plan'];

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


?>

<!doctype html>
<html class="fixed">
	<head>
		<!-- Basic -->
		<meta charset="UTF-8">
		<title>Form Validation | Porto Admin - Responsive HTML5 Template 1.2.0</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

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
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker4.css" />
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
								<img src="avatar/<?=$row11['Image']?>" width="35" height="35" alt="<?=$row['username']?>" class="img-circle" data-lock-picture="avatar/<?=$row['Image']?>" />
							</figure>
							<div class="profile-info" data-lock-name="<?=$row['username']?>" data-lock-email="<?=$rowme['email']?>">
								<span class="name"><?=$_SESSION['ssUsername']?> <?=$row11['Last_Name']?></span>
								<span class="role"><?=$row11['position']?></span>
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
									<li class="nav-expanded nav-active">
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
						<h2>Customer Mutual Fund</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="Dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Customer Mutual Fund</span></li>
								
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

									<div class="widget-toggle-expand mb-md widget-collapsed">
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

								
									<div class="clearfix">
										
									</div>

									<hr class="dotted short">

									

								</div>
							</section>



							<section class="panel">
											

							<?php

							$sqlMF="SELECT * from mutual_fund WHERE customer_id=$customer_id ";
							$resultMF=mysql_query($sqlMF)or die(mysql_error());
							
							for($i=0;$rowMF=mysql_fetch_assoc($resultMF);$i++){ 
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
													<h4 class="title">Mutual Fund ( <?=$rowMF['name']?> ) <a href="#modalAnim<?=$rowMF['id']?>" class="modal-with-zoom-anim" onclick="clicksound.playclip()" style="font-size: 16px; float:right; color:#fff" ><i class="fa fa-trash-o"></i></a></h4>
													<div class="info">
														<strong class="amount"><a href="cus_mutual_fund-<?=$customer_id?>-<?=$rowMF['id']?>-<?=$i+1?>" style="font-size:13px;" class="textl">(view)</a></strong>
														<span class="text-primary " ></span>
													</div>
												</div>
												<div id="modalAnim<?=$rowMF['id']?>" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
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
														<p>Are you sure that you want to delete this Customer ?</p>
													</div>
												</div>
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														
														<a class="btn btn-primary " onclick="clicksound.playclip()" href="server/MDelete.php?id=<?=base64_encode($rowMF['id'])?>">Confirm</a>
														<button class="btn btn-default modal-dismiss">Cancel</button>
													</div>
												</div>
											</footer>
										</section>
									</div>
												<div class="summary-footer">
															<a class="text-uppercase"> (view all)</a>
														</div>
											</div>
										</div>
									</div>
									<?php } ?>

							</section>

							

						</div>
						<div class="col-md-8 col-lg-6">
							<div class="tabs tabs-primary">
								<ul class="nav nav-tabs tabs-primary">
								
									<li class="active">
										<a href="#edit" data-toggle="tab" aria-expanded="true">Info</a>
									</li>
									<li class="">
										<a href="#pass" data-toggle="tab" aria-expanded="false">Edit Mutual Fund info</a>
									</li>
								</ul>
								<div class="tab-content">
									







									
									<div id="edit" class="tab-pane active">

									
											<h4 class="mb-xlg text-primary">Mutual Fund <?=$numid?> : <?=$row['cus_name']?> <?=$row['cus_lastname']?></h4>
											
											<fieldset>

												<div class="form-group">
													<label class="col-md-4 control-label" ><b>บลจ. / บล. :</b></label>
													<div class="col-md-7">
														<label class="" ><?=$row2['name']?></label>
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-4 control-label" ><b>Login :</b></label>
													<div class="col-md-7">
														<label class="" ><?=$row2['phillip_login']?></label>
													</div>
												</div>


												<div class="form-group">
													<label class="col-md-4 control-label" ><b>Password :</b></label>
													<div class="col-md-7">
														<label class="" ><?=$row2['phillip_pwd']?></label>
													</div>
												</div>




												<div class="form-group">
													<label class="col-md-4 control-label" ><b>Goal LTF/Year :</b></label>
													<div class="col-md-7">
														<label class="" ><?=number_format($row2['mf_goal_ltf'])?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" ><b>Done LTF :</b></label>
													<div class="col-md-7">
														<label class="" ><?=number_format($row2['mf_done_ltf'])?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" ><b>Goal RMF/Year :</b></label>
													<div class="col-md-7">
														<label class="control-label" ><?=number_format($row2['mf_goal_rmf'])?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label"><b>Done RMF :</b></label>
													<div class="col-md-7">
														<label class="control-label" ><?=number_format($row2['mf_done_rmf'])?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" for="profileLastName"><b>Saving Plan :</b></label>
													<div class="col-md-7">
														<label class="control-label" ><?=$mf_saving_plan?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" for="profileAddress"><b>รายละเอียด Saving Plan</b></label>
													<div class="col-md-7">
														<label class="control-label" ><?=$row2['mf_saving_plan_detail']?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" for="profileAddress"><b>ใบเปิดบัญชีที่เซ็นต์แล้ว :</b></label>
													<div class="col-md-7">
														<label class="control-label" ><?=$row2['mf_open_signature']?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" for="profileAddress"><b>บัญชีธนาคารที่ผูก :</b></label>
													<div class="col-md-7">
														<label class="control-label" ><?=$row2['bankcus']?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" for="profileAddress"><b>จำนวนเงิน Prepaid คงเหลือ :</b></label>
													<div class="col-md-7">
														<label class="control-label" ><?=number_format($row2['mf_money_bagged'])?></label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" for="profileAddress"><b>หมายเหตุ :</b></label>
													<div class="col-md-7">
														<label class="control-label" ><?=$row2['remark']?></label>
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



											<h4 class="mb-xlg">Edit Mutual Fund Information</h4>

									

											<fieldset>

<form class="form-horizontal" action="server/MutualFundUpdate.php" method="post" enctype="multipart/form-data" name="product" >

	<input name="cus_id" type="hidden" id="id" value="<?=$customer_id?>"/>
											<input name="id" type="hidden" id="id" value="<?=$id?>"/>
											<input name="num" type="hidden" id="id" value="<?=$numid?>"/>

          




           <div class="form-group">
                <label for="LoginPhill" class="col-sm-4 control-label">บลจ. / บล.</label>
                <div class="col-sm-7">
                    <select name="product_mf" id="broker" class="form-control" required="">
                        <option value="<?=$row2['name']?>"><?=$row2['name']?></option>
                        <?php
                        $sqlcus="SELECT * FROM product2 WHERE category_id = 1 ORDER BY id ASC ";
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
                <label for="LoginPhill" class="col-sm-4 control-label">Login Phillip</label>
                <div class="col-sm-7">
                    <input type="text" name="LoginPhill" id="LoginPhill" value="<?=$row2['phillip_login']?>" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="PwdPhill" class="col-sm-4 control-label">Password Phillip</label>
                <div class="col-sm-7">
                    <input type="text" name="PwdPhill" id="PwdPhill" value="<?=$row2['phillip_pwd']?>" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="goalLTF" class="col-sm-4 control-label">Goal LTF/Year</label>
                <div class="col-sm-7">
                    <input type="text" name="goalLTF" id="goalLTF" value="<?=$row2['mf_goal_ltf']?>" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="doneLTF" class="col-sm-4 control-label">Done LTF</label>
                <div class="col-sm-7">
                    <input type="text" name="doneLTF" id="doneLTF" value="<?=$row2['mf_done_ltf']?>" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="goalRMF" class="col-sm-4 control-label">Goal RMF/Year</label>
                <div class="col-sm-7">
                    <input type="text" name="goalRMF" id="goalRMF" value="<?=$row2['mf_goal_rmf']?>" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="doneRMF" class="col-sm-4 control-label">Done RMF</label>
                <div class="col-sm-7">
                    <input type="text" name="doneRMF" id="doneRMF" value="<?=$row2['mf_done_rmf']?>" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="saving" class="col-sm-4 control-label">Saving Plan</label>
                <div class="col-sm-7">
                    <select name="saving" id="saving" class="form-control">
                    	<option value="<?=$row2['mf_saving_plan']?>"><?=$mf_saving_plan?></option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="detail" class="col-sm-4 control-label">รายละเอียด Saving Plan</label>
                <div class="col-sm-7">
                    <textarea name="detail" id="detail" class="form-control"><?=$row2['mf_saving_plan_detail']?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="openSignature" class="col-sm-4 control-label">ใบเปิดบัญชีที่เซ็นต์แล้ว</label>
                <div class="col-sm-7">
                    <input type="text" name="openSignature" id="openSignature" value="<?=$row2['mf_open_signature']?>" class="form-control">
                </div>
            </div>
            
            <div class="form-group">
                <label for="bankcus" class="col-sm-4 control-label">บัญชีธนาคารที่ผูก</label>
                <div class="col-sm-7">
                    <input type="text" name="bankcus" id="bankcus" value="<?=$row2['bankcus']?>" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="Bagged" class="col-sm-4 control-label">จำนวนเงิน Prepaid คงเหลือ</label>
                <div class="col-sm-7">
                    <input type="text" name="Bagged" id="Bagged" value="<?=$row2['mf_money_bagged']?>" class="form-control">
                </div>
            </div>
            <div class="form-group">
                        <label for="remark" class="col-sm-4 control-label">หมายเหตุ</label>
                        <div class="col-sm-7">
                      
                            <textarea class="form-control" name="remark" id="remark" rows="2"><?=$row2['remark']?></textarea>
                        </div>
                    </div>
												
											</fieldset>
											
											<div class="panel-footer">
												<div class="row">
													<div class="col-md-9 col-md-offset-3">
														<button type="submit" class="btn btn-primary" onclick="clicksound.playclip()">Submit</button>
														<button type="reset" class="btn btn-default">Reset</button>
													</div>
												</div>
											</div>

										</form>

									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-lg-3">

							<h4 class="mb-md">Products Stats</h4>
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
													<i class="fa fa-newspaper-o"></i>
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


							</section>

							
							<h4 class="mb-md">Customer signature</h4>
							<?php
							$sqlImage="SELECT * from cus_image WHERE product_id=$customer_id ORDER BY id";
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
														
														<a class="btn btn-primary " href="server/productImageDelete.php?id=<?=base64_encode($rowImage['id'])?>" onclick="clicksound.playclip()">Confirm</a>
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


					<script src="assets/vendor/jquery-autosize/jquery.autosize.js"></script>
		
		<!-- Specific Page Vendor -->		<script src="assets/vendor/jquery-validation/jquery.validate.js"></script>
		<script src="assets/vendor/select2/select2.js"></script>
		<script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>


		
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
  var product_image=document.getElementById('product_mf');
  var product_imageElement=document.createElement('input');
      product_imageElement.setAttribute('type',"text");
      product_imageElement.setAttribute('name',"product_mf[]");
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