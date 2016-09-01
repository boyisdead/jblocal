<?php
session_start();
include('server/connect.php');
if(($_SESSION['ssPosition'] != 'superuser')){echo"<script>window.location='server/logout.php';</script>";exit;}
if(isset($_SESSION['ssUsername'])){$username=$_SESSION['ssUsername'];}
else if(!isset($_SESSION['ssUsername'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}


$sql1="SELECT * FROM user WHERE username = '$username'";
$result1=mysql_query($sql1)or die(mysql_error());
$row1=mysql_fetch_assoc($result1);
$iduser = $row1['id'];



			
		

?>

<!doctype html>
<html class="fixed sidebar-left-collapsed">
	<head>
		<!-- Basic -->
		<meta charset="UTF-8">
		<title>Super User Category</title>
		<meta name="keywords" content="Super User Category" />
		<meta name="description" content="Super User Category">
		

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
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker4.css" />
		<link rel="stylesheet" href="assets/vendor/pnotify/pnotify.custom.css">
		<link rel="stylesheet" href="assets/vendor/select2/select2.css">
		<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css">
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
					<a href="#" class="logo">
						<img src="assets/images/logo.png?m=<?php echo filemtime('logo.png'); ?>" height="38"  />
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
			
					<form action="pages-search-results.html" class="search nav-form">
						<div class="input-group input-search">
							<input type="text" class="form-control" name="q" id="q" placeholder="Search...">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
							</span>
						</div>
					</form>
			
					

			
					
			
					<span class="separator"></span>
			
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="avatar/<?=$row1['Image']?>" width="35" height="35" alt="<?=$row1['username']?>" class="img-circle" data-lock-picture="avatar/<?=$row1['Image']?>" />
							</figure>
							<div class="profile-info" data-lock-name="<?=$row1['username']?>" data-lock-email="<?=$row1['email']?>">
								<span class="name"><?=$_SESSION['ssUsername']?> <?=$row1['Last_Name']?></span>
								<span class="role"><?=$row1['status']?></span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="#" onclick="clicksound.playclip()"><i class="fa fa-user"></i> My Profile</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true" onclick="clicksound.playclip()"><i class="fa fa-lock"></i> Lock Screen</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="server/logout.php?id=<?=$row1['id']?>" onclick="clicksound.playclip()"><i class="fa fa-power-off"></i> Logout</a>
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
										<a href="super_category" onclick="clicksound.playclip()">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Category other service</span>
										</a>
									</li>
									<li>
										<a href="super_all_category" onclick="clicksound.playclip()">
											<i class="fa fa-twitch " aria-hidden="true"></i>
											<span>All Category</span>
										</a>
									</li>
									<li class="nav-expanded nav-active">
										<a href="super_user" onclick="clicksound.playclip()">
											<i class="fa fa-users" aria-hidden="true"></i>
											<span>User Management</span>
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
						<h2>Category</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="Dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Category</span></li>
								
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right" onclick="clicksound.playclip()"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->


					<div class="row">
							<div class="col-md-4 ">
								<div class="panel-body">
								
									<a href="#modalAnim01" class="modal-with-zoom-anim mb-xs mt-xs mr-xs btn btn-primary btn-block"><i class="fa fa-plus-square"></i>  Add Member</a>
									<div id="modalAnim01" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
										<form id="demo-form" class="form-horizontal mb-lg"  action="server/user.php" method="post" enctype="multipart/form-data">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Add new member ?</h2>
											</header>

											<div class="panel-body">
											<input name="action" type="hidden" id="id" value="add_member"/>

									        <div class="form-group">
						                        <label for="username" class="col-sm-4 control-label">UserName</label>
						                        <div class="col-sm-7">
						                            <input type="text" name="username" id="username" class="form-control" required="">
						                        </div>
						                    </div>

						                    <div class="form-group">
						                        <label for="password" class="col-sm-4 control-label">Password</label>
						                        <div class="col-sm-7">
						                            <input type="text" name="password" id="password" class="form-control" required="">
						                        </div>
						                    </div>

						                    <div class="form-group">
						                        <label for="cus_name" class="col-sm-4 control-label">ชื่อจริง</label>
						                        <div class="col-sm-7">
						                            <input type="text" name="cus_name" id="cus_name" class="form-control" required="">
						                        </div>
						                    </div>

						                    <div class="form-group">
						                        <label for="cus_lastname" class="col-sm-4 control-label">นามสกุล</label>
						                        <div class="col-sm-7">
						                            <input type="text" name="cus_lastname" id="cus_lastname" class="form-control" required="">
						                        </div>
						                    </div>

											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button type="submit" class="btn btn-primary " onclick="clicksound.playclip()">Add Member</button>
														<button class="btn btn-default modal-dismiss">Cancel</button>
													</div>
												</div>
											</footer>
											
										</section>
										</form>
									</div>
								</div>
							</div>
							<div class="col-md-4 ">
								</div>
								<div class="col-md-4 ">
								</div>
					</div>			
					
					<div class="row">
							<div class="col-md-12 ">
								<div class="row">

<?php
$sql5="SELECT * FROM user WHERE status = 'Member' ";
$result5=mysql_query($sql5)or die(mysql_error());
for($i5=0;$row5=mysql_fetch_assoc($result5);$i5++){
?>




									<div class="col-md-4">
										
										<section class="panel panel-group">
											<header class="panel-heading bg-primary">
						
												<div class="widget-profile-info">
													<div class="profile-picture">
														<img src="avatar/<?=$row5['Image']?>">
													</div>
													<div class="profile-info">
														<h4 class="name text-weight-semibold"><?=$row5['First_Name']?> <?=$row5['Last_Name']?></h4>
														<h5 class="role"><?=$row5['status']?></h5>
														<div class="profile-footer">
															<a href="#modalAnim1-<?=$row5['id']?>" class="modal-with-zoom-anim"><i class="fa fa-user mr-xs"></i> (add guest)</a> &nbsp&nbsp<a href="#modalAnim2-<?=$row5['id']?>" class="modal-with-zoom-anim">(edit profile)</a>
														

									<div id="modalAnim1-<?=$row5['id']?>" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
										<form id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate" action="server/user.php" method="post" enctype="multipart/form-data">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Add new guest ?</h2>
											</header>

											<div class="panel-body">
											<input name="action" type="hidden" id="id" value="add_guest"/>
											<input name="id" type="hidden" id="id" value="<?=$row5['id']?>"/>


									        <div class="form-group">
						                        <label for="username" class="col-sm-4 control-label">UserName</label>
						                        <div class="col-sm-7">
						                            <input type="text" name="username" id="username" class="form-control">
						                        </div>
						                    </div>

						                    <div class="form-group">
						                        <label for="password" class="col-sm-4 control-label">Password</label>
						                        <div class="col-sm-7">
						                            <input type="text" name="password" id="password" class="form-control">
						                        </div>
						                    </div>

						                    <div class="form-group">
						                        <label for="cus_name" class="col-sm-4 control-label">ชื่อจริง</label>
						                        <div class="col-sm-7">
						                            <input type="text" name="cus_name" id="cus_name" class="form-control">
						                        </div>
						                    </div>

						                    <div class="form-group">
						                        <label for="cus_lastname" class="col-sm-4 control-label">นามสกุล</label>
						                        <div class="col-sm-7">
						                            <input type="text" name="cus_lastname" id="cus_lastname" class="form-control">
						                        </div>
						                    </div>

											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button type="submit" class="btn btn-primary " onclick="clicksound.playclip()">Add Guest</button>
														<button class="btn btn-default modal-dismiss">Cancel</button>
													</div>
												</div>
											</footer>
											
										</section>
										</form>
									</div>




									<div id="modalAnim2-<?=$row5['id']?>" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
										<form id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate" action="server/user.php" method="post" enctype="multipart/form-data">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Edit profile ?</h2>
											</header>

											<div class="panel-body">
											<input name="action" type="hidden" id="id" value="edit_profile"/>
											<input name="id" type="hidden" id="id" value="<?=$row5['id']?>"/>

									        <div class="form-group">
						                        <label for="username" class="col-sm-4 control-label">UserName</label>
						                        <div class="col-sm-7">
						                            <input type="text" name="username" id="username" value="<?=$row5['username']?>" class="form-control">
						                        </div>
						                    </div>

						                    <div class="form-group">
						                        <label for="password" class="col-sm-4 control-label">Password</label>
						                        <div class="col-sm-7">
						                            <input type="text" name="password" id="password" value="<?=$row5['password']?>" class="form-control">
						                        </div>
						                    </div>

						                    <div class="form-group">
						                        <label for="cus_name" class="col-sm-4 control-label">ชื่อจริง</label>
						                        <div class="col-sm-7">
						                            <input type="text" name="cus_name" id="cus_name" value="<?=$row5['First_Name']?>" class="form-control">
						                        </div>
						                    </div>

						                    <div class="form-group">
						                        <label for="cus_lastname" class="col-sm-4 control-label">นามสกุล</label>
						                        <div class="col-sm-7">
						                            <input type="text" name="cus_lastname" id="cus_lastname" value="<?=$row5['Last_Name']?>" class="form-control">
						                        </div>
						                    </div>

											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button type="submit" class="btn btn-primary " onclick="clicksound.playclip()">Confirm</button>
														<button class="btn btn-default modal-dismiss">Cancel</button>
													</div>
												</div>
											</footer>
											
										</section>
										</form>
									</div>



														</div>
													</div>
												</div>
						
											</header>
											<div id="accordion">
												<div class="panel panel-accordion panel-accordion-first">
													<div class="panel-heading">
														<h4 class="panel-title">
															<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse1One-<?=$row5['id']?>">
																<i class="fa fa-check"></i> Tasks
															</a>
														</h4>
													</div>
													<div id="collapse1One-<?=$row5['id']?>" class="accordion-body collapse in">
														<div class="panel-body">
												
												<h4 class="text-weight-semibold mt-sm">ข้อมูลของ Member</h4>
												<p><a href="#"><i class="fa fa-user mr-xs"></i> <?=$row5['username']?></a></p>
												<p><a href="#"><i class="fa fa-phone-square"></i> <?=$row5['tel']?></a></p>
												<p><a href="#"><i class="fa fa-envelope-o"></i> <?=$row5['email']?></a></p>
											
												<hr class="solid short">
												<h4 class="text-weight-semibold mt-sm">แนะนำตัว</h4>
												<p><?=$row5['About']?>. </p>
											</div>
													</div>
												</div>
												
											</div>
										</section>




<?php
$sql4="SELECT * FROM user WHERE status = 'guest' AND guest_id = $row5[id] ";
$result4=mysql_query($sql4)or die(mysql_error());
for($i4=0;$row4=mysql_fetch_assoc($result4);$i4++){
?>



									<section class="panel panel-group">
											<header class="panel-heading bg-tertiary">
												<div class="widget-profile-info">
													<div class="profile-picture">
														<img src="assets/images/!logged-user.jpg">
													</div>
													<div class="profile-info" >
														<h4 class="name text-weight-semibold"><?=$row4['First_Name']?> <?=$row4['Last_Name']?></h4>
														<h5 class="role"><?=$row4['status']?></h5>
														<div class="profile-footer" style="border-top-color:#fff">
															<a href="#modalAnim3-<?=$row4['id']?>" class="modal-with-zoom-anim">(edit profile)</a>

									<div id="modalAnim3-<?=$row4['id']?>" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
										<form id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate" action="server/user.php" method="post" enctype="multipart/form-data">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Edit profile Guest ?</h2>
											</header>

											<div class="panel-body">
											<input name="action" type="hidden" id="id" value="edit_guest"/>
											<input name="id" type="hidden" id="id" value="<?=$row4['id']?>"/>

									        <div class="form-group">
						                        <label for="username" class="col-sm-4 control-label">UserName</label>
						                        <div class="col-sm-7">
						                            <input type="text" name="username" id="username" value="<?=$row4['username']?>" class="form-control">
						                        </div>
						                    </div>

						                    <div class="form-group">
						                        <label for="password" class="col-sm-4 control-label">Password</label>
						                        <div class="col-sm-7">
						                            <input type="text" name="password" id="password" value="<?=$row4['password']?>" class="form-control">
						                        </div>
						                    </div>

						                    <div class="form-group">
						                        <label for="cus_name" class="col-sm-4 control-label">ชื่อจริง</label>
						                        <div class="col-sm-7">
						                            <input type="text" name="cus_name" id="cus_name" value="<?=$row4['First_Name']?>" class="form-control">
						                        </div>
						                    </div>

						                    <div class="form-group">
						                        <label for="cus_lastname" class="col-sm-4 control-label">นามสกุล</label>
						                        <div class="col-sm-7">
						                            <input type="text" name="cus_lastname" id="cus_lastname" value="<?=$row4['Last_Name']?>" class="form-control">
						                        </div>
						                    </div>

											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button type="submit" class="btn btn-primary " onclick="clicksound.playclip()">Confirm</button>
														<button class="btn btn-default modal-dismiss">Cancel</button>
													</div>
												</div>
											</footer>
											
										</section>
										</form>
									</div>
														</div>
													</div>
												</div>		
											</header>
										</section>

<?php
					}
					?>	



									</div>
									
					<?php
					}
					?>				






								</div>
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
		<script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		<script src="assets/vendor/fullcalendar/lib/moment.min.js"></script>
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

var mouseoversound=createsoundbite("http://www.javascriptkit.com/script/script2/whistle.ogg", "http://www.javascriptkit.com/script/script2/whistle.mp3")
var clicksound=createsoundbite("http://www.javascriptkit.com/script/script2/click.ogg", "http://www.javascriptkit.com/script/script2/click.mp3")

</script>

		


	</body>
</html>