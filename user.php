<?php
session_start();
include('server/connect.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">
		<?php
		if(isset($_SESSION['ssUsername2'])){$username=$_SESSION['ssUsername2'];}
		else if(!isset($_SESSION['ssUsername2'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}
	

		$sql="SELECT * FROM user WHERE username = '$username'";
		$result=mysql_query($sql)or die(mysql_error());
		$row=mysql_fetch_assoc($result);
		$iduser = $row['id'];
		?>

		<title>User</title>
		<meta name="keywords" content="user" />
		<meta name="description" content="user">
		

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


		<!-- Web Fonts 
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css"> -->

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
								<!-- <span class="role"><?=$row['position']?></span> -->
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="profile.php"><i class="fa fa-user"></i> My Profile</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="pages-lock-screen" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="server/logout.php?id=<?=$row['id']?>"><i class="fa fa-power-off"></i> Logout</a>
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
										<a href="profile.php">
											<i class="fa fa-user " aria-hidden="true" data="<?=$_SESSION['ssUserId']?>"></i>
											<span>User Profile</span>
										</a>
									</li>
	<?php
			if($_SESSION['ssRole']=="admin"){
	?>								
									<li>
										<a href="Dashboard.php"  >
											<i class="fa fa-line-chart" aria-hidden="true" ></i>
											<span>Dashboard</span>
										</a>
									</li>
	<?php
			} else {
	?>
									<li>
										<a href="Dashboard2.php"  >
											<i class="fa fa-line-chart" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
									</li>

	<?php	
			}				
	?>

	<?php
			if($_SESSION['ssRole']=="admin"){
	?>								
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
										<a href="blog.php"  >
											<i class="fa fa-comments-o" aria-hidden="true"></i>
											<span>Blog</span>
										</a>
									</li>
	<?php
			}
	?>

	<?php
			if($_SESSION['ssRole']=="admin" || $_SESSION['ssCanAcc']){
	?>		
									<li>
										<a href="candidate.php"  >
											<i class="fa fa-users" aria-hidden="true"></i>
											<span>Candidate</span>
										</a>
									</li>

									<li>
										<a href="referral.php"  >
											<i class="fa fa-sitemap" aria-hidden="true"></i>
											<span>Referral</span>
										</a>
									</li>
									<li>
										<a href="job-ap.php"  >
											<i class="fa fa-building-o" aria-hidden="true"></i>
											<span>Job Apply</span>
										</a>
									</li>
									<li>
										<a href="job-refer.php"  >
											<i class="fa fa-user-plus" aria-hidden="true"></i>
											<span>Job Refer</span>
										</a>
									</li>
	<?php
			}
	?>
	<?php
			if($_SESSION['ssRole']=="admin" || $_SESSION['ssJobAcc']){
	?>	
									<li>
										<a href="job.php"  >
											<i class="fa fa-cube" aria-hidden="true"></i>
											<span>Job</span>
										</a>
									</li>
									<li >
										<a href="Pick-job.php"  >
											<i class="fa fa-paw" aria-hidden="true"></i>
											<span>Pick Job</span>
										</a>
									</li>
									<li>
										<a href="job_level.php"  >
											<i class="fa fa-star-half-o" aria-hidden="true"></i>
											<span>Job level</span>
										</a>
									</li>
									<li>
										<a href="category.php"  >
											<i class="fa fa-cubes" aria-hidden="true"></i>
											<span>Category</span>
										</a>
									</li>		
	<?php
			}
	?>	
	<?php
			if($_SESSION['ssRole']=="admin"){
	?>									

									<li  class="nav-expanded nav-active">
										<a href="user.php"  >
											<i class="fa fa-heart" aria-hidden="true"></i>
											<span>User</span>
										</a>
									</li>	
									<li>
										<a href="setting.php"  >
											<i class="fa fa-cog " aria-hidden="true"></i>
											<span>Setting</span>
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
						<h2>User</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="../">
										<i class="fa fa-home"></i>
									</a>
								</li>
								
								<li><span>user</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"  ><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
<div class="row">

	<div class="row">
		<div class="col-xs-12">

			<section class="panel">
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
					
					</div>
			
					<h2 class="panel-title">User</h2>
				</header>
				<div class="panel-body">
				
					<table class="table table-bordered table-striped mb-none" id="datatable-editable">
						<thead>
							<tr>
								<th rowspan="2" style="width:48px" >#</th>
								<th rowspan="2" >Username</th>
								<th rowspan="2" >Name</th>
								<th rowspan="2" >Role</th>
								<th colspan="2">Permission</th>
								<th rowspan="2" style="width:80px" >Action</th>
							</tr>
							<tr>
								<th style="width:80px" >Candidate</th>
								<th style="width:80px" >Job</th>
							</tr>
						</thead>
						<tbody>
	<?php
		$sqlj="SELECT * FROM user WHERE username NOT LIKE 'admin' ORDER BY id";
		$resultj=mysql_query($sqlj)or die(mysql_error());

		while($rowj=mysql_fetch_assoc($resultj)){ 
	?>
							<tr class="gradeX">									

								<td><?=$rowj['id']?></td>
								<td><?=$rowj['username']?></td>
								<td><?=$rowj['First_Name']?></td>
								<td>
	<?php
		if ($rowj['admin']==1){
			echo "Admin";
		} else {
			echo "Agent";
		} 
	?>	
								</td>
								<td>
	<?php
		if ($rowj['candy_mng']==1){
			echo "Yes";
		} else {
			echo "No";
		} 
	?>		
								</td>
								<td>
	<?php
		if ($rowj['job_mng']==1){
			echo "Yes";
		} else {
			echo "No";
		} 
	?>	
								</td>
								<td class="actions" style="font-size:15px;">
									<a href="user-detail.php?id=<?=$rowj['id']?>" style="font-size: 16px;" class=" on-default ">
										<i class="fa fa-cog"></i>
									</a>
									<a href="#modalAnim<?=$rowj['id']?>" class="modal-with-zoom-anim" style="font-size: 16px;"  >
										<i class="fa fa-trash-o"></i>
									</a>
		

<!-- Delete Modal -->					
<div id="modalAnim<?=$rowj['id']?>" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
	<form id="demo-form3" class="form-horizontal mb-lg"  action="process/user/userDelete.php" method="post" enctype="multipart/form-data">
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title">Delete user</h2>
			</header>
			<div class="panel-body">
				<div id="showalert2"></div>
				<div class="modal-wrapper">
					<div class="modal-icon">
						<i class="fa fa-question-circle"></i>
					</div>
					<input name="id" type="hidden" id="id" value="<?=base64_encode($rowj['id'])?>"/>
					<div class="modal-text">
						<p>You really want to delete this user? (<?=$rowj['First_Name']?>) ?</p>
					</div>
				</div>
			</div>
			<footer class="panel-footer">
				<div class="row">
					<div class="col-md-12 text-right">
						<button type="submit" class="btn btn-primary "  >Delete</button>
						<button class="btn btn-default modal-dismiss">Cancle</button>
					</div>
				</div>
			</footer>
		</section>
	</form>
</div>

	<?php
		}
	?>									
										
								</td>
							</tr>

						</tbody>
					</table>
				</div>
			</section>
			<br><br><br><br><br>

				</div>
			</div>
				
	</div>	

		<!-- end: page -->
			
</div>

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
		
		<!-- Specific Page Vendor -->		
		<script src="assets/vendor/select2/select2.js"></script>		
		<script src="assets/vendor/jquery-datatables/media/js/jquery.dataTablesap.js"></script>		
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
		 <script src="assets/javascripts/tables/examples.datatables.editableap.js"></script> 
		 <script src="assets/javascripts/ui-elements/examples.loading.overlay.js"></script>
		<script>(function(a,b,c){if(c in b&&b[c]){var d,e=a.location,f=/^(a|html)$/i;a.addEventListener("click",function(a){d=a.target;while(!f.test(d.nodeName))d=d.parentNode;"href"in d&&(d.href.indexOf("http")||~d.href.indexOf(e.host))&&(a.preventDefault(),e.href=d.href)},!1)}})(document,window.navigator,"standalone")</script>   
				<style>

		</style>

	</body>
</html>