<?php
session_start();
include('server/connect.php');
if(isset($_SESSION['ssUsername'])){$username=$_SESSION['ssUsername'];}
else if(!isset($_SESSION['ssUsername'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}

$sql="SELECT COUNT(*) FROM user WHERE username != '$username' ";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_array($result);
$num=$row['COUNT(*)'];
$numAll=$num;

$sql="SELECT * FROM user WHERE username = '$username'";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_assoc($result);
$iduser = $row['id'];
?>
<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Date Shared</title>
		<meta name="keywords" content="Date Shared" />
		<meta name="description" content="Date Shared">
	

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

		<!-- Specific Page Vendor CSS -->		<link rel="stylesheet" href="assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />		<link rel="stylesheet" href="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />		<link rel="stylesheet" href="assets/vendor/morris/morris.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme1.css" />
		<link rel="stylesheet" href="assets/style.css" />
		<link rel="stylesheet" href="assets/vendor/pnotify/pnotify.custom.css">
		<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />


		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.js"></script>
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
								<img src="avatar/<?=$row['Image']?>" width="35" height="35" alt="<?=$row['username']?>" class="img-circle" data-lock-picture="avatar/<?=$row['Image']?>" />
							</figure>
							<div class="profile-info" data-lock-name="<?=$row['username']?>" data-lock-email="<?=$rowme['email']?>">
								<span class="name"><?=$_SESSION['ssUsername']?> <?=$row['Last_Name']?></span>
								<span class="role"><?=$row['position']?></span>
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
									<li class="nav-expanded nav-active">
										<a href="data-shared" onclick="clicksound.playclip()">
											<i class="fa fa-users" aria-hidden="true"></i>
											<span>Date Shared</span>
										</a>
									</li>
									<li>
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
						<h2>Date Shared</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="Dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Date Shared</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right" onclick="clicksound.playclip()"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					

					

					<div class="row">
						<div class="col-xl-3 col-lg-6">
							<section class="panel panel-transparent">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
										<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
									</div>

									<h2 class="panel-title">My Shared</h2>
								</header>
								<div class="panel-body">
									<section class="panel panel-group">
										<header class="panel-heading bg-primary">

											<div class="widget-profile-info">
												<div class="profile-picture">
													<img src="avatar/<?=$row['Image']?>">
												</div>
												<div class="profile-info">
													<h4 class="name text-weight-semibold"><?=$_SESSION['ssUsername']?> <?=$row['Last_Name']?></h4>
													<h5 class="role"><?=$row['position']?></h5>
													<div class="profile-footer">
														<a href="#">( Shared Date )</a>
													</div>
												</div>
											</div>

										</header>
										<div id="accordion">
											<div class="panel panel-accordion panel-accordion-first">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse1One">
															<i class="fa fa-check"></i> Shared Date Customer
														</a>
													</h4>
												</div>
												<div id="collapse1One" class="accordion-body collapse in">
													<div class="panel-body">
														<ul class="widget-todo-list">
<?php
$sqla="SELECT * FROM eventshared WHERE member_id = $iduser ORDER BY eventshared.id ASC ";
$resulta=mysql_query($sqla)or die(mysql_error());
for($i=0;$rowa=mysql_fetch_assoc($resulta);$i++){ 


$sqlb="SELECT * FROM customer WHERE id = $rowa[customerid]";
$resultb=mysql_query($sqlb)or die(mysql_error());
$rowb=mysql_fetch_assoc($resultb);


?>
															<li>
															<div id="userbox" class="userbox">
																<a href="cus_profile-<?=$rowb['id']?>">
																	
																	<figure class="profile-picture">
																		<img src="cusimage/<?=$rowb['image']?>" width="35" height="35" alt="sirirat" class="img-circle" data-lock-picture="avatar/1419193471-364dcddf735.jpg">
																	</figure>
																	<div class="profile-info" data-lock-name="sirirat" data-lock-email="">
																		<span class="name"><?=$rowb['cus_name']?> <?=$rowb['cus_lastname']?></span>
																		
																	</div>

																</a>
																<a href="#">
																	<?php
																	$sqlc="SELECT * FROM user WHERE id = $rowa[sharedtoid]";
																	$resultc=mysql_query($sqlc)or die(mysql_error());
																	$rowc=mysql_fetch_assoc($resultc);
																	?>
																	<i class="fa fa-hand-o-right">&nbsp;</i>
																	<figure class="profile-picture">
																		<img src="avatar/<?=$rowc['Image']?>" width="35" height="35" alt="sirirat" class="img-circle" data-lock-picture="avatar/1419193471-364dcddf735.jpg">
																	</figure>
																	<div class="profile-info" data-lock-name="sirirat" data-lock-email="">
																		<span class="name"><?=$rowc['First_Name']?> <?=$rowc['Last_Name']?></span>
																		
																	</div>
																	</a>
																	<a href="#modalAnim<?=$rowa['id']?>" onclick="clicksound.playclip()" class="modal-with-zoom-anim" style="font-size: 15px;" ><i class="fa fa-trash-o"></i></a>
									
									<div id="modalAnim<?=$rowa['id']?>" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
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
														
														<a class="btn btn-primary " onclick="clicksound.playclip()" href="server/sharedDelete.php?id=<?=base64_encode($rowa['id'])?>">Confirm</a>
														<button class="btn btn-default modal-dismiss">Cancel</button>
													</div>
												</div>
											</footer>
										</section>
									</div>
																	
															</div>
															</li>

<?php
}
?>

															
														
														</ul>
														
													</div>
												</div>
											</div>
											
										</div>
									</section>

								</div>
							</section>
						</div>







						<div class="col-xl-3 col-lg-6">
							<section class="panel panel-transparent">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
										<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss=""></a>
									</div>

									<h2 class="panel-title">&nbsp;</h2>
								</header>
								<div class="panel-body">
									<section class="panel">
										<div class="panel-body">
											<div class="small-chart pull-right" id="sparklineBarDash"><canvas width="79" height="55" style="display: inline-block; vertical-align: top; width: 79px; height: 55px;"></canvas></div>
										<?php
										$sql="SELECT COUNT(*) FROM eventshared WHERE member_id = $iduser ";
										$result=mysql_query($sql)or die(mysql_error());
										$row=mysql_fetch_array($result);
										$num=$row['COUNT(*)'];
										?>
											<div class="h4 text-weight-bold mb-none"><?=$num?></div>
											<p class="text-xs text-muted mb-none">จำนวนการแชร์ข้อมูลลูกค้าให้กับ User อื่น</p>
										</div>
									</section>
									
								
								</div>
							</section>
							<form id="formcus" action="#" class="form-horizontal" >
								<input name="meid" type="hidden" id="id" value="<?=$iduser?>"/>
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
											<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss=""></a>
										</div>

										<h2 class="panel-title">Manage Data Shared</h2>
										
									</header>
									<div class="panel-body">
										<div class="form-group ">
											<label class="col-sm-3 control-label">Customer <span class="required">*</span></label>
											<div class="col-sm-9">
												<select data-plugin-selecttwo name="cusID" id="cusID " class="form-control selects-form" required="">
                        <option value="">-- เลือกลูกค้า --</option>
                        <?php
                        $sql="SELECT * FROM customer WHERE member_id = $iduser ORDER BY customer.cus_name DESC ";
						$result=mysql_query($sql)or die(mysql_error());
						for($i=0;$roww=mysql_fetch_assoc($result);$i++){ 
						?>
                   		<option value="<?=$roww['id']?>">ID : <?=$roww['id']?> , <?=$roww['cus_name']?> <?=$roww['cus_lastname']?></option>
                   		<?php
                   		}
                   		?>
                </select>
											</div>
										</div>
										
										<div class="form-group ">
											<label class="col-sm-3 control-label">Shared to</label>
											<div class="col-sm-9">
												<select data-plugin-selecttwo name="userID" id="cusID " class="form-control selects-form" required="">
                        <option value="">-- แชร์ข้อมูลให้กับ --</option>
                        <?php
                        $sql1="SELECT * FROM user ";
						$result1=mysql_query($sql1)or die(mysql_error());
						for($j=0;$row1=mysql_fetch_assoc($result1);$j++){ 
						?>
                   		<option value="<?=$row1['id']?>"><?=$row1['First_Name']?> <?=$row1['Last_Name']?></option>
                   		<?php
                   		}
                   		?>
                </select>
											</div>
										</div>
										
									</div>
									<footer class="panel-footer">
										<div class="row">
											<div class="col-sm-9 col-sm-offset-3">
												<button class="btn btn-primary" onclick="clicksound.playclip()">Submit</button>
												<button type="reset" class="btn btn-default">Reset</button>
											</div>
										</div>
									</footer>
								</section>
							</form>
						</div>
						
						
					</div>






					<div class="row">
						<div class="col-lg-12">

							<section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
									
								</div>
						
								<h2 class="panel-title">Shared Date to you</h2>
							</header>
							<div class="panel-body">
								
								<table class="table table-bordered table-striped mb-none" id="datatable-editable">
									<thead>
										<tr>
											<th>ID</th>
											<th>Customer</th>
											<th>UserShared</th>
											
											
											<th>Date</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
<?php										
						$sql11="SELECT * FROM eventshared WHERE sharedtoid = $iduser";
						$result11=mysql_query($sql11)or die(mysql_error());
						for($j1=0;$row11=mysql_fetch_assoc($result11);$j1++){ 

						$sql12="SELECT * FROM customer WHERE id = $row11[customerid] ";
						$result12=mysql_query($sql12)or die(mysql_error());
						$row12=mysql_fetch_assoc($result12);
						$sql13="SELECT * FROM user WHERE id = $row11[member_id] ";
						$result13=mysql_query($sql13)or die(mysql_error());
						$row13=mysql_fetch_assoc($result13);


						$time = strtotime($row11['insert_date']);
					    $my_format = date("Y", $time);
					    $my_format1 = date("F", $time);
					    $my_format2 = date("d", $time);
						



	?>						
										<tr>
											<td><?=$row11['customerid']?></td>
											<td><?=$row12['cus_name']?> <?=$row12['cus_lastname']?></td>
											<td><?=$row13['First_Name']?> <?=$row13['Last_Name']?></td>
											<td><?=$my_format2?> <?=$my_format1?> <?=$my_format?></td>
											<td class="actions">
											<a href="cus_profile-<?=$row11['customerid']?>" onclick="clicksound.playclip()" style="font-size: 16px;" class="on-default "><i class="fa fa-play-circle"></i></a>
											</td>
											</tr>
<?php

}
?>

										</tbody>
								</table>
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
			
								<ul>
									<li>
										<time datetime="2014-04-19T00:00+00:00">04/19/2014</time>
										<span>Company Meeting</span>
									</li>
								</ul>
							</div>
			
							<div class="sidebar-widget widget-friends">
								<h6>Friends</h6>
								<ul>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-offline">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-offline">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
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
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>		
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>		
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
	
		
		<!-- Specific Page Vendor -->		<script src="assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>		
		<script src="assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>		
		<script src="assets/vendor/jquery-appear/jquery.appear.js"></script>		
		<script src="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>		
		<script src="assets/vendor/jquery-easypiechart/jquery.easypiechart.js"></script>		
		<script src="assets/vendor/flot/jquery.flot.js"></script>		
		<script src="assets/vendor/flot-tooltip/jquery.flot.tooltip.js"></script>		
		<script src="assets/vendor/flot/jquery.flot.pie.js"></script>		
		<script src="assets/vendor/flot/jquery.flot.categories.js"></script>		
		<script src="assets/vendor/flot/jquery.flot.resize.js"></script>		
		<script src="assets/vendor/jquery-sparkline/jquery.sparkline.js"></script>	
			<script src="assets/vendor/raphael/raphael.js"></script>		
			<script src="assets/vendor/morris/morris.js"></script>	
				<script src="assets/vendor/gauge/gauge.js"></script>		
				<script src="assets/vendor/snap-svg/snap.svg.js"></script>		
				<script src="assets/vendor/liquid-meter/liquid.meter.js"></script>
				<script src="assets/vendor/select2/select2.js"></script>	
				<script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>
				<script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>		
		<script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
				


		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>
		<!-- Analytics to Track Preview Website -->		
		<script src="assets/vendor/pnotify/pnotify.custom.js"></script>
		<script src="assets/javascripts/ui-elements/examples.modals.js"></script>

		 <script src="assets/javascripts/tables/examples.datatables.editable.js"></script> 

		<!-- Examples -->
		<script src="assets/javascripts/ui-elements/examples.loading.overlay.js"></script>
		<script>(function(a,b,c){if(c in b&&b[c]){var d,e=a.location,f=/^(a|html)$/i;a.addEventListener("click",function(a){d=a.target;while(!f.test(d.nodeName))d=d.parentNode;"href"in d&&(d.href.indexOf("http")||~d.href.indexOf(e.host))&&(a.preventDefault(),e.href=d.href)},!1)}})(document,window.navigator,"standalone")</script>   
		
	

		<script type="text/javascript">
    $('form#formcus').on('submit',function(e){
          e.preventDefault();         
          

          var meid = $('form#formcus input[name=meid]').val();
         
          var cusID = $('form#formcus select[name=cusID]').val();
          var userID = $('form#formcus select[name=userID]').val();
        
         // var pwd = $('form#cutproduct input[name=pwd]').val();

          if(meid){           
            $.ajax({
              type: "POST",
              async: true,
              url: "server/cut2.php",            
              data: "meid="+meid+"&cusID="+cusID+"&userID="+userID,
              dataType: "jsonp",
           success: function(json){
               if(json.status == 1001) {

           
           
             // Get the src of the image
    

    // Send Ajax request to backend.php, with src set as "img" in the POST data
   // $.post("storesession.php", {"img": data.names});
               

       
        new PNotify({
			title: 'เสร็จสมบูรณ์',
			text: json.msg,
			type: 'success',
			addclass: 'icon-nb'
		});


setTimeout(function(){
   window.location.reload(1);
}, 2200);



                } else {

  new PNotify({
			title: 'เกิดความผิดพลาด',
			text: json.msg,
			type: 'error'

                });           
             
                    
          
          }
      }


        });
        }
 });




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