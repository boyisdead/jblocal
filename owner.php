<?php
session_start();
include('server/connect.php');
if(isset($_SESSION['ssUsername2'])){$username=$_SESSION['ssUsername2'];}
else if(!isset($_SESSION['ssUsername2'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}


$sql="SELECT COUNT(*) FROM user WHERE username != '$username' ";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_assoc($result);
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

		<title>Owner DB</title>
		<meta name="keywords" content="Owner DB" />
		<meta name="description" content="Owner DB">
	

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

		<!-- Specific Page Vendor CSS -->		<link rel="stylesheet" href="assets/vendor/select2/select2.css" />		
		<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme1.css" />
		<link rel="stylesheet" href="assets/style.css" />
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
								<span class="name"><?=$row['First_Name']?> <?=$row['Last_Name']?></span>
								<span class="role"><?=$row['position']?></span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="profile.php" onclick="clicksound.playclip()"><i class="fa fa-user"></i> My Profile</a>
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
										<a href="profile.php" onclick="clicksound.playclip()">
											<i class="fa fa-user " aria-hidden="true"></i>
											<span>User Profile</span>
										</a>
									</li>
									<li class="nav-expanded nav-active">
										<a href="owner.php" onclick="clicksound.playclip()">
											<i class="fa fa-gavel " aria-hidden="true"></i>
											<span>Owner DB</span>
										</a>
									</li>
									<li class="nav-parent ">
										<a>
											<i class="fa fa-user-secret" aria-hidden="true"></i>
											<span>All Candidate</span>
										</a>
										<ul class="nav nav-children">
<?php
$sqlc="SELECT * FROM user WHERE id != $iduser";
		$resultc=mysql_query($sqlc)or die(mysql_error());
		for($i=0;$rowc=mysql_fetch_assoc($resultc);$i++){
?>
											<li >
												<a href="All_candidate.php?id=<?=$rowc['id']?>">
													<i class="fa fa-user" aria-hidden="true"></i> <?=$rowc['username']?>
												</a>
											</li>
<?php
}
?>
										</ul>
									</li>
									
									<?php
									if($_SESSION['ssUserId']==4){
									?>	

									<li>
										<a href="Dashboard.php" onclick="clicksound.playclip()">
											<i class="fa fa-line-chart" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
									</li>

									<li >
										<a href="employee.php" onclick="clicksound.playclip()">
											<i class="fa fa-street-view" aria-hidden="true"></i>
											<span>Employee</span>
										</a>
									</li>
									
									<li class="nav-parent ">
										<a>
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<span>Email Subscriber</span>
										</a>
										<ul class="nav nav-children">
											<li >
												<a href="compose.php">
													 Compose
												</a>
											</li>
											<li>
												<a href="send_compose.php">
													 Send Email
												</a>
											</li>
											<li>
												<a href="send_compose_test.php">
													 Send Email test
												</a>
											</li>
											<li>
												<a href="compose_history.php">
													 History Email
												</a>
											</li>
										</ul>
									</li>
									<li>
										<a href="candidate.php" onclick="clicksound.playclip()">
											<i class="fa fa-users" aria-hidden="true"></i>
											<span>Candidate</span>
										</a>
									</li>
									<li class="nav-parent">
										<a>
											<i class="fa fa-linkedin-square " aria-hidden="true"></i>
											<span>User linkedin</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="user_linkedin.php">
													 User group 2
												</a>
											</li>
											<li>
												<a href="user_linkedin2.php">
													 User group 2
												</a>
											</li>
											
										</ul>
									</li>
									<li>
										<a href="category.php" onclick="clicksound.playclip()">
											<i class="fa fa-cubes" aria-hidden="true"></i>
											<span>Category</span>
										</a>
									</li>
									<li>
										<a href="job_level.php" onclick="clicksound.playclip()">
											<i class="fa fa-star-half-o" aria-hidden="true"></i>
											<span>Job level</span>
										</a>
									</li>
									<li>
										<a href="job.php" onclick="clicksound.playclip()">
											<i class="fa fa-cube" aria-hidden="true"></i>
											<span>Job</span>
										</a>
									</li>
									<li>
										<a href="Hot-job.php" onclick="clicksound.playclip()">
											<i class="fa fa-fire" aria-hidden="true"></i>
											<span>Hot Job</span>
										</a>
									</li>
									<li >
										<a href="Pick-job.php" onclick="clicksound.playclip()">
											<i class="fa fa-paw" aria-hidden="true"></i>
											<span>Pick Job</span>
										</a>
									</li>
									<li>
										<a href="job-ap.php" onclick="clicksound.playclip()">
											<i class="fa fa-building-o" aria-hidden="true"></i>
											<span>Job Apply</span>
										</a>
									</li>
									<li>
										<a href="job-refer.php" onclick="clicksound.playclip()">
											<i class="fa fa-user-plus" aria-hidden="true"></i>
											<span>Job Refer</span>
										</a>
									</li>
									<li>
										<a href="setting.php" onclick="clicksound.playclip()">
											<i class="fa fa-cog " aria-hidden="true"></i>
											<span>Setting</span>
										</a>
									</li>


									<?php
									}else{
									?>
									<li>
										<a href="Dashboard2.php" onclick="clicksound.playclip()">
											<i class="fa fa-line-chart" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
									</li>

									<?php	
									}
									?>
									

									
								</ul>
							</nav>
				
							
				
							<hr class="separator" />
				
							
						</div>
				
					</div>
				
				</aside>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Owner DB</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="Dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
								
								<li><span>Owner DB</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right" onclick="clicksound.playclip()"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
						<section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#"  class="panel-action panel-action-toggle" data-panel-toggle></a>
									
								</div>
						
								<h2 class="panel-title">Owner DB Info</h2>
							</header>
							<div class="panel-body">

								<div class="row">
									<div class="col-sm-6">
										<div class="mb-md">
											<a href="ownerInset.php" class="btn btn-primary" onclick="clicksound.playclip()">Add Owner DB <i class="fa fa-plus"></i></a>
											
										</div>
									</div>
								</div>
								




<?php
if($_SESSION['ssUserId']==4){
?>











<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="http://cdn.datatables.net/tabletools/2.2.2/swf/copy_csv_xls_pdf.swf">
									<thead>
										<tr>
											<th>ID</th>
											<th>Name</th>
											<th>Email</th>
											<th>Owner</th>
											<th>Company</th>
											<th>Create Date</th>
											<th style="width: 8%;">Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
										//เรคคอร์ดที่สิ้นสุด

$sql="SELECT * FROM userDB2";
$result=mysql_query($sql)or die(mysql_error());
$num=mysql_num_rows($result);

for($i=0;$row=mysql_fetch_assoc($result);$i++){ 
?>
 <tr>
<?php

$time = strtotime($row['insert_date']);
    $my_format = date("Y", $time);
    $my_format1 = date("F", $time);
    $my_format2 = date("d", $time);

if($row['owner1'] != 0 ){

	$sqlo="SELECT * FROM user WHERE id = $row[owner1]";
$resulto=mysql_query($sqlo)or die(mysql_error());
$rowo=mysql_fetch_assoc($resulto);
$usernameo=$rowo['username'];
}else{
	$usernameo = "Admin";
}





?>
											<td><?=$row['id']?></td>
											<td> <?=$row['First_Name']?> <?=$row['Last_Name']?></td>
											<td><?=$row['Email']?></td>
											<td><?=$usernameo?></td>
											<td><?=$row['Company']?></td>
											<td><div class="post-date">
			                                    <span class="day"><?=$my_format2?></span> 
			                                 	 <span class="month"><?=$my_format1?></span>
			                                    <span class="year"><?=$my_format?></span>
			                               		 </div>
	                            			</td>
											<td class="actions">
												<a href="owner_profile.php?id=<?=base64_encode($row['id'])?>" title="Edit" onclick="clicksound.playclip()" style="font-size: 16px;" class="on-default "><i class="fa fa-asterisk "></i></a>
												<a href="owner_Tracker.php?id=<?=base64_encode($row['id'])?>" title="Tracker" onclick="clicksound.playclip()" style="font-size: 16px;" class="on-default "><i class="fa fa-share-alt-square  "></i></a>
												<a href="#modalAnim<?=$row['id']?>" onclick="clicksound.playclip()" title="Delete" class="modal-with-zoom-anim" style="font-size: 16px;" ><i class="fa fa-trash-o"></i></a>

<div id="modalAnim<?=$row['id']?>" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
	<form id="demo-form3" class="form-horizontal mb-lg"  action="process/owner/ownerDelete.php" method="post" enctype="multipart/form-data">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Are you sure?</h2>
												<input name="id" type="hidden" id="id" value="<?=base64_encode($row['id'])?>"/>
												<input name="owner" type="hidden" id="id" value="<?=$iduser?>"/>

											</header>
											<div class="panel-body">
												<div class="modal-wrapper">
													<div class="modal-icon">
														<i class="fa fa-question-circle"></i>
													</div>
													<div class="modal-text">
														<p>Are you sure that you want to delete this Owner DB ?</p>
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
											</td>
										
  
<?php
}
?>
</tr>										
										
									</tbody>
								</table>



























<?php
} else {
?>











<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="http://cdn.datatables.net/tabletools/2.2.2/swf/copy_csv_xls_pdf.swf">
									<thead>
										<tr>
											<th>ID</th>
											<th>Name</th>
											<th>Email</th>
											<th>Phone</th>
											<th>Company</th>
											<th>Create Date</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
										//เรคคอร์ดที่สิ้นสุด

$sql="SELECT * FROM userDB2 WHERE owner1 = $iduser";
$result=mysql_query($sql)or die(mysql_error());
$num=mysql_num_rows($result);

for($i=0;$row=mysql_fetch_assoc($result);$i++){ 
?>
 <tr>
<?php

$time = strtotime($row['insert_date']);
    $my_format = date("Y", $time);
    $my_format1 = date("F", $time);
    $my_format2 = date("d", $time);

?>
											<td><?=$row['id']?></td>
											<td> <?=$row['First_Name']?> <?=$row['Last_Name']?></td>
											<td><?=$row['Email']?></td>
											<td><?=$row['Phone']?></td>
											<td><?=$row['Company']?></td>
											<td><div class="post-date">
			                                    <span class="day"><?=$my_format2?></span> 
			                                 	 <span class="month"><?=$my_format1?></span>
			                                    <span class="year"><?=$my_format?></span>
			                               		 </div>
	                            			</td>
											<td class="actions">
												<a href="owner_profile.php?id=<?=base64_encode($row['id'])?>" title="Edit" onclick="clicksound.playclip()" style="font-size: 16px;" class="on-default "><i class="fa fa-asterisk "></i></a>
												<a href="owner_Tracker.php?id=<?=base64_encode($row['id'])?>" title="Tracker" onclick="clicksound.playclip()" style="font-size: 16px;" class="on-default "><i class="fa fa-share-alt-square  "></i></a>
												<a href="#modalAnim<?=$row['id']?>" onclick="clicksound.playclip()" title="Delete" class="modal-with-zoom-anim" style="font-size: 16px;" ><i class="fa fa-trash-o"></i></a>

<div id="modalAnim<?=$row['id']?>" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
	<form id="demo-form3" class="form-horizontal mb-lg"  action="process/owner/ownerDelete.php" method="post" enctype="multipart/form-data">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Are you sure?</h2>
												<input name="id" type="hidden" id="id" value="<?=base64_encode($row['id'])?>"/>
												<input name="owner" type="hidden" id="id" value="<?=$iduser?>"/>

											</header>
											<div class="panel-body">
												<div class="modal-wrapper">
													<div class="modal-icon">
														<i class="fa fa-question-circle"></i>
													</div>
													<div class="modal-text">
														<p>Are you sure that you want to delete this Owner DB ?</p>
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
											</td>
										
  
<?php
}
?>
</tr>										
										
									</tbody>
								</table>





















<?php
}
?>

								


















							</div>
						</section>
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
				<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>		
				<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>		
				<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Specific Page Vendor -->		<script src="assets/vendor/select2/select2.js"></script>
	
		

		<script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>		
		<script src="assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>		
		<script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>
		<!-- Analytics to Track Preview Website -->		
		<script src="assets/javascripts/ui-elements/examples.modals.js"></script>
		<!-- Examples -->
		<!-- <script src="assets/javascripts/tables/examples.datatables.editablecus001.js"></script> -->

		 <script src="assets/javascripts/tables/examples.datatables.tabletools.js"></script>

		 <script src="assets/javascripts/ui-elements/examples.loading.overlay.js"></script>
		


	</body>
</html>