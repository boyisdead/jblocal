<?php
ob_start();
session_start();
include('server/connect.php');
if(isset($_SESSION['ssUsername2'])){$username=$_SESSION['ssUsername2'];}
else if(!isset($_SESSION['ssUsername2'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}

$start=$_REQUEST['start'];
$end=$_REQUEST['end'];

$sql="SELECT COUNT(*) FROM user WHERE username != '$username' ";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_assoc($result);
$num=$row['COUNT(*)'];
$numAll=$num;

$sql="SELECT * FROM user WHERE username = '$username'";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_assoc($result);
$iduser = $row['id'];
setcookie("strID",$iduser,time()+3600*12);
?>
<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Dashboard</title>

	

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
		<link rel="stylesheet" href="assets/vendor/morris/morris.css" />
		<link rel="stylesheet" href="assets/vendor/chartist/chartist.css" />
		<link rel="stylesheet" href="assets/vendor/chartist/chartist2.css" />	

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
									<li >
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
									<li class="nav-expanded nav-active">
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
						<h2>Dashboard</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="Dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
								
								<li><span>Dashboard</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right" onclick="clicksound.playclip()"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>



<div class="row">
	<div class="col-md-12">
					<!-- start: page -->
						<section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#"  class="panel-action panel-action-toggle" data-panel-toggle></a>
									
								</div>
						
								<h2 class="panel-title">The Chart</h2>
							</header>
							<div class="panel-body">
								
								

<div class="chart chart-md" id="morrisLine"></div>
										<script type="text/javascript">
						
											var morrisLineData = [{
												y: '2006',
												a: 100,
												b: 90
											}, {
												y: '2007',
												a: 75,
												b: 65
											}, {
												y: '2008',
												a: 50,
												b: 40
											}, {
												y: '2009',
												a: 75,
												b: 65
											}, {
												y: '2010',
												a: 50,
												b: 40
											}, {
												y: '2011',
												a: 75,
												b: 65
											}, {
												y: '2012',
												a: 100,
												b: 90
											}, {
												y: '2013',
												a: 75,
												b: 65
											}, {
												y: '2014',
												a: 100,
												b: 90
											}];
						
											// See: assets/javascripts/ui-elements/examples.charts.js for more settings.
						
										</script>



							</div>
						</section>
					<!-- end: page -->

</div>


<div class="col-md-6 col-lg-12 col-xl-6">
							<div class="row">


<?php

?>
								<div class="col-md-6 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-quartenary">
										<div class="panel-body" style="padding: 3px;">
<iframe src="javascript:document.location='http://128.199.113.225:8081/Channel2?myParam='+<?=$_COOKIE["strID"]?>;" frameborder="0" style="overflow:hidden;height:450px;width:100%" height="100%" width="100%"></iframe>
										</div>
									</section>
								</div>

								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-quartenary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-quartenary">
														<i class="fa fa-user"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">All Candidate</h4>
														<?php
$sql="SELECT COUNT(*) FROM userDB2 WHERE owner1 = $iduser";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_array($result);
$num=$row['COUNT(*)'];
$numAll=$num;
?>
														<div class="info">
															<strong class="amount"><?=$numAll?> </strong>

														<?php
$sql="SELECT COUNT(*) FROM userDB2 WHERE DATE(insert_date) = CURDATE() AND owner1 = $iduser";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_array($result);
$num=$row['COUNT(*)'];
$numAll=$num;
?>

															<span class="text-primary">(Today <?=$numAll?> person)</span>
														</div>
													</div>
													<div class="summary-footer">
														<a href="http://www.jbmonster.com/admin/owner.php" class="text-muted text-uppercase">(report)</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
								
								
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-tertiary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-tertiary">
														<i class="fa fa-file-code-o"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Total's CV Submitssion</h4>
														<div class="info">
														<?php
$sql="SELECT COUNT(*) FROM userDB2 WHERE owner1 = $iduser AND file_cv != '' ";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_array($result);
$num=$row['COUNT(*)'];
$numAll=$num;
?>

															<strong class="amount"><?=$numAll?></strong>
														<?php
$sql="SELECT COUNT(*) FROM userDB2 WHERE DATE(update_cv) = CURDATE() AND owner1 = $iduser AND file_cv !='' ";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_array($result);
$num=$row['COUNT(*)'];
$numAll=$num;
?>

															<span class="text-primary">(Today <?=$numAll?> refer)</span>
														</div>
													</div>
													<div class="summary-footer">
														<a href="#" class="text-muted text-uppercase">(view all)</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-primary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-primary">
														<i class="fa fa-life-ring"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">

														<?php
$sql="SELECT COUNT(*) FROM job_owner WHERE ad_id = $iduser AND offer_made != '' ";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_array($result);
$num=$row['COUNT(*)'];
$numAll=$num;
?>

														<h4 class="title">Total's Job Offer</h4>
														<div class="info">
															<strong class="amount"><?=$numAll?></strong>
														<?php
$sql="SELECT COUNT(*) FROM job_owner WHERE ( DATE(insert_date) = CURDATE() OR DATE(last_update) = CURDATE() ) AND ad_id = $iduser AND offer_made != '' ";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_array($result);
$num=$row['COUNT(*)'];
$numAll=$num;
?>


															<span class="text-primary">(Today <?=$numAll?> Offer)</span>
														</div>
													</div>
													<div class="summary-footer">
														<a href="#" class="text-muted text-uppercase">(view all)</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>



								
							






							</div>
						</div>






<div class="row">
							<div class="col-lg-12">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
											<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss=""></a>
										</div>
						
										<h2 class="panel-title">Search Data <?=date("Y-m-d")?></h2>
									</header>
									<form class="form-horizontal form-bordered" action="Dashboard2_search.php" method="post">
									<div class="panel-body">
										
						
											
						
											<div class="form-group">
												<label class="col-md-3 control-label">Date range</label>
												<div class="col-md-6">
													<div class="input-daterange input-group" data-plugin-datepicker="">
														<span class="input-group-addon">
															<i class="fa fa-calendar"></i>
														</span>
														<input type="text" class="form-control" name="start">
														<span class="input-group-addon">to</span>
														<input type="text" class="form-control" name="end">
													</div>
												</div>
											</div>
						
											
						
										

								
								</div>
<footer class="panel-footer">
	<div class="row">
	<div class="col-md-6 col-md-offset-3">
											<button class="btn btn-primary btn-block">Submit</button> </div></div>
										</footer>
</form>
							</section>
							</div>
						</div>





<div class="row">




<?php
if($start == NULL AND $end == NULL){
?>



							<div class="col-lg-12">


								<section class="panel">
								<header class="panel-heading panel-heading-transparent">
									<div class="panel-actions">
										<a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
										<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss=""></a>
									</div>

									<h2 class="panel-title">CV Update Today</h2>
								</header>
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table table-striped mb-none">
											<thead>
												<tr>
													<th>#</th>
													<th>Candidate</th>
													<th>Refer to</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
<?php
$sql="SELECT COUNT(*) FROM userDB2 WHERE DATE(update_cv) = CURDATE() AND owner1 = $iduser AND file_cv !='' ";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_array($result);
$num=$row['COUNT(*)'];
$numAll=$num;
?>

<?php
	
if($numAll == 0){
	?>

<tr>
	<td colspan="4" style="text-align:center;">No Data Today</td>
</tr>

<?php
} else {
	?>

<?php

$sql="SELECT * FROM userDB2 WHERE DATE(update_cv) = CURDATE() AND owner1 = $iduser AND file_cv !='' ";
$result=mysql_query($sql)or die(mysql_error());
for($i=0;$row=mysql_fetch_assoc($result);$i++){ 


	
	?>




												<tr>
													<td><?=$i+1?></td>
													<td><a  target="_blank" href="owner_profile.php?id=<?=base64_encode($row['id'])?>"><?=$row['id']?> : <?=$row['First_Name']?> <?=$row['Last_Name']?></a></td>
													<td><span class="label label-success" style="font-size:12px;"><?=$row['file_cv']?></span></td>
													<td>
														<a target="_blank" href="pdf/<?=$row['file_cv']?>"><i class="fa fa-search"></i> view</a>
													</td>
												</tr>
<?php
}
}
?>												

												
											</tbody>
										</table>
									</div>
								</div>
							</section>


















<section class="panel">
								<header class="panel-heading panel-heading-transparent">
									<div class="panel-actions">
										<a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
										<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss=""></a>
									</div>

									<h2 class="panel-title">Offer Today</h2>
								</header>
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table table-striped mb-none">
											<thead>
												<tr>
													<th>#</th>
													<th>Candidate</th>
													<th>Job detail</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
<?php
$sql="SELECT COUNT(*) FROM job_owner WHERE ad_id = $iduser AND DATE(last_update) = CURDATE() AND offer_made != '' ";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_array($result);
$num=$row['COUNT(*)'];
$numAll=$num;
?>

<?php
	
if($numAll == 0){
	?>

<tr>
	<td colspan="4" style="text-align:center;">No Data Today</td>
</tr>

<?php
} else {
	?>

<?php

$sql="SELECT * FROM job_owner WHERE ad_id = $iduser AND DATE(last_update) = CURDATE() AND offer_made != '' ";
$result=mysql_query($sql)or die(mysql_error());
for($i=0;$row=mysql_fetch_assoc($result);$i++){ 


	


$sqlj="SELECT * FROM job_post WHERE id=$row[jobid]";
$resultj=mysql_query($sqlj)or die(mysql_error());
$rowj=mysql_fetch_assoc($resultj);
	?>




												<tr>
													<td><?=$i+1?></td>
													<td><a  target="_blank" href="owner_profile.php?id=<?=base64_encode($row['id'])?>"><?=$row['id']?> : <?=$row['First_Name']?> <?=$row['Last_Name']?></a></td>
													<td><span class="label label-info" style="font-size:12px;"><?=$rowj['id']?> / <?=$rowj['title']?></span></td>
													<td>
														<a target="_blank" href="owner_Tracker.php?id=<?=base64_encode($row['id'])?>"><i class="fa fa-search"></i> view</a>
													</td>
												</tr>
<?php
}
}
?>												

												
											</tbody>
										</table>
									</div>
								</div>
							</section>



















<section class="panel">
								<header class="panel-heading panel-heading-transparent">
									<div class="panel-actions">
										<a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
										<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss=""></a>
									</div>

									<h2 class="panel-title">Candidate Today</h2>
								</header>
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table table-striped mb-none">
											<thead>
												<tr>
													<th>#</th>
													<th>Name</th>
													<th>Source</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
<?php
$sql="SELECT COUNT(*) FROM userDB2 WHERE owner1 = $iduser AND DATE(insert_date) = CURDATE() ";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_array($result);
$num=$row['COUNT(*)'];
$numAll=$num;
?>

<?php
	
if($numAll == 0){
	?>

<tr>
	<td colspan="4" style="text-align:center;">No Data Today</td>
</tr>

<?php
} else {
	?>

<?php

$sql="SELECT * FROM userDB2 WHERE owner1 = $iduser AND DATE(insert_date) = CURDATE() ";
$result=mysql_query($sql)or die(mysql_error());
for($i=0;$row=mysql_fetch_assoc($result);$i++){ 



	?>




												<tr>
													<td><?=$i+1?></td>
													<td> <?=$row['First_Name']?> <?=$row['Last_Name']?></td>
													<td><?=$row['Email']?> / <?=$row['Phone']?></td>
													<td>
														<a target="_blank" href="owner_profile.php?id=<?=base64_encode($row['id'])?>"><i class="fa fa-search"></i> view</a>
													</td>
												</tr>
<?php
}
}
?>												

												
											</tbody>
										</table>
									</div>
								</div>
							</section>



















</div>









<?php
} else if($start != NULL AND $end == NULL){

$start = strtotime($start);
		$start=date("Y-m-d", $start);
	
?>










<div class="col-lg-12">


								<section class="panel">
								<header class="panel-heading panel-heading-transparent">
									<div class="panel-actions">
										<a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
										<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss=""></a>
									</div>

									<h2 class="panel-title">CV Update Today</h2>
								</header>
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table table-striped mb-none">
											<thead>
												<tr>
													<th>#</th>
													<th>Candidate</th>
													<th>Refer to</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
<?php
$sql="SELECT COUNT(*) FROM userDB2 WHERE (DATE(update_cv) = '$start' ) AND owner1 = $iduser AND file_cv !='' ";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_array($result);
$num=$row['COUNT(*)'];
$numAll=$num;
?>

<?php
	
if($numAll == 0){
	?>

<tr>
	<td colspan="4" style="text-align:center;">No Data Today</td>
</tr>

<?php
} else {
	?>

<?php

$sql="SELECT * FROM userDB2 WHERE (DATE(update_cv) = '$start' ) AND owner1 = $iduser AND file_cv !='' ";
$result=mysql_query($sql)or die(mysql_error());
for($i=0;$row=mysql_fetch_assoc($result);$i++){ 


	
	?>




												<tr>
													<td><?=$i+1?></td>
													<td><a  target="_blank" href="owner_profile.php?id=<?=base64_encode($row['id'])?>"><?=$row['id']?> : <?=$row['First_Name']?> <?=$row['Last_Name']?></a></td>
													<td><span class="label label-success" style="font-size:12px;"><?=$row['file_cv']?></span></td>
													<td>
														<a target="_blank" href="pdf/<?=$row['file_cv']?>"><i class="fa fa-search"></i> view</a>
													</td>
												</tr>
<?php
}
}
?>												

												
											</tbody>
										</table>
									</div>
								</div>
							</section>


















<section class="panel">
								<header class="panel-heading panel-heading-transparent">
									<div class="panel-actions">
										<a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
										<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss=""></a>
									</div>

									<h2 class="panel-title">Offer Today</h2>
								</header>
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table table-striped mb-none">
											<thead>
												<tr>
													<th>#</th>
													<th>Candidate</th>
													<th>Job detail</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
<?php
$sql="SELECT COUNT(*) FROM job_owner WHERE ad_id = $iduser AND (DATE(last_update) = '$start') AND offer_made != '' ";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_array($result);
$num=$row['COUNT(*)'];
$numAll=$num;
?>

<?php
	
if($numAll == 0){
	?>

<tr>
	<td colspan="4" style="text-align:center;">No Data Today</td>
</tr>

<?php
} else {
	?>

<?php

$sql="SELECT * FROM job_owner WHERE ad_id = $iduser AND (DATE(last_update) = '$start') AND offer_made != '' ";
$result=mysql_query($sql)or die(mysql_error());
for($i=0;$row=mysql_fetch_assoc($result);$i++){ 


	


$sqlj="SELECT * FROM job_post WHERE id=$row[jobid]";
$resultj=mysql_query($sqlj)or die(mysql_error());
$rowj=mysql_fetch_assoc($resultj);
	?>




												<tr>
													<td><?=$i+1?></td>
													<td><a  target="_blank" href="owner_profile.php?id=<?=base64_encode($row['id'])?>"><?=$row['id']?> : <?=$row['First_Name']?> <?=$row['Last_Name']?></a></td>
													<td><span class="label label-info" style="font-size:12px;"><?=$rowj['id']?> / <?=$rowj['title']?></span></td>
													<td>
														<a target="_blank" href="owner_Tracker.php?id=<?=base64_encode($row['id'])?>"><i class="fa fa-search"></i> view</a>
													</td>
												</tr>
<?php
}
}
?>												

												
											</tbody>
										</table>
									</div>
								</div>
							</section>



















<section class="panel">
								<header class="panel-heading panel-heading-transparent">
									<div class="panel-actions">
										<a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
										<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss=""></a>
									</div>

									<h2 class="panel-title">Candidate Today</h2>
								</header>
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table table-striped mb-none">
											<thead>
												<tr>
													<th>#</th>
													<th>Name</th>
													<th>Source</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
<?php
$sql="SELECT COUNT(*) FROM userDB2 WHERE owner1 = $iduser AND (DATE(insert_date) = '$start' ) ";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_array($result);
$num=$row['COUNT(*)'];
$numAll=$num;
?>

<?php
	
if($numAll == 0){
	?>

<tr>
	<td colspan="4" style="text-align:center;">No Data Today</td>
</tr>

<?php
} else {
	?>

<?php

$sql="SELECT * FROM userDB2 WHERE owner1 = $iduser AND (DATE(insert_date) = '$start') ";
$result=mysql_query($sql)or die(mysql_error());
for($i=0;$row=mysql_fetch_assoc($result);$i++){ 



	?>




												<tr>
													<td><?=$i+1?></td>
													<td> <?=$row['First_Name']?> <?=$row['Last_Name']?></td>
													<td><?=$row['Email']?> / <?=$row['Phone']?></td>
													<td>
														<a target="_blank" href="owner_profile.php?id=<?=base64_encode($row['id'])?>"><i class="fa fa-search"></i> view</a>
													</td>
												</tr>
<?php
}
}
?>												

												
											</tbody>
										</table>
									</div>
								</div>
							</section>



















</div>


























<?php
} else if($start != NULL AND $end != NULL){

$start = strtotime($start);
		$start=date("Y-m-d", $start);


		$end = strtotime($end);
		$end=date("Y-m-d", $end);
	
?>



<div class="col-lg-12">


								<section class="panel">
								<header class="panel-heading panel-heading-transparent">
									<div class="panel-actions">
										<a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
										<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss=""></a>
									</div>

									<h2 class="panel-title">CV Update Today</h2>
								</header>
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table table-striped mb-none">
											<thead>
												<tr>
													<th>#</th>
													<th>Candidate</th>
													<th>Refer to</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
<?php
$sql="SELECT COUNT(*) FROM userDB2 WHERE (DATE(update_cv) BETWEEN '$start' AND '$end') AND owner1 = $iduser AND file_cv !='' ";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_array($result);
$num=$row['COUNT(*)'];
$numAll=$num;
?>

<?php
	
if($numAll == 0){
	?>

<tr>
	<td colspan="4" style="text-align:center;">No Data Today</td>
</tr>

<?php
} else {
	?>

<?php

$sql="SELECT * FROM userDB2 WHERE (DATE(update_cv) BETWEEN '$start' AND '$end') AND owner1 = $iduser AND file_cv !='' ";
$result=mysql_query($sql)or die(mysql_error());
for($i=0;$row=mysql_fetch_assoc($result);$i++){ 


	
	?>




												<tr>
													<td><?=$i+1?></td>
													<td><a  target="_blank" href="owner_profile.php?id=<?=base64_encode($row['id'])?>"><?=$row['id']?> : <?=$row['First_Name']?> <?=$row['Last_Name']?></a></td>
													<td><span class="label label-success" style="font-size:12px;"><?=$row['file_cv']?></span></td>
													<td>
														<a target="_blank" href="pdf/<?=$row['file_cv']?>"><i class="fa fa-search"></i> view</a>
													</td>
												</tr>
<?php
}
}
?>												

												
											</tbody>
										</table>
									</div>
								</div>
							</section>


















<section class="panel">
								<header class="panel-heading panel-heading-transparent">
									<div class="panel-actions">
										<a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
										<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss=""></a>
									</div>

									<h2 class="panel-title">Offer Today</h2>
								</header>
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table table-striped mb-none">
											<thead>
												<tr>
													<th>#</th>
													<th>Candidate</th>
													<th>Job detail</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
<?php
$sql="SELECT COUNT(*) FROM job_owner WHERE ad_id = $iduser AND (DATE(last_update) BETWEEN '$start' AND '$end') AND offer_made != '' ";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_array($result);
$num=$row['COUNT(*)'];
$numAll=$num;
?>

<?php
	
if($numAll == 0){
	?>

<tr>
	<td colspan="4" style="text-align:center;">No Data Today</td>
</tr>

<?php
} else {
	?>

<?php

$sql="SELECT * FROM job_owner WHERE ad_id = $iduser AND (DATE(last_update) BETWEEN '$start' AND '$end') AND offer_made != '' ";
$result=mysql_query($sql)or die(mysql_error());
for($i=0;$row=mysql_fetch_assoc($result);$i++){ 


	


$sqlj="SELECT * FROM job_post WHERE id=$row[jobid]";
$resultj=mysql_query($sqlj)or die(mysql_error());
$rowj=mysql_fetch_assoc($resultj);
	?>




												<tr>
													<td><?=$i+1?></td>
													<td><a  target="_blank" href="owner_profile.php?id=<?=base64_encode($row['id'])?>"><?=$row['id']?> : <?=$row['First_Name']?> <?=$row['Last_Name']?></a></td>
													<td><span class="label label-info" style="font-size:12px;"><?=$rowj['id']?> / <?=$rowj['title']?></span></td>
													<td>
														<a target="_blank" href="owner_Tracker.php?id=<?=base64_encode($row['id'])?>"><i class="fa fa-search"></i> view</a>
													</td>
												</tr>
<?php
}
}
?>												

												
											</tbody>
										</table>
									</div>
								</div>
							</section>



















<section class="panel">
								<header class="panel-heading panel-heading-transparent">
									<div class="panel-actions">
										<a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
										<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss=""></a>
									</div>

									<h2 class="panel-title">Candidate Today</h2>
								</header>
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table table-striped mb-none">
											<thead>
												<tr>
													<th>#</th>
													<th>Name</th>
													<th>Source</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
<?php
$sql="SELECT COUNT(*) FROM userDB2 WHERE owner1 = $iduser AND (DATE(insert_date) BETWEEN '$start' AND '$end') ";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_array($result);
$num=$row['COUNT(*)'];
$numAll=$num;
?>

<?php
	
if($numAll == 0){
	?>

<tr>
	<td colspan="4" style="text-align:center;">No Data Today</td>
</tr>

<?php
} else {
	?>

<?php

$sql="SELECT * FROM userDB2 WHERE owner1 = $iduser AND (DATE(insert_date) BETWEEN '$start' AND '$end') ";
$result=mysql_query($sql)or die(mysql_error());
for($i=0;$row=mysql_fetch_assoc($result);$i++){ 



	?>




												<tr>
													<td><?=$i+1?></td>
													<td> <?=$row['First_Name']?> <?=$row['Last_Name']?></td>
													<td><?=$row['Email']?> / <?=$row['Phone']?></td>
													<td>
														<a target="_blank" href="owner_profile.php?id=<?=base64_encode($row['id'])?>"><i class="fa fa-search"></i> view</a>
													</td>
												</tr>
<?php
}
}
?>												

												
											</tbody>
										</table>
									</div>
								</div>
							</section>



















</div>





<?php
} else {

echo "NO DATA";

}
?>

















						</div>


















</div>

<br><br><br><br>





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
								<h6>Employee</h6>
								<ul>
		<?php							
		$sql="SELECT * FROM user";
		$result=mysql_query($sql)or die(mysql_error());
		for($i=0;$row=mysql_fetch_assoc($result);$i++){
		
		?>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="avatar/<?=$row['Image']?>" alt="<?=$row['First_Name']?> <?=$row['Last_Name']?>" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name"><?=$row['First_Name']?> <?=$row['Last_Name']?></span>
											<span class="title"><?=$row['tel']?></span>
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
		
		<!-- Specific Page Vendor -->	
		<!-- Specific Page Vendor -->		
		<script src="assets/vendor/jquery-appear/jquery.appear.js"></script>		
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
		<script src="assets/vendor/chartist/chartist.js"></script>




		<script src="assets/vendor/select2/select2.js"></script>		
		<script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>		
		<script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>

<!-- Specific Page Vendor -->	

		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>
		<!-- Analytics to Track Preview Website -->		
	
		<!-- Examples -->
		 <script src="assets/javascripts/tables/examples.datatables.editablecus.js"></script> 
		 <script src="assets/javascripts/ui-elements/examples.loading.overlay.js"></script>


		 <script>
$("#view-selector-container").hide();


(function(w,d,s,g,js,fs){
  g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(f){this.q.push(f);}};
  js=d.createElement(s);fs=d.getElementsByTagName(s)[0];
  js.src='https://apis.google.com/js/platform.js';
  fs.parentNode.insertBefore(js,fs);js.onload=function(){g.load('analytics');};
}(window,document,'script'));
</script>


<script>

$(document).ready(function(){
    $.ajax({
        url: 'server/getDataCustomer2-2.php', // getchart.php
        dataType: 'JSON',
        type: 'POST',
       // dataType: 'jsonp',
        data: {
        	id: "<?=$iduser?>",
              },
        success: function(response) {

Morris.Line({
		resize: true,
		element: 'morrisLine',
		data: response,
		xkey: 'y',
		ykeys: ['a', 'b'],
		labels: ['CVs', 'Offer'],
		hideHover: true,
		lineColors: ['#0088cc', '#734ba9'],
		parseTime:false,
	});
}
    });

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